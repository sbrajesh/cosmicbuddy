<div class="user-image">

                <a href="<?php bp_group_permalink() ?>" class='user-profile-wrap'><?php 
global $bp;
 global $groups_template; echo  bp_core_fetch_avatar( array( 'item_id' => $groups_template->group->id, 'object' => 'group', 'height'=>100,'width'=>100,'type' => 'full', 'avatar_dir' => 'group-avatars', 'alt' => __( 'Group Avatar', 'buddypress' ) ) );

//bp_displayed_user_avatar( 'type=full&height=260&width=260' );
?></a>
<?php bp_group_join_button() ?>

<?php do_action( 'bp_group_menu_buttons' ) ?>
</div>
<div id="userbar">
		
		<ul id="bp-nav">
				<?php bp_get_options_nav() ?>
		</ul>
		
</div>
				

