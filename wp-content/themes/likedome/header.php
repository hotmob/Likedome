<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
    <head>
        <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
        <title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>
        <link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>" type="text/css" media="screen" />
        <?php
        wp_enqueue_script('jquery-min', get_template_directory_uri() . '/js/jquery-1.6.2.min.js');
        wp_enqueue_script('js-simple', get_template_directory_uri() . '/js/js_simple.js');
        wp_enqueue_script('call', get_template_directory_uri() . '/js/call.js');
        wp_enqueue_script('base-platform', get_template_directory_uri() . '/js/platForm766.js');
        wp_enqueue_script('base-platform-login', get_template_directory_uri() . '/js/paltForm766_login.js');
        wp_enqueue_script('jquery-thumb-scroll', get_template_directory_uri() . '/js/jquery.thumbScroll.js');
        if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );
        wp_head(); 
        ?>
        <script type="text/javascript">
            var b_v = navigator.appVersion;
            var IE6 = b_v.search(/MSIE 6/i) != -1;
            if (IE6)document.writeln('<script language="javascript" src="<?php echo get_template_directory_uri(); ?>/js/dd_pngfix.js" />');
            if (IE6)DD_belatedPNG.fix('.server,.sText,.sRight,.sLeft,.sText');
            $(function(){
                //flash
                $(".thumbScroll").thumbScroll();
            });
        </script>
    </head>

    <body>
        <div class="body-t">	
            <div class="fbg">		
                <div class="head wrapper">
                    <div class="site flo">
                        <p class="flo">福州站</p>
                    </div>
					<?php 
					$current_user = wp_get_current_user();
					if ( 0 == $current_user->ID ) { ?>
						<div class="login fro" id="platFrom766_login"></div>
					<?php } else { ?>
						<div class="login fro" id="platFrom766_login" style="visibility:hidden"></div>
					<?php }; ?>
                </div>
                <div class="clear"></div>
                <div class="wrapper nav">
                    <div class="fl">
                        <?php
                        wp_nav_menu(array(
                            'theme_location' => 'main',
                            'container' => null
                        ));
                        ?>

                    </div>
                    <code class="fr"><a class="margin-r10" href="javascript:void(0)" onclick="simple.setHomePage(this)">设为首页</a><a class="margin-r10" href="javascript:void(0)" onclick="simple.addFavorite()">收藏本站</a></code>
                    <div class="clear"></div>
                </div>

                <?php if (is_home()) : ?>
                    <div class="wrapper2 height-297 flash">
                        <!--<script language="javascript" src="http://image2.766.com/res/skin/2008/js/focus.js?width=961&height=297&files=files&links=links&texts=texts&eval=1&flash=http://image2.766.com/res/skin/2008/js/focus.swf"></script>-->
                        <div class="thumbScroll">
                            <div class="sShow"></div>
                            <ul class="sImg">
                            	<?php $queryObject = new WP_Query('posts_per_page=10&cat=10');
                    				if ($queryObject->have_posts()) : while ($queryObject->have_posts()) :$queryObject->the_post();
                    				$szPostContent = $post->post_content;
									$szSearchPattern = '~<img [^\>]*\ />~'; // 搜索所有符合的图片
									preg_match_all( $szSearchPattern, $szPostContent, $aPics );
                    				echo '<li><a href="'.the_permalink().'">'.$aPics[0][0].'</a></li>';  //显示文章内图片
 								endwhile; endif;?>
                            </ul>
                            <div class="sText"> <a href="#" class="sLeft">左</a>
                                <div class="sThumb">
                                    <ul>
                                    <?php $queryObject = new WP_Query('posts_per_page=10&cat=10');
                    				if ($queryObject->have_posts()) : while ($queryObject->have_posts()) :$queryObject->the_post();?>
            	 					<li><?php the_post_thumbnail(); ?></li>
                					<?php endwhile; endif;?>
                					<?php $queryObject = new WP_Query('posts_per_page=10&cat=10');
                    				if ($queryObject->have_posts()) : while ($queryObject->have_posts()) :$queryObject->the_post();?>
            	 					<li><?php the_post_thumbnail(); ?></li>
                					<?php endwhile; endif;?>
                                    </ul>
                                </div>
                                <a href="#" class="sRight">右</a> </div>
                        </div>
                    </div>
                <?php endif; ?>
                    <div class="wrapper2 padding-t13">
                        


