<div class="posts posts--box">
<?php
if ( have_posts() ) : while ( have_posts() ) : the_post();
?>
<div class="posts__content">
  <div class="posts__thumb">
  <?php if (has_post_thumbnail()): ?>
  <?php
  $image_id = get_post_thumbnail_id();
  $image_url = wp_get_attachment_image_src($image_id, true);
  ?>
    <a href="<?php the_permalink(); ?>" class="posts__thumb-link" style="background-image:url(<?php echo $image_url[0]; ?>);"></a>
  <?php else: ?>
    <?php
    $keta = 1;
    $test = get_the_ID();
    $result = $test % pow(10, $keta);
    $result = sprintf("%02s", substr($test, -$keta)); ?>
    <a href="<?php the_permalink(); ?>" class="posts__thumb-link" style="background-image:url(<?php echo get_stylesheet_directory_uri(); ?>/img/noimg/noimg<?php echo $result; ?>.jpg);"></a>
  <?php endif; ?>
  </div>
  <div class="posts__title">
    <p class="posts__date"><?php the_time('Y.m.d'); ?></p>
    <h3 class="posts__entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
    <p class="posts__cat"><?php echo the_category( $separator = ' ', $parents = '', $post_id = false ) ?></p>
  </div>
</div>
<?php
endwhile;
endif; ?>
</div><!-- / .posts -->

<?php if ( $wp_query->max_num_pages > 1 ) : ?>
<div class="pagenation">
  <div class="tx-c"><?php next_posts_link("&nbsp;"); ?></div>
</div>
<?php endif; ?>

