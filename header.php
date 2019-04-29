<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package efamk
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700' rel='stylesheet' type='text/css'>	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<?php wp_head(); ?>

<!-- Favicon –––––––––––––––––––––––––––––––––––––––––––––––––– -->
<link rel="icon" type="image/x-icon" href="/prod/wp-content/themes/efamk/images/favicon.ico" />

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script type='text/javascript' src='/wp-content/themes/efamk/js/script.js'></script>
</head>

<body <?php body_class(); ?>>

<!-- Google Tag Manager -- EFA Magazine -- Place immediately below body tag -->
<noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-MFTB6F"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-MFTB6F');</script>
<!-- End Google Tag Manager --EFA Magazine -->

<div id="page" class="site">
	<div id="network-container">
	     <nav class="wrapper clearfix">
	     	  <h5 class="">
	     	  	<a href="javascript:void(0)" class="">CHOOSE A SITE</a></h5>	
	          <ul>
	               <li><span>ENVIRONMENTS FOR AGING</span></li>
	               <li><a target="_blank" href="http://www.environmentsforaging.com">EXPO</a></li>
	               <li><a target="_blank" href="http://www.efamagazine.com">MAGAZINE</a></li>
	               <li><a class="active" href="#">ADVERTISE</a></li>
	          </ul>
	          <ul>
	               <li><span>HEALTHCARE DESIGN</span></li>
	               <li><a target="_blank" href="http://www.hcdexpo.com">EXPO</a></li>
	               <li><a target="_blank" href="http://www.healthcaredesignmagazine.com">MAGAZINE</a></li>
	               <li><a target="_blank" href="http://mediakit.healthcaredesignmagazine.com">ADVERTISE</a></li>
	          </ul>
	     </nav>
	</div>
	<header id="masthead" class="site-header" role="banner">
		<div class="wrapper clearfix">
			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<div id="publication-of"><a href="http://www.environmentsforaging.com/" target="_blank">&nbsp;</a></div>
				<?php

				$description = get_bloginfo( 'description', 'display' );
				if ( $description || is_customize_preview() ) : ?>
					<p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
				<?php
				endif; ?>
		</div>		
	</header><!-- #masthead -->
		<nav id="site-navigation" class="main-navigation" role="navigation">
		    <div class="wrapper clearfix">
				<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Menu', 'efamk' ); ?></button>
				<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
			</div>
		</nav><!-- #site-navigation -->
		<div class="wrapper clearfix">
		<?php 
		if (!$post->post_parent){
			$children = wp_list_pages("title_li=&child_of=".$post->ID."&echo=0");
		} else{
			if($post->ancestors) {
				$ancestors = end($post->ancestors);
				$children = wp_list_pages("title_li=&child_of=".$ancestors."&echo=0&sort_column=menu_order");
			}
		} 
		if ($children) {

		?>
			<nav class="sub-navigation">
				<ul class="secondary-menu"><?php echo $children; ?></ul>
				<?php 
					if(get_field('pdf_1_title') || get_field('pdf_title')) {
				?>	
					<div class="pdfs-container float-right">
					    <?php 
							if(get_field('pdf_1_link')) {
						?>	
					    <span class="pdf-link"><a href="<?=the_field('pdf_1_link');?>" target="_blank"><img src="/wp-content/themes/efamk/images/PDFlogo.png" alt="pdf" class="PDF_LogoLink"><?=the_field('pdf_1_title');?></a></span>
					     <?php
						} elseif(get_field('pdf_link')) {
						?>
						<span class="pdf-link"><a href="<?=the_field('pdf_link');?>" target="_blank"><img src="/wp-content/themes/efamk/images/PDFlogo.png" alt="pdf" class="PDF_LogoLink"><?=the_field('pdf_1_title');?></a></span>
						 <?php
						}
						?>
						<?php 
						if(get_field('pdf_2_link')) {		
						?>	    
					    <span class="pdf-link pdf-link-2"><a href="<?=the_field('pdf_2_link');?>" target="_blank"><img src="/wp-content/themes/efamk/images/PDFlogo.png" alt="pdf" class="PDF_LogoLink"><?=the_field('pdf_2_title');?></a></span>
					    <?php
						}
						?>
					</div>
				<?php 
					} 
				} 
				?>
			</nav>

		</div> 
	

	<div id="content" class="site-content wrapper clearfix">
