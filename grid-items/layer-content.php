<?php
/*
* @Author 		pickplugins
* Copyright: 	2015 pickplugins.com
*/

if ( ! defined('ABSPATH')) exit;  // if direct access

	$class_post_grid_functions = new class_post_grid_functions();
	
	$post_grid_layout_content = get_option( 'post_grid_layout_content' );
	
	if(empty($post_grid_layout_content)){
		$layout = $class_post_grid_functions->layout_content($layout_content);
		}
	else{
		
		if(!empty($post_grid_layout_content[$layout_content])){
			$layout = $post_grid_layout_content[$layout_content];
			
			}
		else{
			$layout = array();
			}
		}
		
	
	//var_dump(get_the_ID());


	$html.='<div class="layer-content">';
	
	$active_plugins = get_option('active_plugins');

	foreach($layout as $item_id=>$item_info){
		
		$item_key = $item_info['key'];
		//$layout_items_html = $class_post_grid_functions->layout_items_html($item_id, $item_info );

		
		
		//var_dump($item_info);

		
		$item_key = $item_info['key'];
		
		if(!empty($item_info['char_limit'])){
			$char_limit = $item_info['char_limit'];	
			}
		else{
			
			$char_limit = 10;
			
			}
			

		if(!empty($item_info['taxonomy'])){
			$taxonomy = $item_info['taxonomy'];	
			}
		else{
			$taxonomy = '';
			}

		if(!empty($item_info['taxonomy_term_count'])){
			$taxonomy_term_count = $item_info['taxonomy_term_count'];	
			}
		else{
			$taxonomy_term_count = '';
			}
			
		//var_dump($taxonomy_term_count);



		if(!empty($item_info['five_star_count'])){
			$five_star_count = $item_info['five_star_count'];	
			}
		else{
			$five_star_count = 0;
			}			
			
		if(!empty($item_info['field_id'])){
			$field_id = $item_info['field_id'];	
			}
		else{
			$field_id = '';
			}			
			
			//var_dump($field_id);
			
			
			
			
			
			
			
			
			
		if(!empty($item_info['link_target'])){
			$link_target = $item_info['link_target'];	
			}			
		else{
			$link_target = '';
			}	
		
			if(!empty($item_info['read_more_text'])){
				$read_more_text = $item_info['read_more_text'];	
				
				//var_dump($read_more_text);
				}
			else{

				$read_more_text = apply_filters('post_grid_filter_grid_item_read_more', __('Read more.', post_grid_textdomain));
				
				
				}		
		
		
		
		
		$item['title'] = '<div class="element element_'.$item_id.' '.$item_key.'"  >'.apply_filters('post_grid_filter_grid_item_title',wp_trim_words(get_the_title($item_post_id), $char_limit,'')).'</div>';
		

		//$item['title'] = '<div class="element element_'.$item_id.' '.$item_key.'"  >'.get_the_ID().'</div>';	
		
		$item['title_link'] = '<a target="'.$link_target.'" class="element element_'.$item_id.' '.$item_key.'" href="'.get_permalink($item_post_id).'">'.apply_filters('post_grid_filter_grid_item_title',wp_trim_words(get_the_title($item_post_id), $char_limit,'')).'</a>';	

		$post_content = apply_filters('the_content', get_the_content($item_post_id));
		
		$item['content'] = '<div class="element element_'.$item_id.' '.$item_key.'"  >'.apply_filters('post_grid_filter_grid_item_content', $post_content).'</div>';
		
		
		$excerpt_removed_shortcode = preg_replace( '|\[(.+?)\](.+?\[/\\1\])?|s', '', strip_shortcodes(get_the_excerpt($item_post_id)));

		$item['excerpt'] = '<div class="element element_'.$item_id.' '.$item_key.'"  >'.apply_filters('post_grid_filter_grid_item_excerpt',wp_trim_words($excerpt_removed_shortcode, $char_limit,'')).'</div>';
		

			
		
		

		$read_more_text = $read_more_text;

		
		$item['excerpt_read_more'] = '<div class="element element_'.$item_id.' '.$item_key.'"  >'.wp_trim_words(strip_shortcodes(get_the_excerpt($item_post_id)), $char_limit,'').' <a target="'.$link_target.'" class="read-more" href="'.get_permalink($item_post_id).'">'.$read_more_text.'</a></div>';
		
		
		
		
		
		
		
		
		
		
		$item['read_more'] = '<a target="'.$link_target.'" class="element element_'.$item_id.' '.$item_key.'"  href="'.get_permalink($item_post_id).'">'.$read_more_text.'</a>';
		
		
		$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($item_post_id), 'full' );
		
		if(!empty($thumb['0'])){
			$thumb_url = $thumb['0'];
			
			}
		else{
			$thumb_url = post_grid_plugin_url.'assets/frontend/css/images/placeholder.png';
			}
		
		$item['thumb'] = '<div class="element element_'.$item_id.' '.$item_key.'"  ><img src="'.$thumb_url.'" /></div>';		
		
		
		
		$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($item_post_id), 'full' );

		
		if(!empty($thumb['0'])){
			$thumb_url = $thumb['0'];

			}
		else{
			$thumb_url = post_grid_plugin_url.'assets/frontend/css/images/placeholder.png';
			}

		
		
		$item['thumb_link'] = '<div class="element element_'.$item_id.' '.$item_key.'"  ><a href="'.get_permalink($item_post_id).'"><img src="'.$thumb_url.'" /></a></div>';
		
		
		$item['post_date'] = '<div class="element element_'.$item_id.' '.$item_key.'"  >'.apply_filters('post_grid_filter_grid_item_post_date', get_the_date()).'</div>';
		
		

		$item['author'] = '<div class="element element_'.$item_id.' '.$item_key.'"  >'.apply_filters('post_grid_filter_grid_item_author', get_the_author()).'</div>';		
		

		$item['author_link'] = '<a class="element element_'.$item_id.' '.$item_key.'" href="'.get_author_posts_url(get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' )).'">'.get_the_author().'</a>';		
		
				$html_categories = '';
				$categories = get_the_category();
				$separator = ' ';
				$output = '';
				if ( ! empty( $categories ) ) {
					foreach( $categories as $category ) {
						$html_categories .= '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '" title="' . esc_attr( sprintf( __( 'View all posts in %s', 'post_grid_textdomain' ), $category->name ) ) . '">' . esc_html( $category->name ) . '</a>' . $separator;
						
	
					}
					$html_categories.= trim( $output, $separator );
				}
		
		
		$item['categories'] = '<div class="element element_'.$item_id.' '.$item_key.'"  >'.$html_categories.'</div>';		
		
		
		$html_tags = '';

		$posttags = get_the_tags();
		if ($posttags) {
		  foreach($posttags as $tag){
			$html_tags.= '<a href="#">'.$tag->name . '</a> ';
			}
		}
		
		$item['tags'] = '<div class="element element_'.$item_id.' '.$item_key.'"  >'.$html_tags.'</div>';		
		
		
		if(in_array( 'rating-widget/rating-widget.php', (array) $active_plugins )){

			$item['rating_widget'] = '<div class="element element_'.$item_id.' '.$item_key.'"  >'.do_shortcode('[ratingwidget post_id="'.$item_post_id.'"]').'</div>';
			}
		else{
			$item['rating_widget'] = '<div class="element element_'.$item_id.' '.$item_key.'"  >'.__('Please activate Rating widget Plugin',post_grid_textdomain).'</div>';
			}
				
		
		
		
		if(in_array( 'yith-woocommerce-wishlist/init.php', (array) $active_plugins )){
			
			$item['yith_add_to_wishlist'] = '<div class="element element_'.$item_id.' '.$item_key.'"  >'.do_shortcode('[yith_wcwl_add_to_wishlist]').'</div>';
			
			}
		
		else{
			$item['yith_add_to_wishlist'] = '<div class="element element_'.$item_id.' '.$item_key.'"  >'.__('Please activate YITH WooCommerce Wishlist Plugin', post_grid_textdomain).'</div>';
			}		
		
		
	
	

			
		$is_product = get_post_type( $item_post_id );

		if(in_array( 'woocommerce/woocommerce.php', (array) $active_plugins ) && $is_product=='product'){
			
			global $woocommerce, $product;
			
			$wc_gallery_html = '';
			$gallery_attachment_ids = array_filter($product->get_gallery_attachment_ids());

			if(!empty($gallery_attachment_ids)){
				
				foreach($gallery_attachment_ids as $id){
					
					$wc_gallery_html.= '<a href="'.wp_get_attachment_url($id).'"><img src="'.wp_get_attachment_thumb_url($id).'" /></a>';
					}
				
				}

				$item['wc_gallery'] = '<div class="element element_'.$item_id.' '.$item_key.'"  >'.$wc_gallery_html.'</div>';


			}
		else{
			
				$item['wc_gallery'] = '<div class="element element_'.$item_id.' '.$item_key.'"  >'.__('Please activate WooCommerce Plugin', post_grid_textdomain).'</div>';
			}				
		
				
		
		
		
		

		
			$is_product = get_post_type( $item_post_id );

			if(in_array( 'woocommerce/woocommerce.php', (array) $active_plugins ) && $is_product=='product'){
				global $woocommerce, $product;
			
				$wc_full_price_html = $product->get_price_html();
				$item['wc_full_price'] = '<div class="element element_'.$item_id.' '.$item_key.'">'.$wc_full_price_html.'</div>';	
			
				}
			else{
				
				$item['wc_full_price'] = '<div class="element element_'.$item_id.' '.$item_key.'"  >'.__('Please activate WooCommerce Plugin', post_grid_textdomain).'</div>';
				}

		
		
		

			
				$is_product = get_post_type($item_post_id);
				
				
				if(in_array( 'woocommerce/woocommerce.php', (array) $active_plugins ) && $is_product=='product'){
					
					global $woocommerce, $product;
					$currency_symbol = get_woocommerce_currency_symbol();
					$sale_price = $product->get_sale_price();
					
					if(!empty($sale_price)){

						$item['wc_sale_price'] = '<div class="element element_'.$item_id.' '.$item_key.'">'.$currency_symbol.$sale_price.'</div>';
						
						}
					else{
						$item['wc_sale_price'] = '';
						}
	
					
					}
	
				else{
					
					$item['wc_sale_price'] = '<div class="element element_'.$item_id.' '.$item_key.'"  >'.__('Please activate WooCommerce Plugin', post_grid_textdomain).'</div>';
					}
		
		
		

			
				$is_product = get_post_type( $item_post_id );

				if(in_array( 'woocommerce/woocommerce.php', (array) $active_plugins ) && $is_product=='product'){
					
					global $woocommerce, $product;
					
					$currency_symbol = get_woocommerce_currency_symbol();
					$regular_price = $product->get_regular_price();
					
					if(!empty($regular_price)){
	
						$item['wc_regular_price'] = '<div class="element element_'.$item_id.' '.$item_key.'"  >'.$currency_symbol.$regular_price.'</div>';	
						}
					else{
						
						$item['wc_regular_price'] = '';	
						}
					}
					
				else{
					
					$item['wc_regular_price'] = '<div class="element element_'.$item_id.' '.$item_key.'"  >'.__('Please activate WooCommerce Plugin', post_grid_textdomain).'</div>';
					}	

		
		
				
		

			
				$is_product = get_post_type( $item_post_id );

				if(in_array( 'woocommerce/woocommerce.php', (array) $active_plugins ) && $is_product=='product'){
					
					global $woocommerce, $product;

					$item['wc_add_to_cart'] = '<div class="element element_'.$item_id.' '.$item_key.'"  >'.do_shortcode('[add_to_cart show_price="false" id="'.$item_post_id.'"]').'</div>';
					}
				
				else{
					
					$item['wc_add_to_cart'] = '<div class="element element_'.$item_id.' '.$item_key.'"  >'.__('Please activate WooCommerce Plugin', post_grid_textdomain).'</div>';
					}	

		
			
		
		

			
				$is_product = get_post_type( $item_post_id );
	
				if(in_array( 'woocommerce/woocommerce.php', (array) $active_plugins ) && $is_product=='product'){
					
					global $woocommerce, $product;
					
					$rating = $product->get_average_rating();
					$rating = (($rating/5)*100);
					
					if( $rating > 0 ){
						
						$wc_rating_star_html = '<div class="woocommerce woocommerce-product-rating"><div class="star-rating" style="color:#444; padding-bottom:10px;" title="'.__('Rated',post_grid_textdomain).' '.$rating.'"><span style="width:'.$rating.'%;"></span></div></div>';
						
						$item['wc_rating_star'] = '<div class="element element_'.$item_id.' '.$item_key.'"  >'.$wc_rating_star_html.'</div>';
						
						}
					else{
						$item['wc_rating_star'] = '';
						
						}
	
				
					
				}
			else{
				
				$item['wc_rating_star'] = '<div class="element element_'.$item_id.' '.$item_key.'"  >'.__('Please activate WooCommerce Plugin', post_grid_textdomain).'</div>';
				}	
		
		
		
		

			
				$is_product = get_post_type( $item_post_id );

				if(in_array( 'woocommerce/woocommerce.php', (array) $active_plugins ) && $is_product=='product'){
					global $woocommerce, $product;
					
					$rating = $product->get_average_rating();
					//$rating = (($rating/5)*100);
					
					if( $rating > 0 ){
						
						$wc_rating_text_html = $rating.' '.__('out of 5',post_grid_textdomain);
						$item['wc_rating_text'] = '<div class="element element_'.$item_id.' '.$item_key.'"  >'.$wc_rating_text_html.'</div>';
						}
					else{
	
						$item['wc_rating_text'] = '';
						
						}

					}
				else{
					
					$item['wc_rating_text'] = '<div class="element element_'.$item_id.' '.$item_key.'"  >'.__('Please activate WooCommerce Plugin', post_grid_textdomain).'</div>';
					}	
		

			
				$is_product = get_post_type( $item_post_id );

			if(in_array( 'woocommerce/woocommerce.php', (array) $active_plugins ) && $is_product=='product'){
					global $woocommerce, $product;
					
					$categories = $product->get_categories();

					$item['wc_categories'] = '<div class="element element_'.$item_id.' '.$item_key.'">'.$categories.'</div>';
				}
			else{
				
				$item['wc_categories'] = '<div class="element element_'.$item_id.' '.$item_key.'"  >'.__('Please activate WooCommerce Plugin', post_grid_textdomain).'</div>';
				}
		
				
		

			
				$is_product = get_post_type( $item_post_id );

				if(in_array( 'woocommerce/woocommerce.php', (array) $active_plugins ) && $is_product=='product'){
					
					global $woocommerce, $product;
					
					$tags = $product->get_tags();					
					$item['wc_tags'] = '<div class="element element_'.$item_id.' '.$item_key.'">'.$tags.'</div>';
					
				}
			else{
					$item['wc_tags'] = '<div class="element element_'.$item_id.' '.$item_key.'"  >'.__('Please activate WooCommerce Plugin', post_grid_textdomain).'</div>';
				}		
					
					
		
				
		

			
				$is_product = get_post_type( $item_post_id );
				$active_plugins = get_option('active_plugins');
				if(in_array( 'woocommerce/woocommerce.php', (array) $active_plugins ) && $is_product=='product'){
				global $woocommerce, $product;
				
				$sku = $product->get_sku();
				
				$item['wc_sku'] = '<div class="element element_'.$item_id.' '.$item_key.'">'.$sku.'</div>';	
				
					
				}
			else{
					$item['wc_sku'] = '<div class="element element_'.$item_id.' '.$item_key.'"  >'.__('Please activate WooCommerce Plugin', post_grid_textdomain).'</div>';
				}
		
		
		
		

		
			$is_download = get_post_type( $item_post_id );

			if(in_array( 'easy-digital-downloads/easy-digital-downloads.php', (array) $active_plugins ) && $is_download=='download'){

				$edd_price = edd_price($item_post_id,false);
				$item['edd_price'] = '<div class="element element_'.$item_id.' '.$item_key.'">'.$edd_price.'</div>';
					
				}
			else{
					$item['edd_price'] = '<div class="element element_'.$item_id.' '.$item_key.'"  >'.__('Please activate Easy Digital Downloads Plugin', post_grid_textdomain).'</div>';
				}
		
		
			
		

			
				$is_download = get_post_type( $item_post_id );

				if(in_array( 'easy-digital-downloads/easy-digital-downloads.php', (array) $active_plugins ) && $is_download=='download'){

					$currency = edd_get_currency(); 
				
					$prices = edd_get_variable_prices( $item_post_id );
					if( $prices ) {
						$edd_variable_prices_html = '';
						$edd_variable_prices_html.= '<ul>';
						foreach( $prices as $price_id => $price ) {
							$edd_variable_prices_html.= '<li>'.$price['name'].': '.$currency.' '.$price['amount'].'</li>';; //is the name of the price
							
						}
						$edd_variable_prices_html.= '</ul>';
						
						$item['edd_variable_prices'] = '<div class="element element_'.$item_id.' '.$item_key.'">'.$edd_variable_prices_html.'</div>';
					}
						
				else{
					$item['edd_variable_prices'] = '';
					}
		
					
					
				}
			else{
					$item['edd_variable_prices'] = '<div class="element element_'.$item_id.' '.$item_key.'"  >'.__('Please activate Easy Digital Downloads Plugin', post_grid_textdomain).'</div>';
				}
		
		
		
		
			

			
				$is_download = get_post_type( $item_post_id );

				if(in_array( 'easy-digital-downloads/easy-digital-downloads.php', (array) $active_plugins ) && $is_download=='download'){

					$sales_stats = edd_get_download_sales_stats( $item_post_id );
					$item['edd_sales_stats'] = '<div class="element element_'.$item_id.' '.$item_key.'">'.$sales_stats.'</div>';
	
					}
				else{
						$item['edd_sales_stats'] = '<div class="element element_'.$item_id.' '.$item_key.'"  >'.__('Please activate Easy Digital Downloads Plugin', post_grid_textdomain).'</div>';
					}
				
		
		
		
		
		

			
				$is_download = get_post_type( $item_post_id );

				if(in_array( 'easy-digital-downloads/easy-digital-downloads.php', (array) $active_plugins ) && $is_download=='download'){

						$earnings_stats = edd_get_download_earnings_stats( $item_post_id );
						
						//var_dump($earnings_stats);
						
						
						if($earnings_stats > 0){
							$item['edd_earnings_stats'] = '<div class="element element_'.$item_id.' '.$item_key.'">'.$earnings_stats.'</div>';
							}
						else{
							$item['edd_earnings_stats'] = '';
							}
						
					
					}
	
				else{
						$item['edd_earnings_stats'] = '<div class="element element_'.$item_id.' '.$item_key.'"  >'.__('Please activate Easy Digital Downloads Plugin', post_grid_textdomain).'</div>';
					}
		
		
		
		
				
		

			
					$is_download = get_post_type( $item_post_id );
	
					if(in_array( 'easy-digital-downloads/easy-digital-downloads.php', (array) $active_plugins ) && $is_download=='download'){
	
						$purchase_link = do_shortcode('[purchase_link id="'.$item_post_id.'" text="'.__('Add to Cart','post_grid_textdomain').'" style="button"]'  );
						$item['edd_add_to_cart'] = '<div class="element element_'.$item_id.' '.$item_key.'">'.$purchase_link.'</div>';
						
					}

				else{
						$item['edd_earnings_stats'] = '<div class="element element_'.$item_id.' '.$item_key.'"  >'.__('Please activate Easy Digital Downloads Plugin', post_grid_textdomain).'</div>';
					}
		
		
				
		
		

			
					$is_download = get_post_type( $item_post_id );
	
					if(in_array( 'easy-digital-downloads/easy-digital-downloads.php', (array) $active_plugins ) && $is_download=='download'){
	
						$term_list = wp_get_post_terms($item_post_id, 'download_category', array("fields" => "all"));
						
						if( $term_list ) {
							$edd_categories_html = '';
		
							foreach( $term_list as $term ) {
								$edd_categories_html.= '<a href="#">'.$term->name.'</a>, '; //is the name of the price
							}
		
						}
						
	
						$item['edd_categories'] = '<div class="element element_'.$item_id.' '.$item_key.'">'.$edd_categories_html.'</div>';	
					}

				else{
						$item['edd_categories'] = '<div class="element element_'.$item_id.' '.$item_key.'"  >'.__('Please activate Easy Digital Downloads Plugin', post_grid_textdomain).'</div>';
					}
		
		
		
					
		
		
		
		
		

			
					$is_download = get_post_type( $item_post_id );
	
					if(in_array( 'easy-digital-downloads/easy-digital-downloads.php', (array) $active_plugins ) && $is_download=='download'){
	
						$term_list = wp_get_post_terms($item_post_id, 'download_tag', array("fields" => "all"));
						$edd_tags_html = '';
						
						
						if( $term_list ) {
							
		
							foreach( $term_list as $term ) {
								$edd_tags_html.= '<a href="#">'.$term->name.'</a>, '; //is the name of the price
							}
		
						}
					
	
						$item['edd_tags'] = '<div class="element element_'.$item_id.' '.$item_key.'">'.$edd_tags_html.'</div>';
					}
				else{
						$item['edd_tags'] = '<div class="element element_'.$item_id.' '.$item_key.'"  >'.__('Please activate Easy Digital Downloads Plugin', post_grid_textdomain).'</div>';
					}
		
		
		
		
			

			
				$is_product = get_post_type( $item_post_id );

				if(in_array( 'wp-e-commerce/wp-shopping-cart.php', (array) $active_plugins ) && $is_product=='wpsc-product'){
	
	
					$item['WPeC_old_price'] = '<div class="element element_'.$item_id.' '.$item_key.'">'.wpsc_product_normal_price().'</div>';	
					}
				else{
						$item['WPeC_old_price'] = '<div class="element element_'.$item_id.' '.$item_key.'"  >'.__('Please activate WP eCommerce Plugin', post_grid_textdomain).'</div>';
					}
		
		
		

			
				$is_product = get_post_type( $item_post_id );

				if(in_array( 'wp-e-commerce/wp-shopping-cart.php', (array) $active_plugins ) && $is_product=='wpsc-product'){

						$item['WPeC_sale_price'] = '<div class="element element_'.$item_id.' '.$item_key.'">'.wpsc_the_product_price().'</div>';
					}
				else{
						$item['WPeC_sale_price'] = '<div class="element element_'.$item_id.' '.$item_key.'"  >'.__('Please activate WP eCommerce Plugin', post_grid_textdomain).'</div>';
					}

			
				$is_product = get_post_type( $item_post_id );

				if(in_array( 'wp-e-commerce/wp-shopping-cart.php', (array) $active_plugins ) && $is_product=='wpsc-product'){

						$item['WPeC_rating_star'] = '<div class="element element_'.$item_id.' '.$item_key.'">'.wpsc_product_rater().'</div>';
					
					}
				else{
						$item['WPeC_sale_price'] = '<div class="element element_'.$item_id.' '.$item_key.'"  >'.__('Please activate WP eCommerce Plugin', post_grid_textdomain).'</div>';
					}
				

			
				$is_product = get_post_type( $item_post_id );

				if(in_array( 'wp-e-commerce/wp-shopping-cart.php', (array) $active_plugins ) && $is_product=='wpsc-product'){

					$term_list = wp_get_post_terms($item_post_id, 'wpsc_product_category', array("fields" => "all"));
					
					if( $term_list ) {
						$WPeC_categories_html = '';
	
						foreach( $term_list as $term ) {
							$WPeC_categories_html.= '<a href="#">'.$term->name.'</a>, '; //is the name of the price
						}
	
					}
					
		
					$item['WPeC_categories'] = '<div class="element element_'.$item_id.' '.$item_key.'">'.$WPeC_categories_html.'</div>';
				}

			else{
					$item['WPeC_categories'] = '<div class="element element_'.$item_id.' '.$item_key.'"  >'.__('Please activate WP eCommerce Plugin', post_grid_textdomain).'</div>';
				}
				
		
		
		

			
				$is_product = get_post_type( $item_post_id );

				if(in_array( 'wp-e-commerce/wp-shopping-cart.php', (array) $active_plugins ) && $is_product=='wpsc-product'){

					$term_list = wp_get_post_terms($item_post_id, 'product_tag', array("fields" => "all"));
					
					if( $term_list ) {
						$WPeC_tags_html = '';
	
						foreach( $term_list as $term ) {
							$WPeC_tags_html.= '<a href="#">'.$term->name.'</a>, '; //is the name of the price
						}
	
					}
				

					$item['WPeC_tags'] = '<div class="element element_'.$item_id.' '.$item_key.'">'.$WPeC_tags_html.'</div>';	
				}

			else{
					$item['WPeC_tags'] = '<div class="element element_'.$item_id.' '.$item_key.'"  >'.__('Please activate WP eCommerce Plugin', post_grid_textdomain).'</div>';
				}
		
		
				
		
			if($five_star_count<=0){
					$five_star_html = '';
				
					for($i=1; $i<=$five_star_count;$i++){
					
						$five_star_html.= '<i class="fa fa-star" aria-hidden="true"></i>';
						}
					$item['five_star'] = '<div class="element element_'.$item_id.' '.$item_key.'"  >'.$five_star_html.'</div>';	
				}
			else{
				$item['five_star'] = '';
				
				}

			


		
		
		$item['up_arrow'] = '<div class="element element_'.$item_id.' '.$item_key.'"  ></div>';			
		$item['down_arrow'] = '<div class="element element_'.$item_id.' '.$item_key.'"  ></div>';			
		
		
		
		
	
			
		$share_button_html = '';
		
		$share_button_html.= '
		<span class="fb">
			<a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u='.get_permalink().'"> </a>
		</span>
		<span class="twitter">
			<a target="_blank" href="https://twitter.com/intent/tweet?url='.get_permalink().'&text='.get_the_title().'"></a>
		</span>
		<span class="gplus">
			<a target="_blank" href="https://plus.google.com/share?url='.get_permalink().'"></a>
		</span>';
		
		$share_button_html = apply_filters('post_grid_filter_share_buttons', $share_button_html);			


		
		$item['share_button'] = '<div class="element element_'.$item_id.' '.$item_key.'">'.$share_button_html.'</div>';			
		

		
		$item['hr'] = '<hr class="element element_'.$item_id.' '.$item_key.'"  />';		
		
		
		
		
		
		
		if(!empty($item_info['field_id'])){
			
				$meta_value = get_post_meta($item_post_id, $item_info['field_id'],true);
			}
		else{
				$meta_value = '';
			}
			
			
			//var_dump($item_info['field_id']);
			
		if(!empty($item_info['wrapper'])){
			$wrapper = $item_info['wrapper'];
			
			}
		else{
			$wrapper = '%s';
			}
				
			
		if(!empty($meta_value)){
			

			$meta_key_html = str_replace('%s',do_shortcode($meta_value),$wrapper);

			$item['meta_key'] = '<div class="element element_'.$item_id.' '.$item_key.'">'.$meta_key_html.'</div>';
			
			}
		else{
			$item['meta_key'] = '';
			}
		
		
		
		
		if(!empty($item_info['html'])){
			
			$custom_html = $item_info['html'];
			}
		else{
			$custom_html = '';
			}

			if(!empty($custom_html)){

				$item['html'] = '<div class="element element_'.$item_id.' '.$item_key.'">'.do_shortcode($custom_html).'</div>';
				
				}		
			else{
				
				$item['html'] = '';
				}


				$term_list = wp_get_post_terms($item_post_id, $taxonomy, array("fields" => "all"));

				//$taxonomy_term_count;

				$total_term = count($term_list);
				//$total_term = $taxonomy_term_count;
				//var_dump($total_term);


				$custom_taxonomy_html = '';
				if(!empty($term_list)){
					
					$i=1;
					foreach($term_list as $term){
						$term_link = get_term_link( $term->term_id );
						$custom_taxonomy_html.= '<a href="'.$term_link.'">'.$term->name.'</a>';
						
						if($taxonomy_term_count==$i){
							//$custom_taxonomy_html.= ' , ';
							
							break;
							}						
						
						if($total_term>$i){
							$custom_taxonomy_html.= ' , ';
							}
							
							
						$i++;
						}
						
						$item['custom_taxonomy'] = '<div class="element element_'.$item_id.' '.$item_key.'">'.$custom_taxonomy_html.'</div>';
						
					}
				else{
					
					$item['custom_taxonomy'] = '';
					}

		
		
					
					
					
					
					
					
					
					
			$comments_html = '';
			$comments_html.= '<h3 class="comment-content ">'.__('Comments', post_grid_textdomain).'</h3>';
			
			
			$comments_count =  wp_count_comments($item_post_id);
			$total_comments = $comments_count->approved;
			
			//var_dump($item_post_id);
	
			
			if($total_comments <= 0)
				{
	
					$comments_html.= '<div class="comment no-comment">';
					$comments_html.= '<p class="comment-content ">'.__('No comments yet', post_grid_textdomain).'</p>';											
					
					$comments_html.= '</div>';
					
				}
			else
				{
	
					
					$comments = get_comments(array(
						'post_id' => $item_post_id,
						'status' => 'approve',
						'number' => 5,				
						'order' => 'ASC',
					));
			
	
	
	
					if(empty($comments))
						{
	
							$comments_html.= '<div class="comment no-more-comment">';
							$comments_html.= '<p class="comment-content ">'.__('No more comments', post_grid_textdomain).'';											
							$comments_html.= '</p>';							
							$comments_html.= '</div>';
	
						}
					else
						{
							
							$comments_html.= '<div id="comments" class="comments-area">';							
							$comments_html.= '<ol class="commentlist">';
							
							foreach($comments as $comment) :
							
							
								$comment_ID = $comment->comment_ID;
								$comment_author = $comment->comment_author;							
								$comment_author_email = $comment->comment_author_email;
								$comment_content = $comment->comment_content;						
								$comment_date = $comment->comment_date;						
							
							
							
							
								$comments_html.= '<li class="comment">';
								$comments_html.= '<article id="" class="comment">';	
								$comments_html.= '<header class="comment-meta comment-author vcard">';
								
								$comments_html.= get_avatar($comment_author_email, 50);	
								
								$comments_html.= '<cite><b class="fn">'.$comment_author.'</b></cite>';								
								$comments_html.= '<time >'.$comment_date.'</time>';								
																									
								$comments_html.= '</header>';								
								$comments_html.= '<section class="comment-content comment">';
								$comments_html.= '<p>'.$comment_content.'</p>';									
								$comments_html.= '</section>';															

								$comments_html.= '</article>';								
													
								$comments_html.= '</li>';
								
							endforeach;
							
							$comments_html.= '</ol>';
							$comments_html.= '</div>';							
							
						}
	
	
	
				
				}

		

		$item['comments'] = '<div class="element element_'.$item_id.' '.$item_key.'">'.$comments_html.'</div>';					
		
		
		
		
		

			
				$comments_number = get_comments_number( $item_post_id );
				
				$comments_count_html = '';
				
				if(comments_open()){
					
					
					if ( $comments_number == 0 ) {
							$comments_count_html.= __('No Comments',post_grid_textdomain);
						} elseif ( $comments_number > 1 ) {
							$comments_count_html.= $comments_number . __(' Comments', post_grid_textdomain);
						} else {
							$comments_count_html.= __('1 Comment', post_grid_textdomain);
						}
		
						$item['comments_count'] = '<div class="element element_'.$item_id.' '.$item_key.'">'.$comments_count_html.'</div>';	
		
					}
				else{
					
					$item['comments_count'] = '';
					}
		
		
	
		
		//$item = apply_filters('post_grid_filter_layout_items_html', $item_id, $item, $item_info);
		
		$html.= $item[$item_key];
		
		
		
		
		
			
			
			
			
			
			
			
			//$html.= $layout_items_html;
			
			//var_dump($item_post_id);

		}
	
	$html.='</div>'; // .layer-content