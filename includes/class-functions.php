<?php

/*
* @Author 		pickplugins
* Copyright: 	2015 pickplugins.com
*/

if ( ! defined('ABSPATH')) exit;  // if direct access

class class_post_grid_functions{
	
	public function __construct(){
		
		
		}
	

	
	public function load_more_text(){
											
			$load_more_text = apply_filters('post_grid_filter_load_more_text', __('Load more', post_grid_textdomain));				
								
			return $load_more_text;

		}	
	
	
	
	
	
	
	
	public function items_bg_color_values(){
		
						$color_values = array(	'#ff398a',
												'#f992fb',
												'#eaca93',
												'#8ed379',
												'#8b67a5',
												'#f6b8ad',
												'#73d4b4',
												'#00c5cd',
												'#ff8247',
												'#ff6a6a',
												'#00ced1',
												'#ff7256',
												'#777777',
												'#067668',												
												);
											
						$color_values = apply_filters('post_grid_filter_items_bg_color_values', $color_values);				
											
						return $color_values;
											
		
		}	
	
	
	
	
	
	public function media_source(){
		
						$media_source = array(
												'featured_image' =>array('id'=>'featured_image','title'=>__('Featured Image', post_grid_textdomain),'checked'=>'yes'),
												'first_image'=>array('id'=>'first_image','title'=>__('First images from content', post_grid_textdomain),'checked'=>'yes'),
												'first_gallery'=>array('id'=>'first_gallery','title'=>__('First gallery from content', post_grid_textdomain),'checked'=>'yes'),	
																							
												'first_youtube'=>array('id'=>'first_youtube','title'=>__('First youtube video from content', post_grid_textdomain),'checked'=>'yes'),	
												'custom_youtube'=>array('id'=>'custom_youtube','title'=>__('Custom youtube video', post_grid_textdomain),'checked'=>'yes'),															
												'first_vimeo'=>array('id'=>'first_vimeo','title'=>__('First vimeo video from content', post_grid_textdomain),'checked'=>'yes'),
												'custom_vimeo'=>array('id'=>'custom_vimeo','title'=>__('Custom vimeo video', post_grid_textdomain),'checked'=>'yes'),	
												'first_dailymotion'=>array('id'=>'first_dailymotion','title'=>__('First dailymotion video from content', post_grid_textdomain),'checked'=>'yes'),												
												'custom_dailymotion'=>array('id'=>'custom_dailymotion','title'=>__('Custom dailymotion video', post_grid_textdomain),'checked'=>'yes'),													
												'first_mp3'=>array('id'=>'first_mp3','title'=>__('First MP3 from content', post_grid_textdomain),'checked'=>'yes'),
												'custom_mp3'=>array('id'=>'custom_mp3','title'=>__('Custom MP3', post_grid_textdomain),'checked'=>'yes'),												
												'first_soundcloud'=>array('id'=>'first_soundcloud','title'=>__('First SoundCloud from content', post_grid_textdomain),'checked'=>'yes'),
												'custom_soundcloud'=>array('id'=>'custom_soundcloud','title'=>__('Custom SoundCloud', post_grid_textdomain),'checked'=>'yes'),												
												'empty_thumb'=>array('id'=>'empty_thumb','title'=>__('Empty thumbnail', post_grid_textdomain),'checked'=>'yes'),	
												'custom_thumb'=>array('id'=>'custom_thumb','title'=>__('Custom Thumbnail', post_grid_textdomain),'checked'=>'yes'),
												'font_awesome'=>array('id'=>'font_awesome','title'=>__('Font Awesome', post_grid_textdomain),'checked'=>'yes'),

												'custom_video'=>array('id'=>'custom_video','title'=>__('Custom Video', post_grid_textdomain),'checked'=>'yes'),

						);
											
						$media_source = apply_filters('post_grid_filter_media_source', $media_source);				
											
						return $media_source;
											
		
		}
	
	
	public function layout_items(){
		
		$layout_items = array(
							
							/*Default Post Stuff*/
							'title'=>array(	
											'name'=>'Title',
											'dummy_html'=>'Lorem Ipsum is simply.',
											'css'=>'display: block;font-size: 21px;line-height: normal;padding: 5px 10px;text-align: left;',
											
											'style'=>array(
															'font-size'=>'',
															'color'=>'',
															'font-family'=>'',
															'line-height'=>'',
															'font-weight'=>'',
															'text-decoration'=>'',
															'text-transform'=>'',
															'font-style'=>'',
															
															'position'=>'',
															'display'=>'',
															'float'=>'',
															'clear'=>'',
															'margin'=>'',
															'padding'=>'',
															
															'border'=>'',
															'border-radius'=>'',
															'border-color'=>'',
															'border-style'=>'',
															
															'background'=>'',
															'Background Alpha'=>'',
															
															),
											
											),
											
							'title_link'=>array(	
											'name'=>'Title with Link',
											'dummy_html'=>'<a href="#">Lorem Ipsum is simply</a>',
											'css'=>'display: block;font-size: 21px;line-height: normal;padding: 5px 10px;text-align: left;',
											),
							'content'=>array(	
											'name'=>'Content',
											'dummy_html'=>'Lorem',
											'css'=>'display: block;font-size: 13px;line-height: normal;padding: 5px 10px;text-align: left;',
											),							
							'read_more'=>array(	
											'name'=>'Read more',
											'dummy_html'=>'<a href="#">Read more</a>',
											'css'=>'display: block;font-size: 13px;line-height: normal;padding: 5px 10px;text-align: left;',
											),	
							'thumb'=>array(	
											'name'=>'Thumbnail',
											'dummy_html'=>'<img style="width:100%;" src="'.post_grid_plugin_url.'assets/admin/images/thumb.png" />',
											'css'=>'display: block;font-size: 13px;line-height: normal;padding: 5px 10px;text-align: left;',
											),
							'thumb_link'=>array(	
											'name'=>'Thumbnail with Link',
											'dummy_html'=>'<a href="#"><img style="width:100%;" src="'.post_grid_plugin_url.'assets/admin/images/thumb.png" /></a>',
											'css'=>'display: block;font-size: 13px;line-height: normal;padding: 5px 10px;text-align: left;',
											),
							'excerpt'=>array(	
											'name'=>'Excerpt',
											'dummy_html'=>'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text',
											'css'=>'display: block;font-size: 13px;line-height: normal;padding: 5px 10px;text-align: left;',
											),
							'excerpt_read_more'=>array(	
											'name'=>'Excerpt with Read more',
											'dummy_html'=>'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text <a href="#">Read more</a>',
											'css'=>'display: block;font-size: 13px;line-height: normal;padding: 5px 10px;text-align: left;',
											),													
							'post_date'=>array(	
											'name'=>'Post date',
											'dummy_html'=>'18/06/2015',
											'css'=>'display: block;font-size: 13px;line-height: normal;padding: 5px 10px;text-align: left;',
											),
							'author'=>array(	
											'name'=>'Author',
											'dummy_html'=>'PickPlugins',
											'css'=>'display: block;font-size: 13px;line-height: normal;padding: 5px 10px;text-align: left;',
											),
							'author_link'=>array(	
											'name'=>'Author with Link',
											'dummy_html'=>'Lorem',
											'css'=>'display: block;font-size: 13px;line-height: normal;padding: 5px 10px;text-align: left;',
											),							
							'categories'=>array(	
											'name'=>'Categories',
											'dummy_html'=>'<a hidden="#">Category 1</a> <a hidden="#">Category 2</a>',
											'css'=>'display: block;font-size: 13px;line-height: normal;padding: 5px 10px;text-align: left;',
											),
							'tags'=>array(	
											'name'=>'Tags',
											'dummy_html'=>'<a hidden="#">Tags 1</a> <a hidden="#">Tags 2</a>',
											'css'=>'display: block;font-size: 13px;line-height: normal;padding: 5px 10px;text-align: left;',
											),								
							'comments_count'=>array(	
											'name'=>'Comments Count',
											'dummy_html'=>'3 Comments',
											'css'=>'display: block;font-size: 13px;line-height: normal;padding: 5px 10px;text-align: left;',
											),
							'comments'=>array(	
											'name'=>'Comments',
											'dummy_html'=>'Lorem',
											'css'=>'display: block;font-size: 13px;line-height: normal;padding: 5px 10px;text-align: left;',
											),
							'rating_widget'=>array(	
											'name'=>'Rating-Widget: Star Review System',
											'dummy_html'=>'Lorem',
											'css'=>'display: block;font-size: 13px;line-height: normal;padding: 5px 10px;text-align: left;',
											),							
							
											

							/* WooCommerce Stuff*/
							
							
							
							'wc_gallery'=>array(	
											'name'=>'WC Gallery',
											'dummy_html'=>'Lorem',
											'css'=>'display: block;font-size: 13px;line-height: normal;padding: 5px 10px;text-align: left;',
											),								
							'wc_full_price'=>array(	
											'name'=>'WC Full Price',
											'dummy_html'=>'<del>$45</del> - <ins>$40</ins>',
											'css'=>'display: block;font-size: 13px;line-height: normal;padding: 5px 10px;text-align: left;',
											),
							'wc_sale_price'=>array(	
											'name'=>'WC Sale Price',
											'dummy_html'=>'$45',
											'css'=>'display: block;font-size: 13px;line-height: normal;padding: 5px 10px;text-align: left;',
											),
							'wc_regular_price'=>array(	
											'name'=>'WC Regular Price',
											'dummy_html'=>'$45',
											'css'=>'display: block;font-size: 13px;line-height: normal;padding: 5px 10px;text-align: left;',
											),														
							'wc_add_to_cart'=>array(	
											'name'=>'WC Add to Cart',
											'dummy_html'=>'Add to Cart',
											'css'=>'display: block;font-size: 13px;line-height: normal;padding: 5px 10px;text-align: left;',
											),
							'wc_rating_star'=>array(	
											'name'=>'WC Star Rating',
											'dummy_html'=>'<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>',
											'css'=>'display: block;font-size:20px;color:#facd32;line-height: normal;padding: 5px 10px;text-align: left;',
											),
							'wc_rating_text'=>array(	
											'name'=>'WC Text Rating',
											'dummy_html'=>'2 Reviews',
											'css'=>'display: block;font-size: 13px;line-height: normal;padding: 5px 10px;text-align: left;',
											),													
							'wc_categories'=>array(	
											'name'=>'WC Categories',
											'dummy_html'=>'<a href="#">Category 1</a> <a href="#">Category 2</a>',
											'css'=>'display: block;font-size: 13px;line-height: normal;padding: 5px 10px;text-align: left;',
											),								
							'wc_tags'=>array(	
											'name'=>'WC tags',
											'dummy_html'=>'<a href="#" >Tags 1</a> <a href="#">Tags 2</a>',
											'css'=>'display: block;font-size: 13px;line-height: normal;padding: 5px 10px;text-align: left;',
											),
							'wc_sku'=>array(	
											'name'=>'WC SKU',
											'dummy_html'=>'WC SKU',
											'css'=>'display: block;font-size: 13px;line-height: normal;padding: 5px 10px;text-align: left;',
											),
						
						
							/* Easy Digital Downloads Stuff*/
							//'edd_gallery'=>'EDD Gallery',								
							'edd_price'=>array(	
											'name'=>'EDD Price',
											'dummy_html'=>'$56',
											'css'=>'display: block;font-size: 13px;line-height: normal;padding: 5px 10px;text-align: left;',
											),
							'edd_variable_prices'=>array(	
											'name'=>'EDD Variable Prices',
											'dummy_html'=>'EDD Variable Prices',
											'css'=>'display: block;font-size: 13px;line-height: normal;padding: 5px 10px;text-align: left;',
											),
							'edd_sales_stats'=>array(	
											'name'=>'EDD Sales Stats',
											'dummy_html'=>'EDD Sales Stats',
											'css'=>'display: block;font-size: 13px;line-height: normal;padding: 5px 10px;text-align: left;',
											),
							'edd_earnings_stats'=>array(	
											'name'=>'EDD Earnings Stats',
											'dummy_html'=>'EDD Earnings Stats',
											'css'=>'display: block;font-size: 13px;line-height: normal;padding: 5px 10px;text-align: left;',
											),																				
							'edd_add_to_cart'=>array(	
											'name'=>'EDD Add to Cart',
											'dummy_html'=>'Add to Cart',
											'css'=>'display: block;font-size: 13px;line-height: normal;padding: 5px 10px;text-align: left;',
											),
							'edd_rating_star'=>array(	
											'name'=>'EDD Star Rating',
											'dummy_html'=>'<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>',
											'css'=>'display: block;font-size: 13px;line-height: normal;padding: 5px 10px;text-align: left;',
											),
							'edd_rating_text'=>array(	
											'name'=>'EDD Text Rating',
											'dummy_html'=>'2 Reviews',
											'css'=>'display: block;font-size: 13px;line-height: normal;padding: 5px 10px;text-align: left;',
											),													
							'edd_categories'=>array(	
											'name'=>'EDD Categories',
											'dummy_html'=>'<a href="#">Category 1</a> <a href="#">Category 2</a>',
											'css'=>'display: block;font-size: 13px;line-height: normal;padding: 5px 10px;text-align: left;',
											),								
							'edd_tags'=>array(	
											'name'=>'EDD tags',
											'dummy_html'=>'<a href="#" >Tags 1</a> <a href="#">Tags 2</a>',
											'css'=>'display: block;font-size: 13px;line-height: normal;padding: 5px 10px;text-align: left;',
											),
							//'edd_sku'=>'EDD SKU',						
						
						
							/* WP eCommerce Stuff*/
							//'WPeC_gallery'=>'WPeC Gallery',								
							//'WPeC_full_price'=>'WPeC Full Price',
							'WPeC_old_price'=>array(	
											'name'=>'WPeC Old Price',
											'dummy_html'=>'$45',
											'css'=>'display: block;font-size: 13px;line-height: normal;padding: 5px 10px;text-align: left;',
											),	
							'WPeC_sale_price'=>array(	
											'name'=>'WPeC Sale Price',
											'dummy_html'=>'$40',
											'css'=>'display: block;font-size: 13px;line-height: normal;padding: 5px 10px;text-align: left;',
											),												
							'WPeC_add_to_cart'=>array(	
											'name'=>'WPeC Add to Cart',
											'dummy_html'=>'Add to Cart',
											'css'=>'display: block;font-size: 13px;line-height: normal;padding: 5px 10px;text-align: left;',
											),
							'WPeC_rating_star'=>array(	
											'name'=>'WPeC Star Rating',
											'dummy_html'=>'<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>',
											'css'=>'display: block;font-size: 13px;line-height: normal;padding: 5px 10px;text-align: left;',
											),
						//	'WPeC_rating_text'=>'WPeC Text Rating',													
							'WPeC_categories'=>array(	
											'name'=>'WPeC Categories',
											'dummy_html'=>'<a href="#">Category 1</a> <a href="#">Category 2</a>',
											'css'=>'display: block;font-size: 13px;line-height: normal;padding: 5px 10px;text-align: left;',
											),								
							'WPeC_tags'=>array(	
											'name'=>'WPeC tags',
											'dummy_html'=>'<a href="#" >Tags 1</a> <a href="#">Tags 2</a>',
											'css'=>'display: block;font-size: 13px;line-height: normal;padding: 5px 10px;text-align: left;',
											),
							//'WPeC_sku'=>'WPeC SKU',						
						
						
						
						
						
						
						
							'meta_key'=>array(	
											'name'=>'Meta Key',
											'dummy_html'=>'Meta Key',
											'css'=>'display: block;font-size: 13px;line-height: normal;padding: 5px 10px;text-align: left;',
											),	
							
							//'zoom'=>'Zoom button',
							'share_button'=>array(	
											'name'=>'Share button',
											'dummy_html'=>'<i class="fa fa-facebook-square"></i> <i class="fa fa-twitter-square"></i> <i class="fa fa-google-plus-square"></i>',
											'css'=>'display: block;font-size: 13px;line-height: normal;padding: 5px 10px;text-align: left;',
											),
							'five_star'=>array(	
											'name'=>'Five Star',
											'dummy_html'=>'<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>',
											'css'=>'display: block;font-size: 13px;line-height: normal;padding: 5px 10px;text-align: left;',
											),
							'up_arrow'=>array(	
											'name'=>'Up Arrow',
											'dummy_html'=>'<i class="fa fa-caret-up"></i>',
											'css'=>'display: block;font-size: 13px;line-height: normal;padding: 5px 10px;text-align: left;',
											),							
							'down_arrow'=>array(	
											'name'=>'Down Arrow',
											'dummy_html'=>'<i class="fa fa-caret-down"></i>',
											'css'=>'display: block;font-size: 13px;line-height: normal;padding: 5px 10px;text-align: left;',
											),														
							'hr'=>array(	
											'name'=>'Horizontal line',
											'dummy_html'=>'<hr />',
											'css'=>'display: block;font-size: 13px;line-height: normal;padding: 5px 10px;text-align: left;',
											),
							'html'=>array(	
											'name'=>'HTML',
											'dummy_html'=>'HTML <b>goes</b> here.',
											'css'=>'display: block;font-size: 13px;line-height: normal;padding: 5px 10px;text-align: left;',
											),							
							
							'yith_add_to_wishlist'=>array(	
											'name'=>'YITH - Add to Wishlist',
											'dummy_html'=>'Add to Wishlist',
											'css'=>'display: block;font-size: 13px;line-height: normal;padding: 5px 10px;text-align: left;',
											),								
							
							'custom_taxonomy'=>array(	
											'name'=>'Custom taxonomy',
											'dummy_html'=>'Custom taxonomy',
											'css'=>'display: block;font-size: 13px;line-height: normal;padding: 5px 10px;text-align: left;',
											),								
							
							
							
							

							);
		
		$layout_items = apply_filters('post_grid_filter_layout_items', $layout_items);
		
		return $layout_items;
		}
	
	
	public function layout_content_list(){
		
		$layout_content_list = array(
		
						'flat'=>array(
								'0'=>array('key'=>'title', 'char_limit'=>'20', 'name'=>'Title', 'css'=>'display: block;font-size: 21px;line-height: normal;padding: 5px 10px;text-align: left;', 'css_hover'=>'', ),
								'1'=>array('key'=>'excerpt', 'char_limit'=>'20', 'name'=>'Excerpt', 'css'=>'display: block;font-size: 12px;padding: 5px 10px;text-align: left;', 'css_hover'=>''),
								'2'=>array('key'=>'read_more', 'name'=>'Read more', 'css'=>'display: block;font-size: 12px;font-weight: bold;padding: 0 10px;text-align: left;', 'css_hover'=>''),
														
								//'3'=>array('key'=>'meta_key', 'field_id'=>'hello_meta',  'name'=>'Meta Key', 'css'=>'display: block;font-size: 12px;font-weight: bold;padding: 0 10px;text-align: left;', 'css_hover'=>'font-size: 22px;'),							
								
							
								
								
									),
									
						'flat-center'=>array(												
								'0'=>array('key'=>'title', 'char_limit'=>'20', 'name'=>'Title', 'css'=>'display: block;font-size: 21px;line-height: normal;padding: 5px 10px;text-align: center;', 'css_hover'=>''),
								'1'=>array('key'=>'excerpt', 'char_limit'=>'20', 'name'=>'Excerpt', 'css'=>'display: block;font-size: 12px;padding: 5px 10px;text-align: center;', 'css_hover'=>''),
								'2'=>array('key'=>'read_more', 'name'=>'Read more', 'css'=>'display: block;font-size: 12px;font-weight: bold;padding: 0 10px;text-align: center;', 'css_hover'=>''),

									),
									
						'flat-right'=>array(												
								'0'=>array('key'=>'title', 'char_limit'=>'20', 'name'=>'Title', 'css'=>'display: block;font-size: 21px;line-height: normal;padding: 5px 10px;text-align: right;', 'css_hover'=>''),
								'1'=>array('key'=>'excerpt', 'char_limit'=>'20', 'name'=>'Excerpt', 'css'=>'display: block;font-size: 12px;padding: 5px 10px;text-align: right;', 'css_hover'=>''),
								'2'=>array('key'=>'read_more', 'name'=>'Read more', 'css'=>'display: block;font-size: 12px;font-weight: bold;padding: 0 10px;text-align: right;', 'css_hover'=>''),					
									),
									
						'flat-left'=>array(												
								'0'=>array('key'=>'title', 'char_limit'=>'20', 'name'=>'Title', 'css'=>'display: block;font-size: 21px;line-height: normal;padding: 5px 10px;text-align: left;', 'css_hover'=>''),
								
								'1'=>array('key'=>'excerpt', 'char_limit'=>'20', 'name'=>'Excerpt', 'css'=>'display: block;font-size: 12px;padding: 5px 10px;text-align: left;', 'css_hover'=>''),
								'2'=>array('key'=>'read_more', 'name'=>'Read more', 'css'=>'display: block;font-size: 12px;font-weight: bold;padding: 0 10px;text-align: left;', 'css_hover'=>'')
									),
									
						'wc-center-price'=>array(													
								'0'=>array('key'=>'title', 'char_limit'=>'20', 'name'=>'Title', 'css'=>'display: block;font-size: 21px;line-height: normal;padding: 5px 10px;text-align: center;', 'css_hover'=>''),
								'1'=>array('key'=>'wc_full_price', 'name'=>'Price', 'css'=>'background:#f9b013;color:#fff;display: inline-block;font-size: 20px;line-height:normal;padding: 0 17px;text-align: center;', 'css_hover'=>''),
								'2'=>array('key'=>'excerpt', 'char_limit'=>'20', 'name'=>'Excerpt', 'css'=>'display: block;font-size: 12px;padding: 5px 10px;text-align: center;', 'css_hover'=>''),
									),								
									
						'wc-center-cart'=>array(													
								'0'=>array('key'=>'title', 'char_limit'=>'20', 'name'=>'Title', 'css'=>'display: block;font-size: 21px;line-height: normal;padding: 5px 10px;text-align: center;', 'css_hover'=>''),
								'1'=>array('key'=>'wc_gallery', 'name'=>'Add to Cart', 'css'=>'color:#555;display: inline-block;font-size: 13px;line-height:normal;padding: 0 17px;text-align: center;', 'css_hover'=>''),
								
								'2'=>array('key'=>'excerpt', 'char_limit'=>'20', 'name'=>'Excerpt', 'css'=>'display: block;font-size: 12px;padding: 5px 10px;text-align: center;', 'css_hover'=>''),
									),										

						);
		
		$layout_content_list = apply_filters('post_grid_filter_layout_content_list', $layout_content_list);
		
		
		return $layout_content_list;
		}	
	

	
	public function layout_content($layout){
		
		$layout_content = $this->layout_content_list();
		
		return $layout_content[$layout];
		}	
		
	
	
	public function layout_hover_list(){
		
		$layout_hover_list = array(
									
									
						'flat'=>array(												

								'read_more'=>array('name'=>'Read more', 'css'=>'display: block;font-size: 12px;font-weight: bold;padding: 0 10px;text-align: center;')
									),										
						'flat-center'=>array(												

								'read_more'=>array('name'=>'Read more', 'css'=>'display: block;font-size: 12px;font-weight: bold;padding: 0 10px;text-align: center;')
									),
										
		
						);
		
		$layout_hover_list = apply_filters('post_grid_filter_layout_hover_list', $layout_hover_list);
		
		
		return $layout_hover_list;
		}	
	

	
	public function layout_hover($layout){
		
		$layout_hover = $this->layout_hover_list();
		
		return $layout_hover[$layout];
		}	
	
	
	
	
	public function skins(){
		
		$skins = array(
		
						'flat'=> array(
										'slug'=>'flat',									
										'name'=>'Flat',
										'thumb_url'=>'',
										),		
		
						'flip-x'=> array(
										'slug'=>'flip-x',									
										'name'=>'Flip-x',
										'thumb_url'=>'',
										),
						'flip-y'=>array(
										'slug'=>'flip-y',
										'name'=>'Flip-y',
										'thumb_url'=>'',
										),
						'zoomin'=>array(
										'slug'=>'zoomin',
										'name'=>'ZoomIn',
										'thumb_url'=>'',
										),	
										
						'thumbzoomcontentin'=>array(
										'slug'=>'thumbzoomcontentin',
										'name'=>'ThumbZoomContentIn',
										'thumb_url'=>'',
										),										
										
																
						'zoomout'=>array(
										'slug'=>'zoomout',
										'name'=>'ZoomOut',
										'thumb_url'=>'',
										),	
										
										
										
																
						'spinright'=>array(
										'slug'=>'spinright',
										'name'=>'SpinRight',
										'thumb_url'=>'',
										),
						'spinleft'=>array(
										'slug'=>'spinleft',
										'name'=>'SpinLeft',
										'thumb_url'=>'',
										),
										
						'spinrightzoom'=>array(
										'slug'=>'spinrightzoom',
										'name'=>'SpinRightZoom',
										'thumb_url'=>'',
										),
										
						'spinleftzoom'=>array(
										'slug'=>'spinleftzoom',
										'name'=>'SpinLeftZoom',
										'thumb_url'=>'',
										),										
																			
										
										
						'spinrightfast'=>array(
										'slug'=>'spinrightfast',
										'name'=>'SpinRightFast',
										'thumb_url'=>'',
										),
						'spinleftfast'=>array(
										'slug'=>'spinleftfast',
										'name'=>'SpinLeftFast',
										'thumb_url'=>'',
										),										
										
						'thumbgoleft'=>array(
										'slug'=>'thumbgoleft',
										'name'=>'ThumbGoLeft',
										'thumb_url'=>'',
										),																
							
						'thumbgoright'=>array(
										'slug'=>'thumbgoright',
										'name'=>'ThumbGoRight',
										'thumb_url'=>'',
										),
						'thumbgotop'=>array(
										'slug'=>'thumbgotop',
										'name'=>'ThumbGoTop',
										'thumb_url'=>'',
										),																
							
						'thumbgobottom'=>array(
										'slug'=>'thumbgobottom',
										'name'=>'ThumbGoBottom',
										'thumb_url'=>'',
										),
										
						'thumbgoleftconetntinright'=>array(
										'slug'=>'thumbgoleftconetntinright',
										'name'=>'ThumbGoLeftConetntInRight',
										'thumb_url'=>'',
										),
										
						'thumbgobottomconetntinright'=>array(
										'slug'=>'thumbgobottomconetntinright',
										'name'=>'ThumbGoBottomConetntInRight',
										'thumb_url'=>'',
										),										
						'thumbgotopconetntinright'=>array(
										'slug'=>'thumbgotopconetntinright',
										'name'=>'ThumbGoTopConetntInRight',
										'thumb_url'=>'',
										),																			
						'thumbgorightconetntinright'=>array(
										'slug'=>'thumbgorightconetntinright',
										'name'=>'ThumbGoRightConetntInRight',
										'thumb_url'=>'',
										),										
																			
						'thumbmiddle'=>array(
										'slug'=>'thumbmiddle',
										'name'=>'ThumbMiddle',
										'thumb_url'=>'',
										),
										
						'thumbskew'=>array(
										'slug'=>'thumbskew',
										'name'=>'ThumbSkew',
										'thumb_url'=>'',
										),										
										
										
						'contentbottom'=>array(
										'slug'=>'contentbottom',
										'name'=>'ContentBottom',
										'thumb_url'=>'',
										),
						'contentmiddle'=>array(
										'slug'=>'contentmiddle',
										'name'=>'ContentMiddle',
										'thumb_url'=>'',
										),
										
						'contentinbottom'=>array(
										'slug'=>'contentinbottom',
										'name'=>'ContentInBottom',
										'thumb_url'=>'',
										),										
										
						'contentinleft'=>array(
										'slug'=>'contentinleft',
										'name'=>'ContentInLeft',
										'thumb_url'=>'',
										),
										
						'contentinright'=>array(
										'slug'=>'contentinright',
										'name'=>'ContentInRight',
										'thumb_url'=>'',
										),																												
										
						'contentinrightfixtitle'=>array(
										'slug'=>'contentinrightfixtitle',
										'name'=>'ContentInRightFixTitle',
										'thumb_url'=>'',
										),											
										
																													
										
						'contentborder'=>array(
										'slug'=>'contentborder',
										'name'=>'ContentBorder',
										'thumb_url'=>'',
										),										
										
						'contentborderrounded'=>array(
										'slug'=>'contentborderrounded',
										'name'=>'ContentBorderRounded',
										'thumb_url'=>'',
										),	
										
						'halfthumbleft'=>array(
										'slug'=>'halfthumbleft',
										'name'=>'HalfThumbLeft',
										'thumb_url'=>'',
										),
										
						'halfthumbright'=>array(
										'slug'=>'halfthumbright',
										'name'=>'HalfThumbRight',
										'thumb_url'=>'',
										),
										
						'thumbrounded'=>array(
										'slug'=>'thumbrounded',
										'name'=>'ThumbRounded',
										'thumb_url'=>'',
										),									
						'leire'=>array(
										'slug'=>'leire',
										'name'=>'Leire',
										'thumb_url'=>'',
										),	
						'leire2'=>array(
										'slug'=>'leire2',
										'name'=>'Leire2',
										'thumb_url'=>'',
										),		


						
						);
		
		$skins = apply_filters('post_grid_filter_skins', $skins);	
		
		return $skins;
		
		}
	




	
	public function faq(){



		$faq['core'] = array(
							'title'=>__('Core', post_grid_textdomain),
							'items'=>array(

											array(
												'question'=>__('How to Create a Post Grid ?', post_grid_textdomain),
												'answer_url'=>'https://goo.gl/xUnw2H',
												
												),	

											array(
												'question'=>__('How to upgrade to premium ?', post_grid_textdomain),
												'answer_url'=>'https://goo.gl/LBmhbL',
												
												),													
												
											array(
												'question'=>__('How to activate license ?', post_grid_textdomain),
												'answer_url'=>'https://goo.gl/LIVgOc',
												
												),													
												
											array(
												'question'=>__('How to display post grid on archive page ?', post_grid_textdomain),
												'answer_url'=>'https://goo.gl/ONkZio',
												
												),													
												
												
											array(
												'question'=>__('How to display HTML/Shortcode via layout editor ?', post_grid_textdomain),
												'answer_url'=>'https://goo.gl/uVpFh7',
												
												),													
												
												
												
												
												
												
	
											),

								
							);

					
		
		
		$faq = apply_filters('post_grid_filters_faq', $faq);		

		return $faq;

		}		
	













	}
	
//new class_post_grid_functions();