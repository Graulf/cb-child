<?php
/**
 *
 * BoldR Pro WordPress Theme by Iceable Themes | http://www.iceablethemes.com
 *
 * Copyright 2013 Mathieu Sarrasin - Iceable Media
 *
 * Portfolio Page Template
 *
 */
 /*
 Template Name: Business card
 */
?>
<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" <?php language_attributes(); ?>><![endif]-->
<!--[if IE 7 ]><html class="ie ie7" <?php language_attributes(); ?>><![endif]-->
<!--[if IE 8 ]><html class="ie ie8" <?php language_attributes(); ?>><![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html <?php language_attributes(); ?>><!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<link href='http://fonts.googleapis.com/css?family=Gafata' rel='stylesheet' type='text/css'>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. ?>
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->
<?php global $icefit_options;
$favicon = $icefit_options['favicon'];
if ($favicon && "null.png" != substr($favicon, -8) ): ?><link rel="shortcut icon" href="<?php echo esc_url($favicon); ?>" /><?php endif; ?>


<style>

body {
	font-size:1em;
	font-family: 'Gafata', sans-serif;
	background:#DDD;
	margin:0;
}


	

a, a:visited, a:hover, a:active {
text-decoration:none;
color:#1C1C1B;
}

#wrapper {
height:100%;
position:fixed;
width:100%;

}


#top, #bottom {
width:400px;	
}

#top {
	height:50%;
	background:#B23384;
	text-align:center;
	margin:0 auto;
}

#over {
	position:relative;
    width:100%;
    height:100%;
    text-align: center; /*handles the horizontal centering*/
}

.Centerer
{
    display: inline-block;
    height: 100%;
    vertical-align: middle;
}


#top img {
	max-height:50%;	
	display: inline-block;
    vertical-align: middle;
}


#bottom {
	height:50%;;
	background:#fff;
	margin:0 auto;
overflow:scroll;
-ms-overflow-style: none;
}

.details {
	width:100%;
	margin:0 auto;
	font-size:2.5em;
	color:#1C1C1B;
	text-align:center;
	padding:20px 0 0 0;
}

#name {
clear:both;	
margin-bottom:25px;
}

#left, #right {
font-size:0.4em;	
}

#left {
color:#B23384;
text-align:right;
width:32%;
}

#right {
float:right;	
width:68%;
text-align:left;
padding-left:22px;
}

ul {
list-style:none;
margin:0;
padding:0;	
}

li {
padding:3px;	
}

ul.borderLine {
border-left:1px solid #DDD;	
padding:0 0 0 20px;
}



/* Smartphones (portrait and landscape) ----------- */
@media only screen 
and (min-device-width : 320px) 
and (max-device-width : 480px) {
/* Styles */



#top, #bottom {
width:320px;
}

#name {
margin-bottom:15px;
}

#left, #right {
font-size:0.35em;	
}

}

</style>

</head>
<body <?php body_class();?>><?php

	if(have_posts()) :
	while(have_posts()) : the_post();

	?>
	<div id="wrapper">

	<div id="top">
    	<div id="over">
        <span class="Centerer"></span>
    		<a href="Javascript:history.go(-1)">
            <img src="<?php echo get_stylesheet_directory_uri() ?>/images/cb.png" border=0 />
            </a>
        </div>
    </div>
    <div id="bottom">
    	<div class="details">
    		<div id="name">
           <?php echo get_post_meta($post->ID, 'custom_firstname', true) ?>
            </div>
            <div id="right">
            	<ul class="borderLine">
                	<li>
                    <?php echo get_post_meta($post->ID, 'custom_phone', true) ?>
                    </li>
                    <li>
                    <a href="mailto: <?php echo get_post_meta($post->ID, 'custom_email', true) ?>"><?php echo get_post_meta($post->ID, 'custom_email', true) ?></a>
                    </li>
                    <li>
                    <a href="http://colburn.se">www.colburn.se</a>
                    </li>
                    <li>
                    Malmöhusvägen 1<br />
                   	211 18 MALMÖ <br />
                    Sweden
                    </li>
                </ul>
            </div>
            <div id="left">
            	<ul>
                	<li>
                    tel
                    </li>
                    <li>
                    email
                    </li>
                    <li>
                    web
                    </li>
                    <li>
                    address
                    </li>
                </ul>
            </div>
        </div>
        
    </div>



</div><!-- #wrapper -->


    <?php

	endwhile;
		
	
	endif;


//wp_footer(); //Ladda zendesk support, kanske coolt?

?></body>
</html>