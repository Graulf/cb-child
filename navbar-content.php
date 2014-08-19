<?php
/**
 *
 * BoldR Pro WordPress Theme by Iceable Themes | http://www.iceablethemes.com
 *
 * Copyright 2013 Mathieu Sarrasin - Iceable Media
 *
 * Navbar Content Template
 *
 */
?>
<?php global $icefit_options;
	if ($icefit_options['menu_layout'] == 'Left No Search' || $icefit_options['menu_layout'] == 'Center No Search'):
		$menu_container_class = " full";
	else:
		$menu_container_class = "";
	endif;

	$sticky_header = $icefit_options['sticky_header'];	
	if ( get_post_type($id) == "page" ):
		$sticky_header_page_setting = get_post_meta($id, 'icefit_pagesettings_sticky_header', true);
		if ( $sticky_header_page_setting != "" && $sticky_header_page_setting != "Use Global Setting")
			$sticky_header = $sticky_header_page_setting;
	endif;

	$logo_url = $icefit_options['logo'];
	$logo_markup = "";
	if ($sticky_header == 'Sticky Navbar Only + Logo'
			&& $icefit_options['header_title'] != 'Display Title'
			&& $logo_url != ""
			&& "null.png" != substr($logo_url, -8) )
		$logo_markup = '<div id="logo"><a href="'.home_url().'"><img src="'. esc_url( $logo_url ) .'" alt="'. get_bloginfo('name') .'"></a></div>';

	if ( $icefit_options['responsive_menu'] == 'mobile' ):
		?><div id="icefit-mobile-menu"><span class="icefit-mobile-menu-open"></span><?php
			$before_mobile_menu = '<span class="icefit-mobile-menu-close"></span>' . get_search_form(false);
			wp_nav_menu( array( 'theme_location' => 'primary', 'items_wrap' => $before_mobile_menu . '<ul id="%1$s" class="%2$s">%3$s</ul>', ) );
		?></div><?php
	endif;

	?><div id="navbar" class="container">
	<div class="menu-container<?php echo $menu_container_class; ?>"><?php
		echo $logo_markup;
		wp_nav_menu( array( 'theme_location' => 'primary',
					'items_wrap' => '<ul id="%1$s" class="%2$s sf-menu">%3$s</ul>',
					) );
		if ( $icefit_options['responsive_menu'] == 'dropdown' ) icefit_dropdown_nav_menu();
	?></div><?php

	$menu_layout = $icefit_options['menu_layout'];

	if( $menu_layout == 'Left + Social Media' ):
		?><div id="nav-social"><?php echo icefit_socialmedia_widget_content(); ?></div><?php
	endif;


	if( $menu_layout == 'Left + Search' || !$menu_layout ):
		?><div id="nav-search"><?php get_search_form(); ?></div><?php
	endif;

?></div>