<?php
/*
Template Name: Archives
*/
get_header(); ?>

<div id="container">
	<div id="content" role="main">

		<?php the_post(); ?>
		
		<ul>
			<?php smart_archives(3);  ?>
		</ul>


	</div><!-- #content -->
</div><!-- #container -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
