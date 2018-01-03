#!/usr/bin/php
<?php
namespace OpenWeb\Command;

require_once __DIR__.'/../../../../../wp-blog-header.php';
require_once __DIR__.'/../../vendor/autoload.php';

use OpenWeb\Admin\Post;

class GenerateSearch
{
    public function execute()
    {
        $this->getPosts();
    }

    private function getPosts()
    {
        $args = [
            'post_type' => ['page', 'post'],
            'post_status' => 'publish',
            'posts_per_page' => -1
        ];

        $query = new \WP_Query($args);

        $posts = $query->get_posts();

        foreach ($posts as $post) {
            $types = get_option('openweb_platform_cloudsearch_content_types');

            $contents = false === $types ? Post::METABOXES_TYPES : $types;

            if (in_array($post->post_type, $contents) && 'publish' === $post->post_status) {
                $json = Post::generateSearchJson($post);

                $meta = get_post_custom($post->ID);

                $dir = isset($meta['openweb-privateIndex']) ? Post::PATH_SEARCH_PRIVATE_JSON : Post::PATH_SEARCH_JSON;

                $name = (in_array($post->post_type, Post::METABOXES_TYPES) ? 'post' : $post->post_type).'_'.$post->ID.'_wp-search.json';

                Post::removeSearchJson($name);

                Post::saveJson($name, $dir, $json);
                echo sprintf('JSON Generado: %s/%s'.PHP_EOL, $dir, $name);
            }
        }
    }
}

$command = new GenerateSearch();
$command->execute();