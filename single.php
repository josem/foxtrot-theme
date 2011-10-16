<?php get_header(); ?>
<div id="content">
	<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
		<div id="post-<?php the_ID(); ?>" <?php post_class('post'); ?>>

			<article>
				<h1>
					<a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" rel="bookmark">
						<?php the_title(); ?>
					</a>
				</h1>

				<div class="post-content">
					<p class="date">
						Written on <?php the_time('F j, Y'); ?> by <?php the_author() ?>. <?php the_category(', ') ?>.
					</p>
					<?php the_content(); ?>
					<?php wp_link_pages('before=<div class="pagination">&after=</div>'); ?>
				</div><!--.post-content-->
			<article>

		</div><!-- #post-## -->

		<div id="post-meta">
			<p>
				<?php comments_popup_link('', '1 comment', '% comments', 'comments-link', 'Comments are closed'); ?> 
			</p>

		</div><!--#post-meta-->

		<!-- <div class="newer-older">
			<div class="older">
				<p>
					<?php previous_post_link('%link', '&laquo; Previous post') ?>
				</p>
			</div>
			<div class="newer">
				<p>
					<?php next_post_link('%link', 'Next Post &raquo;') ?>
				</p>
			</div>
		</div> -->

		<?php comments_template( '', true ); ?>

	<?php endwhile; /* end loop */ ?>
</div><!--#content-->
<?php get_sidebar(); ?>
<?php get_footer(); ?>