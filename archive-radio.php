<?php get_header(); ?>

<div class="posts posts--box archive-radio"> <!-- posts -->

<h1 class="posts__titles">Mr. STEPUP ラジオ<!-- <?php the_archive_title(); ?>のラジオ一覧 --></h1>
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
/*
$keta = 1;
$test = get_the_ID();
$result = $test % pow(10, $keta);
$result = sprintf("%02s", substr($test, -$keta)); */?>
<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/default-thumb.jpg">

<?php endif; ?>
</a>

<div class="posts__right">

<?php
global $wp_query;
//朝なら
if (get_post_meta(get_the_ID(), 'morning', true) === '朝ラジ') {
  $postID = $wp_query->post->ID;
  echo '<p><span class="posts__date -morning">'.get_the_date('Y.m.d').'：朝ラジ</span></p>';
}
elseif (get_post_meta(get_the_ID(), 'morning', true) === '夜ラジ') {
  $postID = $wp_query->post->ID;
  echo '<p><span class="posts__date -evening">'.get_the_date('Y.m.d').'：夜ラジ</span></p>';
}
else {
  $postID = $wp_query->post->ID;
  echo '<p><span class="posts__date">'.get_the_date('Y.m.d').'</span></p>';
}
wp_reset_query();
?>
</p>

<div class="posts__title"><!-- posts__title -->
<h3 class="posts__entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

<p class="post__actor">
<?php
global $wp_query;
$postID = $wp_query->post->ID;
//if (get_post_meta(get_the_ID(), 'actor', true)) {
//  echo get_the_term_list( $postID, 'actor', '<span class="tag"># ','</span><span class="tag"># ', '</span>' );
  //echo get_the_term_list( $postID, 'actor', '','、', '' );
//}
$args = array('orderby' => 'term_id', 'order' => 'ASC');
foreach(wp_get_post_terms( $postID, 'actor', $args) as $key => $actor) {
  if($key <> 0) {
    echo '、'. $actor->name;
  }else {
    echo $actor->name;
  }
}

wp_reset_query();
?>
</p>


<?php
global $wp_query;
if (get_post_meta(get_the_ID(), 'audio1', true)) {
  $postID = $wp_query->post->ID;
  echo '<audio class="audio__data" src="' . get_post_meta($postID, 'audio1', true) . '" preload="auto" controls="controls">オーディオファイルを読み込めません</audio>';
}
wp_reset_query();
?>


</div><!-- / posts__title -->
</div><!-- / posts__right -->

</div><!-- / posts__content -->
<?php endwhile; endif; ?>

</div><!-- / posts__posts -->





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

?>
</div>

<?php wp_reset_postdata(); ?>

</div> <!-- posts -->


<?php get_footer(); ?>
