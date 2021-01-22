<?php get_header(); ?>

<div class="article article--box"> <!-- article -->

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<article class="article__content"> <!-- article__content -->

<h1><?php the_title(); ?></h1>

<!-- <div class="article__date">
<time class="article__pubdate entry-time" itemprop="datePublished" datetime="<?php echo get_the_date(); ?>"><?php the_date(); ?></time>
</div> -->

<!-- <div class="favorite">
<?php
  echo do_shortcode('[favorite_button post_id="" site_id=""]');
?>
</div> -->


<div class="article__thumb"><?php the_post_thumbnail(); ?></div>


<?php the_content(); ?>

<!-- <div class="article__actor">
<p><?php echo get_the_term_list( $post->ID, 'kyoka',  '<span class="tag"># ','</span><span class="tag"># ', '</span>'); ?><?php echo get_the_term_list( $post->ID, 'when',  '<span class="tag"># ','</span><span class="tag"># ', '</span>'); ?></p>
</div> -->



</article><!-- article__content -->

<?php /*
$categories = get_the_category($post->ID);
$category_ID=array();
foreach($categories as $category):array_push($category_ID, $category-> cat_ID);
endforeach;
$args=array(
  'post__not_in'=>array($post->ID),
  'category__in'=>$category_ID,
  'posts_per_page'=>5,
  'orderby'=>'rand'
  );
$my_query = new WP_Query($args); ?>


<section class="related"> <!-- related -->

<p>関連記事</p>

<?php if ($my_query->have_posts()): ?>
<ul>
<?php while($my_query->have_posts()):$my_query->the_post(); ?>
<li>
<a href="<?php the_permalink() ?>" class="r-title"><?php echo mb_substr($post->post_title, 0, 20); ?></a>
</li>
<?php endwhile; ?>
</ul>

<?php else: ?>
<p>関連記事は見つかりませんでした</p>
<?php endif;
wp_reset_postdata(); ?>

</section> <!-- related -->

<?php */
endwhile;
endif;
?>
</div> <!-- article -->
<?php get_footer(); ?>
