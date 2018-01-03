<?php

namespace OpenWeb\Admin;

use OpenWeb\Admin;

/**
 * Class Author
 * @package OpenWeb\Admin
 * @todo add post_status only publish
 *
 */
class Author extends Admin
{
    protected function init()
    {
        add_filter('user_contactmethods', [$this, 'addTwitter']);
        add_action('show_user_profile', [$this, 'showExtraFields']);
        add_action('edit_user_profile', [$this, 'showExtraFields']);
        add_action('personal_options_update', [$this, 'saveExtraFields']);
        add_action('edit_user_profile_update', [$this, 'saveExtraFields']);

        wp_enqueue_style('thickbox');
        wp_enqueue_script('thickbox');
        wp_enqueue_script('media-upload');
        wp_enqueue_script('openweb-related', get_template_directory_uri().'/src/Admin/js/author.js', 'media-upload');
    }

    public function showExtraFields($user)
    {
        echo $this->getTPL('authorExtra', ['user' => $user]);
    }

    public function addTwitter($userContact)
    {
        $userContact['twitter'] = __('Twitter', 'openweb');

        return $userContact;
    }

    public function saveExtraFields($user)
    {
        if (!current_user_can('edit_user', $user)) {
            return false;
        }

        update_user_meta($user, 'image-page-author', $_POST['image-page-author']);
        update_user_meta($user, 'quote-page-author', $_POST['quote-page-author']);
    }
}
