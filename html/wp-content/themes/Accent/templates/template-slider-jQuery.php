		<?php
				$pp_slider_items = get_option('pp_slider_items');
				
				if(empty($pp_slider_items))
				{
					$pp_slider_items = 5;
				}

				$pp_slider_sort = get_option('pp_slider_sort'); 
				if(empty($pp_slider_sort))
				{
					$pp_slider_sort = 'ASC';
				}
			
				$slider_arr = get_posts('numberposts='.$pp_slider_items.'&order='.$pp_slider_sort.'&orderby=date&post_type=slides');

				if(!empty($slider_arr))
				{
		?>
		
						<ul id="jquery_slider">
							<?php
								foreach($slider_arr as $key => $gallery_item)
								{		
									$image_url = '';
								
									if(has_post_thumbnail($gallery_item->ID, 'large'))
									{
										$image_id = get_post_thumbnail_id($gallery_item->ID);
										$image_url = wp_get_attachment_image_src($image_id, 'full', true);
									}
									
									$gallery_type = get_post_meta($gallery_item->ID, 'gallery_type', true);
									if(empty($gallery_type))
									{
										$gallery_type = 'Image';
									}
									
									$hyperlink_url = get_post_meta($gallery_item->ID, 'gallery_link_url', true);
							?>
							<li>
								<div class="left_content">
								    <h3 class="cufon"><?php echo $gallery_item->post_title; ?></h3>
								    <p><?php echo $gallery_item->post_content; ?></p>
								</div>
								<div class="right_content">
									<div class="slide_pic_shadow">
										<a href="<?php echo $hyperlink_url; ?>">
										    <img src="<?php echo get_stylesheet_directory_uri(); ?>/timthumb.php?src=<?php echo $image_url[0]; ?>&amp;h=300&amp;w=480&amp;zc=1" alt=""/>
										</a>
									</div>
								</div>
							</li>
							
							<?php
								}
							?>
						</ul>
		
		<?php 					
				}
		?>
		
<?php
	$pp_homepage_slider_nav = true;
	
	$pp_slider_auto_play = get_option('pp_slider_auto_play');
	if(!empty($pp_slider_auto_play))
	{
		$pp_slider_auto_play = 'true';
	}
	else
	{
		$pp_slider_auto_play = 'false';
	}
?>
		
<script type="text/javascript"> 
    $j(function () {

    	$j('#jquery_slider').bxSlider({
    		mode: 'fade',
    		speed: 1000,
    		pause: parseInt($j('#slider_timer').val() * 1000),
            auto: true,
            autoControls: true,
            autoHover: true,
            pager: true,
            controls: false
        });
    });				
</script>