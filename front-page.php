<?php get_header(); ?>

<div class="container">

<div class="news">

<h2>お知らせ</h2>

<ul>
  <?php
  $paged = (int) get_query_var('paged');
  $args = array(
  'posts_per_page' => 5,
  'paged' => $paged,
  'orderby' => 'date',
  'post_type' => 'news',
  'post_status' => 'publish',
  );
  $the_query = new WP_Query($args);
  if ( $the_query->have_posts() ) :
  while ( $the_query->have_posts() ) : $the_query->the_post();
  ?>

  <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>

  <?php endwhile;?>

  <?php wp_reset_postdata(); ?>

</ul>

<?php if($wp_query->found_posts > 5) : ?>
<a href="<?php echo site_url(); ?>/single/" class="btn">お知らせをもっと見る▼</a>

<?php endif; endif; ?>

</div>

<a href="<?php echo site_url(); ?>/flow/"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/top-flow.jpg" alt=""></a>


<div class="radio">

<h2>STEPUPラジオ</h2>

<div class="posts posts--box archive-radio"> <!-- posts -->

<div class="posts__posts"><!-- posts__posts -->

<?php
$paged = (int) get_query_var('paged');
$args = array(
'posts_per_page' => 5,
'paged' => $paged,
'orderby' => 'date',
'post_type' => 'radio',
'post_status' => 'publish',
);
$the_query = new WP_Query($args);
if ( $the_query->have_posts() ) :
while ( $the_query->have_posts() ) : $the_query->the_post();

/*if ( have_posts() ) :
while ( have_posts() ) : the_post();*/

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
//global $wp_query;
if (isset($wp_query->post->ID)) {
	$postID = $wp_query->post->ID;
}
if (get_post_meta(get_the_ID(), 'morning', true) === '朝ラジ') {
  echo '<p><span class="posts__date -morning">'.get_the_date('Y.m.d').'：朝ラジ</span></p>';
}
elseif (get_post_meta(get_the_ID(), 'morning', true) === '夜ラジ') {
  echo '<p><span class="posts__date -evening">'.get_the_date('Y.m.d').'：夜ラジ</span></p>';
}
else {
  echo '<p><span class="posts__date">'.get_the_date('Y.m.d').'</span></p>';
}
//wp_reset_query();
?>
</p>

<div class="posts__title"><!-- posts__title -->
<h3 class="posts__entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

<p class="post__actor">
<?php
//if (get_post_meta(get_the_ID(), 'actor', true)) {
//  echo get_the_term_list( $postID, 'actor', '<span class="tag"># ','</span><span class="tag"># ', '</span>' );
  //echo get_the_term_list( get_the_ID(), 'actor', '','、', '' );
//}
$args = array('orderby' => 'term_id', 'order' => 'ASC');
foreach(wp_get_post_terms( get_the_ID(), 'actor', $args) as $key => $actor) {
  if($key <> 0) {
    echo '、'. $actor->name;
  }else {
    echo $actor->name;
  }
}

?>
</p>


<?php
if (get_post_meta(get_the_ID(), 'audio1', true)) {
if (isset($wp_query->post->ID)) {
	$postID = $wp_query->post->ID;
}
  echo '<audio class="audio__data" src="' . get_post_meta(get_the_ID(), 'audio1', true) . '" preload="auto" controls="controls">オーディオファイルを読み込めません</audio>';
}

?>


</div><!-- / posts__title -->
</div><!-- / posts__right -->

</div><!-- / posts__content -->
<?php endwhile; endif; ?>

</div><!-- / posts__posts -->


<?php wp_reset_postdata(); ?>
</div> <!-- / posts -->

<a href="<?php echo site_url(); ?>/radio/" class="btn">ステップアップラジオをもっと聴く▼</a>

</div> <!-- / radio -->

<div class="kyoka"> <!-- kyoka -->
<h2>教科別コンテンツ</h2>

<div class="kyoka__content">

<a href="<?php echo site_url(); ?>/kaisetu/kyoka/mind/"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/kyoka-mind.jpg" alt=""><br>心構え</a>
<a href="<?php echo site_url(); ?>/kaisetu/kyoka/english/"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/kyoka-english.jpg" alt=""><br>英語</a>
<a href="<?php echo site_url(); ?>/kaisetu/kyoka/math/"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/kyoka-math.jpg" alt=""><br>数学</a>
<a href="<?php echo site_url(); ?>/kaisetu/kyoka/japanese/"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/kyoka-japanese.jpg" alt=""><br>国語</a>
<a href="<?php echo site_url(); ?>/kaisetu/kyoka/social/"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/kyoka-social.jpg" alt=""><br>社会</a>
<a href="<?php echo site_url(); ?>/kaisetu/kyoka/science/"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/kyoka-science.jpg" alt=""><br>理科</a>
<a href="<?php echo site_url(); ?>/kaisetu/kyoka/habit/"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/kyoka-shukan.jpg" alt=""><br>習慣</a>

</div>
</div> <!-- / kyoka -->

<br>
<div class="kyoka"> <!-- kyoka -->
<h2>親御様向けコンテンツ</h2>

<div class="parent__content">

<a href="https://mrstepup-radio.com/parent-support/">受験生の親御さんのサポートについて</a>
</div>
</div> <!-- / kyoka -->

</div> <!-- / container -->
<?php get_footer(); ?>