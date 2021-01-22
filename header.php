<?php
swpm_auto_redirect_non_members()
?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<?php if(is_front_page()): ?>
<title><?php bloginfo('name');?> * <?php bloginfo('description'); ?></title>
<?php else: ?>
<title><?php wp_title(' | ', true, 'right'); ?><?php bloginfo('name'); ?></title>
<?php endif; ?>
<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
<!--[if lt IE 9]>
<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js" type="text/javascript"></script>
<![endif]-->

<script src="https://kit.fontawesome.com/4891951560.js" crossorigin="anonymous"></script>


<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/style.css?v=4">
<?php if(is_front_page()) { ?>
<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/page/top/style.css?v=1">

<?php } elseif (is_page()) { ?>
<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/page/single/style.css">
<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/page/<?php echo get_page_uri(); ?>/style.css?v=4">

<?php } elseif (is_archive() and get_post_type() === 'kaisetu') { ?>
<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/page/archive-kaisetu/style.css">

<?php } elseif (is_archive() and get_post_type() === 'recommend') { ?>
<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/page/archive-recommend/style.css">

<?php } elseif (is_archive() and get_post_type() === 'news') { ?>
<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/page/archive-news/style.css">

<?php } elseif (is_archive()) { ?>
<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/page/archive/style.css">

<?php } elseif (is_search()) { ?>
<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/page/search/style.css">

<?php  } elseif(is_single()) { ?>
<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/page/single/style.css">

<? }

if ( get_post_type() === 'radio' ) { ?>
<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/page/single-radio/style.css">
<?php wp_enqueue_script("comment-reply"); ?>

<? } elseif ( get_post_type() === 'kaisetu') {?>
<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/page/single-kaisetu/style.css">

<? } elseif ( get_post_type() === 'news') {?>
<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/page/single-news/style.css">
<? } ?>

<?php if(is_page('826')) { ?>
<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/page/single/style.css">
<? } ?>

<!-- <meta name="viewport" content="width=480"> -->
<meta name="viewport" content="width=device-width,initial-scale=1">

<meta property="og:type" content="blog">
<?php
if (is_single()){//単一記事ページの場合
if(have_posts()): while(have_posts()): the_post();
/*echo '<meta property="og:description" content="'.get_post_meta($post->ID, _aioseop_description, true).'">';echo "\n";//抜粋を表示*/
endwhile; endif;
echo '<meta property="og:title" content="'; the_title(); echo '">';echo "\n";//単一記事タイトルを表示
echo '<meta property="og:url" content="'; the_permalink(); echo '">';echo "\n";//単一記事URLを表示
} else {//単一記事ページページ以外の場合（アーカイブページやホームなど）
echo '<meta property="og:description" content="'; bloginfo('description'); echo '">';echo "\n";//「一般設定」管理画面で指定したブログの説明文を表示
echo '<meta property="og:title" content="'; bloginfo('name'); echo '">';echo "\n";//「一般設定」管理画面で指定したブログのタイトルを表示
echo '<meta property="og:url" content="'; bloginfo('url'); echo '">';echo "\n";//「一般設定」管理画面で指定したブログのURLを表示
}
if (isset($post->post_content) ) {
$str = $post->post_content;
}
$searchPattern = '/<img.*?src=(["\'])(.+?)\1.*?>/i';//投稿にイメージがあるか調べる
if (is_single()){//単一記事ページの場合
if (has_post_thumbnail()){//投稿にサムネイルがある場合の処理
$image_id = get_post_thumbnail_id();
$image = wp_get_attachment_image_src( $image_id, 'full');
echo '<meta property="og:image" content="'.$image[0].'">';echo "\n";
} else if ( preg_match( $searchPattern, $str, $imgurl ) && !is_archive()) {//投稿にサムネイルは無いが画像がある場合の処理
echo '<meta property="og:image" content="'.$imgurl[2].'">';echo "\n";
} else {//投稿にサムネイルも画像も無い場合の処理
echo '<meta property="og:image" content="'; echo get_stylesheet_directory_uri(); echo '/img/ogimage.png'; echo'">';echo "\n";
}
} else {//単一記事ページページ以外の場合（アーカイブページやホームなど）
echo '<meta property="og:image" content="'; echo get_stylesheet_directory_uri(); echo '/img/ogimage.png'; echo'">';echo "\n";
}
?>
<meta property="og:site_name" content="<?php bloginfo('name'); ?>">



<?php if ( is_single()): ?>
<?php if ($post->post_excerpt){ ?>
<meta name="description" content="<? echo $post->post_excerpt; ?>" />
<?php } else {
        $summary = strip_tags($post->post_content);
        $summary = str_replace("\n", "", $summary);
        $summary = mb_substr($summary, 0, 120). "…"; ?>
<meta name="description" content="<?php echo $summary; ?>" />
<?php } ?>
<?php elseif ( is_home() || is_front_page() ): ?>
<meta name="description" content="<?php bloginfo('description'); ?>" />
<?php elseif ( is_category() ): ?>
<meta name="description" content="<?php echo category_description(); ?>" />
<?php elseif ( is_tag() ): ?>
<meta name="description" content="<?php echo tag_description(); ?>" />
<?php else: ?>
<meta name="description" content="<?php the_excerpt();?>" />
<?php endif; ?>

<?php wp_head(); ?>

<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/function.js" charset="utf-8"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/audio.js" charset="utf-8"></script>

</head>


<body id="<?php if(is_single()){echo 's'; echo the_id();}elseif(is_page()){echo 'p'; echo the_id();}else{echo '';} ?>">

<header class="header header--box"> <!-- header -->

<div class="header__flex"> <!-- header__flex -->

<p class="header__logo"><span>オンラインコース</span><a href="<?php echo home_url(); ?>">Mr. STEPUP</a></p>


<?php if( !is_page(array(24, 26, 23, 413)) ) { ?>

<div class="header__submenu"> <!-- __submenu -->

<?php get_search_form(); ?>

<div class="header__icon _fav">
<a href="<?php echo home_url(); ?>/favorite/" class="img"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/fav.png" alt=""></a>
<a href="<?php echo home_url(); ?>/favorite/" class="str">お気に入り</a>
</div>

<div class="header__icon _mypage">
<a href="<?php echo home_url(); ?>/membership-profile/" class="img"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/mypage.png" alt=""></a>
<a href="<?php echo home_url(); ?>/membership-profile" class="str">マイページ</a>

<div class="header__menulist">
<div class="header__close"><i class="fas fa-times"></i></div>
<ul>
<?php wp_nav_menu ( array('menu'=>'header-navi', 'container'=>false, 'items_wrap'=>'%3$s', 'fallback_cb'=>'') );?>
</ul>	
</div>
</div>

<div class="header__icon _menu">
<a href="#" class="img"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/menu.png" alt=""></a>
<a href="#" class="str">メニュー</a>
</div>

</div> <!-- / __submenu -->

<?php  } ?>

</div> <!-- / header__flex -->

</header> <!-- / header-box-->