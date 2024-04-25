<?php	

/*
* @Author 		pickplugins
* Copyright: 	2015 pickplugins
*/

if ( ! defined('ABSPATH')) exit;  // if direct access



	if(empty($_POST['post_grid_hidden'])){
	
	
	
		}
	else{	
			$nonce = $_POST['_wpnonce'];
		
			if(wp_verify_nonce( $nonce, 'post_grid_license' ) && $_POST['post_grid_hidden'] == 'Y') {
	
				?>
				<div class="updated"><p><strong><?php _e('Changes Saved.', post_grid_textdomain ); ?></strong></p></div>
		
				<?php
				} 
		}

?>

<div class="wrap">

	<div id="icon-tools" class="icon32"><br></div><?php echo "<h2>".post_grid_plugin_name.' '.__('License', post_grid_textdomain)."</h2>";?>
		<form  method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">
            <input type="hidden" name="post_grid_hidden" value="Y">
            <?php //settings_fields( 'post_grid_plugin_options' );
                    //do_settings_sections( 'post_grid_plugin_options' );
                
            ?>

            <div class="para-settings post-grid-license">
            
                <ul class="tab-nav"> 
                    <li nav="1" class="nav1 active"><i class="fa fa-key"></i> <?php _e('Activation',post_grid_textdomain); ?></li>       
          
                </ul> <!-- tab-nav end --> 
                <ul class="box">
                    <li style="display: block;" class="box1 tab-box active">
                    
                        <div class="option-box">
                            <p class="option-title"><?php _e('Activate license',post_grid_textdomain); ?></p>
        
                            <?php
        
							/*** License activate button was clicked ***/
							if (isset($_REQUEST['activate_license']) && current_user_can('manage_options') ) {
								$license_key = $_REQUEST['post_grid_license'];
						
								if(is_multisite())
									{
										$domain = site_url();
									}
								else
									{
										$domain = $_SERVER['SERVER_NAME'];
									}
        
        
        
								// API query parameters
								$api_params = array(
									'slm_action' => 'slm_activate',
									'secret_key' => POST_GRID_SPECIAL_SECRET_KEY,
									'license_key' => $license_key,
									'registered_domain' => $domain,
									'item_reference' => urlencode(POST_GRID_ITEM_REFERENCE),
								);
						
								// Send query to the license manager server
								$response = wp_remote_get(add_query_arg($api_params, POST_GRID_LICENSE_SERVER_URL), array('timeout' => 20, 'sslverify' => false));
						
								// Check for error in the response
								if (is_wp_error($response)){
									echo __("Unexpected Error! The query returned with an error.",post_grid_textdomain);
								}
        
								//var_dump($response);//uncomment it if you want to look at the full response
								
								// License data.
								$license_data = json_decode(wp_remote_retrieve_body($response));
								
								// TODO - Do something with it.
								//var_dump($license_data);//uncomment it to look at the data
								
								if($license_data->result == 'success'){//Success was returned for the license activation
									
									//Uncomment the followng line to see the message that returned from the license server
									echo '<br />';
									_e('The following message was returned from the server:',post_grid_textdomain);
									echo ' <strong class="option-info license-message">'.$license_data->message.'</strong>';
									
									//Save the license key in the options table
									//update_option('post_grid_license', $license_key);
                    
                    
								$post_grid_license = array(
																'date_created'=>$license_data->date_created,
																'date_renewed'=>$license_data->date_renewed,
																'date_expiry'=>$license_data->date_expiry,
																'key'=>$license_key,
																'status'=>$license_data->status,
																'message'=>$license_data->message,
					
																);
								
								//var_dump($post_grid_license);
								
								
								
								
								
								
								update_option('post_grid_license', $post_grid_license);
                    
                    
                    
                    
                    
									
								}
								else{
									//Show error to the user. Probably entered incorrect license key.
									
									//Uncomment the followng line to see the message that returned from the license server
									echo '<br /> ';
									_e('The following message was returned from the server:', post_grid_textdomain);
									echo ' <strong class="option-info license-message">'.$license_data->message.'</strong>';
								}
        
							}
							/*** End of license activation ***/
							
							/*** License activate button was clicked ***/
							if (isset($_REQUEST['deactivate_license']) && current_user_can('manage_options')) {
								$license_key = $_REQUEST['post_grid_license'];
						
						
								if(is_multisite())
									{
										$domain = site_url();
									}
								else
									{
										$domain = $_SERVER['SERVER_NAME'];
									}
        
        
        
								// API query parameters
								$api_params = array(
									'slm_action' => 'slm_deactivate',
									'secret_key' => POST_GRID_SPECIAL_SECRET_KEY,
									'license_key' => $license_key,
									'registered_domain' => $domain,
									'item_reference' => urlencode(POST_GRID_ITEM_REFERENCE),
								);
						
								// Send query to the license manager server
								$response = wp_remote_get(add_query_arg($api_params, POST_GRID_LICENSE_SERVER_URL), array('timeout' => 20, 'sslverify' => false));
						
								// Check for error in the response
								if (is_wp_error($response)){
									echo __("Unexpected Error! The query returned with an error.", post_grid_textdomain);
								}
        
							//var_dump($response);//uncomment it if you want to look at the full response
							
							// License data.
							$license_data = json_decode(wp_remote_retrieve_body($response));
							
							// TODO - Do something with it.
							//var_dump($license_data);//uncomment it to look at the data
							
							if($license_data->result == 'success'){//Success was returned for the license activation
								
								//Uncomment the followng line to see the message that returned from the license server
							   // echo sprintf(__('<br />The following message was returned from the server: <strong class="option-info license-message">%s</strong>',post_grid_textdomain), $license_data->message);
								echo '<br />';
								echo __('The following message was returned from the server:', post_grid_textdomain);
								echo ' <strong class="option-info license-message">'.$license_data->message.'</strong>';
								
								//Remove the licensse key from the options table. It will need to be activated again.
								//update_option('post_grid_license', '');
                    
                    
								
								$post_grid_license = array(
																//'date_created'=>$license_data->date_created,
																//'date_renewed'=>$license_data->date_renewed,
																//'date_expiry'=>$license_data->date_expiry,
																'key'=>$license_key,
																'status'=>$license_data->status,
																'message'=>$license_data->message,
																);
								
								//var_dump($post_grid_license);
								
								update_option('post_grid_license', $post_grid_license);
								
								
								
								
								
								
							}
							else{
								//Show error to the user. Probably entered incorrect license key.
								
								//Uncomment the followng line to see the message that returned from the license server
								echo '<br />';
								_e('The following message was returned from the server:',post_grid_textdomain);
								echo ' <strong class="option-info license-message">'.$license_data->message.'</strong>';
							}
							
						}
						/*** End of sample license deactivation ***/
						
						?>
            
            
                                        
                        <?php
                       		$class_post_grid_license = new class_post_grid_license();
                            $post_grid_license = get_option('post_grid_license');
							
								$license_status = $post_grid_license['status'];
								
								if(!empty($post_grid_license['date_created']))
								$date_created = $post_grid_license['date_created'];
								
								if(!empty($post_grid_license['date_renewed']))
								$date_renewed = $post_grid_license['date_renewed'];
								
								if(!empty($post_grid_license['date_expiry'])){
									
									$date_expiry = $post_grid_license['date_expiry'];
									
									
									$gmt_offset = get_option('gmt_offset');
									$today = date('Y-m-d h:i:s', strtotime('+'.$gmt_offset.' hour'));
									$today_str = strtotime($today);
									$expiry_str = strtotime($date_expiry);
									$days_remaining = $class_post_grid_license->days_remaining($date_expiry);
									
									$expiry_text = $days_remaining['text'];
									$expiry_class = $days_remaining['class'];
									//$expiry_diff = $days_remaining['diff'];
									}
								else{
									$expiry_text = 'Undefined';
									$expiry_class = '';
									}

								?>
								
                                <div class="items">
                                	<div class="item status <?php echo $license_status; ?>">
                                    Status: <b><?php echo $license_status; ?></b>
                                    </div>
                                    
                                	<div class="item expiry <?php echo $expiry_class; ?>">
                                    Expiry: <b><?php echo $expiry_text; ?></b>
                                    </div>                                    
                                    
                                	<div class="item">
                                    Version: <b><?php echo post_grid_version; ?></b>
                                    </div>                                     
                                </div>
                            <p>
                            <?php _e(sprintf("Enter the license key for this product to activate it. You were given a license key when you purchased this item. please visit <a href='%s'>%s</a> after logged-in you will see license key for your purchased product.",POST_GRID_LICENSE_KEYS_PAGE,POST_GRID_LICENSE_KEYS_PAGE),post_grid_textdomain); 

                            ?>
                            
                            </p>
                        
                        	<p><?php _e('If you have any problem regarding license activatin please contact for support',post_grid_textdomain); ?> <a href="<?php echo post_grid_conatct_url; ?>"><?php echo post_grid_conatct_url; ?></a></p>    
                        
                    
                            <table class="form-table">
                                <tr>
                                    <th style="width:100px;"><label for="post_grid_license">License Key</label></th>
                                    <td >
                                    <input class="regular-text" type="text" id="post_grid_license" name="post_grid_license"  value="<?php if(!empty($post_grid_license['key'])) echo $post_grid_license['key']; ?>" >
                    
                                    
                                    </td>
                                </tr>
                            </table>
        
        
        
                        </div>
                    
                    </li>
                   
                </ul>
            
            
                
        
                
            </div>






        <p class="submit">
        	<?php wp_nonce_field( 'post_grid_license' ); ?>
            <input type="submit" name="activate_license" value="<?php _e('Activate',post_grid_textdomain); ?>" class="button-primary" />
            <input type="submit" name="deactivate_license" value="<?php _e('Deactivate',post_grid_textdomain); ?>" class="button" />
        </p>
		</form>


</div>
