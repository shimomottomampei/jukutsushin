<?php
  $url_encode=urlencode(get_permalink());
  $title_encode=urlencode(get_the_title());
?>

<div class="share">
<h4>ご購読ありがとうございます</h4>


<?php if(is_mobile()) {  //以下スマホの場合 ?>
<div class="sns">
<ul class="clearfix">
<!--ツイートボタン-->
<li class="twitter">
<a href="http://twitter.com/share?text=<?php echo $title_encode ?>&url=<?php echo $url_encode ?>&via=ttkk5296&tw_p=tweetbutton&related="ttkk5296"><i class="fa fa-twitter"></i>Twitter&nbsp;<?php if(function_exists('scc_get_share_twitter')) echo (scc_get_share_twitter()==0)?'':scc_get_share_twitter(); ?></a>
</li>

<!--Facebookボタン-->
<li class="facebook">
<a href="http://www.facebook.com/sharer.php?src=bm&u=<?php echo $url_encode;?>&t=<?php echo $title_encode;?>"><i class="fa fa-facebook"></i>
Facebook&nbsp;<?php if(function_exists('scc_get_share_facebook')) echo (scc_get_share_facebook()==0)?'':scc_get_share_facebook(); ?></a>
</li>

<!--Google+1ボタン-->
<li class="googleplus">
<a href="https://plus.google.com/share?url=<?php echo $url_encode;?>" ><i class="fa fa-google-plus"></i>Google+&nbsp;<?php if(function_exists('scc_get_share_gplus')) echo (scc_get_share_gplus()==0)?'':scc_get_share_gplus(); ?></a>
</li>

<!--はてブボタン-->
<li class="hatebu">
<a href="http://b.hatena.ne.jp/add?mode=confirm&url=<?php echo $url_encode ?>"><i class="fa fa-hatena"></i>はてブ&nbsp; <?php if(function_exists('scc_get_share_hatebu')) echo (scc_get_share_hatebu()==0)?'':scc_get_share_hatebu(); ?></a>
</li>

<!--LINEボタン-->
<li class="line">
<a href="http://line.me/R/msg/text/?<?php echo $title_encode . '%0A' . $url_encode;?>">LINE</a>
</li>

<!--ポケットボタン-->
<li class="pocket">
<a href="http://getpocket.com/edit?url=<?php echo $url_encode;?>&title=<?php echo $title_encode;?>"><i class="fa fa-get-pocket"></i>Pocket&nbsp; <?php if(function_exists('scc_get_share_pocket')) echo (scc_get_share_pocket()==0)?'':scc_get_share_pocket(); ?></a></li>

<!--RSSボタン-->
<li class="rss">
<a href="<?php echo home_url(); ?>/?feed=rss2"><i class="fa fa-rss"></i>RSS</a></li>

<!--feedlyボタン-->
<li class="feedly">
<a href="http://feedly.com/index.html#subscription%2Ffeed%2Fhttp%3A%2F%2Fttkk.hitamuki.info%2Ffeed%2F"  target="blank"><i class="fa fa-rss"></i>feedly&nbsp; <?php if(function_exists('scc_get_follow_feedly')) echo (scc_get_follow_feedly()==0)?'':scc_get_follow_feedly(); ?></a></li>
</ul>
</div>

<?php } else { //以下PCの場合?>

<div class="sns">
<ul class="clearfix">
<!--ツイートボタン-->
<li class="twitter">
<a href="http://twitter.com/share?text=<?php echo $title_encode ?>&url=<?php echo $url_encode ?>&via=ttkk5296&tw_p=tweetbutton&related="ttkk5296" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=400,width=600');return false;"><i class="fa fa-twitter"></i>Twitter&nbsp;<?php if(function_exists('scc_get_share_twitter')) echo (scc_get_share_twitter()==0)?'':scc_get_share_twitter(); ?></a>
</li>

<!--Facebookボタン-->
<li class="facebook">
<a href="http://www.facebook.com/sharer.php?src=bm&u=<?php echo $url_encode;?>&t=<?php echo $title_encode;?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=800,width=1000');return false;"><i class="fa fa-facebook"></i>Facebook&nbsp; <?php if(function_exists('scc_get_share_facebook')) echo (scc_get_share_facebook()==0)?'':scc_get_share_facebook(); ?></a>
</li>

<!--Google+1ボタン-->
<li class="googleplus">
<a href="https://plus.google.com/share?url=<?php echo $url_encode;?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=500');return false;"><i class="fa fa-google-plus"></i>Google+&nbsp;<?php if(function_exists('scc_get_share_gplus')) echo (scc_get_share_gplus()==0)?'':scc_get_share_gplus(); ?></a>
</li>

<!--はてブボタン-->
<li class="hatebu">
<a href="http://b.hatena.ne.jp/add?mode=confirm&url=<?php echo $url_encode ?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=400,width=510');return false;" ><i class="fa fa-hatena"></i>はてブ&nbsp; <?php if(function_exists('scc_get_share_hatebu')) echo (scc_get_share_hatebu()==0)?'':scc_get_share_hatebu(); ?></a>
</li>

 <!--LINEボタン-->
<li class="line">
<a href="http://line.me/R/msg/text/?<?php echo $title_encode . '%0A' . $url_encode;?>" target="blank">LINE</a>
</li>

<!--ポケットボタン-->
<li class="pocket">
<a href="http://getpocket.com/edit?url=<?php echo $url_encode;?>&title=<?php echo $title_encode;?>" target="blank"><i class="fa fa-get-pocket"></i>Pocket&nbsp; <?php if(function_exists('scc_get_share_pocket')) echo (scc_get_share_pocket()==0)?'':scc_get_share_pocket(); ?></a></li>

<!--RSSボタン-->
<li class="rss">
<a href="<?php echo home_url(); ?>/?feed=rss2" target="blank"><i class="fa fa-rss"></i>RSS</a></li>

<!--feedlyボタン-->
<li class="feedly">
<a href="http://feedly.com/index.html#subscription%2Ffeed%2Fhttp%3A%2F%2Fttkk.hitamuki.info%2Ffeed%2F"  target="blank"><i class="fa fa-rss"></i>feedly&nbsp; <?php if(function_exists('scc_get_follow_feedly')) echo (scc_get_follow_feedly()==0)?'':scc_get_follow_feedly(); ?></a></li>
</ul>
</div>
<?php } ?>
</div>