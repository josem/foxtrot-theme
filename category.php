<?php get_header(); ?>

<div id="content">
	<h1 class="category-header"><?php printf( __( '%s' ), '<span>' . single_cat_title( '', false ) . '</span>' ); ?></h1>
	<?php echo category_description(); /* displays the category's description from the Wordpress admin */ ?>
	
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		
			<div class="single-post">
				<h1>
					<a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" rel="bookmark">
						<?php the_title(); ?>
					</a>
				</h1>
				<div class="post-content">
					<p class="date">
						Written on <?php the_time('F j, Y'); ?> by <?php the_author() ?>.
					</p>
								<?php the_excerpt('Read more →'); /* the excerpt is loaded to help avoid duplicate content issues */ ?>
				</div>
				<div class="post-meta">
				</div><!--.postMeta-->
			</div><!--.single-post-->
			
			
			
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
				<?php next_posts_link('&laquo; Older Entries') ?>
			</p>
		</div><!--.older-->
		<div class="newer">
			<p>
				<?php previous_posts_link('Newer Entries &raquo;') ?>
			</p>
		</div><!--.older-->
	</nav><!--.oldernewer-->
	
</div><!--#content-->
<?php get_sidebar(); ?>
<?php get_footer(); ?>