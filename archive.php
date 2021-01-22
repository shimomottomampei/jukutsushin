<?php get_header(); ?>

<div class="posts posts--box"> <!-- posts -->

<h1 class="posts__titles"><?php the_archive_title(); ?>の記事一覧</h1>

<div class="posts__posts"><!-- posts__posts -->

<?php
/*$paged = (int) get_query_var('paged');
$args = array(
'posts_per_page' => 15,
'paged' => $paged,
'orderby' => 'rand',
'post_type' => 'post',
'post_status' => 'publish',
);
$the_query = new WP_Query($args);
if ( $the_query->have_posts() ) :
while ( $the_query->have_posts() ) : $the_query->the_post();*/

if ( have_posts() ) :
while ( have_posts() ) : the_post();

?>
<div class="posts__content"><!-- posts__content -->

<a href="<?php the_permalink(); ?>" class="posts__thumb-link">
<?php if (has_post_thumbnail()): ?>
<?php
$image_id = get_post_thumbnail_id();
$image_url = wp_get_attachment_image_src($image_id, true);
?>
<img src="<?php echo $image_url[0]; ?>);">
<?php else: ?>
<?php
/*$keta = 1;
$test = get_the_ID();
$result = $test % pow(10, $keta);
$result = sprintf("%02s", substr($test, -$keta));*/ ?>
<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/default-thumb.jpg">
<?php endif; ?>
</a>

<p class="posts__cat"><?php echo the_category( $separator = ' ', $parents = '', $post_id = false ) ?></p>

<div class="posts__title"><!-- posts__title -->
<h3 class="posts__entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
</div><!-- posts__title -->

</div><!-- posts__content -->
<?php endwhile; endif; ?>

</div><!-- posts__posts -->





<div class="pagenation">
<?php

global $wp_query;

$big = 999999999; // need an unlikely integer

echo paginate_links( array(
	'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
	'format' => '?paged=%#%',
	'current' => max( 1, get_query_var('paged') ),
	'total' => $wp_query->max_num_pages
) );

/*if ( max_num_pages > 1) {
  echo paginate_links(array(
  'base' => get_pagenum_link(1) . '%_%',
  'format' => '/page/%#%/',
  'current' => max(1, $paged),
  'total' => $the_query->max_num_pages,
  'prev_text' => '<',
  'next_text' => '>'
  ));
}*/
?>
</div>

<?php wp_reset_postdata(); ?>

</div> <!-- posts -->

<?php get_footer(); ?>
