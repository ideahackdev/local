<?php
/**
 * The main template file for display error page.
 *
 * @package WordPress
*/


get_header(); 

?>
		
		<div class="page_caption">
			<div class="caption_inner">
				<div class="caption_header">
					<h1 class="cufon">Page Not Found</h1>
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
					
						<p><?php _e( 'Apologies, but the page you requested could not be found. Perhaps searching will help.', '' ); ?></p>
				</div>	
				</div>
				<!-- End main content -->
				
				<br class="clear"/><br/><br/><br/><br/><br/><br/>
			</div>
		</div>
			
		<!-- End content -->

<?php get_footer(); ?>