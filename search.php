<?php get_header(); ?>

<div class="posts posts--box"> <!-- posts -->

<h1 class="posts__titles">"<?php the_search_query(); ?>" の検索結果</h1>

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



<!-- <p class="posts__cat"><?php echo the_category( $separator = ' ', $parents = '', $post_id = false ) ?></p> -->
<div><a href="<?php echo home_url( get_post_type_object(get_post_type())->name ) ?>" class="customtype <?php echo esc_html(get_post_type_object(get_post_type())->name); ?>"><?php echo esc_html(get_post_type_object(get_post_type())->label); ?></a></div>

    <div class="posts__title"><!-- posts__title -->
      <h3 class="posts__entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
    </div><!-- / posts__title -->
    <!-- <div>
      <?php echo get_the_term_list( $post->ID, 'kyoka', '<span class="cat '. $cat_slug. '">','</span><span class="cat '. $cat_slug. '">', '</span>' ); ?><?php echo get_the_term_list( $post->ID, 'when', '<span class="cat '. $cat_slug. '">','</span><span class="cat '. $cat_slug. '">', '</span>'); ?><?php echo get_the_term_list( $post->ID, 'actor', '<span class="cat '. $cat_slug. '">','</span><span class="cat '. $cat_slug. '">', '</span>' ); ?>     
    </div> -->
  <!-- </div> -->

</div><!-- posts__content -->
<?php endwhile; endif; ?>

</div><!-- posts__posts -->

<div class="pagenation">
<?php



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
