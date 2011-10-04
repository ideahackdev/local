<?php
/**
 * The main template file for display single post page.
 *
 * @package WordPress
*/


if($post->post_type == 'gallery')
{
	include (TEMPLATEPATH . "/gallery.php");
    exit;
}

if($post->post_type == 'portfolios')
{
	include (TEMPLATEPATH . "/templates/template-portfolio-single.php");
    exit;
}

get_header(); 

$page = get_page($post->ID);
$current_page_id = $page->ID;
$pp_blog_page = get_option('pp_blog_page');
$page_sidebar = get_post_meta($pp_blog_page, 'page_sidebar', true);

if(empty($page_sidebar))
{
	$page_sidebar = 'Blog Sidebar';
}

$caption_class = "page_caption";

$pp_title = get_option('pp_blog_title');

if(empty($pp_title))
{
	$pp_title = 'Blog';
}

//Make blog menu active
if(!empty($pp_blog_page))
{
?>

<script>
$('ul#main_menu li.page-item-<?php echo $pp_blog_page; ?>').addClass('current_page_item');
</script>

<?php
}
?>

<?php

if (have_posts()) : while (have_posts()) : the_post();
?>

		<div class="page_caption">
			<div class="caption_inner">
				<div class="caption_header">
					<h1 class="cufon"><?php echo $pp_title; ?></h1>
				</div>
				<div class="caption_desc">
					<?php
						$page_desc = get_post_meta($current_page_id, 'page_desc', true);
						
						if(!empty($page_desc))
						{
							echo $page_desc;
						}
					?>
				</div>
			</div>
			<br class="clear"/>
		</div>
		
		</div>
		
		<div id="header_pattern"></div>
		<br class="clear"/>
		<!-- Begin content -->
		<div id="content_wrapper">
			
			<div class="inner">
			
				<!-- Begin main content -->
				<div class="inner_wrapper">
					<div class="standard_wrapper">
					<br class="clear"/><hr/><br/>
				
					<div class="sidebar_content" style="border:0">
					
<?php

	$image_thumb = '';
								
	if(has_post_thumbnail(get_the_ID(), 'full'))
	{
	    $image_id = get_post_thumbnail_id(get_the_ID());
	    $image_thumb = wp_get_attachment_image_src($image_id, 'full', true);
		
		$pp_blog_image_width = 640;
		$pp_blog_image_height = 227;
	}
?>

						<!-- Begin each blog post -->
						<div class="post_wrapper">
							
							<div class="post_header">
								<h3><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?>								
									</a>
								</h3>
							</div>
							
							<?php
							    $post_featured_content = get_post_meta(get_the_ID(), 'post_featured_content', true);
							    $post_video_id = get_post_meta(get_the_ID(), 'post_video_id', true);
							    $post_gallery_id = get_post_meta(get_the_ID(), 'post_gallery_id', true);
							    $circle_date_style = '';

							    switch($post_featured_content)
							    {
							    	case 'Youtube Video':
							?>
							
							    	<iframe title="YouTube video player" width="<?php echo $pp_blog_image_width; ?>" height="<?php echo $pp_blog_image_height+140; ?>" src="http://www.youtube.com/embed/<?php echo $post_video_id; ?>?wmode=transparent" frameborder="0" allowfullscreen></iframe><br/><br/>
							
							<?php
							    	break;
							    	case 'Vimeo Video':
							?>	
									<br class="clear"/>
									<div class="post_shadow" style="height:387px">
							    	<iframe src="http://player.vimeo.com/video/<?php echo $post_video_id; ?>?title=0&amp;byline=0&amp;portrait=0&amp;color=ffffff" width="<?php echo $pp_blog_image_width; ?>" height="<?php echo $pp_blog_image_height+140; ?>" frameborder="0"></iframe>
							    	</div>
							    	<br/><br/>
							
							<?php
							    	break;
							    	case 'Gallery':
							?>
							
							<?php
									$portfolio_items = -1;
									
									$portfolio_sort = get_option('pp_gallery_sort'); 
									if(empty($portfolio_sort))
									{
										$portfolio_sort = 'DESC';
									}
									
									$args = array( 
										'post_type' => 'attachment', 
										'numberposts' => $portfolio_items, 
										'post_status' => null, 
										'post_parent' => $post_gallery_id,
										'order' => $portfolio_sort,
										'orderby' => 'date',
									); 								
									$all_photo_arr = get_posts( $args );
								
									if(isset($all_photo_arr) && !empty($all_photo_arr))
									{
								
								?>	
									<br class="clear"/>	
									<div class="post_shadow">
									<div class="nivo_border" style="width:<?php echo $pp_blog_image_width; ?>px;height:<?php echo $pp_blog_image_height; ?>px;"><div id="blog_<?php echo get_the_ID(); ?>" class="nivoslide" style="width:<?php echo $pp_blog_image_width; ?>px;height:<?php echo $pp_blog_image_height; ?>px; visibility: hidden; display:none">
										<?php
								
										    foreach($all_photo_arr as $key => $portfolio_item)
										    {
										    	
										    	$image_url = '';
										
										    	if(!empty($portfolio_item->guid))
										    	{
										    		$image_id = $portfolio_item->ID;
										    		$image_url[0] = $portfolio_item->guid;
										    	}
										    	
										    	$last_class = '';
										    	$line_break = '';
										    	if(($key+1) % 4 == 0)
										    	{	
										    		$last_class = ' last';
										    		
										    		if(isset($page_photo_arr[$key+1]))
										    		{
										    			$line_break = '<br class="clear"/><br/>';
										    		}
										    		else
										    		{
										    			$line_break = '<br class="clear"/>';
										    		}
										    	}
										    	
										?>
										    		<img src="<?php echo get_stylesheet_directory_uri(); ?>/timthumb.php?src=<?php echo $image_url[0]?>&h=<?php echo $pp_blog_image_height; ?>&w=<?php echo $pp_blog_image_width; ?>&zc=1" alt="<?php echo $portfolio_item->post_title?>"/>			
										<?php
										    
										    	echo $line_break;
										    }
										    //End foreach loop
										    
										?>
										</div>
										</div>		    
									</div>
									<br/>
									
<script type="text/javascript"> 
$j(window).load(function() {
	$j('#blog_<?php echo get_the_ID(); ?>').nivoSlider({ pauseTime: parseInt($j('#slider_timer').val() * 1000), pauseOnHover: true, effect: 'boxRainGrow', controlNav: true, captionOpacity: 1, directionNavHide: false, controlNavThumbs:false, controlNavThumbsFromRel:false, boxCols:8, boxRows:4, afterLoad: function(){ 
		$j('#blog_<?php echo get_the_ID(); ?>').css('visibility', 'visible');
		$j('#blog_<?php echo get_the_ID(); ?>').css('display', 'block');
	} });
});
</script> 
									<?php
										
									}
									//End if have portfolio items
									?>
									<br class="clear"/>
							
							<?php
							    	break;
							?>
							
							<?php
							    default:
							    	if(isset($image_thumb[0]))
							    	{
							?>	
							<br class="clear"/>	
							<div class="post_shadow">
								<img src="<?php echo get_stylesheet_directory_uri(); ?>/timthumb.php?src=<?php echo $image_thumb[0]; ?>&w=<?php echo $pp_blog_image_width; ?>&h=<?php echo $pp_blog_image_height; ?>&zc=1" alt="" class="post_img"/>
							</div>
							<br/><br/>
							
							<?php
									}
								}
								
								if(isset($image_thumb[0]) OR !empty($post_video_id) OR !empty($post_gallery_id))
							    {
							?>
							
							<div class="post_img_date"<?php echo $circle_date_style; ?>><div class="day"><?php echo get_the_time('d'); ?></div><div class="month"><?php echo get_the_time('M'); ?></div></div><br class="clear"/>
							
							<?php
								}
							?>
							
							<div class="post_detail">
							<?php
								$pp_blog_meta_sort_data = unserialize(get_option('pp_blog_meta_sort_data'));
						
								if(is_array($pp_blog_meta_sort_data) && !empty($pp_blog_meta_sort_data))
								{
									foreach($pp_blog_meta_sort_data as $meta)
									{
										switch($meta)
										{
											case 1:
												echo the_category(',').'<br/>';
											break;
											case 2:
												echo the_tags('Tags: ',',', '<br/>');
											break;
											case 3:
												echo 'Posted by: '.get_the_author().'<br/>';
											break;
											case 4:
												echo 'Date: '.get_the_time('d M Y').'<br/>';
											break;
											case 5:
												echo comments_number('0 Comment', '1 Comment', '% Comments').'<br/>';
											break;
										}
									}
								}
							?>
							</div>
							
							<div class="post_excerpt"><?php the_content(); ?></div>
							
							<br class="clear"/>
							
							<br class="clear"/><br/><br/>
							
							<hr/>
						
						</div>
						<!-- End each blog post -->
						
						<?php
							$pp_blog_display_author = get_option('pp_blog_display_author');

							if(!empty($pp_blog_display_author))
							{
						?>
						
						<h2 class="widgettitle">About the author</h2>
							
						<div id="about_the_author">
							<div class="thumb"><?php echo get_avatar( get_the_author_meta('email'), '50' ); ?></div>
							<div class="description">
								<strong><?php the_author_link(); ?></strong><br/>
								<?php the_author_meta('description'); ?>
							</div>
						</div>
						<br class="clear"/><br/><hr/>
						
						<?php 
							}
						?>
						
						<?php
							$pp_blog_display_related = get_option('pp_blog_display_related');

							if(!empty($pp_blog_display_related))
							{
						?>
						
						<?php
						//for use in the loop, list 5 post titles related to first tag on current post
						$tags = wp_get_post_tags($post->ID);
						if ($tags) {
						  $first_tag = $tags[0]->term_id;
						  $args=array(
						    'tag__in' => array($first_tag),
						    'post__not_in' => array($post->ID),
						    'showposts'=>3,
						    'caller_get_posts'=>1
						   );
						  $my_query = new WP_Query($args);
						  if( $my_query->have_posts() ) {
						  	echo '<br/><br/><br/><h2 class="widgettitle">Related Posts</h2><br class="clear"/>';
						 ?>
						  
						  <div class="related_posts">
						  
						 <?php
						    while ($my_query->have_posts()) : $my_query->the_post(); 
						    	$image_thumb = '';
								
								if(has_post_thumbnail($post->ID, 'large'))
								{
								    $image_id = get_post_thumbnail_id($post->ID);
								    $image_thumb = wp_get_attachment_image_src($image_id, 'large', true);
								}
						    ?>
						    	
						    	<?php
						    		if(!empty($image_thumb))
						    		{
						    	?>
						    		<div class="one_third">
						    			<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/timthumb.php?src=<?php echo $image_thumb[0]; ?>&h=100&w=175&zc=1" alt="" class="frame img_nofade" />
						    			</a>
						    		</div>
						    	<?php
						    		}
						    	?>
						    		
						    	
						    		<div class="two_third last" style="padding-top:10px">
						      			<strong><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></strong><br/><?php echo pp_substr(strip_tags(strip_shortcodes($post->post_content)), 200); ?>
						      		</div>
						      		
						    	<br class="clear"/><br/><br/>

						      <?php
								    endwhile;
								    
								    wp_reset_query();
						    	?>
						    	</div>
						<?php
						  }
						 ?>
						 	<br class="clear"/><br/><br/><hr/>
						<?php
						}
						?>
						
						<?php
							}
						?>


						<?php comments_template( '' ); ?>
						

<?php endwhile; endif; ?>

					</div>
					
					<div class="sidebar_wrapper">
						<div class="sidebar_top" style="border:0"></div>
					
						<div class="sidebar">
							
							<div class="content">
							
								<ul class="sidebar_widget">
									<?php dynamic_sidebar($page_sidebar); ?>
								</ul>
								
							</div>
						
						</div>
						
						<div class="sidebar_bottom"></div>
						<br class="clear"/>
					
					</div>
					
				</div>
				<!-- End main content -->
				
				<br class="clear"/>
			</div>
		</div>
				

<?php get_footer(); ?>