<?php
add_theme_support('post-thumbnails');
add_theme_support('menus');
add_theme_support('automatic-feed-links');
register_nav_menu('header-nav','ヘッダー用');
register_nav_menu('footer-nav','フッター用');

//menu li 整理用
add_filter('nav_menu_item_id', 'my_css_attributes_filter', 100, 1);
add_filter('page_css_class', 'my_css_attributes_filter', 100, 1);
function my_css_attributes_filter($var) {
return is_array($var) ? array_intersect($var, array('current-menu-item')) : '';
}

// pタグ brタグ 自動削除しないようにする
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'rsd_link');

//form
/*function my_comment_form_fields( $fields){
    unset( $fields['email']);   // 「メールアドレス」を非表示にする場合
    unset( $fields['url']);     // 「ウェブサイト」を非表示にする場合
    return $fields;
}
add_filter( 'comment_form_default_fields', 'my_comment_form_fields');
add_filter( "comment_form_defaults", "my_comment_form_defaults");
function my_comment_form_defaults($comment){
   $comment['comment_field'] = '<p class="comment-form-comment"><textarea id="comment" name="comment" rows="8" aria-required="true" placeholder="' . _x( 'Comment', 'noun' ) . '"></textarea></p>';
    return $comment;
}*/

add_filter( 'post_thumbnail_html', 'custom_attribute' );
function custom_attribute( $html ){
    // width height を削除する
    $html = preg_replace('/(width|height)="\d*"\s/', '', $html);
    return $html;
}
add_filter( 'wp_calculate_image_srcset_meta', '__return_null' );


/* the_archive_title 余計な文字を削除 */
add_filter( 'get_the_archive_title', function ($title) {
    if (is_category()) {
        $title = single_cat_title('',false);
    } elseif (is_tag()) {
        $title = single_tag_title('',false);
	} elseif (is_tax()) {
	    $title = single_term_title('',false);
	} elseif (is_post_type_archive() ){
		$title = post_type_archive_title('',false);
	} elseif (is_date()) {
	    $title = get_the_time('Y年n月');
	} elseif (is_search()) {
	    $title = '検索結果：'.esc_html( get_search_query(false) );
	} elseif (is_404()) {
	    $title = '「404」ページが見つかりません';
	} else {

	}
    return $title;
});


/* Simple Membership で会員以外は自動的にログインページを開く */
function swpm_auto_redirect_non_members() {
	if (is_admin()){
		//管理者の場合は何もしない
		return;
  }
  //来訪者がサイトに訪れたら指定のURLにリダイレクト（強制転送）する
  if( !SwpmMemberUtils::is_member_logged_in() && !is_page(array(24, 26, 23, 413)) ) {
    // wp_redirect( 'https://mrstepup-radio.com/?page_id=24' );
    wp_redirect( home_url( '/', 'https' ). '?page_id=24' );
    exit;
  } else if(SwpmMemberUtils::get_logged_in_members_level() == 3 && ( is_home() || is_front_page() ) ) {
    wp_redirect( home_url( '/', 'https' ). '?page_id=34' );
    exit;
  } else if(SwpmMemberUtils::get_logged_in_members_level() == 2 ) {
      if( is_page(array(26, 23, 34)) ) {
        wp_redirect( home_url( '/', 'https' ) );
        exit;    
      }
      return;
  }
}


// コメントの日付削除

function custom_format_comment_listing($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment; ?>
   <div <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
     <div id="comment-<?php comment_ID(); ?>">
          <div class="comment-author">
            <?php printf(__('<div class="fn">%s</div>'), get_comment_author() . '') ?>
          </div>
          <p class="time"><?php $ctime = human_time_diff( get_comment_time('U'), current_time( 'timestamp' ) ); echo $ctime . '前'; ?><?php edit_comment_link(__('(Edit)'),'  ','') ?></p>
          <div class="comment-moderation">
              <?php if ($comment->comment_approved == '0') : ?>
                 <p><?php _e('Your comment is awaiting moderation.') ?></p>
              <?php endif; ?>
          </div>
          <div class="com__meta commentmetadata">
            <p></p>
          </div>
          <div class="user-comment">
            <?php comment_text() ?>
          </div>
          <div class="reply">
             <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
          </div>
     </div>
   </div>
<?php }

//パスワード変更時にワードプレスからのメール送信をSTOP
add_filter( 'send_password_change_email', '__return_false' );


function logout_redirect(){
	wp_safe_redirect(home_url( '/', 'https' ));
	exit();
}
add_action('wp_logout','logout_redirect');


//検索結果で表示する投稿タイプを指定
function SearchFilter($query) {
  if ($query->is_search) {
    $query->set('post_type', array('radio','kaisetu'));
  }
return $query;
}
add_filter('pre_get_posts','SearchFilter');