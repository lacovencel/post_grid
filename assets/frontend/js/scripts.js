jQuery(document).ready(function($)
	{



		$(window).resize(function() {
			
			//var windowWidth = $(window).width();
			//var width = $('#post-grid-7 .grid-items').width();
			
			//$('.post-grid-debug').html(width+' - '+windowWidth);
			
		});



		$(document).on('keyup', '.post-grid .nav-search .search', function(e)
			{
				var keyword = $(this).val();
				var grid_id = $(this).attr('grid_id');
                var key = e.which;

                if(key == 13){
                    // the enter key code
                    var is_reset = 'yes';

                    $(this).addClass('loading');

                    $('.pagination').fadeOut();

                    $.ajax({
                        type: 'POST',
                        context: this,
                        url:post_grid_ajax.post_grid_ajaxurl,
                        data: {"action": "post_grid_ajax_search", "grid_id":grid_id,"keyword":keyword,"is_reset":is_reset,},
                        success: function(data){

                            $('#post-grid-'+grid_id+' .grid-items').html(data);
                            $(this).removeClass('loading');
                        }
                    });

                }
                else{
                    var is_reset = 'no';
                    if(keyword.length>3){
                        $(this).addClass('loading');

                        $('.pagination').fadeOut();

                        $.ajax({
                            type: 'POST',
                            context: this,
                            url:post_grid_ajax.post_grid_ajaxurl,
                            data: {"action": "post_grid_ajax_search", "grid_id":grid_id,"keyword":keyword,"is_reset":is_reset,},
                            success: function(data){

                                $('#post-grid-'+grid_id+' .grid-items').html(data);
                                $(this).removeClass('loading');
                            }
                        });
                    }

                }



				// if(keyword.length>3){
				// 	$(this).addClass('loading');
				//
				// 	$('.pagination').fadeOut();
				//
				// 	$.ajax(
				// 		{
				// 	type: 'POST',
				// 	context: this,
				// 	url:post_grid_ajax.post_grid_ajaxurl,
				// 	data: {"action": "post_grid_ajax_search", "grid_id":grid_id,"keyword":keyword,},
				// 	success: function(data)
				// 			{
				//
				// 				$('.post-grid .grid-items').html(data);
				// 				$(this).removeClass('loading');
                //
				// 			}
				// 		});
                //
                //
				//
				// 	}
				
			})





		$(document).on('click', '.post-grid .nav-filter .filter', function()
			{
				$('.post-grid .nav-filter .filter').removeClass('active');
				
				
				if($(this).hasClass('active'))
					{
						//$(this).removeClass('active');
					}
				else
					{
						$(this).addClass('active');
					}
				
			})






		$(document).on('click', '.post-grid .paginate-ajax a.page-numbers', function(event)
			{
				event.preventDefault();
				
				$('.post-grid .paginate-ajax .page-numbers').removeClass('current');
				
				$(this).addClass('current');
				
				var current_page = parseInt($(this).text());								
				var paged = parseInt($(this).attr('paged'));
				var grid_id = parseInt($(this).parent().attr('grid-id'));

				$.ajax(
					{
				type: 'POST',
				context: this,
				url:post_grid_ajax.post_grid_ajaxurl,
				data: {"action": "post_grid_paginate_ajax", "grid_id":grid_id,"current_page":current_page},
				success: function(data)
						{	

						var response 		= JSON.parse(data)
						var data 	= response['html'];	
						var pagination 	= response['pagination'];							
							
							if(post_grid_masonry_enable=='yes'){
								
									var $grid = $('#post-grid-'+grid_id+' .grid-items').masonry({});
									$grid.masonry('destroy');
									$grid.html( data ).masonry();

									$grid.masonry( 'reloadItems' );
									$grid.masonry( 'layout' );

									$('#post-grid-'+grid_id+' .grid-items').masonry({"isFitWidth": true});
									$('#paginate-ajax-'+grid_id).html( pagination );

								}
							else{
									$('#post-grid-'+grid_id+' .grid-items').html( data );
									$('#paginate-ajax-'+grid_id).html( pagination );									
									
								}


							$("#paginate-ajax-"+grid_id).ScrollTo({
								duration: 1000,
								easing: 'linear'
							});




							
						}
					});

			})







		$(document).on('click', '.post-grid .load-more', function()
			{
				
				
				var paged = parseInt($(this).attr('paged'));
				var per_page = parseInt($(this).attr('per_page'));
				var grid_id = parseInt($(this).attr('grid_id'));
				var terms = $('#post-grid-'+grid_id+' .nav-filter .filter.active').attr('terms-id');
				
				//alert(terms);
				
				if(terms == null || terms == '')
					{
						terms = '';
					}
						
				$(this).addClass('loading');

				
				$.ajax(
					{
				type: 'POST',
				context: this,
				url:post_grid_ajax.post_grid_ajaxurl,
				data: {"action": "post_grid_ajax_load_more", "grid_id":grid_id,"per_page":per_page,"paged":paged,"terms":terms,},
				success: function(data)
						{	

											

						  // append items to grid
							
							// add and lay out newly appended items
							
							if(post_grid_masonry_enable=='yes'){
								
									var $grid = $('#post-grid-'+grid_id+' .grid-items').masonry({});
									$grid.masonry('destroy');
									$grid.append( data ).masonry( 'appended', data, true );
									
									
									$grid.masonry( 'reloadItems' );
									$grid.masonry( 'layout' );
									
		
									$('#post-grid-'+grid_id+' .grid-items').masonry({"isFitWidth": true});
								
								
								}
							else{
									$('#post-grid-'+grid_id+' .grid-items').append( data );
								}

/*

							 $('html, body').animate({
									scrollTop: parseInt($("#load-more-"+grid_id).offset().top)
								}, 1000);

*/

							$("#load-more-"+grid_id).ScrollTo({
								duration: 2000,
								easing: 'linear'
							});


							$(this).attr('paged',(paged+1));
						
							if($(this).hasClass('loading')){
								
									$(this).removeClass('loading');
								}
							
						}
					});

				//alert(per_page);
			})

	});	






