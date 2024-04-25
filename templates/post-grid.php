<?php
/*
* @Author 		pickplugins
* Copyright: 	2015 pickplugins.com
*/

if ( ! defined('ABSPATH')) exit;  // if direct access




	include post_grid_plugin_dir.'/templates/variables.php';
	include post_grid_plugin_dir.'/templates/query.php';
	include post_grid_plugin_dir.'/templates/custom-css.php';				
	include post_grid_plugin_dir.'/templates/lazy.php';
	
	
	
	if($enable_multi_skin=='yes'){
		$skin_main  = $skin;
		}
		

	?>
	
	<script>
		post_grid_masonry_enable = "<?php echo $masonry_enable; ?>";
		jQuery(document).ready(function($){
		
		

		});
				
	</script>
    
    <div id="post-grid-<?php echo $grid_id; ?>" class="post-grid <?php echo $grid_type; ?>">
    
    	<div class="grid-nav-top">
        <?php 
		include post_grid_plugin_dir.'templates/nav-top.php';	
		?>
        </div>
    
    
		<?php
		
		if($grid_type=='slider'){
			
			$owl_carousel_class='owl-carousel';
			
			}
		else{
			$owl_carousel_class='';
			}
		
		?>
        <div class="grid-items <?php echo $owl_carousel_class; ?>">
        
		   <?php
            
            if($grid_type == 'timeline'){
                $html.='<div class="timeline-line"></div>';
                }
            
            
            $odd_even = 0;
            
    
        
            if ( $post_grid_wp_query->have_posts() ) :
                while ( $post_grid_wp_query->have_posts() ) : $post_grid_wp_query->the_post();
                
				

					$item_post_id = get_the_ID();
					//var_dump($item_post_id);
	
	
					$post_grid_post_settings = get_post_meta( get_the_ID(), 'post_grid_post_settings', true );
					
					
					//var_dump($post_grid_post_settings);
					
					if($enable_multi_skin=='yes'){
						
						if(!empty($post_grid_post_settings['post_skin'])){
						
							$skin = $post_grid_post_settings['post_skin'];
		
							}
						else{
							
							$skin = $skin_main;
							}
						
						}
	
					if($odd_even%2==0){
						$odd_even_calss = 'even';
						}
					else{
						$odd_even_calss = 'odd';
						}
					$odd_even++;
				
					?><div class="item item-<?php echo $item_post_id; ?> mix skin <?php echo $odd_even_calss; ?> <?php echo $skin; ?> <?php echo post_grid_term_slug_list($item_post_id); ?> ">
                    
                    	<?php
                        
						include post_grid_plugin_dir.'/templates/layer-media.php';
						include post_grid_plugin_dir.'/templates/layer-content.php';
						//include post_grid_plugin_dir.'/templates/layer-hover.php';	
						
						?>
                    
                    
                    
                    </div><!-- End .item --><?php
					
					$post_grid_ads_loop_meta_options = get_post_meta($grid_id, 'post_grid_ads_loop_meta_options', true);
					
					if(!empty($post_grid_ads_loop_meta_options['ads_positions'])){
						
						$ads_positions = $post_grid_ads_loop_meta_options['ads_positions'];
						$ads_positions = explode(',',$ads_positions);
						
						$ads_positions_html = $post_grid_ads_loop_meta_options['ads_positions_html'];
	
						$post_grid_ads_positions = apply_filters('post_grid_filter_ads_positions', $ads_positions);
	
						foreach($post_grid_ads_positions as $position){
							
							if( $post_grid_wp_query->current_post == $position ){
								
								if(!empty($ads_positions_html[$position]))
								echo apply_filters('post_grid_nth_item_html',$ads_positions_html[$position]); 
								
								}
							}
						
						}
				
				
				
                endwhile;

				?>
				</div> <!-- .grid-items -->
				
				<div class="grid-nav-bottom">
					<?php 
					include post_grid_plugin_dir.'/templates/nav-bottom.php';
					?>
				</div> <!-- End .grid-nav-bottom -->
				<?php
				
				wp_reset_query();
				wp_reset_postdata();
            
            else:
            
				?>
				<div class="no-post-found">
                <?php echo __('No Post found',post_grid_textdomain); ?>
                </div> <!-- .no-post-found -->
				<?php			
			
			
			
            endif;
			
			
            include post_grid_plugin_dir.'/templates/scripts.php';	
            include post_grid_plugin_dir.'/templates/custom-js.php';				
				if($masonry_enable=='yes'):
				?>
                <script>jQuery(window).load(function(){jQuery("#post-grid-<?php echo $grid_id; ?> .grid-items").masonry({isFitWidth: true}); });</script>
                <?php
				endif;
			
			
            ?>
        
        

        
        
    
    
    </div> <!-- End .post-grid -->