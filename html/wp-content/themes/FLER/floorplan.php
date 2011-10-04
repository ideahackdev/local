<?php
/**
*Template Name: floorplan
*
**/
?>

<?php get_header(); ?>

<style>        
	
/* The floor buttons */	

	#floor_container {
		padding-bottom: 100px;
		margin-top: 17px;
	}

	.floor {
		width: 55px;
		height: 55px;
		background-color: #282828;
		color: #fff;
		float: left;
		margin-right: 20px;
	}

	.floor:hover {
		background-color: #41ad49;
	}

	.floor p {
		font-size: 25px;
		text-align: center;
		margin-top: 20px;
	}

</style>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript">
				
	jQuery.fn.floorHover = function (floor_number, unit_number, floorplan_number) {
		return this.each (function () {
			
			$("#floorplan101").css('display', 'none');
			$("#floorplan102").css('display', 'none');
			$("#floorplan103").css('display', 'none');
			$("#floorplan104").css('display', 'none');
			$("#floorplan105").css('display', 'none');
			$("#floorplan106").css('display', 'none');
			$("#floorplan201").css('display', 'none');
			$("#floorplan202").css('display', 'none');
			$("#floorplan203").css('display', 'none');
			$("#floorplan204").css('display', 'none');
			$("#floorplan205").css('display', 'none');
			$("#floorplan206").css('display', 'none');
			$("#floorplan301").css('display', 'none');
			$("#floorplan302").css('display', 'none');
			$("#floorplan303").css('display', 'none');
			$("#floorplan304").css('display', 'none');
			$("#floorplan305").css('display', 'none');
			$("#floorplan306").css('display', 'none');
			$("#floorplan401").css('display', 'none');
			$("#floorplan402").css('display', 'none');
			$("#floorplan403").css('display', 'none');
			$("#floorplan404").css('display', 'none');
			$("#nextarrow").css('display', 'none');
			
			$("#floor"+floor_number).removeClass();
			$("#floor"+floor_number).addClass("unit"+unit_number);

			$("#floorplan"+floorplan_number).show();
				
	});
	}
	
	jQuery.fn.showFloor = function (floor_num) {
		return this.each (function () {
			
			if( $("#startarrow").is(":visible") ) {
				$("#startarrow").css('display', 'none');
			}
			
			$("#floor"+floor_num).removeClass();
			$("#floor"+floor_num).addClass("floor"+floor_num);
			
			$("#floor1").css('display', 'none');
			$("#floor2").css('display', 'none');
			$("#floor3").css('display', 'none');
			$("#floor4").css('display', 'none');
			$("#floor"+floor_num).show(200);
			$("#nextarrow").show(200);
			
			if( $("#floorplan101").is(":visible") ) { $("#nextarrow").css('display', 'none');}
			if( $("#floorplan102").is(":visible") ) { $("#nextarrow").css('display', 'none');}
			if( $("#floorplan103").is(":visible") ) { $("#nextarrow").css('display', 'none');}
			if( $("#floorplan104").is(":visible") ) { $("#nextarrow").css('display', 'none');}
			if( $("#floorplan105").is(":visible") ) { $("#nextarrow").css('display', 'none');}
			if( $("#floorplan106").is(":visible") ) { $("#nextarrow").css('display', 'none');}
			if( $("#floorplan401").is(":visible") ) { $("#nextarrow").css('display', 'none');}
			if( $("#floorplan402").is(":visible") ) { $("#nextarrow").css('display', 'none');}
			if( $("#floorplan403").is(":visible") ) { $("#nextarrow").css('display', 'none');}
			if( $("#floorplan404").is(":visible") ) { $("#nextarrow").css('display', 'none');}
			
			$("#floorplan101").css('display', 'none');
			$("#floorplan102").css('display', 'none');
			$("#floorplan103").css('display', 'none');
			$("#floorplan104").css('display', 'none');
			$("#floorplan105").css('display', 'none');
			$("#floorplan106").css('display', 'none');
			$("#floorplan201").css('display', 'none');
			$("#floorplan202").css('display', 'none');
			$("#floorplan203").css('display', 'none');
			$("#floorplan204").css('display', 'none');
			$("#floorplan205").css('display', 'none');
			$("#floorplan206").css('display', 'none');
			$("#floorplan301").css('display', 'none');
			$("#floorplan302").css('display', 'none');
			$("#floorplan303").css('display', 'none');
			$("#floorplan304").css('display', 'none');
			$("#floorplan305").css('display', 'none');
			$("#floorplan306").css('display', 'none');
			$("#floorplan401").css('display', 'none');
			$("#floorplan402").css('display', 'none');
			$("#floorplan403").css('display', 'none');
			$("#floorplan404").css('display', 'none');
			$("#nextarrow").show(200);
			

	});
	}


$(function(){

// floors and arrows when the buttons are clicked on

	$("#floor_one").click(function(){$(this).showFloor("1")});
	$("#floor_two").click(function(){$(this).showFloor("2")});
	$("#floor_three").click(function(){$(this).showFloor("3")});	
	$("#floor_four").click(function(){$(this).showFloor("4")});	

// on-hover units (backgorunds and tooltips)

	$("#101").hover(function(){$(this).floorHover(1, 101, 101)});
	$("#102").hover(function(){$(this).floorHover(1, 102, 102)});
	$("#103").hover(function(){$(this).floorHover(1, 103, 103)});
	$("#104").hover(function(){$(this).floorHover(1, 104, 104)});
	$("#105").hover(function(){$(this).floorHover(1, 105, 105)});
	$("#106").hover(function(){$(this).floorHover(1, 106, 106)});
	$("#201").hover(function(){$(this).floorHover(2, 201, 101)});
	$("#202").hover(function(){$(this).floorHover(2, 202, 102)});
	$("#203").hover(function(){$(this).floorHover(2, 203, 103)});
	$("#204").hover(function(){$(this).floorHover(2, 204, 104)});
	$("#205").hover(function(){$(this).floorHover(2, 205, 105)});
	$("#206").hover(function(){$(this).floorHover(2, 206, 106)});
	$("#301").hover(function(){$(this).floorHover(3, 301, 101)});
	$("#302").hover(function(){$(this).floorHover(3, 302, 102)});
	$("#303").hover(function(){$(this).floorHover(3, 303, 103)});
	$("#304").hover(function(){$(this).floorHover(3, 304, 104)});
	$("#305").hover(function(){$(this).floorHover(3, 305, 105)});
	$("#306").hover(function(){$(this).floorHover(3, 306, 106)});
	$("#401").hover(function(){$(this).floorHover(4, 401, 401)});
	$("#402").hover(function(){$(this).floorHover(4, 402, 402)});
	$("#403").hover(function(){$(this).floorHover(4, 403, 403)});
	$("#404").hover(function(){$(this).floorHover(4, 404, 404)});
		
});

</script>

<?php //bloginfo("template_directory") ;?>

<div id="content">        
	<div class="wrapper">
		<?php require_once('includes/submenu.php'); //our submenu ?>
		<!--div class="one" id="main-content" style="margin-bottom: 50px;"--> 
		
			<div class ="one-third" style="margin-right:10; min-height: 550px;">
				<div id="floor_container">
					<div id="floor_one" class="floor"><p>1</p></div>
					<div id="floor_two" class="floor"><p>2</p></div>
					<div id="floor_three" class="floor"><p>3</p></div>
					<div id="floor_four" class="floor"><p>4</p></div>
				</div>

				<div id="floor1" class="floor1" style="padding-top:64px;">	
					
					<div id="106" style="height:129px; width: 93px; float: left"></div>
					<div id="105" style="height:129px; width: 60px; float: left"></div>
					<div id="104" style="height:129px; width: 140px; float: left"></div>
					<div id="101" style="height:127px; width: 120px; float: left"></div>
					<div id="102" style="height:127px; width: 64px; float: left"></div>
					<div id="103" style="height:127px; width: 100px; float: left"></div>
										 
				</div>
				
				<div id="floor2" class="floor2" style="padding-top:64px;">
					
					<!-- create individual divs for each unit and change the floor1 background img to the respective img included on hover-->
					
					<div id="206" style="height:129px; width: 93px; float: left"></div>
					<div id="205" style="height:129px; width: 60px; float: left"></div>
					<div id="204" style="height:129px; width: 140px; float: left"></div>
					<div id="201" style="height:127px; width: 120px; float: left"></div>
					<div id="202" style="height:127px; width: 64px; float: left"></div>
					<div id="203" style="height:127px; width: 100px; float: left"></div>
												 
				</div>
				
				<div id="floor3" class="floor3" style="padding-top:64px;">	
					<div id="306" style="height:129px; width: 93px; float: left"></div>
					<div id="305" style="height:129px; width: 60px; float: left"></div>
					<div id="304" style="height:129px; width: 140px; float: left"></div>
					<div id="301" style="height:127px; width: 120px; float: left"></div>
					<div id="302" style="height:127px; width: 64px; float: left"></div>
					<div id="303" style="height:127px; width: 100px; float: left"></div>					 
				</div>
				
				<div id="floor4" class="floor4" style="padding-top:64px;">
	
					
					<!-- create individual divs for each unit and change the floor1 background img to the respective img included on hover -->
					
					<div id="404" style="height:129px; width: 116px; float: left"></div>
					<div id="403" style="height:129px; width: 140px; float: left"></div>
					<div id="401" style="height:129px; width: 157px; float: left"></div>
					<div id="402" style="height:127px; width: 120px; float: left"></div>

												 
				</div>
								
			</div>
			<div class = "two-thirds" style="float: right; width: 600px; min-height: 800px;">
				<div id="startarrow">
					<img src="<?php bloginfo("template_directory") ;?>/images/floorplan/start.png" />
				</div>
				<div id="nextarrow" style="margin-top:240px; display: none;">
					<img src="<?php bloginfo("template_directory") ;?>/images/floorplan/next.png" />
				</div>
				
				<div id="floorplan101" style="display: none;">
					<img src="<?php bloginfo("template_directory") ;?>/images/floorplan/01.png" /> <!-- 101, 201, 301 -->
				</div>
				<div id="floorplan102" style="display: none;">
					<img src="<?php bloginfo("template_directory") ;?>/images/floorplan/02.png" /> <!-- 102, 202, 302 -->
				</div>
				<div id="floorplan103" style="display: none;">
					<img src="<?php bloginfo("template_directory") ;?>/images/floorplan/03.png" /> <!-- 103, 203, 303 -->
				</div>
				<div id="floorplan104" style="display: none;">
					<img src="<?php bloginfo("template_directory") ;?>/images/floorplan/04.png" /> <!-- 104, 204, 304 -->
				</div>
				<div id="floorplan105"  style="display: none;">
					<img src="<?php bloginfo("template_directory") ;?>/images/floorplan/05.png" /> <!-- 105, 205, 305 -->
				</div>
				<div id="floorplan106" style="display: none;">
					<img src="<?php bloginfo("template_directory") ;?>/images/floorplan/06.png"  /> <!-- 106, 206, 306 -->
				</div>
				<div id="floorplan401" style="display: none;">
					<img src="<?php bloginfo("template_directory") ;?>/images/floorplan/401.png" /> <!-- 401 -->
				</div>
				<div id="floorplan402" style="display: none;">
					<img src="<?php bloginfo("template_directory") ;?>/images/floorplan/402.png" /> <!-- 402 -->
				</div>
				<div id="floorplan403" style="display: none;">
					<img src="<?php bloginfo("template_directory") ;?>/images/floorplan/403.png" /> <!-- 403 -->
				</div>
				<div id="floorplan404" style="display: none;">
					<img src="<?php bloginfo("template_directory") ;?>/images/floorplan/404.png"  /> <!-- 404 -->
				</div>
		
			</div>   
				
		<!--/div-->
		<!-- /#main-contenet -->
	</div>
	<!-- /.wrapper -->
</div>
<!-- /#content -->

<?php get_footer(); ?>