<?php get_header(); ?>

<div class="posts posts--box archive-news"> <!-- posts -->

<h1 class="posts__titles">お知らせ一覧<!-- <?php the_archive_title(); ?>の解説音声・動画一覧 --></h1>
<div class="posts__posts"><!-- posts__posts -->

<?php
// var_dump(get_terms('kyoka', 'parent=0'));
if ( have_posts() ) :
while ( have_posts() ) : the_post();
?>
<div class="posts__content"><!-- posts__content -->


  <div class="posts__right">
    <div class="posts__title"><!-- posts__title -->
      <h3 class="posts__entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
    </div><!-- / posts__title -->
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
