<?php
/*
* @Author 		pickplugins
* Copyright: 	2015 pickplugins.com
*/

if ( ! defined('ABSPATH')) exit;  // if direct access



/* ################################ tax_query ######################################*/

//echo '<pre>'.var_export($categories, true).'</pre>';

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

$tax_query = array_merge($tax_query_relation, $tax_query );

//echo '<pre>'.var_export($tax_query,true).'</pre>';



/* ################################ meta_query ######################################*/


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
			
			$parameter = explode('=', $parameter);
			
			//var_dump($parameter).'<br />';

			//var_dump(do_shortcode($parameter[1])).'<br />';


				if (strpos($parameter[1], ',') !== false) {
					//var_dump($parameter[1]);
					$parameter_args = explode(',', do_shortcode($parameter[1]));
					
						//echo '<pre>'.var_export($parameter_args, true).'</pre>';
					$query_parameter[$parameter[0]] = $parameter_args;
					//echo '<pre>'.var_export($query_parameter, true).'</pre>';

					} 
				else{
					$query_parameter[$parameter[0]] = $parameter[1];
					}

			
			
			}
		
		}
	else{
		
		$query_parameter = array();
		}

	
	//echo '<pre>'.var_export($query_parameter, true).'</pre>';
	
//echo '<pre>'.var_export(get_queried_object()).'</pre>';



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



if(is_search()){
	
	$keyword = get_search_query();
	

	
	}


/*

if (is_singular( 'post' ) ) {
	
	//$term = get_queried_object();

	$taxonomies = get_post_taxonomies(get_the_ID());

		//var_dump($taxonomy);
		
	
	foreach($taxonomies as $taxonomy){
		
			$taxonomy_terms[$taxonomy] = wp_get_post_terms(get_the_ID(), $taxonomy);
			//var_dump($taxonomy_terms);

		}
		
		//var_dump($taxonomy_terms);
	$i = 0;
	foreach($taxonomy_terms as $key=>$terms){
		
			//var_dump($terms);
			if(!empty($terms))
			$tax_query[$i] = array(
								'taxonomy' => $terms[0]->taxonomy,
								'field'    => 'id',
								'terms'    => $terms[0]->term_id,
														
								);
			
			$i++;
			
		}		
	
	//var_dump($tax_query);
	
	}

*/


//var_dump($paged);
//echo '<br />';
//var_dump($offset);
//echo '<br />';


// echo '<pre>'.var_export($query_parameter, true).'</pre>';



//var_dump($paged);



	$default_query = array (
			'post_type' => $post_types,
			'post_status' => $post_status,
			's' => $keyword,
			'post__not_in' => $exclude_post_id,
			'order' => $query_order,	
			'orderby' => $query_orderby,
			'meta_key' => $query_orderby_meta_key,
			'posts_per_page' => (int)$posts_per_page,
			'paged' => (int)$paged,
			'offset' => $offset,
			'tax_query' => $tax_query,
			'meta_query' => $meta_query,

			);
			

		
	$query_merge = array_merge($default_query, $query_parameter);

	$query_merge = apply_filters('post_grid_filter_query_args', $query_merge);	
	
	//echo '<pre>'.var_export($query_merge, true).'</pre>';

	$wp_query = new WP_Query($query_merge);

	//var_dump($wp_query->query_vars['offset']);
		//echo '<br />';

	//echo '<pre>'.var_export($wp_query, true).'</pre>';
	
	
/*

    if ($wp_query->is_paged){
		
        $offset = $offset + ( ($wp_query->query_vars['paged'] - 1) * $posts_per_page );
        $wp_query->set ('offset', $offset);
		
    } else {
		
        $wp_query->set ('offset', $offset);
    }

*/
	
	//var_dump($wp_query->query_vars['offset']);
	
	
	//var_dump($wp_query->found_posts);
	//$offset = ($wp_query->found_posts) - $next_topic;
    //$posts_per_page = (int) get_option ('posts_per_page');



	
	
	
	
	
	
	
	