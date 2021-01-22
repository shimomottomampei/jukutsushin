<?php
/*Template Name: お気に入り一覧*/
?>


<?php get_header(); ?>
<div class="article article--box"> <!-- article -->

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<article class="article__content"> <!-- article__content -->

<h1><?php the_title(); ?></h1>

<div class="article__thumb"><?php the_post_thumbnail(); ?></div>

<?php 
$favorites = get_user_favorites();
    if (isset($favorites) && !empty($favorites)) :
      foreach ($favorites as $favorite) :
?>
        <?php echo get_post_type_object(get_post_type($favorite))->label; ?>
        <div>
          <a href="<?php echo get_permalink($favorite); ?>"><?php echo get_the_title($favorite); ?></a>
          <?php echo get_favorites_button($favorite); ?>
        </div>

<?php 
      endforeach;
    else :
?>
      <p class="text-center">お気に入りがありません。</p>
<?php 
    endif;
?>

</article><!-- article__content -->

<?php 
endwhile;
endif;
?>
</div> <!-- article -->
<?php get_footer(); ?>
