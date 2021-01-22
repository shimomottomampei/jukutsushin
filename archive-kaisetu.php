<?php get_header(); ?>

<div class="posts posts--box archive-kaisetu"> <!-- posts -->

<h1 class="posts__titles">解説音声・動画<!-- <?php the_archive_title(); ?>の解説音声・動画一覧 --></h1>
<div class="posts__posts"><!-- posts__posts -->

<?php
// var_dump(get_terms('kyoka', 'parent=0'));
if ( have_posts() ) :
while ( have_posts() ) : the_post();
$cat_list = wp_get_post_terms($post->ID, 'kyoka', array( 'parent' => 0));
foreach($cat_list as $val) {
  $cat_name = $val->name;
  $cat_slug = $val->slug;
}

$act_list = wp_get_post_terms($post->ID, 'actor');
foreach($act_list as $val) {
  $act_name = $val->name;
  $act_slug = $val->slug;
}
?>
<div class="posts__content"><!-- posts__content -->

  <!-- <a href="<?php the_permalink(); ?>" class="posts__thumb-link">
    <?php if (has_post_thumbnail()): ?>
    <?php
    $image_id = get_post_thumbnail_id();
    $image_url = wp_get_attachment_image_src($image_id, true);
    ?>
    <img src="<?php echo $image_url[0]; ?>);">
    <?php else: ?>
    <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/default-thumb.jpg">

    <?php endif; ?>
  </a> -->

  <div class="posts__right">
    <div class="posts__title"><!-- posts__title -->
      <h3 class="posts__entry-title"><a href="<?php the_permalink(); ?>"><?php echo $cat_name; ?>：<?php the_title(); ?></a></h3>
    </div><!-- / posts__title -->
    <div>
      <?php echo get_the_term_list( $post->ID, 'kyoka', '<span class="cat '. $cat_slug. '">','</span><span class="cat '. $cat_slug. '">', '</span>' ); ?><?php echo get_the_term_list( $post->ID, 'when', '<span class="cat '. $cat_slug. '">','</span><span class="cat '. $cat_slug. '">', '</span>'); ?><?php echo get_the_term_list( $post->ID, 'actor', '<span class="cat '. $cat_slug. '">','</span><span class="cat '. $cat_slug. '">', '</span>' ); ?>     
    </div>
  </div><!-- / posts__right -->

</div><!-- / posts__content -->

<?php endwhile;
else: ?>
<p>関連記事は見つかりませんでした</p>
<?php endif; ?>

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
<!-- <p style="text-align: center;"> -->
<!-- <a href="https://mrstepup-radio.com/archives/recommend/"><img loading="lazy" src="https://mrstepup-radio.com/wp-content/uploads/2020/11/recom.png" alt="" width="900" height="141" class="alignnone size-full wp-image-396"></a></p> -->
<!-- <a href="https://mrstepup-radio.com/recommend/"><img loading="lazy" src="<?php echo wp_upload_dir()['baseurl']; ?>/2020/11/recom.png" alt="" width="900" height="141" class="alignnone size-full wp-image-396" style="max-width:100%; height:auto;"></a></p> -->
</div>
 <!-- posts -->

<?php get_footer(); ?>
