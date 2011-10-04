<?php
/**
 * Template Name: Contact
 * The main template file for display contact page.
 *
 * @package WordPress
*/


/**
*	if not submit form
**/

if(!isset($_GET['your_name']))
{

if(!isset($hide_header) OR !$hide_header)
{
	get_header(); 
}

/**
*	Get Current page object
**/
$page = get_page($post->ID);

/**
*	Get current page id
**/

if(!isset($current_page_id) && isset($page->ID))
{
    $current_page_id = $page->ID;
}

$page_sidebar = get_post_meta($current_page_id, 'page_sidebar', true);

if(empty($page_sidebar))
{
	$page_sidebar = 'Contact Sidebar';
}

$caption_class = 'page_caption';

$caption_style = get_post_meta($current_page_id, 'caption_style', true);

if(empty($caption_style))
{
	$caption_style = 'Title & Description';
}

if(!isset($hide_header) OR !$hide_header)
{
?>
		
		<div class="page_caption">
			<div class="caption_inner">
				<div class="caption_header">
					<h1 class="cufon"><?php the_title(); ?></h1>
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
					
<?php
}
?>
				
					<div class="sidebar_content">
						<?php 
							if(!isset($hide_header) OR !$hide_header)
							{
								if ( have_posts() ) while ( have_posts() ) : the_post(); ?>		

									<?php the_content(); break; ?>

						<?php endwhile; 
							}
						?>
						
						<?php
							$pp_contact_form = unserialize(get_option('pp_contact_form_sort_data'));
						?>
						<form id="contact_form" method="post" action="<?php echo curPageURL(); ?>">
							<?php 
								if(is_array($pp_contact_form) && !empty($pp_contact_form))
								{
									foreach($pp_contact_form as $form_input)
									{
										switch($form_input)
										{
											case 1:
							?>
											 <p style="margin-top:20px">
						    					<label for="your_name">Name</label><br/>
						    					<input id="your_name" name="your_name" type="text" style="width:94%"/>
						    				</p>				
							<?php
											break;
											
											case 2:
							?>
											 <p style="margin-top:20px">
						    					<label for="email">Email</label><br/>
						    					<input id="email" name="email" type="text" style="width:94%"/>
						    				</p>				
							<?php
											break;
											
											case 3:
							?>
											 <p style="margin-top:20px">
						    					<label for="message">Message</label><br/>
						    					<textarea id="message" name="message" rows="7" cols="10" style="width:94%"></textarea>
						    				</p>				
							<?php
											break;
											
											case 4:
							?>
											 <p style="margin-top:20px">
						    					<label for="message">Address</label><br/>
						    					<input id="address" name="address" type="text" style="width:94%"/>
						    				</p>				
							<?php
											break;
											
											case 5:
							?>
											 <p style="margin-top:20px">
						    					<label for="message">Phone</label><br/>
						    					<input id="phone" name="phone" type="text" style="width:94%"/>
						    				</p>				
							<?php
											break;
											
											case 6:
							?>
											 <p style="margin-top:20px">
						    					<label for="message">Mobile</label><br/>
						    					<input id="mobile" name="mobile" type="text" style="width:94%"/>
						    				</p>				
							<?php
											break;
											
											case 7:
							?>
											 <p style="margin-top:20px">
						    					<label for="message">Company Name</label><br/>
						    					<input id="company" name="company" type="text" style="width:94%"/>
						    				</p>				
							<?php
											break;
											
											case 8:
							?>
											 <p style="margin-top:20px">
						    					<label for="message">Country</label><br/>
						    					<input id="country" name="country" type="text" style="width:94%"/>
						    				</p>				
							<?php
											break;
										}
									}
								}
							?>

						    <p style="margin-top:50px">
								<input type="submit" value="Send Message"/><br/>
							</p>
						</form>
						<div id="reponse_msg"></div>
						<br/><br/>
						
					</div>
					
					<div class="sidebar_wrapper">
						<div class="sidebar_top"></div>
						
						<div class="sidebar">
							
							<div class="content">
							
								<ul class="sidebar_widget">
								<?php dynamic_sidebar($page_sidebar); ?>
								</ul>
								
							</div>
						
						</div>
						<br class="clear"/>
					
						<div class="sidebar_bottom"></div>
					</div>
			
<script>
$j(document).ready(function(){ 
	$j.validator.setDefaults({
		submitHandler: function() { 
		    var actionUrl = $j('#contact_form').attr('action');
		    
		    $j.ajax({
  		    	type: 'GET',
  		    	url: actionUrl,
  		    	data: $j('#contact_form').serialize(),
  		    	success: function(msg){
  		    		$j('#contact_form').hide();
  		    		$j('#reponse_msg').html(msg);
  		    	}
		    });
		    
		    return false;
		}
	});
		    
		
	$j('#contact_form').validate({
		rules: {
		    your_name: "required",
		    email: {
		    	required: true,
		    	email: true
		    },
		    message: "required"
		},
		messages: {
		    your_name: "Please enter your name",
		    email: "Please enter a valid email address",
		    agree: "Please enter some message"
		}
	});
});
</script>
				
<?php
if(!isset($hide_header) OR !$hide_header)
{
?>	
			</div>
			<!-- End main content -->
							
			<br class="clear"/>

			</div>
		</div>
		<!-- End content -->
				

<?php get_footer(); ?>

<?php
}
elseif(!$pp_homepage_hide_right_sidebar)
{
?>

</div>
			<!-- End main content -->
				
			<br class="clear"/>
				
			</div>
			
		</div>
		<!-- End content -->

<?php
}
?>
				
<?php
}

//if submit form
else
{

	/*
	|--------------------------------------------------------------------------
	| Mailer module
	|--------------------------------------------------------------------------
	|
	| These module are used when sending email from contact form
	|
	*/
	
	//Get your email address
	$contact_email = get_option('pp_contact_email');
	$pp_contact_thankyou = get_option('pp_contact_thankyou');
	
	//Enter your email address, email from contact form will send to this addresss. Please enter inside quotes ('myemail@email.com')
	define('DEST_EMAIL', $contact_email);
	
	//Change email subject to something more meaningful
	define('SUBJECT_EMAIL', 'Email from contact form');
	
	//Thankyou message when message sent
	define('THANKYOU_MESSAGE', $pp_contact_thankyou);
	
	//Error message when message can't send
	define('ERROR_MESSAGE', 'Oops! something went wrong, please try to submit later.');
	
	
	/*
	|
	| Begin sending mail
	|
	*/
	
	$from_name = $_GET['your_name'];
	$from_email = $_GET['email'];
	
	$message = 'Name: '.$from_name.PHP_EOL;
	$message.= 'Email: '.$from_email.PHP_EOL.PHP_EOL;
	$message.= 'Message: '.PHP_EOL.$_GET['message'].PHP_EOL.PHP_EOL;
	
	if(isset($_GET['address']))
	{
		$message.= 'Address: '.$_GET['address'].PHP_EOL;
	}
	
	if(isset($_GET['phone']))
	{
		$message.= 'Phone: '.$_GET['phone'].PHP_EOL;
	}
	
	if(isset($_GET['mobile']))
	{
		$message.= 'Mobile: '.$_GET['mobile'].PHP_EOL;
	}
	
	if(isset($_GET['company']))
	{
		$message.= 'Company: '.$_GET['company'].PHP_EOL;
	}
	
	if(isset($_GET['country']))
	{
		$message.= 'Country: '.$_GET['country'].PHP_EOL;
	}
	    
	
	if(!empty($from_name) && !empty($from_email) && !empty($message))
	{
		mail(DEST_EMAIL, SUBJECT_EMAIL, $message);
	
		echo THANKYOU_MESSAGE;
		
		exit;
	}
	else
	{
		echo ERROR_MESSAGE;
		
		exit;
	}
	
	/*
	|
	| End sending mail
	|
	*/
}

?>