<?php bb_get_header(); ?>
        <div class="bbcrumb">Browse: <a href="<?php bb_option('uri'); ?>">Home</a> / <?php _e('Register Success'); ?></div>
    	<div id="fcontent">
            <h2 id="register"><?php _e('Great!'); ?></h2>
            <p><?php printf(__('Your registration as <strong>%s</strong> was successful. Within a few minutes you should receive an email with your password.'), $user_login) ?></p>
		</div>
<?php bb_get_footer(); ?>
