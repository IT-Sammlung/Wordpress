<?php get_header(); ?>


  <div class="container">
  <div class="row">
    <div class="col-sm-8">

      <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>


      <div style="margin-bottom: 15px;">
        <div class="articleheader" style="background-image: url(' <?php echo wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) ); ?> '); background-repeat: no-repeat; background-size: cover; background-position: center;">
          <div class="articleheaderdate">
            <h5 style="border-radius: 10px; padding-left:8px; padding-right:8px;background-Color: black; display: inline-block; float: right; color: white; margin-top: 15px; margin-right: 15px;"> <?php echo get_the_date( 'd.m.Y' ); ?> </h5>
          </div>
          <div class="clearfix"></div>
          <div class="articleheadertitel">
            <h4 style="margin-bottom: 0px; padding-left: 5px; padding-top: 5px; padding-bottom: 5px;margin-top: 30px; background-color: rgba(0, 0, 0, 0.5); color: white;"> <a href="<?php the_permalink() ?>" rel="bookmark" style="text-decoration: none; color: white;"><?php the_title(); ?></a> </h4>
          </div>
        </div>
        <div class="articlecontent bg-light" style="padding-left: 10px; padding-right: 10px;">
          <div class="articleshorttext">
            <?php the_excerpt(); ?>
          </div>
            <div class="row">
              <div class="col-4">
                <div class="weiterlesen">
                  <a href="<?php the_permalink() ?>" rel="bookmark" style="">Weiterlesen..</a>
                </div>
              </div>
              <div class="col-4" style="text-align: center;">
                <?php comments_popup_link(__('Kommentare (0)'), __('Kommentar (1)'), __('Kommentare (%)')); ?>
              </div>
              <div class="col-4" style="text-align: right;">
                <?php the_category(',') ?>
              </div>
            </div>
        </div>
      </div>
      <?php endwhile; else : ?>
      	<p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
      <?php endif; ?>

      </div>
      <div class="col-sm-4">
      <?php get_sidebar(); ?>
      </div>
      </div>
      <?php get_footer(); ?>
