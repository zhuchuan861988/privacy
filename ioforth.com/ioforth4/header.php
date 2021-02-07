<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="UTF-8">
		<?php if(is_single()){
			$metatitle=get_post_meta(get_the_ID(), 'title', true);
			$metadescription=get_post_meta(get_the_ID(), 'description', true);
			$metakeywords=get_post_meta(get_the_ID(), 'keywords', true);
			$large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large');
			$metaimg= get_the_post_thumbnail_url($post);
		}?><?php
			$noindex=get_post_meta($post -> ID, "noindex", true);
        	$nofollow=get_post_meta($post -> ID, "nofollow", true);
				if($noindex && $nofollow){
					echo '<meta name="robots" content="noindex, nofollow">';
				}else if($noindex){
					echo '<meta name="robots" content="noindex">';
				}else if($nofollow){
					echo '<meta name="robots" content="nofollow">';	
				}
		?>
		<meta name="robots" content="noindex, nofollow">
        <title><?php echo $metatitle; ?></title>
		<meta name="description" content="<?php echo $metadescription; ?>" />
		<meta name="keywords" content="<?php echo $metakeywords; ?>" />
		<?php if(is_single()){?>
		<!-- twitter:card -->
		<meta name="twitter:card" content="summary" />
		<meta name="twitter:site" content="@ioforth" />
		<meta name="twitter:title" content="<?php echo $metatitle;?>" />
		<meta name="twitter:description" content="<?php echo $metadescription;?>" />
		<meta name="twitter:image" content="<?php echo $metaimg;?>" />
		<!-- end of twitter:card -->
		<!-- facebook:ogp -->
		<meta property="fb:app_id" content="1903292629882596" />
		<meta property="og:url" content="<?php the_permalink();?>" />
		<meta property="og:type" content="article" />
		<meta property="og:title" content="<?php echo $metatitle;?>" />
		<meta property="og:description" content="<?php echo $metadescription;?>" />
		<meta property="og:image" content="<?php echo $metaimg;?>" />
		<!-- end of facebook:ogp -->

		<meta itemprop="name" content="<?php echo $metatitle;?>">
		<meta itemprop="description" content="<?php echo $metadescription;?>">
		<meta itemprop="image" content="<?php echo $metaimg;?>">
		<?php
		}?>	
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!--[if lte IE 9]><script src="/js/html5shiv.js"></script><![endif]-->
		<?php
		$canonicallink = get_post_meta(get_the_ID(), 'canonicallink', true);
		if (empty($canonicallink)) {
			echo '<link rel="canonical" href="' . get_the_permalink() . '">';
		} else {
			echo '<link rel="canonical" href="' . $canonicallink . '">';
		}
		?>
        <link rel=icon href="https://www.ioforth.com/img/icon.png" sizes=32x32>
		<link rel="stylesheet" type="text/css" href="https://www.ioforth.com/css/common.css" />
		<link rel="stylesheet" type="text/css" href="https://www.ioforth.com/css/article.css" />
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-161445442-1"></script> 
<script>window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', 'UA-161445442-1');</script>
<script src="https://www.ioforth.com/js/analy.js"></script>
	</head>
<body>
<header class="zoom infheader"></header>
