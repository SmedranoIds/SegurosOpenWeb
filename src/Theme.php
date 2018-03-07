<?php

namespace OpenWeb;

use OpenWeb\Admin\Author;
use OpenWeb\Admin\Customize;
use OpenWeb\Admin\Post;

final class Theme
{
    const LOGO_FOOTER = 'openweb-white.svg';
    const LOGO = 'openweb-white.svg';
    const THEME_NAME = 'openweb';

    const URL_UPDATE = 'https://temawordpress.webpublicas.com/version.json';

    const SOCIAL_NETWORKS = ['facebook', 'twitter', 'instagram', 'google-plus', 'linkedin', 'pinterest', 'youtube'];

    const SHARE_BUTTONS_SOCIAL_NET = ['twitter', 'facebook', 'google-plus', 'pinterest', 'linkedin'];

    const VIEWS_DIR = OPENWEB_THEME_PATH.DIRECTORY_SEPARATOR.'template-parts';

    const SEARCH_HTML = '<li class="search-wrapper"><span class="search-trigger icon bbva-coronita_search"></span></li>';

    const FIVE_STARS_LAYOUT = '<div id="starsContainer" class="starsContainer"></div>';

    const LIKES_LAYOUT = '<div id="likesContainer" class="likesContainer"></div>';

    const TWITTER_LAYOUT = '<h4>%s</h4><div id="tweetsContainer"></div>';


    private static $instance;

    private function __construct()
    {
        Customize::getInstance();
        Post::getInstance();
        Author::getInstance();
    }

    public function __clone()
    {
        trigger_error("You can't clone this class", E_USER_ERROR);
    }

    public static function getInstance()
    {
        if (! self::$instance) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function init()
    {
        add_action('after_setup_theme', [$this, 'setup']);
        add_action('wp_enqueue_scripts', [$this, 'enqueueAssets']);

        add_filter('wp_nav_menu_items', [$this, 'addSearchBox'], 10, 2);
        add_filter('wp_nav_menu', [$this, 'renderPrefooterMenu'], 10, 2);

        add_filter('upload_mimes', [$this, 'addMimeTypeSVG']);

        add_filter('pre_set_site_transient_update_themes', [$this, 'updateTheme']);

        add_shortcode('openweb-twitter', [$this, 'twitterShortCode']);
        add_shortcode('openweb-comments', [$this, 'commentsShortCode']);
        add_shortcode('openweb-like', [$this, 'likeShortCode']);
        add_shortcode('openweb-fivestars', [$this, 'fiveStarsShortCode']);
    }

    public function setup()
    {
        load_theme_textdomain('openweb', OPENWEB_THEME_PATH.DIRECTORY_SEPARATOR.'languages');

        add_theme_support('title-tag');

        add_theme_support('post-thumbnails');

        add_image_size('main-thumb',1600, 450);
        add_image_size('small-list-thumb',360, 235, true);
        add_image_size('big-list-thumb',555, 380);
        add_image_size('share-thumb',700, 520, true);

        register_nav_menus([
            'top-links'               => __('Top Links Menu', 'openweb'),
            'main'                    => __('Main Menu', 'openweb'),
            'secondary'               => __('Secondary Menu', 'openweb'),
            'prefooter-left'          => __('PreFooter Left Menu', 'openweb'),
            'prefooter-left-center'   => __('PreFooter Left Center Menu', 'openweb'),
            'prefooter-middle'        => __('PreFooter Middle', 'openweb'),
            'prefooter-middle-center' => __('PreFooter Middle Center', 'openweb'),
            'prefooter-right-center'  => __('PreFooter Right Center Menu', 'openweb'),
            'prefooter-right'         => __('PreFooter Right Menu', 'openweb'),
            'footer-links'            => __('Footer Links Menu', 'openweb'),
        ]);

        add_theme_support('post-formats', [
            'image',
            'video',
            'quote',
            'link',
            'gallery',
            'audio',
        ]);

        add_theme_support('custom-logo', [
            'height'      => 30,
            'width'       => 235,
            'flex-height' => true,
            'flex-width'  => true,
            'header-text' => ['site-title', 'site-description'],
        ]);
    }

    public function enqueueAssets()
    {
        wp_enqueue_script('jquery', get_template_directory_uri().'/assets/jquery/jquery.min.js', [], '2.1.4', true);
        wp_enqueue_script('bootstrap', get_template_directory_uri().'/assets/bootstrap/js/bootstrap.min.js', ['jquery'], '3.3.6', true);
        wp_enqueue_script('sidr', get_template_directory_uri().'/assets/sidr/js/jquery.sidr.min.js', ['jquery'], '2.2.1', true);
        wp_enqueue_script('ofi', get_template_directory_uri().'/assets/object-fit-images/ofi.min.js', ['jquery'], '2.2.1', true);
        wp_enqueue_script('prettySocial', get_template_directory_uri().'/assets/prettySocial/jquery.prettySocial.min.js', ['jquery'], '3.3.6', true);
        wp_enqueue_script('base', get_template_directory_uri().'/js/base.js', ['prettySocial', 'ofi'], '1.0.0', true);
        wp_enqueue_script('app', get_template_directory_uri().'/js/app.js', ['base'], '1.0.0', true);

        if (get_theme_mod('openweb_platform_cloudsearch_results') && is_page_template('results.php')) {
            wp_enqueue_script('openweb-search', get_template_directory_uri().'/js/search.js', ['jquery'], '1.0.0', true);
        }

        if (get_theme_mod('openweb_platform_security')) {
            wp_enqueue_script('openweb-auth', get_template_directory_uri().'/js/auth.js', ['jquery'], '1.0.0', true);
        }

        wp_enqueue_style('bootstrap', get_template_directory_uri().'/assets/bootstrap/css/bootstrap.min.css');
        wp_enqueue_style('bootstrap-theme', get_template_directory_uri().'/assets/bootstrap/css/bootstrap-theme.min.css', ['bootstrap']);
        wp_enqueue_style('global-coronita', get_template_directory_uri().'/css/global-coronita.css', ['bootstrap-theme']);
        wp_enqueue_style('media-coronita', get_template_directory_uri().'/css/media-coronita.css', ['global-coronita']);
        wp_enqueue_style('icons-coronita', get_template_directory_uri().'/css/icons-coronita.css', ['media-coronita']);
        wp_enqueue_style('openweb', get_template_directory_uri().'/css/openweb.css', ['icons-coronita']);
        wp_enqueue_style('openweb-theme-style', get_stylesheet_uri(), ['openweb']);
    }

    public function addSearchBox($items, $args)
    {
        if ($args->theme_location == 'secondary') {
            $items = $items.self::SEARCH_HTML;
        }

        return $items;
    }

    public function renderPrefooterMenu($menu, $args)
    {
        if (false !== strpos($args->theme_location, 'prefooter')) {
            $title = sprintf('<h2 id="'.$args->menu->name.'">%1$s</h2>', $args->menu->name);
            $menu = preg_replace('/><ul/', '>'.$title.PHP_EOL.'<ul', $menu);
        }

        return $menu;
    }

    public function getLogo($onlyMobile = false, $output = true)
    {
        $path  = get_template_directory_uri().'/img/'.self::LOGO;
        $link  = '<a href="%1$s" id="logo" class="%2$s">%3$s</a>';
        $image = '<img src="%1$s" alt="%2$s" title="%2$s">';

        if (! empty(($customId = get_theme_mod('custom_logo')))) {
            $path = wp_get_attachment_image_src($customId, 'full')[0];
        }

        $logo = sprintf($link, esc_url(home_url()), ($onlyMobile ? 'hidden-lg' : ''), sprintf($image, $path, get_bloginfo('name')));

        if (true === $output) {
            echo $logo;
        }

        return $logo;
    }

    public function getLogoFooter($output = true)
    {
        $path  = get_template_directory_uri().'/img/'.self::LOGO_FOOTER;
        // $path  = get_template_directory_uri().'/img/'.self::LOGO;
        $link  = '<a href="%1$s" class="logo">%2$s</a>';
        $image = '<img src="%1$s" alt="%2$s" title="%2$s">';

        if (! empty(($customId = get_theme_mod('openweb_logo_footer')))) {
            $path = wp_get_attachment_image_src($customId, 'full')[0];
        }

        $logo = sprintf($link, esc_url(home_url()), sprintf($image, $path, get_bloginfo('name')));

        if (true === $output) {
            echo $logo;
        }

        return $logo;
    }

    public function addMimeTypeSVG($mimes = [])
    {
        $mimes['svg'] = 'image/svg+xml';

        return $mimes;
    }

    public static function getExcerpt(\WP_Post $post, $words = 30)
    {
        $excerpt = $post->post_excerpt;

        if ('' === $excerpt) {
            $excerpt = trim(wp_trim_words(wp_strip_all_tags(strip_shortcodes($post->post_content), true), $words, '...'));
        }

        return $excerpt;
    }

    public function renderView($view, array $data = [])
    {
        $file = static::VIEWS_DIR.DIRECTORY_SEPARATOR.$view.'.php';

        if (! is_file($file)) {
            trigger_error(sprintf('No existe el template %s', $file), E_USER_ERROR);
        }

        echo Utils::renderTpl($file, $data);
    }

    public function countAuthorArticles($author)
    {
        $vars = [
            'suppress_filters' => true,
            'post_type' => ['post', 'page'],
            'post_status' => 'publish',
            'fields' => 'ids',
            'author' => $author
        ];
        $query = new \WP_Query($vars);
        return $query->found_posts;
    }

    public function countCategoriesByAuthor($author)
    {
        $wpdb = $GLOBALS['wpdb'];

        $sql = "
            SELECT COUNT(*) AS num FROM (
                SELECT p.ID
                FROM {$wpdb->prefix}posts p
                  INNER JOIN {$wpdb->prefix}term_relationships tr ON p.ID = tr.object_id 
                  INNER JOIN {$wpdb->prefix}term_taxonomy tt ON tt.term_taxonomy_id = tr.term_taxonomy_id
                WHERE 
                  p.post_type = 'post' 
                  AND p.post_status = 'publish'
                  AND tt.taxonomy = 'category'
                  AND p.post_author = %d
                GROUP BY tt.`term_taxonomy_id`
            ) AS query
        ";

        $results = $wpdb->get_row($wpdb->prepare($sql, $author));

        return $results->num;
    }

    private function createShortcode($js, $jsData = [], $dataCss = false, $css = null)
    {
        wp_enqueue_script('jsCookie', get_template_directory_uri().'/js/js.cookie.js', [], false, true);

        if ('true' === $dataCss || true === $dataCss) {
            wp_enqueue_style('scFiveStars', get_template_directory_uri().'/css/'.$css.'.css');
        }

        wp_enqueue_script($js, get_template_directory_uri().'/js/'.$js.'.js');

        wp_localize_script($js, $jsData[0], $jsData[1]);
    }

    public function fiveStarsShortCode($vars, $content, $tag)
    {
        $this->createShortcode(
            'scFiveStars',
            ['stars_vars', ['thread' => $vars['data-thread']]],
            $vars['data-css'],
            'scFiveStars'
        );

        return self::FIVE_STARS_LAYOUT;
    }

    public function likeShortCode($vars, $content, $tag)
    {
        $this->createShortcode(
            'scLike',
            ['like_vars', ['thread' => $vars['data-thread'], 'likeLabel'  => $vars['data-likeit']]],
            $vars['data-css'],
            'scLike'
        );

        return self::LIKES_LAYOUT;
    }


    public function twitterShortCode($vars, $content, $tag)
    {
        wp_enqueue_style('scTwitter', get_template_directory_uri().'/css/scTwitter.css');
        wp_enqueue_script('scTwitter', get_template_directory_uri().'/js/scTwitter.js');

        wp_localize_script('scTwitter', 'php_vars', ['nTweets' => $vars['n_tweets'], 'userId'  => $vars['user_id']]);

        return sprintf(self::TWITTER_LAYOUT, $vars['title']);
    }

    /**
     * @param $vars
     * @param $content
     * @param $tag
     * @return string
     *
     * @todo rehacerlo entero: spaghetti code
     */
    public function commentsShortCode($vars, $content, $tag)
    {
        wp_enqueue_style('scComments', get_template_directory_uri().'/css/scComments.css');
        wp_enqueue_script( 'scComments', get_template_directory_uri().'/js/scComments.js');

        $title = $vars[title];
        $lopd = $vars['data-lopd'];
        $cols = $vars['data-cols'];
        $rows = $vars['data-rows'];
        $css = $vars['data-css'];
        $answer = $vars['data-answer'];
        $send = $vars['data-send'];
        $placeholderAlias = $vars['data-placeholder-alias'];
        $placeholderEmail = $vars['data-placeholder-email'];
        $placeholderContent = $vars['data-placeholder-content'];
        $labelAlias = $vars['data-label-alias'];
        $labelEmail = $vars['data-label-email'];
        $labelContent = $vars['data-label-content'];
        $valError = $vars['data-val-error'];
        $lopdText = $vars['data-lopd-text'];
        $lopdError = $vars['data-lopd-error'];
        $lopdLink = $vars['data-lopd-link'];
        $mailError = $vars['data-mail-error'];
        $error = $vars['data-error'];
        $ok = $vars['data-ok'];
        $author = $vars['data-author'];
        $captcha = $vars['data-captcha'];
        $recaptchaVisible = $vars['data-recaptcha-visible'];
        $errorCaptcha = $vars['data-error-captcha'];
        $privateRead = $vars['data-private-read'];
        $msgPrivateRead = $vars['data-msg-private-read'];
        $privateWrite = $vars['data-private-write'];
        $msgPrivateWrite = $vars['data-msg-private-write'];


        if (! $lopd) {
            $lopd = false;
        }
        if (! $cols) {
            $cols = 20;
        }
        if (! $rows) {
            $rows = 3;
        }
        if (! $css) {
            $css = true;
        }
        if (! $send) {
            $send = 'Enviar';
        }
        if (! $lopdText) {
            $lopdText = 'He leído y acepto la LOPD';
        }
        if (! $captcha) {
            $captcha = false;
        }
        if (! $recaptcha) {
            $recaptcha = false;
        }
        if (! $privateRead) {
            $privateRead = false;
        }
        if (! $privateWrite) {
            $privateWrite = false;
        }
        if (! $msgPrivateWrite) {
            $msgPrivateWrite = 'Debe estar registrado para enviar comentarios';
        }

        $data = array(
            'thread' => basename(get_permalink()),
            'answer' => $answer,
            'valError' => $valError,
            'lopd' => $lopd,
            'lopdError' => $lopdError,
            'mailError' => $mailError,
            'error' => $error,
            'ok' => $ok,
            'author' => $author,
            'captcha' => $captcha,
            'recaptchaVisible' => $recaptchaVisible,
            'errorCaptcha' => $errorCaptcha,
            'privateWrite' => $privateWrite,
            'msgPrivateRead' => $msgPrivateRead,
            'privateRead' => $privateRead
        );

        wp_localize_script('scComments', 'php_vars', $data);

        $layout = '<h4>'. $title .'</h4>';
        $layout = $layout . '<div id="commentWrapper" class="commentWrapper"></div>';


        if($privateWrite !== false && $privateWrite !== 'false') {
            $layout = $layout . '<div id="privateWrite" class="privateWrite">' . $msgPrivateWrite . '</div>';
        } else {
            $layout = $layout . '<form id="commentsContainer" class="commentsContainer">';

            if(! $labelAlias) {
                $layout = $layout . '<div class="fullWidth">';
            }
            $layout = $layout . '<label>' . $labelAlias . '</label><input type="text" id="commentsAlias" required="true" placeholder="' . $placeholderAlias . '">';
            if(! $labelAlias) {
                $layout = $layout . '</div>';
            }

            if(! $labelEmail) {
                $layout = $layout . '<div class="fullWidth">';
            }
            $layout = $layout . '<label>' . $labelEmail . '</label><input type="email" id="commentsEmail" required="true" placeholder="' . $placeholderEmail . '">';
            if(! $labelEmail) {
                $layout = $layout . '</div>';
            }

            if(! $labelContent) {
                $layout = $layout . '<div class="fullWidth">';
            }
            $layout = $layout . '<label>' . $labelContent . '</label><textarea id="commentsReply" cols="' . $cols . '" rows="' . $rows . '"  required="true" placeholder="' . $placeholderContent . '"></textarea>';
            if(! $labelContent) {
                $layout = $layout . '<div class="fullWidth">';
            }
            if( $lopd !== "false" &&  $lopd !== false) {
                $layout = $layout . '<input type="checkbox" id="acceptLOPD"><span><a href="' . $lopdLink . '">' . $lopdText . '</a></span>';
            }
            $layout = $layout . '<div class="toastForm"></div>';
            if( $captcha) {
                $layout = $layout . '<div class="bbvaComments-div-captcha">';
                //            $layout = $layout . '<img class="bbvaComments-image-captcha" src="data:image/jpeg;charset=utf-8;base64,'+ data.data.captcha +'"/>';
                //            $layout = $layout . '<img class="bbvaComments-new-captcha" src="'+$this.libs+'assets/img/icon-refresh.png"/>';
                //            $layout = $layout . '<input class="bbvaComments-captcha" type="text">';
                $layout = $layout . '</div>';
            }

            $layout = $layout . '<div class="sendWrapper"><input type="button" id="sendComment" class="commentSendButton" value="' . $send . '"></div>';
            $layout = $layout . '</form>';
        }

        return $layout;
    }

    public function updateTheme($transient)
    {
        if (isset($transient->checked[static::THEME_NAME])) {
            $response = wp_remote_get(static::URL_UPDATE);

            if (200 === $response['response']['code']) {
                $json = json_decode($response['body'], true);

                if (version_compare($transient->checked[static::THEME_NAME], $json['new_version'], '<')) {
                    $transient->response[static::THEME_NAME] = $json;
                }
            }
        }

        return $transient;
    }
}
