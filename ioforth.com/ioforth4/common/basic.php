<?php
$path=dirname(dirname(__FILE__));
include_once($path."/common/proinfo.php");
?>
<?php
  	if($pro == "filmforth"){
		echo '<div class="sptnavbar"><div class="pw1200 zoom sptbar"> <a href="https://www.ioforth.com/filmforth/" class="sptbar_logo sptfilm_logo" target="_blank">FilmForth</a><ul><li><a href="https://www.ioforth.com/filmforth/" target="_blank">Overview</a></li><li><a href="https://www.ioforth.com/filmforth/guide.htm" target="_blank">Guide</a></li><li><a href="https://www.ioforth.com/filmforth/reviews.htm" target="_blank">Review</a></li><li><a href="https://www.ioforth.com/filmforth/specs.htm" target="_blank">Tech Specs</a></li><li class="sptbar_dlmic"><a href="https://www.microsoft.com/store/apps/9nsf023x0mqs?cid=articledownload" target="_blank"><img src="https://www.ioforth.com/img/microsoft.png"></a></li><li class="sptbar_dlfree"><a href="https://www.microsoft.com/store/apps/9nsf023x0mqs?cid=articledownload" target="_blank">Free Download</a></li></ul></div></div>';
	}
  ?> 
  <div class="pw980 rsclm">
  		<div class="iofor_spare">
        	<?php
				$crturl=get_the_permalink();
			?>
            <a class="tw_share" href="https://twitter.com/intent/tweet?&url=<?php echo $crturl."&text=".$metatitle; ?>" target="_blank"></a>
            <a class="fb_share" href="https://www.facebook.com/sharer.php?u=<?php echo $crturl; ?>" target="_blank"></a>
            <a class="in_share" href="https://www.linkedin.com/shareArticle?spm=&mini=true&url=<?php echo $crturl; ?>" target="_blank"></a>
         </div>
			<div id="descrumbs" class="descrumbs">
				<ul>
					<li><a href="/" target="_blank">Home</a></li>
					<li><a href="<?php echo $breadcrumb;?>" target="_blank"><?php echo $catName;?></a></li>
					<li><a href="<?php the_permalink(); ?>"><b><?php the_title(); ?></b></a></li>
				</ul>
			</div>
			<?php
				if (have_posts()) : the_post(); 
				$current_author=get_the_author_nickname();
				$current_author=strtolower($current_author);
				$fullname=get_the_author_lastname()." ".get_the_author_firstname();
			?>
			<div class="wrap_middle">
                <h1><?php the_title(); ?></h1>
                <div class="zoom langauthor">
                    <div class="uptime">
                        <span><?php the_modified_time("l F j, Y g:i A"); ?> PDT by <?php echo $fullname; ?></span>
                    </div>
                </div>
                <?php the_content();
                    endif;
                ?>
                <div class="zoom infauth">
					<img class="left infauthimg" src="https://www.ioforth.com/img/<?php echo $current_author; ?>.png">
					<div class="left infauth_cont">
						<div class="left author_cont_share">
							<b><?php echo $fullname; ?></b>
							<!--<a href="javascript:void(0);"><img src="https://www.ioforth.com/img/tw_icon.jpg"></a>
							<a href="javascript:void(0);"><img src="https://www.ioforth.com/img/fb_icon.jpg"></a>-->
						</div>
						<div class="clear"></div>
						<p><?php the_author_description(); ?></p>
					</div>
				</div>
                <div id="disqus_thread"></div>
			</div>
</div>
<div class="rsclm_top"><img src="https://www.ioforth.com/img/arrowtop.png"></div>