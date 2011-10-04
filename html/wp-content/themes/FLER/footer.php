		<div id="footer">
        
        	<div class="wrapper">
            <?php echo do_shortcode('[portfolio_gallery category="footer" title="Community" height="250"]'); ?> 
            	<div class="left">
                
					<?php echo do_shortcode(ddp('footer_left')); ?>
                
                </div>
                <!-- /#footer .left -->
                
                <div class="right">
                
                	<?php echo do_shortcode(ddp('footer_right')); ?>
                
                </div>
                <!-- /.right -->
            
            </div>
            <!-- /#footer .wrapper -->
        
        </div>
        <!-- /#footer -->
        
        <?php wp_footer(); ?>
        
        <?php echo ddp('analytics'); ?>
            
    </body>

</html>