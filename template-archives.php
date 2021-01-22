<?php get_header(); ?>
<?php
/**
 * Template Name: 記事一覧用テンプレート */
?>
<div class="posts posts--box">
<?php
$paged = (int) get_query_var('paged');
$args = array(
 'posts_per_page' => 9,
 'paged' => $paged,
 'orderby' => 'post_date',
 'order' => 'DESC',
 'post_type' => 'post',
 'post_status' => 'publish'
);
$the_query = new WP_Query($args);
if ( $the_query->have_posts() ) :
 while ( $the_query->have_posts() ) : $the_query->the_post();
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
<?php endwhile; endif; ?>

<div class="pagenation">
<?php
if ($the_query->max_num_pages > 1) {
  echo paginate_links(array(
  'base' => get_pagenum_link(1) . '%_%',
  'format' => '/page/%#%/',
  'current' => max(1, $paged),
  'total' => $the_query->max_num_pages,
  'prev_text' => '<',
  'next_text' => '>'
  ));
}
?>
</div>

<?php wp_reset_postdata(); ?>
</div>
<?php get_footer(); ?>
