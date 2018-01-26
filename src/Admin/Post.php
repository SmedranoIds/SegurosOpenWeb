<?php

namespace OpenWeb\Admin;

use OpenWeb\Admin;
use OpenWeb\Theme;
use OpenWeb\Utils;

/**
 * Class Post
 * @package OpenwebMod\Admin
 */
class Post extends Admin
{
    const RELATED_ITEMS = 3;

    const METABOXES_TYPES = ['post', 'page'];

    const PATH_SEARCH_JSON = ABSPATH.'wp-content'.DIRECTORY_SEPARATOR.'archivos_buscador';

    const PATH_SEARCH_PRIVATE_JSON = ABSPATH.'private'.DIRECTORY_SEPARATOR.'archivos_buscador';

    const PATH_LAZY_LOAD_JSON = ABSPATH.'wp-content'.DIRECTORY_SEPARATOR.'uploads'.DIRECTORY_SEPARATOR.'load';

    const PATH_POST = 'post';

    const PATH_CATEGORY = 'category';

    const PATH_TAG = 'tag';

    const PATH_AUTHOR = 'author';

    const HARD_LIMIT_MYSQL = 1844674407370955161;

    protected function init()
    {
        add_action('init', [$this, 'registerMetaFieldsPost']);
        add_action('admin_enqueue_scripts', function () {
            wp_enqueue_script('openweb-related-js', get_template_directory_uri().'/src/Admin/js/openweb-related.js');
            wp_enqueue_script('openweb-post-js', get_template_directory_uri().'/src/Admin/js/openweb-post.js');
        });
        add_action('save_post', [$this, 'generateJson'], 1001, 3);
        add_filter('default_hidden_meta_boxes', [$this, 'showOpenwebMetabox'], 10, 2);
        add_filter('get_user_option_meta-box-order_post', [$this, 'setMetaboxOrder']);
    }

    public function registerMetaFieldsPost()
    {
        register_meta('post', 'disclaimer', [
            'description'       => __('Añade un disclaimer al artículo', 'openweb'),
            'single'            => true,
            'sanitize_callback' => 'sanitize_text_field',
            'auth_callback'     => [$this, 'checkAllowedMetaBox']
        ]);

        register_meta('post', 'related', [
            'description'       => __('Añade artículos relacionados', 'openweb'),
            'single'            => true,
            'auth_callback'     => [$this, 'checkAllowedMetaBox']
        ]);

        register_meta('post', 'privateIndex', [
            'description'       => __('Indexación privada', 'openweb'),
            'single'            => true,
            'auth_callback'     => [$this, 'checkAllowedMetaBox']
        ]);

        add_action('add_meta_boxes_post', [$this, 'addMetaBoxPost']);
        add_action('add_meta_boxes_page', [$this, 'addMetaBoxPost']);
        add_action('save_post', [$this, 'saveMetasBox'], 10, 2);
    }

    public function checkAllowedMetaBox($allowed, $metaKey, $postId, $userId, $cap, $caps)
    {
        $allowed = false;

        if (in_array(get_post_type($postId), self::METABOXES_TYPES) && current_user_can('edit_post', $postId)) {
            $allowed = true;
        }

        return $allowed;
    }

    public function addMetaBoxPost()
    {
        add_meta_box('openweb-related-post', __('Publicaciones relacionadas', 'openweb'), [$this, 'showPostRelated'], self::METABOXES_TYPES);
        add_meta_box('openweb-disclaimer-post', __('Disclaimer artículo', 'openweb'), [$this, 'showPostDisclaimer'], self::METABOXES_TYPES);
        add_meta_box('openweb-private-index-post', __('Indexación Privada', 'openweb'), [$this, 'showPostPrivateIndexation'], self::METABOXES_TYPES, 'side');
    }

    public function showPostDisclaimer($post)
    {
        wp_nonce_field('openweb-disclaimer', 'openweb-disclaimer-noncename' );

        $meta = get_post_custom($post->ID);

        echo $this->getTPL('metaDisclaimer', $meta);
    }

    public function showPostRelated($post)
    {
        wp_nonce_field('openweb-related', 'openweb-related-noncename');

        $meta = get_post_custom($post->ID);

        $related = $this->getCustomMetaRelated($meta);

        echo $this->getTPL('metaRelated', [
            'meta' => $meta,
            'posts-recents' => $this->getRecentsTerms('post', $post->ID),
            'pages-recents' => $this->getRecentsTerms('page', $post->ID),
            'terms-related' => $related,
            'terms-related-ids' => $this->getRelatedTermsIds($related)
        ]);
    }

    public function showPostPrivateIndexation($post)
    {
        wp_nonce_field('openweb-privateIndex', 'openweb-privateIndex-noncename');

        $meta = get_post_custom($post->ID);

        echo $this->getTPL('privateIndex', $meta);
    }

    public function getCustomMetaRelated($meta)
    {
        return isset($meta['openweb-related'][0]) ? unserialize($meta['openweb-related'][0]) : [];
    }

    public function saveMetasBox($postId)
    {
        if ('post' === strtolower($_SERVER['REQUEST_METHOD'])) {
            if (! isset( $_POST['openweb-disclaimer-noncename'] ) || ! wp_verify_nonce( $_POST['openweb-disclaimer-noncename'], 'openweb-disclaimer' ) ) {
                return;
            }

            if (! isset( $_POST['openweb-related-noncename'] ) || ! wp_verify_nonce( $_POST['openweb-related-noncename'], 'openweb-related' ) ) {
                return;
            }

            if (! isset( $_POST['openweb-privateIndex-noncename'] ) || ! wp_verify_nonce( $_POST['openweb-privateIndex-noncename'], 'openweb-privateIndex' ) ) {
                return;
            }

            if (isset($_POST['openweb-disclaimer']) && '' !== $_POST['openweb-disclaimer']) {
                update_post_meta($postId, 'openweb-disclaimer', $_POST['openweb-disclaimer']);
            } else {
                delete_post_meta($postId, 'openweb-disclaimer');
            }

            if (isset($_POST['openweb-related'])) {
                $ids = '' !== $_POST['openweb-related-ids'] ? explode('|', $_POST['openweb-related-ids']) : [];

                if ('manual' === $_POST['openweb-related']) {
                    $related = $this->getRelatedTerms($ids);
                } else {
                    $related = $this->generateAutoRelated($postId, $ids);
                }

                update_post_meta($postId, 'openweb-related-type', $_POST['openweb-related']);
                update_post_meta($postId, 'openweb-related', $related);
            } else {
                delete_post_meta($postId, 'openweb-related');
            }

            if (isset($_POST['openweb-privateIndex'])) {
                update_post_meta($postId, 'openweb-privateIndex', $_POST['openweb-privateIndex']);
            } else {
                delete_post_meta($postId, 'openweb-privateIndex');
            }
        }
    }

    private function generateAutoRelated($postId, $ids)
    {
        $related = [];
        $auto = [];
        $c = count($ids);

        if ($c) {
            $related = $this->getRelatedTerms($ids);
        }

        if ($c < self::RELATED_ITEMS) {
            $tags = $this->getPostsFromQuery($postId, 'tag__in', 'post_tag', $ids);
            $cats = $this->getPostsFromQuery($postId, 'category__in', 'category', $ids);
            $merge = array_unique(array_merge($tags, $cats), SORT_REGULAR);

            if (count($merge)) {
                $relatedsCount = count($merge) > self::RELATED_ITEMS ? self::RELATED_ITEMS - $c : count($merge);
                $random = array_rand($merge, $relatedsCount);
                if (is_array($random)) {
                    foreach ($random as $item) {
                        $auto[] = $merge[$item];
                    }
                } else {
                    $auto[] = $merge[$random];
                }
            }
        }

        $auto = array_unique(array_merge($auto, $related), SORT_REGULAR);

        return $auto;
    }

    private function getPostsFromQuery($postId, $in, $taxonomy, $ids, $number = 15)
    {
        $terms = wp_get_object_terms($postId, $taxonomy, ['fields' => 'ids']);

        $posts = [];

        if (count($terms)) {
            $not = array_unique(array_merge([$postId], (count($ids) ? $ids : [])));

            $args = [
                $in => $terms,
                'post__not_in' => $not,
                'orderby' => 'modified',
                'order' => 'desc',
                'posts_per_page' => $number,
                'post_status' => 'publish',
                'ignore_sticky_posts' => true
            ];

            $query = new \WP_Query($args);
            $posts = $query->posts;
        }

        return $posts;
    }

    private function getRecentsTerms($type, $id)
    {
        $args = [
            'post__not_in' => [$id],
            'numberposts' => 20,
            'post_type' => $type,
            'post_status' => 'publish',
        ];

        return wp_get_recent_posts($args, OBJECT);
    }

    private function getRelatedTerms(array $ids = [])
    {
        $posts = [];

        if (count($ids)) {
            $args = [
                'post__in' => $ids,
                'post_type' => ['page', 'post']
            ];

            $query = new \WP_Query($args);
            $posts = $query->get_posts();
        }

        return $posts;
    }

    private function getRelatedTermsIds(array $terms = [])
    {
        $ids = [];

        foreach ($terms as $term) {
            $ids[] = $term->ID;
        }

        return $ids;
    }

    private static function getQueryVars($term = false, $value = null)
    {
        $vars = [
            'suppress_filters' => true,
            'post_type' => ['post'],
            'post_status' => 'publish',
            'offset' => 9,
            'posts_per_page' => self::HARD_LIMIT_MYSQL,
            'orderby' => 'date',
            'no_found_rows' => true,
            'fields' => 'ids',
        ];

        if (false !== $term) {
            $vars[$term] = $value;
        }

        return $vars;
    }

    public function generateJson($id, \WP_Post $post, $update)
    {
        $types = get_option('openweb_platform_cloudsearch_content_types');

        $contents = false === $types ? static::METABOXES_TYPES : $types;

        if (in_array($post->post_type, $contents) && 'publish' === $post->post_status) {

            $meta = get_post_custom($id);

            $json = self::generatePostJson($post);

            self::saveJson('post_'.$id.'.json', self::PATH_LAZY_LOAD_JSON.DIRECTORY_SEPARATOR.self::PATH_POST, $json);

            $json = self::generateSearchJson($post);

            $dir = isset($meta['openweb-privateIndex']) ? self::PATH_SEARCH_PRIVATE_JSON : self::PATH_SEARCH_JSON;

            $name = (in_array($post->post_type, static::METABOXES_TYPES) ? 'post' : $post->post_type).'_'.$id.'_wp-search.json';

            self::removeSearchJson($name);

            self::saveJson($name, $dir, $json);

            if (false === $update) {
                self::createHomeJson();
                self::createCategoriesJson($id);
                self::createTagsJson($id);
                self::createAuthorJson($post->post_author);
            }

        }

        return $id;
    }

    public static function generateSearchJson(\WP_Post $post)
    {
        $category = wp_get_post_categories($post->ID, ['fields' => 'names'])[0];

        $language = 'es-ES';

        $json = [
            'resourcename' => parse_url(get_permalink($post->ID), PHP_URL_PATH),
            'category' => is_null($category) ? '' : $category,
            'content' => $post->post_content,
            'content_language' => $language,
            'date' => date('Y-m-d', strtotime($post->post_date)),
            'description' => Theme::getExcerpt($post),
            'image_src' => parse_url(get_the_post_thumbnail_url($post->ID, 'small-list-thumb'), PHP_URL_PATH),
            'title' => $post->post_title,
        ];

        return json_encode($json);
    }

    public static function generatePostJson(\WP_Post $post)
    {
        $category = wp_get_post_categories($post->ID, ['fields' => 'names'])[0];

        $json = [
            'id' => $post->ID,
            'url' => str_replace(home_url(), '', get_permalink($post->ID)),
            'title' => $post->post_title,
            'excerpt' => Theme::getExcerpt($post),
            'image' => str_replace(home_url(), '', get_the_post_thumbnail_url($post->ID, 'share-thumb')),
            'category' => Utils::sanitize($category)
        ];

        return json_encode($json);
    }

    public static function createHomeJson()
    {
        $query = new \WP_Query(self::getQueryVars());
        $json = json_encode($query->get_posts());

        self::saveJson('home.json', self::PATH_LAZY_LOAD_JSON, $json);
    }

    public static function createCategoriesJson($id)
    {
        $categories = wp_get_post_categories($id, ['fields' => 'ids']);

        foreach ($categories as $category) {
            $query = new \WP_Query(self::getQueryVars('cat', $category));
            $posts = $query->get_posts();

            if (count($posts)) {
                self::saveJson('category_'.$category.'.json', self::PATH_LAZY_LOAD_JSON.DIRECTORY_SEPARATOR.self::PATH_CATEGORY, json_encode($posts));
            }
        }
    }

    public static function createTagsJson($id)
    {
        $tags = wp_get_post_tags($id, ['fields' => 'ids']);

        foreach ($tags as $tag) {
            $query = new \WP_Query(self::getQueryVars('tag_id', $tag));
            $posts = $query->get_posts();

            if (count($posts)) {
                self::saveJson('tag_'.$tag.'.json', self::PATH_LAZY_LOAD_JSON.DIRECTORY_SEPARATOR.self::PATH_TAG, json_encode($posts));
            }
        }
    }

    public static function createAuthorJson($author)
    {
        $query = new \WP_Query(self::getQueryVars('author', $author));
        $posts = $query->get_posts();

        if (count($posts) && count($posts) > 9) {
            self::saveJson('author_'.$author.'.json', self::PATH_LAZY_LOAD_JSON.DIRECTORY_SEPARATOR.self::PATH_AUTHOR, json_encode($posts));
        }
    }

    public static function saveJson($name, $dir, $json)
    {
        if (! is_dir($dir)) {
            mkdir($dir, 0775, true);
        }

        file_put_contents($dir.DIRECTORY_SEPARATOR.$name, $json);
    }

    public function showOpenwebMetabox($hidden, $screen)
    {
        $excerpt = array_search('postexcerpt', $hidden);
        unset($hidden[$excerpt]);

        return $hidden;
    }

    public function setMetaboxOrder()
    {
        return [
            'side' => implode(',', ['submitdiv', 'categorydiv', 'postimagediv', 'tagsdiv-post_tag']),
            'normal' => implode(',', ['postexcerpt']),
            'advanced' => implode(',', ['openweb-related-post', 'openweb-disclaimer-post'])
        ];
    }

    public static function removeSearchJson($name)
    {
        if (is_file(($file = self::PATH_SEARCH_PRIVATE_JSON.DIRECTORY_SEPARATOR.$name))) {
            unlink($file);
        }

        if (is_file(($file = self::PATH_SEARCH_JSON.DIRECTORY_SEPARATOR.$name))) {
            unlink($file);
        }
    }
}

