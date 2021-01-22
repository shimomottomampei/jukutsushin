<?php
/*Template Name: 学習の流れ*/
?>

<?php get_header(); ?>
<div class="article article--box"> <!-- article -->

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<article class="article__content"> <!-- article__content -->

<h1><?php the_title(); ?></h1>

<div class="article__thumb"><?php the_post_thumbnail(); ?></div>


<!-- コンテンツ -->
<h2>STEP1 オンライン生限定LINE＠に登録する</h2>
<div class="flex step1">
  <img
    class="alignnone size-full wp-image-391 pconly"
    src="https://mrstepup-radio.com/dl/2020/11/line.jpg"
    alt=""
    width="600"
    height="549"
  /><img
    class="alignnone size-full wp-image-392 pconly"
    src="https://mrstepup-radio.com/dl/2020/11/lineqr.jpg"
    alt=""
    width="600"
    height="600"
  />
  <p class="tbonly">画像をタップして登録</p>
  <a class="tbonly" href="https://line.me/R/ti/p/%40622ywhwd"
    ><img
      class="alignnone size-full wp-image-391"
      src="https://mrstepup-radio.com/dl/2020/11/line.jpg"
      alt=""
      width="600"
      height="549"
  /></a>
</div>
<h2>STEP2　３つのバイブルを、最初に必ず読もう！</h2>
<div class="flex step2">
  <div class="video">
    <iframe
      src="https://player.vimeo.com/video/398553218"
      width="640"
      height="360"
      frameborder="0"
      allowfullscreen="allowfullscreen"
    ></iframe>
  </div>
  <div class="">
    <h4>この動画で解説している教材</h4>
    <div class="flex">
      <div class="flex-part">
        <img
          class="alignnone size-full wp-image-393"
          src="https://mrstepup-radio.com/dl/2020/11/限界突破.jpg"
          alt=""
          width="600"
          height="799"
        />
        <div>必読</div>
      </div>
      <div class="flex-part">
        <img
          class="alignnone size-full wp-image-394"
          src="https://mrstepup-radio.com/dl/2020/11/習慣本.jpg"
          alt=""
          width="600"
          height="712"
        />
        <div>
          難関を目指したい<br />
          自分の限界を超えたい
        </div>
      </div>
      <div class="flex-part">
        <img
          class="alignnone size-full wp-image-395"
          src="https://mrstepup-radio.com/dl/2020/11/大逆転.jpg"
          alt=""
          width="600"
          height="789"
        />
        <div>読めるときに読む</div>
      </div>
    </div>
  </div>
</div>
<h2>STEP3 勉強計画を立てよう！</h2>
<div class="flex step3">
  <div class="video">
    <iframe
      src="https://player.vimeo.com/video/409623248"
      width="640"
      height="360"
      frameborder="0"
      allowfullscreen="allowfullscreen"
    ></iframe>
  </div>
  <div class="right">
    <h4>この動画で解説している教材</h4>
    <div class="right-part">
      <img
        class="alignnone size-full wp-image-393"
        src="https://mrstepup-radio.com/dl/2020/11/限界突破.jpg"
        alt=""
        width="600"
        height="799"
      />
      <div>必読</div>
    </div>
  </div>
</div>
<!-- <h2>STEP4 推奨教材を購入しよう</h2> -->
<!-- <p style="text-align: center">
  <a href="https://mrstepup-radio.com/recommend/"
    ><img
      class="alignnone size-full wp-image-396"
      src="https://mrstepup-radio.com/dl/2020/11/recom.png"
      alt=""
      width="900"
      height="141"
  /></a>
</p> -->
<!-- <h2>STEP5 さっそく勉強をはじめよう！</h2> -->
<h2>STEP4 さっそく勉強をはじめよう！</h2>
<div class="flex step5">
  <div>
    <p class="orange">合格手帳</p>
    <img
      class="alignnone size-full wp-image-400"
      src="https://mrstepup-radio.com/dl/2020/11/techo.png"
      alt=""
    />
    <p>
      合格に向かって、<br />
      確実に勉強を進められる
    </p>
  </div>
  <div>
    <p class="orange">Mr.STEPUPラジオ</p>
    <img
      class="alignnone size-full wp-image-401"
      src="https://mrstepup-radio.com/dl/2020/11/head.png"
      alt=""
    />
    <p>
      毎日配信されるラジオで<br />
      モチベーションUP
    </p>
    <div><a href="https://mrstepup-radio.com/radio/">ラジオ一覧を見る</a></div>
  </div>
  <div>
    <p class="orange">教科別コンテンツ</p>
    <img
      class="alignnone size-full wp-image-399"
      src="https://mrstepup-radio.com/dl/2020/11/kaisetu.png"
      alt=""
    />
    <p>
      推奨教材の使い方や、<br />
      勉強法の解説をチェック
    </p>
    <div>
      <a href="https://mrstepup-radio.com/kaisetu/">コンテンツ一覧を見る</a>
    </div>
  </div>
</div>
<!-- コンテンツ -->

<?php
endwhile;
endif;
?>


</article><!-- article__content -->

</div> <!-- article -->
<?php get_footer(); ?>