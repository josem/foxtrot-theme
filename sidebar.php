<?php $args = array(
    'numberposts' => 5,
    'orderby' => 'post_date',
    'order' => 'DESC',
    'post_type' => 'post',
    'post_status' => 'publish'); ?>

<?php $recent_posts = wp_get_recent_posts( $args ); ?>

<div id="sidebar">
	
	<?php if ( ! dynamic_sidebar( 'Sidebar' )) : ?>
		
			<li class="widget">
				<h3>Categories</h3>
				<?php wp_list_categories('title_li=&show_count=1'); ?>
			</li>
			
			<li id="recent" class="widget">
				<h3>Recent articles</h3>
				<ul>
				<? foreach( $recent_posts as $post ){
							echo '<li><a href="' . get_permalink($post["ID"]) . '" title="'.$post["post_title"].'" >' .   $post["post_title"].'</a> </li> ';
						} ?>
				</ul>
			</li>
			

	<?php endif; ?>
</div><!--sidebar-->