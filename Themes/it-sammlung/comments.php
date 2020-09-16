<?php
if (post_password_required()) {
  return;
}
?>

<div class="container bg-light" style="padding: 5px 10px 5px 10px; margin-bottom: 15px;">
  <div id="comments">
    <?php
      //Declare Vars
      $comment_send = 'Absenden';
      $comment_reply = 'Kommentar verfassen';
      $comment_reply_to = 'Reply';

      $comment_author = 'Name';
      $comment_email = 'E-Mail';
      $comment_body = 'Kommentar';
      $comment_url = 'Website';
      $comment_cookies_1 = ' Meine Daten speichern (siehe';
      $comment_cookies_2 = ' Datenschutz)';

      $comment_before = ' ';

      $comment_cancel = 'Cancel Reply';

      //Array
      $comments_args = array(
          //Define Fields
          'fields' => array(
              //Author field
              'author' => '<p style="display: inline;" class="comment-form-author"><input style="width: 40%; max-width: 150px;" id="author" name="author" aria-required="true" placeholder="' . $comment_author .'"></input></p>',
              //Email Field
              'email' => '<p style="display: inline;" class="comment-form-email"><input style="width: 40%; max-width: 200px;" id="email" name="email" placeholder="' . $comment_email .'"></input></p>',
              //Cookies
              'cookies' => '<input type="checkbox">' . $comment_cookies_1 . '<a href="' . get_privacy_policy_url() . '">' . $comment_cookies_2 . '</a>',
          ),
          // Change the title of send button
          'label_submit' => __( $comment_send ),
          // Change the title of the reply section
          'title_reply' => __( $comment_reply ),
          // Change the title of the reply section
          'title_reply_to' => __( $comment_reply_to ),
          //Cancel Reply Text
          'cancel_reply_link' => __( $comment_cancel ),
          // Redefine your own textarea (the comment body).
          'comment_field' => '<p class="comment-form-comment"><br /><textarea style="width: 100%;" id="comment" name="comment" aria-required="true" placeholder="' . $comment_body .'"></textarea></p>',
          //Message Before Comment
          'comment_notes_before' => __( $comment_before),
          // Remove "Text or HTML to be displayed after the set of comment fields".
          'comment_notes_after' => '',
          //Submit Button ID
          'id_submit' => __( 'comment-submit' ),
      );
      comment_form( $comments_args );
     ?>
  </div>
</div>



<div class="container kommentar" style="">
    <?php
    // Arguments for wp_list_comments()
    $args = [
        'style'       => 'ul',
        'format'      => 'html5',
        'short_ping'  => true,
    ];

    // Use our custom callback if it's available
    if( function_exists( 'wpse_comment_callback' ) )
    {
        $args['format'] = 'wpse';
        $args['callback'] = 'wpse_comment_callback';
    }

    wp_list_comments( $args );
    ?>
</div>
