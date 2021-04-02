<?php
$path=dirname(dirname(__FILE__));
include_once($path."/common/proinfo.php");
?>
<?php
  	if($pro == "filmforth"){
		echo '<div class="sptnavbar"><div class="pw1200 zoom sptbar"> <a href="https://www.ioforth.com/filmforth/" class="sptbar_logo sptfilm_logo" target="_blank">FilmForth</a><ul><li><a href="https://www.ioforth.com/filmforth/" target="_blank">Overview</a></li><li><a href="https://www.ioforth.com/filmforth/guide.htm" target="_blank">Guide</a></li><li><a href="https://www.ioforth.com/filmforth/reviews.htm" target="_blank">Review</a></li><li><a href="https://www.ioforth.com/filmforth/specs.htm" target="_blank">Tech Specs</a></li><li class="sptbar_dlmic"><a href="https://www.microsoft.com/store/apps/9nsf023x0mqs?cid=articledownload" target="_blank"><img src="https://www.ioforth.com/img/microsoft.png"></a></li><li class="sptbar_dlfree"><a href="https://www.microsoft.com/store/apps/9nsf023x0mqs?cid=articledownload" target="_blank">Free Download</a></li></ul></div></div>';
	}
  ?> 
<div class="pw1200 zoom column_container">
	<div class="rsclm column_left">
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
    
    <div class="column_right">
    	<div class="column_right_box column_right_hot">
        	<h4>Hot Topics</h4>
            <div class="column_hot_area">
                <ul>
					<li><a href="https://www.ioforth.com/windows-video-transitions/" target="_blank">How to Make Video Transitions on Windows 10</a></li>
                    <li><a href="https://www.ioforth.com/speed-up-video-windows/" target="_blank">How to Speed Up or Slow Down Video on Computer</a></li>
                    <li><a href="https://www.ioforth.com/rotate-video-windows/" target="_blank">How to Rotate a Video with Great Ease</a></li>
                    <li><a href="https://www.ioforth.com/the-complete-guide-to-creating-a-product-demo-video-with-impact/" target="_blank">The Complete Guide to Creating a Product Demo Video With Impact</a></li>
                    <li><a href="https://www.ioforth.com/photo-conversion-to-video-made-easy/" target="_blank">Photo Conversion to Video Made Easy with FilmForth</a></li>
                    <li><a href="https://www.ioforth.com/video-editor/the-greatest-meme-maker-on-windows.htm" target="_blank">Get the Greatest Meme Maker on Windows 10</a></li>
                    <li><a href="https://www.ioforth.com/video-editor/how-to-remove-voice-from-video.htm" target="_blank">How to Remove Voice from Video</a></li>
               </ul>
            </div>
        </div>
        <div class="column_right_box column_pro_area">
        		<img src="https://www.ioforth.com/video-editor/img/filmicon.png">
            	<h4><a href="https://www.ioforth.com/filmforth/" target="_blank">FilmForth - Best Free Movie Maker on Windows 10</a></h4>
            	<ul>
                	<li>Free and Easy-to-use Video Editor for Everyone.</li>
                	<li>Edit video from clips and add stylish transitions, filter, titles, on a timeline.</li>
                    <li>Add Audio, record voiceover and change the volume as you want.</li>
                    <li>Give each frame of picture with rich sentiment.</li>
                    <li>All in one for movie maker.</li>
                    <li>Save & Share without watermark.</li>
                </ul>
                <div class="column_rightdl"><a href="https://www.microsoft.com/store/apps/9nsf023x0mqs?cid=articledownload" class="col_dlbtn" target="_blank"><img src="https://www.ioforth.com/img/idxwin.png"> Download for Free <img src="https://www.ioforth.com/img/idxdl.png"></a></div>
            </div>
    </div>
</div>
<div class="rsclm_top"><img src="https://www.ioforth.com/img/arrowtop.png"></div>