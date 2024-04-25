<?php
/*
* @Author 		pickplugins
* Copyright: 	2015 pickplugins.com
*/

if ( ! defined('ABSPATH')) exit;  // if direct access


?>

	<script>
            jQuery(document).ready(function($)
            {
                $("#post-grid-<?php echo $grid_id; ?> .layer-media .gallery").owlCarousel({
                    
                    items : 1,
                    navText : ["",""],
                    autoplay: true,
                    loop: true,
                    autoHeight : true,	
                    nav : false,	
                    dots : false,
                    })
            });
    
    </script>