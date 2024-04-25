<?php
/*
* @Author 		pickplugins
* Copyright: 	2015 pickplugins.com
*/

if ( ! defined('ABSPATH')) exit;  // if direct access

	global $post;
	$post_grid_meta_options = get_post_meta( $post_id, 'post_grid_meta_options', true );
	
	if(!empty($post_grid_meta_options['post_types'])){
		$post_types = $post_grid_meta_options['post_types'];
		}
	else{
		$post_types = array('post');
		}
	
	
	if(!empty($post_grid_meta_options['categories'])){
		$categories = $post_grid_meta_options['categories'];
		}
	else{
		$categories = array();
		}

	if(!empty($post_grid_meta_options['categories_relation'])){
		$categories_relation = $post_grid_meta_options['categories_relation'];
		}
	else{
		$categories_relation = 'OR';
		}

	if(!empty($post_grid_meta_options['terms_relation'])){
		$terms_relation = $post_grid_meta_options['terms_relation'];
		}
	else{
		$terms_relation = 'IN';
		}


	if(!empty($post_grid_meta_options['extra_query_parameter'])){
		$extra_query_parameter = $post_grid_meta_options['extra_query_parameter'];
		}
	else{
		$extra_query_parameter = '';
		}


	if(!empty($post_grid_meta_options['post_status'])){
		$post_status = $post_grid_meta_options['post_status'];	
		}
	else{
		$post_status = 'publish';	
		}
	
	
	
	if(!empty($post_grid_meta_options['offset'])){
		
		$offset = (int)$post_grid_meta_options['offset'];
		}
	else{
		$offset = '';
		}
	
	
	//var_dump($offset);
	
	if(!empty($post_grid_meta_options['posts_per_page'])){
		$posts_per_page = $post_grid_meta_options['posts_per_page'];
		}
	else{
		$posts_per_page = -1;
		}
	
	
	if(!empty($post_grid_meta_options['exclude_post_id'])){
		$exclude_post_id = $post_grid_meta_options['exclude_post_id'];
		}
	else{
		$exclude_post_id = '';
		}
	
	
	if(!empty($post_grid_meta_options['query_order'])){
		$query_order = $post_grid_meta_options['query_order'];
		}
	else{
		$query_order = 'DESC';
		}
		
	
	if(!empty($post_grid_meta_options['query_orderby'])){
		$query_orderby = $post_grid_meta_options['query_orderby'];
		}
	else{
		$query_orderby = 'date';
		}
	
	//var_dump($query_orderby);
	
	$query_orderby = implode(' ', $query_orderby);
	
	//var_dump($query_orderby);
/*

	var_dump($query_orderby);
	
	$query_orderby_count = count($query_orderby);
	
	var_dump($query_orderby_count);
	$str_orderby = '';
	if($query_orderby_count>1){
		
		
		foreach($query_orderby as $orderby){
			
			$str_orderby.= $orderby.' ';
			
			}
		
		}
$query_orderby = $str_orderby;
*/
		
	
		
	
	
	if(!empty($post_grid_meta_options['query_orderby_meta_key'])){
		$query_orderby_meta_key = $post_grid_meta_options['query_orderby_meta_key'];
		}
	else{
		$query_orderby_meta_key = '';
		}
	
	
	if(!empty($post_grid_meta_options['meta_query'])){
		$meta_query = $post_grid_meta_options['meta_query'];
		
		//var_dump($meta_query);
		
		foreach($meta_query as $query_id=>$query){
			
			$key = $query['key'];
			$value = do_shortcode($query['value']);			
			$compare = $query['compare'];
			$type = $query['type'];			
			
						
			$meta_query_new[$query_id] = array(
										'key'=>$key,
										'value'=>$value,
										'compare'=>$compare,
										'type'=>$type,
										
											);
			
			 
			}
		
		$meta_query = $meta_query_new;
		
		//var_dump($meta_query);
		//var_dump(do_shortcode('[post_grid_today_date]'));		
		
		}
	else{
		$meta_query = array();
		}
	
	
	if(!empty($post_grid_meta_options['meta_query_relation'])){
		
		$meta_query_relation = $post_grid_meta_options['meta_query_relation'];	
		}
	else{
		$meta_query_relation = 'OR';
		}	
	
	
	if(!empty($post_grid_meta_options['keyword'])){
		
		$keyword = $post_grid_meta_options['keyword'];	
		}
	else{
		$keyword = '';
		}
	
	
	
	if(!empty($post_grid_meta_options['grid_layout']['name'])){
		
		$grid_layout_name = $post_grid_meta_options['grid_layout']['name'];	
		}
	else{
		$grid_layout_name = 'layout_grid';
		}	
	
	
	if(!empty($post_grid_meta_options['grid_layout']['col_multi'])){
		
		$grid_layout_col_multi = $post_grid_meta_options['grid_layout']['col_multi'];	
		}
	else{
		$grid_layout_col_multi = 2;
		}
	
	
	
	
	
	
	
	if(!empty($post_grid_meta_options['layout']['content'])){
		$layout_content = $post_grid_meta_options['layout']['content'];	
		}
	else{
		$layout_content = 'flat';
		}
	
	
	if(!empty($post_grid_meta_options['layout']['hover'])){
		$layout_hover = $post_grid_meta_options['layout']['hover'];
		}
	else{
		$layout_hover = 'flat';
		}
	
	
	if(!empty($post_grid_meta_options['enable_multi_skin'])){
		$enable_multi_skin = $post_grid_meta_options['enable_multi_skin'];	
		}
	else{
		$enable_multi_skin = 'no';	
		
		}	
	
	
	if(!empty($post_grid_meta_options['skin'])){
		$skin = $post_grid_meta_options['skin'];	
		}
	else{
		$skin = 'flat';	
		
		}
	
	if(!empty($post_grid_meta_options['custom_js'])){
		$custom_js = $post_grid_meta_options['custom_js'];
		}
	else{
		$custom_js = '';
		}
		
	
	if(!empty($post_grid_meta_options['custom_css'])){
		$custom_css = $post_grid_meta_options['custom_css'];
		}
	else{
		$custom_css = '';
		}
	
		

	if(!empty($post_grid_meta_options['masonry_enable'])){
		
		$masonry_enable = $post_grid_meta_options['masonry_enable'];
		}
	else{
		$masonry_enable = 'no';
		
		}


	if(!empty($post_grid_meta_options['lazy_load_enable'])){
		
		$lazy_load_enable = $post_grid_meta_options['lazy_load_enable'];
		}
	else{
		$lazy_load_enable = 'no';
		
		}
		
	if(!empty($post_grid_meta_options['lazy_load_image_src'])){
		
		$lazy_load_image_src = $post_grid_meta_options['lazy_load_image_src'];
		}
	else{
		$lazy_load_image_src = post_grid_plugin_url.'assets/admin/gif/ajax-loader-1.gif';
		
		}








	
	if(!empty($post_grid_meta_options['width']['desktop'])){
		
		$items_width_desktop = $post_grid_meta_options['width']['desktop'];
		}
	else{
		$items_width_desktop = '';
		
		}
		
		
	if(!empty($post_grid_meta_options['width']['tablet'])){
		
		$items_width_tablet = $post_grid_meta_options['width']['tablet'];
		}
	else{
		$items_width_tablet = '';
		
		}		
		
	if(!empty($post_grid_meta_options['width']['mobile'])){
		
		$items_width_mobile = $post_grid_meta_options['width']['mobile'];
		}
	else{
		$items_width_mobile = '';
		
		}	
		
		
		
	if(!empty($post_grid_meta_options['items_bg_color_type'])){
		
		$items_bg_color_type = $post_grid_meta_options['items_bg_color_type'];
		}
	else{
		$items_bg_color_type = 'fixed';
		
		}		
		
		
	if(!empty($post_grid_meta_options['items_bg_color'])){
		
		$items_bg_color = $post_grid_meta_options['items_bg_color'];
		}
	else{
		$items_bg_color = '#fff';
		
		}		
		
		
	if(!empty($post_grid_meta_options['item_height']['style'])){
		
		$items_height_style = $post_grid_meta_options['item_height']['style'];
		}
	else{
		$items_height_style = 'auto_height';
		
		}				
			
			
	if(!empty($post_grid_meta_options['item_height']['fixed_height'])){
		
		$items_fixed_height = $post_grid_meta_options['item_height']['fixed_height'];
		}
	else{
		$items_fixed_height = '220px';
		
		}
		
		
	if(!empty($post_grid_meta_options['item_height']['fixed_height_tablet'])){
		
		$items_fixed_height_tablet = $post_grid_meta_options['item_height']['fixed_height_tablet'];
		}
	else{
		$items_fixed_height_tablet = '220px';
		
		}		
		
		
	if(!empty($post_grid_meta_options['item_height']['fixed_height_mobile'])){
		
		$items_fixed_height_mobile = $post_grid_meta_options['item_height']['fixed_height_mobile'];
		}
	else{
		$items_fixed_height_mobile = '220px';
		
		}
		
		
		
		
		
		
		
		
	if(!empty($post_grid_meta_options['media_height']['style'])){
		
		$items_media_height_style = $post_grid_meta_options['media_height']['style'];
		}
	else{
		$items_media_height_style = 'auto_height';
		
		}				
			
	if(!empty($post_grid_meta_options['media_height']['fixed_height'])){
		
		$items_media_fixed_height = $post_grid_meta_options['media_height']['fixed_height'];
		}
	else{
		$items_media_fixed_height = '';
		
		}
		
		
	if(!empty($post_grid_meta_options['media_source'])){
		
		$media_source = $post_grid_meta_options['media_source'];
		}
	else{
		$media_source = array();
		
		}
		
	if(!empty($post_grid_meta_options['featured_img_size'])){
		
		$featured_img_size = $post_grid_meta_options['featured_img_size'];
		}
	else{
		$featured_img_size = 'full';
		
		}		
		
		
	if(!empty($post_grid_meta_options['thumb_linked'])){
		
		$thumb_linked = $post_grid_meta_options['thumb_linked'];
		}
	else{
		$thumb_linked = 'yes';
		
		}		
		
			
			
	if(!empty($post_grid_meta_options['margin'])){
		
		$items_margin = $post_grid_meta_options['margin'];
		}
	else{
		$items_margin = '';
		
		}
		
	if(!empty($post_grid_meta_options['container']['padding'])){
		
		$container_padding = $post_grid_meta_options['container']['padding'];
		}
	else{
		$container_padding = '';
		
		}	
		
	if(!empty($post_grid_meta_options['container']['bg_color'])){
		
		$container_bg_color = $post_grid_meta_options['container']['bg_color'];
		}
	else{
		$container_bg_color = '';
		
		}		
		
		
	if(!empty($post_grid_meta_options['container']['bg_image'])){
		
		$container_bg_image = $post_grid_meta_options['container']['bg_image'];
		}
	else{
		$container_bg_image = '';
		
		}				
		
		
		
		
	if(!empty($post_grid_meta_options['grid_type'])){
		
		$grid_type = $post_grid_meta_options['grid_type'];
		}
	else{
		$grid_type = 'grid';
		
		}		
		
		
		
		
		
	if(!empty($post_grid_meta_options['nav_top']['filter'])){
		
		$nav_top_filter = $post_grid_meta_options['nav_top']['filter'];
		}
	else{
		$nav_top_filter = 'none';
		
		}		
		
		
		
		
		
		
		
		
		
		
		
		
		
	if(!empty($post_grid_meta_options['nav_top']['filterable_post_per_page'])){
		
		$filterable_post_per_page = $post_grid_meta_options['nav_top']['filterable_post_per_page'];
		}
	else{
		$filterable_post_per_page = '3';
		
		}		
		
		
	if(!empty($post_grid_meta_options['nav_top']['filter_all_text'])){
		
		$filterable_filter_all_text = $post_grid_meta_options['nav_top']['filter_all_text'];
		}
	else{
		$filterable_filter_all_text = __('All', post_grid_textdomain);
		
		}	
		
		
		
	if(!empty($post_grid_meta_options['nav_top']['filterable_font_size'])){
		
		$filterable_font_size = $post_grid_meta_options['nav_top']['filterable_font_size'];
		}
	else{
		$filterable_font_size = '17px';
		
		}		
		
		
		
	if(!empty($post_grid_meta_options['nav_top']['filterable_font_color'])){
		
		$filterable_font_color = $post_grid_meta_options['nav_top']['filterable_font_color'];
		}
	else{
		$filterable_font_color = '#fff';
		
		}		
		
		
	if(!empty($post_grid_meta_options['nav_top']['filterable_bg_color'])){
		
		$filterable_bg_color = $post_grid_meta_options['nav_top']['filterable_bg_color'];
		}
	else{
		$filterable_bg_color = '#646464';
		
		}		
		
		
	if(!empty($post_grid_meta_options['nav_top']['filterable_active_bg_color'])){
		
		$filterable_active_bg_color = $post_grid_meta_options['nav_top']['filterable_active_bg_color'];
		}
	else{
		$filterable_active_bg_color = '#4b4b4b';
		
		}		
		
				
		
		
		
		
		
	if(!empty($post_grid_meta_options['nav_top']['active_filter'])){
		
		$active_filter = $post_grid_meta_options['nav_top']['active_filter'];
		}
	else{
		$active_filter = 'all';
		
		}	
		
		
	if(!empty($post_grid_meta_options['nav_top']['search'])){
		
		$nav_top_search = $post_grid_meta_options['nav_top']['search'];
		}
	else{
		$nav_top_search = 'no';
		
		}		
		
		
	if(!empty($post_grid_meta_options['slider_navs'])){
		
		$slider_navs = $post_grid_meta_options['slider_navs'];
		}
	else{
		$slider_navs = 'true';
		
		}			
		
		
	if(!empty($post_grid_meta_options['slider_navs_positon'])){
		
		$slider_navs_positon = $post_grid_meta_options['slider_navs_positon'];
		}
	else{
		$slider_navs_positon = 'middle';
		
		}			
		
	if(!empty($post_grid_meta_options['slider_navs_style'])){
		
		$slider_navs_style = $post_grid_meta_options['slider_navs_style'];
		}
	else{
		$slider_navs_style = 'round';
		
		}		
		
		
		
	if(!empty($post_grid_meta_options['slider_dots'])){
		
		$slider_dots = $post_grid_meta_options['slider_dots'];
		}
	else{
		$slider_dots = 'true';
		
		}		
		
		
	if(!empty($post_grid_meta_options['slider_dots_style'])){
		
		$slider_dots_style = $post_grid_meta_options['slider_dots_style'];
		}
	else{
		$slider_dots_style = 'round';
		
		}		
		
		
	if(!empty($post_grid_meta_options['slider_dots_bg_color'])){
		
		$slider_dots_bg_color = $post_grid_meta_options['slider_dots_bg_color'];
		}
	else{
		$slider_dots_bg_color = '#e6e6e6';
		
		}		
		
		
		
	if(!empty($post_grid_meta_options['slider_auto_play'])){
		
		$slider_auto_play = $post_grid_meta_options['slider_auto_play'];
		}
	else{
		$slider_auto_play = 'true';
		
		}	
		
		
	if(!empty($post_grid_meta_options['slider_rewind'])){
		
		$slider_rewind = $post_grid_meta_options['slider_rewind'];
		}
	else{
		$slider_rewind = 'false';
		
		}		
		
		
	if(!empty($post_grid_meta_options['slider_loop'])){
		
		$slider_loop = $post_grid_meta_options['slider_loop'];
		}
	else{
		$slider_loop = 'true';
		
		}		
		
		
	if(!empty($post_grid_meta_options['slider_center'])){
		
		$slider_center = $post_grid_meta_options['slider_center'];
		}
	else{
		$slider_center = 'false';
		
		}		
		
		
	if(!empty($post_grid_meta_options['slider_autoplayHoverPause'])){
		
		$slider_autoplayHoverPause = $post_grid_meta_options['slider_autoplayHoverPause'];
		}
	else{
		$slider_autoplayHoverPause = 'true';
		
		}		
		
		
	if(!empty($post_grid_meta_options['slider_dotsSpeed'])){
		
		$slider_dotsSpeed = $post_grid_meta_options['slider_dotsSpeed'];
		}
	else{
		$slider_dotsSpeed = '1000';
		
		}		
		
		
	if(!empty($post_grid_meta_options['slider_navSpeed'])){
		
		$slider_navSpeed = $post_grid_meta_options['slider_navSpeed'];
		}
	else{
		$slider_navSpeed = '1000';
		
		}		
		
	if(!empty($post_grid_meta_options['slider_mouseDrag'])){
		
		$slider_mouseDrag = $post_grid_meta_options['slider_mouseDrag'];
		}
	else{
		$slider_mouseDrag = 'true';
		
		}		
		
	if(!empty($post_grid_meta_options['slider_touchDrag'])){
		
		$slider_touchDrag = $post_grid_meta_options['slider_touchDrag'];
		}
	else{
		$slider_touchDrag = 'true';
		
		}		
			

	if(!empty($post_grid_meta_options['slider_column_desktop'])){
		
		$slider_column_desktop = $post_grid_meta_options['slider_column_desktop'];
		}
	else{
		$slider_column_desktop = 4;
		
		}			
		
		
	if(!empty($post_grid_meta_options['slider_column_tablet'])){
		
		$slider_column_tablet = $post_grid_meta_options['slider_column_tablet'];
		}
	else{
		$slider_column_tablet = 2;
		
		}			
		
	if(!empty($post_grid_meta_options['slider_column_mobile'])){
		
		$slider_column_mobile = $post_grid_meta_options['slider_column_mobile'];
		}
	else{
		$slider_column_mobile = 1;
		
		}	


	
		
		
	if(!empty($post_grid_meta_options['nav_bottom']['pagination_type'])){
		
		$pagination_type = $post_grid_meta_options['nav_bottom']['pagination_type'];
		}
	else{
		$pagination_type = 'normal';
		
		}		
		
		
	if(!empty($post_grid_meta_options['pagination']['max_num_pages'])){
		
		$max_num_pages = $post_grid_meta_options['pagination']['max_num_pages'];
		}
	else{
		$max_num_pages = 0;
		
		}
		
		
	if(!empty($post_grid_meta_options['pagination']['prev_text'])){
		
		$pagination_prev_text = $post_grid_meta_options['pagination']['prev_text'];
		}
	else{
		$pagination_prev_text = '« Previous';
		
		}		
		
		
	if(!empty($post_grid_meta_options['pagination']['next_text'])){
		
		$pagination_next_text = $post_grid_meta_options['pagination']['next_text'];
		}
	else{
		$pagination_next_text = 'Next »';
		
		}
		
	if(!empty($post_grid_meta_options['pagination']['font_size'])){
		
		$pagination_font_size = $post_grid_meta_options['pagination']['font_size'];
		}
	else{
		$pagination_font_size = '17px';
		
		}		
		
		
	if(!empty($post_grid_meta_options['pagination']['font_color'])){
		
		$pagination_font_color = $post_grid_meta_options['pagination']['font_color'];
		}
	else{
		$pagination_font_color = '#646464';
		
		}		
		
	if(!empty($post_grid_meta_options['pagination']['bg_color'])){
		
		$pagination_bg_color = $post_grid_meta_options['pagination']['bg_color'];
		}
	else{
		$pagination_bg_color = '#646464';
		
		}		
		
		
	if(!empty($post_grid_meta_options['pagination']['active_bg_color'])){
		
		$pagination_active_bg_color = $post_grid_meta_options['pagination']['active_bg_color'];
		}
	else{
		$pagination_active_bg_color = '#4b4b4b';
		
		}
		


		
		if(empty($exclude_post_id))
			{
				$exclude_post_id = array();
			}
		else
			{
				$exclude_post_id = array_map('intval',explode(',',$exclude_post_id));
			}
		

		
		if ( get_query_var('paged') ) {
		
			$paged = get_query_var('paged');
		
		} elseif ( get_query_var('page') ) {
		
			$paged = get_query_var('page');
		
		} else {
		
			$paged = 1;
		
		}















