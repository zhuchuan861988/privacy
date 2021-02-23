<?php
$path=dirname(dirname(__FILE__));
include_once($path."/common/proinfo.php");
?>
<div class="pw1200 zoom column_container">
	<div class="rsclm column_left">
  		<div class="iofor_spare">
        	<?php
				$crturl=get_the_permalink();
			?>
            <a class="tw_share" href="https://twitter.com/intent/tweet?&url=<?php echo $crturl."&text=".$metatitle; ?>"></a>
            <a class="fb_share" href="https://www.facebook.com/sharer.php?u=<?php echo $crturl; ?>"></a>
            <a class="in_share" href="http://www.linkedin.com/shareArticle?spm= &mini=true&url=<?php echo $crturl; ?>"></a>
         </div>
			<div id="descrumbs" class="descrumbs">
				<ul>
					<li><a href="/">Home</a></li>
					<li><a href="<?php echo $breadcrumb;?>"><?php echo $catName;?></a></li>
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
        	<h4>Top Stories</h4>
            <div class="column_hot_area">
                <ul>
					<?php
                    $post_num = 3; // 设置调用条数
                    $args = array(
                    ‘post_password’ => ”,
                    ‘post_status’ => ‘publish’, // 只选公开的文章.
                    ‘post__not_in’ => array($post->ID),//排除当前文章
                    ‘caller_get_posts’ => 1, // 排除置顶文章.
                    ‘orderby’ => ‘comment_count’, // 依评论数排序.
                    ‘posts_per_page’ => $post_num
                    );
                    $query_posts = new WP_Query();
                    $query_posts->query($args);
                    while( $query_posts->have_posts() ) { $query_posts->the_post(); ?>
                    <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                    <?php } wp_reset_query();?>
               </ul>
            </div>
        </div>
        <div class="column_right_box column_pro_area">
            	<h4><a href="javascript:void(0);">MobileTrans - Phone Transfer</a></h4>
            	<ul>
                	<li>Transfer data between Android, iOS, and Windows phones.</li>
                    <li>Transfer data between Android, iOS, and Windows phones.</li>
                    <li>Transfer data between Android, iOS, and Windows phones.</li>
                    <li>Transfer data between Android, iOS, and Windows phones.</li>
                    <li>Transfer data between Android, iOS, and Windows phones.</li>
                </ul>
                <div class="column_rightdl"><a href="https://www.microsoft.com/store/apps/9nsf023x0mqs?cid=articledownload" class="col_dlbtn" target="_blank"><img src="https://www.ioforth.com/img/idxwin.png"> Download for Free <img src="https://www.ioforth.com/img/idxdl.png"></a></div>
            </div>
    </div>
</div>
<div class="rsclm_top"><img src="https://www.ioforth.com/img/arrowtop.png"></div>