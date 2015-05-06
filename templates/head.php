<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>
<head>

	<!-- Title and Meta Tags -->
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<!-- Favicons -->
	<link rel="shortcut icon" href="<?= esc_url( get_template_directory_uri() ); ?>/dist/images/favicon.ico">
	<link rel="apple-touch-icon" href="<?= esc_url( get_template_directory_uri() ); ?>/dist/images/apple-touch-icon.png">
	<link rel="apple-touch-icon" sizes="<?= esc_url( get_template_directory_uri() ); ?>/72x72" href="dist/images/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="114x114" href="<?= esc_url( get_template_directory_uri() ); ?>/dist/images/apple-touch-icon-114x114.png">

	<!-- Fonts -->
	<link href='http://fonts.googleapis.com/css?family=Roboto:100,300,100italic,400,300italic' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Raleway:400,100,200,300' rel='stylesheet' type='text/css'>
	
	<?php wp_head(); ?>
</head>
