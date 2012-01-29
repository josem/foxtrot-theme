<?php get_header(); ?>
	<div id="content">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<?php $post_type = get_post_type( $post->ID ); ?>
		
			<?php if ($post_type == 'cita'): ?>
				<div class="single-post quote">
					<div class="marks"> 
						<img src="<?php echo  get_stylesheet_directory_uri() . '/images/icon-quote.gif'; ?>" alt="" />
					</div> 

					<?php the_content(__( '[Read more &rarr;]', 'wpml_theme')); ?>
				</div>
		<?php else: ?>
		
			<div class="single-post">
				<h1>
					<a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" rel="bookmark">
						<?php the_title(); ?>
					</a>
				</h1>
				<div class="post-content">
					<p class="date">
						Written on <?php the_time('F j, Y'); ?> by <?php the_author() ?>. <?php the_category(', ') ?>.
					</p>
					<?php the_content(__('<p class="read_more_wrapper">Read more →</p>'));?>
				</div>
				<div class="post-meta">
				</div><!--.postMeta-->
			</div><!--.single-post-->
		<?php endif; ?>
		<?php endwhile; else: ?>
			
			<div class="no-results">
				<p><strong>There has been an error.</strong></p>
				<p>We apologize for any inconvenience, please <a href="<?php bloginfo('url'); ?>/" title="<?php bloginfo('description'); ?>">return to the home page</a> or use the search form below.</p>
				<?php get_search_form(); /* outputs the default Wordpress search form */ ?>
			</div><!--noResults-->
		<?php endif; ?>
			
		<nav class="oldernewer">
			<div class="older">
				<p>
					<?php next_posts_link('&laquo; next') ?>
				</p>
			</div><!--.older-->
			<div class="newer">
				<p>
					<?php previous_posts_link('previous &raquo;') ?>
				</p>
			</div><!--.older-->
		</nav><!--.oldernewer-->

	</div><!--#content-->
<?php get_sidebar(); ?>
<?php get_footer(); ?>
