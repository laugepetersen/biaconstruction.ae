<?php

/**
 * Remove unnecessary items from the admin panel.
 */
function millingmade_remove_menus()
{
  // Remove 'Comments' from admin panel
  remove_menu_page('edit-comments.php');
}
add_action('admin_menu', 'millingmade_remove_menus');