<?php get_header(); ?>

<div class="article article--box single-radio"> <!-- article -->

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<article class="article__content"> <!-- article__content -->

<h1><?php the_title(); ?></h1>

<div class="article__date"><!-- date -->

<?php if (get_field('morning') == '朝ラジ' ): ?>
<span class="morning"><?php the_date('Y.m.d'); ?>：朝ラジ</span>
<?php elseif (get_field('morning') == '夜ラジ' ): ?>
<span class="evening"><?php the_date('Y.m.d'); ?>：夜ラジ</span>
<?php else: ?>
<?php endif; ?>
</div>



<div class="article__thumb"><?php the_post_thumbnail(); ?></div>

<div class="favorite">
<?php
  echo do_shortcode('[favorite_button post_id="" site_id=""]');
?>
</div>


<?php
//URL
$field = get_field('audio1');
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

<?php the_content(); ?>


<div class="article__actor">
<p><?php echo get_the_term_list( $post->ID, 'actor', '<span class="tag"># ','</span><span class="tag"># ', '</span>' ); ?><?php echo get_the_term_list( $post->ID, 'kyoka',  '<span class="tag"># ','</span><span class="tag"># ', '</span>'); ?></p>
</div>


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


<?php comments_template(); ?>



<?php get_footer(); ?>
