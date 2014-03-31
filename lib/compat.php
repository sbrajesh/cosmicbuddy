<?php
/**
 * 3rd party compatiblity if any
 */
//support for recent profile visitors plugin if enabled
add_action("cb_after_profile_fields","cb_show_my_recent_visitor");//hook this to template
function cb_show_my_recent_visitor(){
    global $bp;
   if(!function_exists("visitors_is_active_visitor_recording"))
   return;

   if(!bp_is_my_profile()||!visitors_is_active_visitor_recording($bp->displayed_user->id))//show only for logged in users and on their Home if they have set a prefence of showing it
        return;
    $recent_visitors=visitors_get_recent_visitors();
   
   if(empty($recent_visitors))
       return;//if no visists yest, do not show at all
	   ?>
<div class='box recent-visitors'>
				
<div id="profile-activity" class='box-content'>
	<div class="bp-widget">
	<h4><?php _e("Recent Visitors","cb");?></h4>

<?php				
    
    foreach($recent_visitors as $visitor){
       echo visitors_build_visitor_html($visitor);
    }
?>
	</div>
  </div>
 </div> 
<?php	
   
}