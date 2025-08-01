<?php
	
/* Calendar Functions */

function render_calendar() {
?>
	<div class="row">
	
		<div class="col-lg-4 d-none d-lg-flex align-self-center">
	
			<div class="calendar-dropdown">
	
				<button type="button" id="dropdown-menu" class="btn btn-sm btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-rss"></i> <?php _e('Subscribe'); ?> </button>
	
	            <ul class="dropdown-menu" aria-labelledby="dropdown-menu" >
	
		            <?php if ( have_rows('calendars', 'options') ): ?>
	
						<?php while ( have_rows('calendars', 'options') ): the_row(); ?>
	
							<li>
	
								<a href="<?php the_sub_field('calendar_ical'); ?>"><i class="fa fa-download"></i> <label><?php the_sub_field('calendar_name'); ?></label></a>
	
							</li>
	
						<?php endwhile; ?>		
	
					<?php endif; ?>			
	
					<?php if ( have_rows('school_calendars', 'options') ): ?>
	
						<li role="separator" class="divider"></li>
	
						<li class="dropdown-header"><?php _e('School Calendars'); ?></li>
	
						<?php while ( have_rows('school_calendars', 'options') ): the_row(); ?>
	
							<li>
	
								<a href="<?php the_sub_field('calendar_ical'); ?>"><i class="fa fa-download"></i> <label><?php the_sub_field('calendar_name'); ?></label></a>
	
							</li>
	
						<?php endwhile; ?>
	
					<?php endif; ?>
	
	            </ul>
	
			</div>
	
		</div>
	
		<div class="col-12 col-md-7 col-lg-4 text-center text-md-left text-lg-center">
	
			<h1 id="month" class="mb-0"><?php echo date('F Y'); ?></h1>
	
		</div>
	
		<div id="calendar-buttons" class="col-12 col-md-5 col-lg-4 text-center text-md-right align-self-center">
	
			<button id="prev" class="btn btn-primary btn-sm"><i class="fa fa-caret-left"></i> <?php _e('Prev'); ?></button>
	
			<button id="next" class="btn btn-primary btn-sm"><?php _e('Next'); ?> <i class="fa fa-caret-right "></i></button>
	
		</div>
	
	</div>
	
	<div class="row">
	
		<div class="col-12 mt-2">
	
			<div id="calendar"></div>
	
		</div>
	
	</div>
	
	<script>
	
		$( function() {
	
			window.mobilecheck = function() {
	
				var check = false;
	
				(function(a){if(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i.test(a)||/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0,4))) check = true;})(navigator.userAgent||navigator.vendor||window.opera);
	
				return check;
	
			};
	    
			var initialEventSources = [];
	
			var allEventSources = [];
			
			<?php if ( have_rows('calendars', 'options') ): ?> // Get district calendars
	
				<?php while ( have_rows('calendars', 'options') ): the_row(); ?>
	
					<?php $calendar_address = get_sub_field('calendar_address'); ?>
	
					<?php $calendar_name = get_sub_field('calendar_name'); ?>
	
					<?php $calendar_color = get_sub_field('calendar_color'); ?>
	
					<?php if ( get_sub_field('visible') ): ?> // Load calendars that are marked as visable
						
						initialEventSources.push({
							id: '<?php echo str_replace(' ' , '_', $calendar_name); ?>', 
							googleCalendarId: '<?php echo $calendar_address; ?>', 
							textColor: '<?php echo $calendar_color; ?>',
							backgroundColor: '<?php echo $calendar_color; ?>',
							borderColor: '<?php echo $calendar_color; ?>',
						});
					
					<?php endif; ?>
					
					
					allEventSources.push( { // Load all available calendars
						id: '<?php echo str_replace(' ' , '_', $calendar_name); ?>', 
						googleCalendarId: '<?php echo $calendar_address; ?>', 
						textColor: '<?php echo $calendar_color; ?>',
						backgroundColor: '<?php echo $calendar_color; ?>',
						borderColor: '<?php echo $calendar_color; ?>',
					} );
					
				<?php endwhile; ?>
				
			<?php endif; ?>
						
			<?php if ( have_rows('school_calendars', 'options') ): ?> // If applicable, get school calendars
				
				<?php while ( have_rows('school_calendars', 'options') ): the_row(); ?>
				
					<?php $calendar_address = get_sub_field('calendar_address'); ?>
				
					<?php $calendar_name = get_sub_field('calendar_name'); ?>
				
					<?php $calendar_color = get_sub_field('calendar_color'); ?>
					
					// Load all available calendars
					allEventSources.push({
						id: '<?php echo str_replace(' ' , '_', $calendar_name); ?>', 
						googleCalendarId: '<?php echo $calendar_address; ?>', 
						textColor: '<?php echo $calendar_color; ?>',
						backgroundColor: '<?php echo $calendar_color; ?>',
						borderColor: '<?php echo $calendar_color; ?>',
					});
					
				<?php endwhile; ?>
				
			<?php endif; ?>
					
			// Toggle function for calendars
			$( '.dropdown-menu li' ).on( 'click', function( event ) {
		       
		    	var $checkbox = $(this).find('.checkbox');
		        
		        if ( ! $checkbox.length ) {
		           
		        	return;
		        
		        }
		        
		        var $input = $checkbox.find( 'input' );
		        
		        if ( $input.is( ':checked' ) ) {
			        
		            $input.prop( 'checked', false );
		            
		            $( '#calendar' ).fullCalendar( 'removeEventSource', allEventSources[$input.val()] );
		       
		        } else {
		       
		            $input.prop( 'checked', true );
		       
		            $( '#calendar' ).fullCalendar( 'addEventSource', allEventSources[$input.val()] );
		       
		        }
		        
		        $( '#calendar' ).fullCalendar( 'rerenderEvents' );
		        
		        return false;
		        
	    	} ); 
			
			$( '#calendar-dropdown-view' ).on( 'click', function( event ) { // Only close dropdown when clicking outside
			   
			    var events = $._data(document, 'events') || {};
			   
			    events = events.click || [];
			   
			    for ( var i = 0; i < events.length; i++ ) {
			   
			        if ( events[i].selector ) {
			            
			            if( $( event.target ).is( events[i].selector ) ) { //Check if the clicked element matches the event selector
			                
			                events[i].handler.call( event.target, event );
			            
			            }
			
			            // Check if any of the clicked element parents matches the 
			            // delegated event selector (Emulating propagation)
			            $( event.target ).parents( events[i].selector ).each( function() {
			               
			                events[i].handler.call(this, event);
			            
			            } );
			            
			        }
			        
			    }
			    
			    event.stopPropagation(); //Always stop propagation
			    
			} );
		
			$( '#calendar' ).fullCalendar( {
	
				header: false,
				
				defaultView: window.mobilecheck() ? "listMonth" : "month",
				
				displayEventTime: true, // show the time column in list view
				
				googleCalendarApiKey: 'AIzaSyCtn4VYI0llZ2sEGiMgezxWyBDTVuKaHds',
					
				eventSources: initialEventSources,
				
				timezone: 'America/Los_Angeles',
	
				eventClick: function ( event ) {
					
					// opens events in a popup window
					
					window.open( event.url, '_blank', 'width=700,height=600' );
					
					return false;
				
				},
				
			} );
			
			$( '#prev' ).on( 'click', function() {
			    
			    $( '#calendar' ).fullCalendar( 'prev' ); // call method
			    
			    var moment = $( '#calendar' ).fullCalendar( 'getDate' );
			    
			    $( '#month' ).html( moment.format( 'MMMM YYYY' ) );
			
			} );
	
			$( '#next' ).on( 'click', function() {
				
				$( '#calendar' ).fullCalendar( 'next' ); // call method
				
				var moment = $( '#calendar' ).fullCalendar( 'getDate' );
				
				$( '#month' ).html( moment.format( 'MMMM YYYY' ) );
			
			} );
			
		} );
		
	</script>

<?php

}

function render_list_view_district() { 

?>
	
	<div id='calendar-list-district'></div>
	
	<script>
					
		document.addEventListener('DOMContentLoaded', function() {
		
			let calendarEl = document.getElementById( 'calendar-list-district' );
		
			let calendar = new FullCalendar.Calendar( calendarEl, {
								
				googleCalendarApiKey: 'AIzaSyCtn4VYI0llZ2sEGiMgezxWyBDTVuKaHds',
				
				initialView: 'list',
				
				timeZone: 'local',
				
				themeSystem: 'bootstrap',
				
				eventSources: [
					
					{
					
						googleCalendarId: 'msd.oregonk-12.net_pahhc93bihmeglb881ofdqen5g@group.calendar.google.com'
					
					},
					{
					
						googleCalendarId: 'msd.oregonk-12.net_pjsts5qmq4td8fq4jtppe6g3b0@group.calendar.google.com'

					}
										
 				],
 				
 				duration: { days: 60 },
 				
 				eventSourceSuccess: function( events ) {

		            if ( events.length > 4 ) {
		
		                events.splice( 4 ); 		            
		            
		            }
		
		        }

			} );
			
			calendar.render();
			
		} );
		
	</script>
	
<?php

}