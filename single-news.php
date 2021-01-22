<?php get_header(); ?>

<div class="article article--box single-news"> <!-- article -->

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<article class="article__content"> <!-- article__content -->

<h1><?php the_title(); ?></h1>



<div class="article__bunsho">
<?php the_content(); ?>
</div>


</article><!-- article__content -->


<?php 
endwhile;
endif;
?>


</div> <!-- article -->


<?php comments_template(); ?>



<?php get_footer(); ?>
