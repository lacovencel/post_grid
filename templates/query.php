<?php
/*
* @Author 		pickplugins
* Copyright: 	2015 pickplugins.com
*/

if ( ! defined('ABSPATH')) exit;  // if direct access





$default_query_args = array();

$ignore_sticky_posts = (int) $ignore_sticky_posts;


/* ################################ Sticky Post query ######################################*/




if($sticky_post_query_type=='include'){

    $default_query_args['post__in'] = get_option( 'sticky_posts' );

}

elseif($sticky_post_query_type=='exclude'){

    //$default_query_args['post__not_in'] = get_option( 'sticky_posts' );

    if(!empty($exclude_post_id)){

        $exclude_post_id = array_merge(get_option( 'sticky_posts' ), $exclude_post_id);

    }
    else{
        $exclude_post_id = get_option( 'sticky_posts' );
    }

}


//echo '<pre>'.var_export($grid_id, true).'</pre>';


/* ################################ Date query ######################################*/

if($date_query_type=='extact_date'){
	
		$default_query_args['date_query'] = array(
												'year'  => $extact_date_year,
												'month' => $extact_date_month,
												'day'   => $extact_date_day,
											);
	}

elseif($date_query_type=='between_two_date'){
	
		$default_query_args['date_query'] = array(
												array(
												
													'after'    => array(
														'year'  => $between_two_date_after_year,
														'month' => $between_two_date_after_month,
														'day'   => $between_two_date_after_day,
													),													
													
													'before'    => array(
														'year'  => $between_two_date_before_year,
														'month' => $between_two_date_before_month,
														'day'   => $between_two_date_before_day,
													),
													'inclusive' => $between_two_date_inclusive,
												));
	}










/* ################################ Permission query ######################################*/

if($permission_query=='enable'){
	
		$default_query_args['perm'] = 'readable';
	}



/* ################################ Password query ######################################*/

if($password_query_type=='has_password'){
	
		$default_query_args['has_password'] = $password_query_has_password;
	}
elseif($password_query_type=='post_password'){
	
		$default_query_args['post_password'] = $password_query_post_password;
	}




/* ################################ Author query ######################################*/

$author__in = explode(',', $author__in);
$author__not_in = explode(',', $author__not_in);

$author_query = array();

if($author_query_type=='author__in'){
	
		$default_query_args['author__in'] = $author__in;
	}

elseif($author_query_type=='author__not_in'){
		
		$default_query_args['author__not_in'] = $author__not_in;
	}
	
//echo '<pre>'.var_export($author_query, true).'</pre>';	
	
	//$author_query = $author_query[0];
//$author_query = array_shift($author_query);
	
/* ################################ Tax query ######################################*/

	foreach($categories as $category){
		
		$tax_cat = explode(',',$category);
		
		$tax_terms[$tax_cat[0]][] = $tax_cat[1];
		
		}

	if(empty($tax_terms)){
		
		$tax_terms = array(); 
		}
	
	
	foreach($tax_terms as $taxonomy=>$terms){
		
			$tax_query[] = array(
								'taxonomy' => $taxonomy,
								'field'    => 'term_id',
								'terms'    => $terms,
								'operator'    => $terms_relation,
								);
			
			
		}
	
	if(empty($tax_query)){
		
		$tax_query = array();
		
		}
	
	$tax_query_relation = array( 'relation' => $categories_relation );

    $tax_query[] = array_merge($tax_query_relation, $tax_query );
	
	//$default_query_args['tax_query'] = $tax_query;

	//echo '<pre>'.var_export($tax_query, true).'</pre>';

/* ################################ Meta query ######################################*/

	
	$meta_query_relation = array('relation' => $meta_query_relation);
	if(empty($meta_query)){
		
		$meta_query = array();
		}
	$meta_query = array_merge($meta_query_relation, $meta_query );
	
	//echo '<pre>'.var_export($meta_query, true).'</pre>';
	
	//$offset = ( $paged - 1 ) * $posts_per_page;
	
	
	if(isset($_GET['keyword'])){
		
		$keyword = sanitize_text_field($_GET['keyword']);
		
		}



	/*More Query parameter string to array*/
	if(!empty($extra_query_parameter)){
		
		$extra_query_parameter = explode('&', $extra_query_parameter);
		
		//var_dump($extra_query_parameter);
		
		foreach($extra_query_parameter as $parameter){
			
			//var_dump($parameter).'<br />';
			$parameter = do_shortcode($parameter);
			$parameter = explode('=', $parameter);
			
			//var_dump($parameter).'<br />';

			//var_dump(do_shortcode($parameter[1])).'<br />';


				if (strpos($parameter[1], ',') !== false) {
					//var_dump($parameter[1]);
					$parameter_args = explode(',', do_shortcode($parameter[1]));
					
						//echo '<pre>'.var_export($parameter_args, true).'</pre>';
					$query_parameter[$parameter[0]] = $parameter_args;
					//echo '<pre>'.var_export($query_parameter, true).'</pre>';
					//echo '<pre>'.var_export('j 2', true).'</pre>';
					} 
				else{

					//echo '<pre>'.var_export('j 1', true).'</pre>';

					$query_parameter[$parameter[0]] = ($parameter[1]);
					}

			
			
			}
		
		}
	else{
		
		$query_parameter = array();
		}

	$default_query_args['meta_query'] = $meta_query;


/* ################################ Archive pages ######################################*/


	if (is_category() || is_tag() || is_tax() ) {




		$term = get_queried_object();
	
		$taxonomy = $term->taxonomy;
		$terms = $term->term_id;	
	
		$tax_query[] = array(
							'taxonomy' => $taxonomy,
							'field'    => 'id',
							'terms'    => $terms,
													
							);



		}


//echo '<pre>'.var_export($tax_query, true).'</pre>';
/* ################################ Search pages ######################################*/

	if(is_search()){
		
		$keyword = get_search_query();

		}



//echo '<pre>'.var_export($exclude_post_id, true).'</pre>';


	$default_query_args['post_type'] = $post_types;
	$default_query_args['post_status'] = $post_status;

    if(!empty($keyword)){
        $default_query_args['s'] = $keyword;
    }


    $default_query_args['ignore_sticky_posts'] = $ignore_sticky_posts;
	$default_query_args['post__not_in'] = $exclude_post_id;
	$default_query_args['order'] = $query_order;
	$default_query_args['orderby'] = $query_orderby;

	if(!empty($query_orderby_meta_key)){

        $default_query_args['meta_key'] = $query_orderby_meta_key;
    }


	$default_query_args['posts_per_page'] = (int)$posts_per_page;
	$default_query_args['paged'] = $paged;

    if(!empty($offset)){

        $default_query_args['offset'] = $offset;
    }

    $default_query_args['tax_query'] = $tax_query;



		
	$query_merge = array_merge($default_query_args, $query_parameter);

	$query_merge = apply_filters('post_grid_filter_query_args', $query_merge, $grid_id);

    //echo '<pre>'.var_export($query_merge, true).'</pre>';


	$post_grid_wp_query = new WP_Query($query_merge);



	
	
	
	
	
	
	
	