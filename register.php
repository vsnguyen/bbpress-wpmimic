<?php bb_get_header(); ?>
        <div class="bbcrumb">Browse: <a href="<?php bb_option('uri'); ?>">Home</a> / Register</div>
        <div id="fcontent"><!-- FContent -->
			<?php if ( !bb_is_user_logged_in() ) : ?>
            <form method="post" action="<?php bb_uri('register.php', null, BB_URI_CONTEXT_FORM_ACTION + BB_URI_CONTEXT_BB_USER_FORMS); ?>">
            <fieldset>
            <?php $user_login_error = $bb_register_error->get_error_message( 'user_login' );?>
            <table>
            	<thead>
                	<th class="title">Registation</th>
                    <th>Profile Information</th>
                </thead>
                <tr class="form-field form-required required<?php if ( $user_login_error ) echo ' form-invalid error'; ?>">
                    <td class="title">
                        <label for="user_login"><?php _e('Username'); ?></label>
                        <?php if ( $user_login_error ) echo "<em>$user_login_error</em>"; ?>
                    </td>
                    <td>
                        <input name="user_login" type="text" id="user_login" size="30" maxlength="30" value="<?php echo $user_login; ?>" />
                    </td>
                </tr>
            <?php            
            if ( is_array($profile_info_keys) ) :
                foreach ( $profile_info_keys as $key => $label ) :
                    $class = 'form-field';
                    if ( $label[0] ) {
                        $class .= ' form-required required';
                    }
                    if ( $profile_info_key_error = $bb_register_error->get_error_message( $key ) )
                        $class .= ' form-invalid error';
            
            ?>
            
                <tr class="<?php echo $class; ?>">
                    <td class="title">
                        <label for="<?php echo $key; ?>"><?php echo $label[1]; ?></label>
                        <?php if ( $profile_info_key_error ) echo "<em>$profile_info_key_error</em>"; ?>
                    </td>
                    <td>
                        <input name="<?php echo $key; ?>" type="text" id="<?php echo $key; ?>" size="30" maxlength="140" value="<?php echo $$key; ?>" />
                    </td>
                </tr>
				<?php
                endforeach; // profile_info_keys
                endif; // profile_info_keys
                ?>
                <tr>
                	<td class="title"><small style="color: red;"><?php _e("Your password will be emailed to the address you provide."); ?></small></td>
                    <?php do_action('extra_profile_info', $user); ?>
                    <td><input type="submit" name="Submit" value="<?php echo esc_attr__( 'Register...' ); ?>" /></td>
                </tr>
            </table>
            </fieldset>
            </form>
            <?php else : ?>
            <p><?php _e('You&#8217;re already logged in, why do you need to register?'); ?> </p>
            <?php endif; ?>
        </div><!-- /fcontent -->
<?php bb_get_footer(); ?>