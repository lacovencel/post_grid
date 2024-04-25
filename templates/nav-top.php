<?php
/*
* @Author 		pickplugins
* Copyright: 	2015 pickplugins.com
*/

if ( ! defined('ABSPATH')) exit;  // if direct access

//var_dump($grid_type);

	if($grid_type=='grid'){
		
		if($nav_top_search=='yes'){
			
			if(isset($_GET['keyword'])){
				
				$keyword = sanitize_text_field($_GET['keyword']);
				}
			
			?>
            <div class="nav-search">
            	<input grid_id="<?php echo $grid_id; ?>" title="<?php echo __('Press enter to reset', 'post-grid'); ?>" class="search" type="text"  placeholder="<?php echo __('Start typing', post_grid_textdomain); ?>" value="<?php echo $keyword; ?>">
            </div>
            <?php
		
			
			}

		
		
		}
	elseif($grid_type=='filterable'){
		
		?>
        <div class="nav-filter">
        
   
        
        
        
        
        <?php
		
		if($nav_top_filter_style=='inline'){
			
			
				if(!empty($categories)){
		
					foreach($categories as $category){
						
						$tax_cat = explode(',',$category);
						
						$categories_info[] = array($tax_cat[1],$tax_cat[0]);
						
						}
					
					?>
					<div class="filter filter-<?php echo $grid_id; ?>" data-filter="all"><?php echo $filterable_filter_all_text; ?></div>
					<?php
					
		
				
					foreach($categories_info as $term_info)
						{
							
							$term = get_term( $term_info[0], $term_info[1] );
							$term_slug = $term->slug;
							$term_name = $term->name;
							
							?>
							<div class="filter filter-<?php echo $grid_id; ?>" terms-id="<?php echo $term_info[0]; ?>" data-filter=".<?php echo $term_slug; ?>" ><?php echo $term_name; ?></div>
							<?php
		
						}
					
				}
			
			
			
			
			}
		
		elseif($nav_top_filter_style=='dropdown'){
			
			
?>
  <select id="FilterSelect">

<?php

				if(!empty($categories)){
		
					foreach($categories as $category){
						
						$tax_cat = explode(',',$category);
						
						$categories_info[] = array($tax_cat[1],$tax_cat[0]);
						
						}
					
					?>
					<option value="all"><?php echo $filterable_filter_all_text; ?></option>
					<?php
					
		
				
					foreach($categories_info as $term_info)
						{
							
							$term = get_term( $term_info[0], $term_info[1] );
							$term_slug = $term->slug;
							$term_name = $term->name;
							
							?>
							<option terms-id="<?php echo $term_info[0]; ?>" value=".<?php echo $term_slug; ?>" ><?php echo $term_name; ?></option>
							<?php
		
						}
					
				}

?>


  </select>
        
    <script>
	jQuery(function($){
	  var $filterSelect = $('#FilterSelect'),
	 
	  $container = $('<?php echo '#post-grid-'.$grid_id; ?>');
  
	$container.mixItUp({<?php echo '

				pagination: {
					limit: '.$filterable_post_per_page.',
					prevButtonHTML: "'.$pagination_prev_text.'",
					nextButtonHTML: "'.$pagination_next_text.'",

					

				},
				

				
				selectors: {
					pagersWrapper: ".pager-list-'.$grid_id.'",
					filter: ".filter-'.$grid_id.'",
					
				},';
				
		if(!empty($active_filter) && $active_filter!= 'all')
			{
			

			echo '
			load: {
				
					filter: document.location.hash == "" ? ".'.$active_filter.'" :
					  ("." + document.location.hash.substring(1))
				
			}, ';

			}

				echo 'controls: {
					enable: true
				}
				
						'; ?>});

	  
	  
	  
	  
	  
	  
	  $filterSelect.on('change', function(){
		$container.mixItUp('filter', this.value);
	  });
  
	
	});
	</script> 
<?php
			
			
			
			
			}		
		else{
			
			}
		
		
		

		?>
        </div> <!-- .nav-filter -->
        <?php

		
		
	
		echo '<script>
			jQuery(document).ready(function($) {
				
					$(function(){
					
						$("#post-grid-'.$grid_id.'").mixItUp({

				pagination: {
					limit: '.$filterable_post_per_page.',
					prevButtonHTML: "'.$pagination_prev_text.'",
					nextButtonHTML: "'.$pagination_next_text.'",

					

				},
				

				
				selectors: {
					pagersWrapper: ".pager-list-'.$grid_id.'",
					filter: ".filter-'.$grid_id.'",
					
				},';
				
		if(!empty($active_filter) && $active_filter!= 'all')
			{
			

			echo '
			load: {
				
					filter: document.location.hash == "" ? ".'.$active_filter.'" :
					  ("." + document.location.hash.substring(1))
				
			}, ';

			}

				echo 'controls: {
					enable: true
				}
				
						});
					
					});
					
			
					
					
			});		
		</script>';	

		
		
		echo '<style type="text/css">
		
				#post-grid-'.$grid_id.' .grid-items .mix{
				  display: none;
				}
				</style>
				';
		
		
		}
	elseif($grid_type=='slider'){
		
	
	//var_dump('Hello');
		
		
	echo '<script>
	jQuery(document).ready(function($)
	{
		$("#post-grid-'.$grid_id.' .grid-items").owlCarousel({
			
			items : 3, //10 items above 1000px browser width


			responsiveClass:true,
			responsive:{

				320:{
					items:'.$slider_column_mobile.',
					
				},
				
				768:{
					items:'.$slider_column_tablet.',
					
				},				
				
				1024:{
					items:'.$slider_column_desktop.',
					
					
				}
			},



			
			';
		

		echo 'loop: '.$slider_loop.',';
		echo 'rewind: '.$slider_rewind.',';
		echo 'center: '.$slider_center.',';
		
		echo 'autoplay: '.$slider_auto_play.',';
		echo 'autoplaySpeed: '.$slider_auto_play_speed.',';		
		echo 'autoplayTimeout: '.$slider_auto_play_timeout.',';
		echo 'autoplayHoverPause: '.$slider_autoplayHoverPause.',';	
		
		echo 'nav: '.$slider_navs.',';
		echo 'navText : ["",""],';
		
		echo 'dots: '.$slider_dots.',';
		echo 'navSpeed: '.$slider_navSpeed.',';
		echo 'dotsSpeed: '.$slider_dotsSpeed.',';
		echo 'touchDrag : '.$slider_touchDrag.',';
		echo 'mouseDrag  : '.$slider_mouseDrag.',';
		
		echo 'autoHeight: true,';







	echo '});';

	echo '$("#post-grid-'.$grid_id.' .owl-nav").addClass("'.$slider_navs_positon.'");';
	echo '$("#post-grid-'.$grid_id.' .owl-nav").addClass("'.$slider_navs_style.'");';
	echo '$("#post-grid-'.$grid_id.' .owl-dots").addClass("'.$slider_dots_style.'");';
	


	echo '});';


	echo  '</script>';
		
		
		
		
		
		}











	if($nav_top_filter=='yes'){
		

		
	
		
		
		
		}
		
		



