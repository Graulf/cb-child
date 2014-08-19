<?php
/**
 *
 * BoldR Pro WordPress Theme by Iceable Themes | http://www.iceablethemes.com
 *
 * Copyright 2013 Mathieu Sarrasin - Iceable Media
 *
 * 404 Page Template
 *
 */
?>

<?php get_header(); ?>
<div class="container" id="main-content">
<h1 class="page-title"><?php _e('404: Sidan hittades inte', 'icefit'); ?></h1>
<div id="page-container">

<div class="one-half">
<h2><?php _e('Hittade inget', 'icefit'); ?></h2>
<p><?php _e('Det du letar efter finns inte här...', 'icefit'); ?></p>
<p><?php _e('Kanske kan en sökning hjälpa ?', 'icefit'); ?></p>
<p><?php get_search_form(); ?></p>
</div>


<div class="one-half">
<h2><?php _e('Alla sidor', 'icefit'); ?></h2>
<ul><?php wp_list_pages(); ?></ul>
</div>

</div></div>
<?php get_footer(); ?>