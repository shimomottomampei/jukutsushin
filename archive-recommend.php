<?php get_header(); ?>

<div class="posts posts--box archive-recommend"> <!-- posts -->

<h1 class="posts__titles">推奨教材<!-- <?php the_archive_title(); ?>の推奨教材一覧 --></h1>
<div class="posts__posts"><!-- posts__posts -->

<?php if ( have_posts() ) : ?>

	<div class="posts__content posts__content__header"><!-- posts__content -->
		<div class="posts__thumb-link"><!-- posts__title -->
			<p></p>
		</div><!-- / posts__title -->

		<div class="col posts__title pconly"><!-- posts__title -->
			<p>タイトル</p>
		</div><!-- / posts__title -->

		<div class="col posts__author pconly"><!-- posts__author -->
			<p>著者</p>
		</div><!-- / posts__author -->

		<div class="col posts__publisher pconly"><!-- posts__publisher -->
			<p>出版社</p>
		</div><!-- / posts__publisher -->
	</div><!-- / posts__content -->

	<?php 

		$catargs = array('taxonomy' => 'kyoka', 'hide_empty' => '0', 'parent' => '0');
		$catlists = get_categories( $catargs );

		// var_dump($catlists);
		foreach($catlists as $category) :

			$whenargs = array('taxonomy' => 'when',
				'hide_empty' => '0',
				'orderby' => 'slug'
			);
			$whenlist = get_categories( $whenargs );
			foreach($whenlist as $when) :
				$args = array(
					'post_type' => 'recommend',
					'kyoka' => $category->slug,
					'when' => $when->slug,
				);
				$posts = get_posts($args);
				// var_dump($posts);

				if($posts == true):
			?>

					<div class="posts__terms <?php echo $category->slug ?>"><span class="posts__terms__kyoka"><?php echo $category->cat_name ?></span><span class="posts__terms__stage"><?php echo $when->cat_name ?></span></div>

			<?php 
				endif;
				foreach ($posts as $post) :

			?>

				<div class="posts__content"><!-- posts__content -->

					<a href="<?php echo get_post_meta($post->ID, 'link', true); ?>" class="posts__thumb-link">
						<?php
							if (has_post_thumbnail()):
							$image_id = get_post_thumbnail_id();
							$image_url = wp_get_attachment_image_src($image_id, true);
						?>
							<img src="<?php echo $image_url[0]; ?>);">
						<?php else: ?>
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/default-thumb.jpg">
						<?php endif; ?>
					</a>

					<div class="col posts__title pconly"><!-- posts__title -->
						<!-- <p><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p> -->
						<p><a href="<?php echo get_post_meta($post->ID, 'link', true); ?>" target="_blank"><?php the_title(); ?></a></p>
					</div><!-- / posts__title -->

					<div class="col posts__author pconly"><!-- posts__author -->
						<!-- <p><a href="<?php the_permalink(); ?>"><?php echo get_post_meta($post->ID, 'author', true); ?></a></p> -->
						<!-- <p><a href="<?php echo get_post_meta($post->ID, 'link', true); ?>" target="_blank"><?php echo get_post_meta($post->ID, 'author', true); ?></a></p> -->
						<p><?php echo get_post_meta($post->ID, 'author', true); ?></p>
						</div><!-- / posts__author -->

					<div class="col posts__publisher pconly"><!-- posts__publisher -->
						<!-- <p><a href="<?php the_permalink(); ?>"><?php echo get_post_meta($post->ID, 'publisher', true); ?></a></p> -->
						<!-- <p><a href="<?php echo get_post_meta($post->ID, 'link', true); ?>" target="_blank"><?php echo get_post_meta($post->ID, 'publisher', true); ?></a></p> -->
						<p><?php echo get_post_meta($post->ID, 'publisher', true); ?></p>
					</div><!-- / posts__publisher -->


					<a class="postscontent-right tbonly" href="<?php echo get_post_meta($post->ID, 'link', true); ?>" target="_blank">
						<div class="col posts__title"><!-- posts__title -->
							<!-- <p><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p> -->
							<!-- <p><a href="<?php echo get_post_meta($post->ID, 'link', true); ?>" target="_blank"><?php the_title(); ?></a></p> -->
							<p><?php the_title(); ?></p>
						</div><!-- / posts__title -->

						<div class="col posts__author"><!-- posts__author -->
							<!-- <p><a href="<?php the_permalink(); ?>"><?php echo get_post_meta($post->ID, 'author', true); ?></a></p> -->
							<!-- <p><a href="<?php echo get_post_meta($post->ID, 'link', true); ?>" target="_blank"><?php echo get_post_meta($post->ID, 'author', true); ?></a></p> -->
							<p><?php echo get_post_meta($post->ID, 'author', true); ?></p>
							</div><!-- / posts__author -->

						<div class="col posts__publisher"><!-- posts__publisher -->
							<!-- <p><a href="<?php the_permalink(); ?>"><?php echo get_post_meta($post->ID, 'publisher', true); ?></a></p> -->
							<!-- <p><a href="<?php echo get_post_meta($post->ID, 'link', true); ?>" target="_blank"><?php echo get_post_meta($post->ID, 'publisher', true); ?></a></p> -->
							<p><?php echo get_post_meta($post->ID, 'publisher', true); ?></p>
						</div><!-- / posts__publisher -->
					</a>

				</div><!-- / posts__content -->
					<?php 
						endforeach;
						endforeach;
						endforeach;
						else: 
					?>
					<p>関連記事は見つかりませんでした</p>
					<?php endif; ?>
				</div><!-- / posts__posts -->
				<div class="pagenation">

				<?php
					global $wp_query;
					$big = 999999999; // need an unlikely integer
					echo paginate_links( array(
						'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
						'format' => '?paged=%#%',
						'current' => max( 1, get_query_var('paged') ),
						'total' => $wp_query->max_num_pages
					) );
				?>
				</div>

				<?php wp_reset_postdata(); ?>

			</div> <!-- posts -->

			<?php get_footer(); ?>
