<?php
/**
 *
 * BoldR Pro WordPress Theme by Iceable Themes | http://www.iceablethemes.com
 *
 * Copyright 2013 Mathieu Sarrasin - Iceable Media
 *
 * Single Portfolio Template
 *
 */
?>
<?php get_header();

	?><div class="container" id="main-content">
    <!--
    <div style="float:right;">
    <?php
		if (has_post_thumbnail()):
			?><div class="portfolio-thumbnail"><a rel="prettyPhoto[gal]" href="<?php $image_id = get_post_thumbnail_id();
													$image_url = wp_get_attachment_image_src($image_id,'large', true);
													echo $image_url[0]; ?>"><?php
			the_post_thumbnail('thumbnail', array('class' => 'scale-with-grid'));
			?></a></div><?php
		endif;?>
     </div>
     -->
     
  
     
    <h1 class="entry-title"><?php the_title(); ?></h1>
    
	<?php

		global $icefit_options;
		
		// Process sidebar setting
		$sidebar_side = $icefit_options['single_portfolio_sidebar_side'];
		$page_container_class = "single-portfolio";
		if ($sidebar_side == 'left' || $sidebar_side == 'right'):
			$content_side = ($sidebar_side == 'left') ? "right" : "left";
			$page_container_class .= " " . $content_side . " with-sidebar";
		endif;

		?><div id="page-container" class="<?php echo $page_container_class; ?>"><?php

		if(have_posts()):
		while(have_posts()) : the_post();

		?><div id="post-<?php the_ID(); ?>" <?php post_class("single-post"); ?>><div class="post-content"><?php 

		if (has_post_thumbnail()):
			?><div class="portfolio-thumbnail"><a rel="prettyPhoto[gal]" href="<?php $image_id = get_post_thumbnail_id();
													$image_url = wp_get_attachment_image_src($image_id,'large', true);
													echo $image_url[0]; ?>"><?php
			the_post_thumbnail('full', array('class' => 'scale-with-grid'));
			?></a></div><?php
		endif;
		
		?><br class="clear" /><?php

		$the_id = get_the_id();

		if ( 'off' != $icefit_options['single_portfolio_meta_date_display']
			|| 'off' != $icefit_options['single_portfolio_meta_category_display']
			|| 'off' != $icefit_options['single_portfolio_meta_client_display']
			|| current_user_can( 'edit_post', get_the_id() ) ):

			?><div class="postmetadata"><?php
				if ( 'off' != $icefit_options['single_portfolio_meta_date_display'] ):
					?><span class="meta-date"><?php echo get_post_meta($the_id, 'icf_portfolio_date', true); ?></span><?php
				endif;
				if ( 'off' != $icefit_options['single_portfolio_meta_category_display'] ):
					?><span class="meta-category"><span class="meta-label"><?php _e('Kategori:', 'icefit'); ?></span><?php
					echo implode(', ', wp_get_post_terms( $the_id, 'icf-portfolio-category', array("fields" => "names") )); ?></span><?php
				endif;
				
				   
	if ( 'off' != $icefit_options['single_portfolio_meta_client_display'] ):
					?><span class="meta-client"><span class="meta-label"><?php _e('Kund:', 'icefit'); ?></span><?php
					echo get_post_meta($the_id, 'icf_portfolio_client', true); ?></span><?php
				endif;
				
				
				edit_post_link(__('Edit', 'icefit'), '<span class="editlink">', '</span>');
				?></div><?php

		endif;

		the_content();

		?></div><div class="clear"></div></div><?php

		if ( "off" != $icefit_options['single_portfolio_related_projects'] ):
			$related_title = $icefit_options['single_portfolio_related_projects_title'];
			$related_cat = implode(', ', wp_get_post_terms( $the_id, 'icf-portfolio-category', array("fields" => "slugs") ) );
			
			if ( isset( $icefit_options['single_portfolio_related_projects_mode'] ) )
				$related_mode = $icefit_options['single_portfolio_related_projects_mode'];
			else $related_mode = 'carousel';
			
			if ( $related_mode == 'carousel' ):
				$related_shortcode = '[portfolio title="'.$related_title.'" col="full-width" cat="'.$related_cat.'"]';
			elseif ( $related_mode == 'carousel_auto' ):
				$related_shortcode = '[portfolio title="'.$related_title.'" col="full-width" cat="'.$related_cat.'" auto="true"]';
			elseif ( $related_mode == 'grid' ):
				$related_shortcode = '[portfolio title="'.$related_title.'" col="full-width" cat="'.$related_cat.'" mode="grid" maxitems="8"]';
			endif;
			
			echo "<hr />" , do_shortcode( $related_shortcode );
		endif;

		// Display comments section only if comments are open or if there are comments already.
		if ( comments_open() || get_comments_number()!=0 ):
			?><hr /><div class="comments"><?php 
			comments_template( '', true );
			next_comments_link(); previous_comments_link();
			?></div><?php
		endif;

		endwhile;
		
	else: // Empty loop (this should never happen!)

		?><h2><?php _e('Not Found', 'icefit'); ?></h2>
		<p><?php _e('What you are looking for isn\'t here...', 'icefit'); ?></p><?php

	endif;

	?></div><?php // End page container

	if ($sidebar_side == 'left' || $sidebar_side == 'right'):
		?><div id="sidebar-container" class="<?php echo $sidebar_side; ?>"><ul id="sidebar"><?php
			dynamic_sidebar( $icefit_options['single_portfolio_sidebar'] );
		?></ul></div><?php
	endif;

	?></div><?php

get_footer(); ?>