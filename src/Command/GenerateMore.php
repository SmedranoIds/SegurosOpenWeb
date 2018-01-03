#!/usr/bin/php
<?php
namespace OpenWeb\Command;

require_once __DIR__.'/../../../../../wp-blog-header.php';
require_once __DIR__.'/../../vendor/autoload.php';

use OpenWeb\Admin\Post;

class GenerateMore
{
    public function execute()
    {
        Post::createHomeJson();

        $vars = [
            'post_type' => ['post'],
            'post_status' => 'publish',
            'posts_per_page' => -1
        ];

        $query = new \WP_Query($vars);
        foreach ($query->get_posts() as $post) {
            $json = Post::generatePostJson($post);
            Post::saveJson('post_'.$post->ID.'.json', Post::PATH_LAZY_LOAD_JSON.DIRECTORY_SEPARATOR.Post::PATH_POST, $json);
            Post::createCategoriesJson($post->ID);
            Post::createTagsJson($post->ID);
            Post::createAuthorJson($post->post_author);
        }
    }
}

$command = new GenerateMore();
$command->execute();