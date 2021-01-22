<?php get_header(); ?>

<div class="article article--box single-radio"> <!-- article -->

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<article class="article__content"> <!-- article__content -->

<h1><?php the_title(); ?></h1>

<div class="article__thumb"><?php the_post_thumbnail(); ?></div>


<?php
//URL
$field = get_field('audio_link');
if($field) :
?>

<div class="bCtn_detail content">
<div class="audio"> <!-- audio -->
<audio id="audio1" class="audio__data" src="<?php echo $field; ?>" preload="auto" controls="controls" >オーディオファイルを読み込めません</audio>
<div class="audio-options" data-id="1" data-rate="1">
<div class="playing-rate">倍速再生 x1</div>
<a class="audio__btn" href="<?php echo $field; ?>" download="<?php the_title(); ?>.mp3"><i class="fas fa-cloud-download-alt"></i> 音声をダウンロード</a>
</div>
</div> <!-- /audio -->
</div>

<?php endif; ?>

<?php
$field = get_field('audio2');
if($field) :
?>

<div class="bCtn_detail content">
<div class="audio"> <!-- audio -->
<audio id="audio2" class="audio__data" src="<?php echo $field; ?>" preload="auto" controls="controls">オーディオファイルを読み込めません</audio>
<div class="audio-options" data-id="2" data-rate="1">
<div class="playing-rate">倍速再生 x1</div>
<a class="audio__btn" href="<?php echo $field; ?>" download="<?php the_title(); ?>2.mp3"><i class="fas fa-cloud-download-alt"></i> 音声をダウンロード</a>
</div>
</div> <!-- /audio -->
</div>

<?php endif; ?>


<?php
$field = get_field('audio3');
if($field) :
?>

<div class="bCtn_detail content">
<div class="audio"> <!-- audio -->
<audio id="audio3" class="audio__data" src="<?php echo $field; ?>" preload="auto" controls="controls">オーディオファイルを読み込めません</audio>
<div class="audio-options" data-id="3" data-rate="1">
<div class="playing-rate">倍速再生 x1</div>
<a class="audio__btn" href="<?php echo $field; ?>" download="<?php the_title(); ?>3.mp3"><i class="fas fa-cloud-download-alt"></i> 音声をダウンロード</a>
</div>
</div> <!-- /audio -->
</div>

<?php endif; ?>


<?php
$field = get_field('movie_link');
if($field) :
?>

<div class="video">
<?php echo $field; ?>
</div>

<?php endif; ?>


<div class="article__bunsho">
<?php the_content(); ?>
<?php //$text = $post->post_content; ?>
<?php //echo $text; ?>
</div>


<div class="article__actor">
<p><?php echo get_the_term_list( $post->ID, 'actor', '<span class="tag"># ','</span><span class="tag"># ', '</span>' ); ?><?php echo get_the_term_list( $post->ID, 'kyoka',  '<span class="tag"># ','</span><span class="tag"># ', '</span>'); ?></p>
</div>


</article><!-- article__content -->


<?php 
endwhile;
endif;
?>


</div> <!-- article -->


<?php comments_template(); ?>



<?php get_footer(); ?>
