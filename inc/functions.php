<?php
// Custom Functions ........



add_shortcode('current_user', function(){
    global $current_user;
    $CurrentUser = wp_get_current_user();
    return $CurrentUser->user_login;
});













