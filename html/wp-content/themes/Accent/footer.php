<?php
/**
 * The template for displaying the footer.
 *
 * @package WordPress
 */
?>
	
		<div id="content_shadow_bottom"></div>
		
		<!-- Begin footer -->
		<div id="footer">
			<?php
				$pp_footer_display_sidebar = get_option('pp_footer_display_sidebar');
			
				if(!empty($pp_footer_display_sidebar))
				{
					$pp_footer_style = get_option('pp_footer_style');
					$footer_class = '';
					
					switch($pp_footer_style)
					{
						case 1:
							$footer_class = 'one';
						break;
						case 2:
							$footer_class = 'two';
						break;
						case 3:
							$footer_class = 'three';
						break;
						case 4:
							$footer_class = 'four';
						break;
						default:
							$footer_class = 'four';
						break;
					}
					
			?>
			<ul class="sidebar_widget <?php echo $footer_class; ?>">
				<?php dynamic_sidebar('Footer Sidebar'); ?>
			</ul>
			
			<br class="clear"/><br/>
			<?php
				}
			?>
			
			<div id="copyright">
			<div style="width:960px;margin:auto">
				<div style="float:left;width:540px;margin-top:28px">
				<?php
					/**
					 * Get footer text
					 */
	
					$pp_footer_text = get_option('pp_footer_text');
	
					if(empty($pp_footer_text))
					{
						$pp_footer_text = 'Copyright © 2011 by Peerapong. Remove this once after purchase from the ThemeForest.net';
					}
					
					echo stripslashes(html_entity_decode($pp_footer_text));
				?>
				</div>
				
				<div style="float:right;width:300px;text-align:right;margin-top:13px">
					<?php
					    //get custom logo
					    $pp_footer_logo = get_option('pp_footer_logo');
					    
					    if(empty($pp_footer_logo))
						{
						    $pp_footer_logo = get_stylesheet_directory_uri().'/images/logo_footer.png';
						}
						else
						{
						    $pp_footer_logo = get_stylesheet_directory_uri().'/cache/'.$pp_footer_logo;
						}
					
					?>
					<a id="footer_logo" href="<?php echo home_url(); ?>"><img src="<?php echo $pp_footer_logo?>" alt=""/></a>
				</div>
			</div>
			</div>
			
		</div>
		<!-- End footer -->
		
		<div id="footer_pattern"></div>
		
		</div>
	
	<div><div>
	</div>
		

<?php
		/**
    	*	Setup Google Analyric Code
    	**/
    	include (TEMPLATEPATH . "/google-analytic.php");
?>

</div></div><div class="wrapper_shadow"></div>

<?php
	/* Always have wp_footer() just before the closing </body>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to reference JavaScript files.
	 */

	wp_footer();
?>
</body>
</html>
