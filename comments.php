<!-- comments start -->
<div class="com com--box">
   <?php if (have_comments()) :?>
   <p class="com__title"><?php echo get_comments_number().' 件のコメント'; ?></p>
   <!-- comments-list start -->
   <div class="com__list">
     <?php wp_list_comments(array(
      'callback' => 'custom_format_comment_listing',
       'avatar_size'=>0,
       'style'=>'div',
       'type'=>'comment',
       'per_page' => 5
      )); ?>
   </div>
   <?php if (get_comment_pages_count() > 1) : ?>
   <div class="com__nav">
     <?php previous_comments_link('＜ 前のコメント'); ?>
     <?php next_comments_link('次のコメント ＞'); ?>
   </div>
   <?php endif; ?>
  <?php endif; ?>
  <!-- comments-list end -->
  <!-- comments-form start -->
  <?php
     $comments_args = array(
       'fields' => array(
       'author' => '<p class="comments-form-author">' . '<label for="author">' . __( 'Name' ) . ( $req ? ' <span class="comments-required">*</span>' : '' ) . '</label><br>' .'<input id="author" name="author" class="form-control" placeholder="名前" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '"></p>',
       'email' => '<p class="comments-form-email"><label for="email">' . __( 'Email' ) . ( $req ? ' <span class="comments-required">*</span>' : '' ) . '</label><br> ' .'<input id="email" name="email" class="form-control" placeholder="sample@sample.com" type="email"' . ' value="' . esc_attr( $commenter['comment_author_email'] ) . '"></p>'
     ),
     'title_reply' => '',
//     'comment_notes_before' => '<p class="comments-notes">メールアドレスは公開されませんのでご安心ください。また、<span class="comments-required">*</span> が付いている欄は必須項目となります。</p>',
//     'comment_notes_after' => '<p class="comments-form-allowed-tags">内容に問題なければ、下記の「コメントを送信する」ボタンを押してください。</p>',
     'comment_field' => '<p class="comment-form-comment"><label for="comment">' . _x( 'Comment', 'noun' ) . '</label><br><textarea id="comment" name="comment" class="form-control com__area" placeholder="コメントを入力…" rows="8" required="required"></textarea></p>',
     'label_submit' => 'コメント',
     'class_submit' => 'submit com__btn',
    //  'submit_button' => '<a id="%2$s" class="%3$s">%4$s</a>',
     'submit_button' => '<input type="submit">',
  );
   comment_form($comments_args);
  ?>
  <!-- comments-form end -->
</div>
<!-- comments end -->
