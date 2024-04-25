<?php
/*
* @Author 		pickplugins
* Copyright: 	2015 pickplugins.com
*/

if ( ! defined('ABSPATH')) exit;  // if direct access
	
	
	$class_post_grid_functions = new class_post_grid_functions();
	$load_more_text = $class_post_grid_functions->load_more_text();

	echo '<div class="pagination">';

	if($max_num_pages==0){
		
		$max_num_pages = $post_grid_wp_query->max_num_pages;
	}
	
	//var_dump($pagination_type);
	
	
if($grid_type=='grid'){
	
	
	if($pagination_type=='normal'){
		
		
			echo '<div class="paginate">';

			$big = 999999999; // need an unlikely integer

			echo paginate_links( array(
				'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
				'format' => '?paged=%#%',
				'current' => max( 1, $paged ),
				'total' => $max_num_pages,
				'prev_text'          => $pagination_prev_text,
				'next_text'          => $pagination_next_text,
				) );
		
		
			echo '</div >';	

		}
		
	elseif($pagination_type=='ajax_pagination'){
		
		
			echo '<div grid-id="'.$grid_id.'" id="paginate-ajax-'.$grid_id.'" class="paginate-ajax">';

			$big = 999999999; // need an unlikely integer

			echo paginate_links( array(
				'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
				'format' => '?paged=%#%',
				'current' => max( 1, $paged ),
				'total' => $max_num_pages,
				'prev_text'          => $pagination_prev_text,
				'next_text'          => $pagination_next_text,
				) );
		
		
			echo '</div >';	

		}		
		
	elseif($pagination_type=='next_previous'){
		
		
			echo '<div class="paginate">';

			
			next_posts_link( __('Older posts', post_grid_textdomain) );
			previous_posts_link( __('Newer posts', post_grid_textdomain) );
		

			echo '</div >';	

		}		
		
		
		
		
		
		
		
		
	elseif($pagination_type=='jquery'){
		
		
			echo '<div class="pager-list pager-list-'.$grid_id.'"></div >';
			
			

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
					filter: ".filter",
					pagersWrapper: ".pager-list-'.$grid_id.'",
					
					
				},';
				
		if(!empty($active_filter) && $active_filter!= 'all')
			{
			

			echo '
			load: {
				filter: ".'.$active_filter.'"
				
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
	
	elseif($pagination_type=='loadmore'){
		
			if(!empty($paged))
				{
					$paged = $paged+1;
				}
			
			$load_more = "load-more-".$grid_id;
			
			echo '<div id="load-more-'.$grid_id.'" grid_id="'.$grid_id.'" class="load-more" paged="'.$paged.'" per_page="'.$posts_per_page.'" >'.$load_more_text.'</div >';
		
		}
	
	elseif($pagination_type=='infinite'){
		
			
			echo '<div grid_id="'.$grid_id.'" class="infinite-scroll" paged="'.$paged.'" per_page="'.$posts_per_page.'" ><i class="fa fa-arrow-down"></i></div >';
		
		}	
	
	
	}
	
elseif($grid_type=='timeline'){
	
	if($pagination_type=='loadmore'){
		
			if(!empty($paged))
				{
					$paged = $paged+1;
				}
			
			echo '<div grid_id="'.$grid_id.'" id="load-more-'.$grid_id.'" class="load-more" paged="'.$paged.'" per_page="'.$posts_per_page.'" >'.$load_more_text.'</div >';
		
		}
	
	
	
	}	
	
elseif($grid_type=='filterable'){
	
		if($pagination_type=='jquery'){
			echo '<div class="pager-list pager-list-'.$grid_id.'"></div >';

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
						filter: ".filter",
						pagersWrapper: ".pager-list-'.$grid_id.'",
						
						
					},';
					
			if(!empty($active_filter) && $active_filter!= 'all')
				{
				
	
				echo '
				load: {
					filter: ".'.$active_filter.'"
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
	
	}
	

	
	echo '</div >';	