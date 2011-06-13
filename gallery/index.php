<?php
//switch the control to respective components
global $bp;
if(bp_is_gallery_directory())
	locate_template( array( 'gallery/directory.php' ), true ) ;

else if($bp->current_component==$bp->groups->slug)
locate_template( array( 'gallery/groups/index.php' ), true ) ;
else
locate_template( array( 'gallery/members/index.php' ), true ) ;
				

?>