<form role="search" method="get" id="searcch" action="<?php echo esc_url(home_url('/')); ?>" class="search" ><!-- search -->

<input type="text" value="<?php echo get_search_query() ?>" name="s" id="s" placeholder="キーワード検索" />
<input type="image" src="<?php bloginfo('template_directory'); ?>/img/search.png" alt="検索" id="searchsubmit"  value="<?php _e('Search', 'kubrick'); ?>" />

</form><!-- search -->

