<?php bb_get_header(); ?>
        <div class="bbcrumb">Browse: <a href="<?php bb_option('uri'); ?>">Home</a> / <a href="<?php bb_option('uri'); ?>profile.php">Profile</a> / <?php echo get_user_name( $user->ID ); ?> / Edit</div>
        <div id="sidebar"><!-- Sidebar -->
            <ul>
                <li style="border: none; padding: 25px; background: #eee; border: 1px solid #ddd;"><?php echo bb_get_avatar( $user->ID,$size='250'); ?></li>
				 <?php
                 global $bb_table_prefix;
                 $query1 = "SELECT COUNT(*) FROM ".$bb_table_prefix."posts WHERE poster_id = $user_id AND post_status = 0";
                 $query2 = "SELECT COUNT(*) FROM ".$bb_table_prefix."posts WHERE poster_id = $user_id AND post_status = 0 AND post_position = 1";
                 echo "<li>Forum Posts: ".$bbdb->get_var($query1)."</li>";
                 echo "<li>Topics Started: ".$bbdb->get_var($query2)."</li>"; ?>              
            </ul>
			<?php if (bb_profile_data() ); ?>
            <?php if (is_bb_profile()) profile_menu(); ?>
        </div><!-- /sidebar -->
        <div id="content"><!-- Content -->
            <form method="post" action="<?php profile_tab_link($user->ID, 'edit');  ?>">
            <fieldset>
                <h2><?php _e('Profile Info'); ?></h2>
                <?php bb_profile_data_form(); ?>
            </fieldset>
    
            <?php if ( bb_current_user_can( 'edit_users' ) ) : ?>
            <fieldset>
                <h2><?php _e('Administration'); ?></h2>
                <?php bb_profile_admin_form(); ?>
            </fieldset>
            <?php endif; ?>
    
            <?php if ( bb_current_user_can( 'change_user_password', $user->ID ) ) : ?>
            <fieldset>
                <h2><?php _e('Password'); ?></h2>
                <p><?php _e('To change your password, enter a new password twice below:'); ?></p>
                <?php bb_profile_password_form(); ?>
            </fieldset>
            <?php endif; ?>
            
            <p class="submit right"><input type="submit" name="Submit" value="<?php echo attribute_escape( __('Update Profile &raquo;') ); ?>" /></p>
            </form>
            
            <form method="post" action="<?php profile_tab_link($user->ID, 'edit');  ?>">
            <p class="submit left"><?php bb_nonce_field( 'edit-profile_' . $user->ID ); ?> <?php user_delete_button(); ?></p>
            </form>
		</div><!-- /content -->
<?php bb_get_footer(); ?>