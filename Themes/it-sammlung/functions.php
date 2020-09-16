<?php
// Link CSS File
    function link_css_stylesheet() {
        wp_enqueue_style('style', get_stylesheet_uri());
    }
    add_action('wp_enqueue_scripts', 'link_css_stylesheet');

      /**
       * Register Custom Navigation Walker
       */
      function register_navwalker(){
      	require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';
      }
      add_action( 'after_setup_theme', 'register_navwalker' );


      register_nav_menus( array(
        'primary' => __( 'Primary Menu', 'THEMENAME' ),
      ) );


      //Aktiviere Beitragsbild
    add_theme_support( 'post-thumbnails' );





    // Changing excerpt length
    function new_excerpt_length($length) {
    return 25;
    }
    add_filter('excerpt_length', 'new_excerpt_length');

    // Changing excerpt more
    function new_excerpt_more($more) {
    return '...';
    }
    add_filter('excerpt_more', 'new_excerpt_more');



    //Comment Field Order
    add_filter( 'comment_form_fields', 'mo_comment_fields_custom_order' );
    function mo_comment_fields_custom_order( $fields ) {
        $comment_field = $fields['comment'];
        $author_field = $fields['author'];
        $email_field = $fields['email'];
        $url_field = $fields['url'];
        $cookies_field = $fields['cookies'];
        unset( $fields['comment'] );
        unset( $fields['author'] );
        unset( $fields['email'] );
        unset( $fields['url'] );
        unset( $fields['cookies'] );
        // the order of fields is the order below, change it as needed:
        $fields['author'] = $author_field;
        $fields['email'] = $email_field;
        $fields['url'] = $url_field;
        $fields['comment'] = $comment_field;
        $fields['cookies'] = $cookies_field;
        // done ordering, now return the fields:
        return $fields;
    }












    /**
     * Custom comment callback
     */
    function wpse_comment_callback( $comment, $depth, $args )
    {
        // Modify the Walker_Comment::html5_comment() method to our needs
        // and place it here
        echo '<li class="bg-light" style="list-style-type: none; margin-bottom: 10px; border: 1px solid darkgray; border-radius: 5px; padding-left: 10px; padding-right: 10px;">';
        echo '<p>' . get_comment_author() . ' @ ' . get_comment_date() . ' - (' . get_comment_time() . ')</p>';
        echo '<p>' . get_comment_text() . '</p>';
        echo '</li>';
    }









?>
