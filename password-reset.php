<?php bb_get_header(); ?>
<div class="bbcrumb">Browse: <a href="<?php bb_option('uri'); ?>">Home</a> / Password Reset</div>
<div class="wrapper">
	<div id="forums">
    	<div id="fcontent">
			<?php if ( $reset ) : ?>
            <p><?php _e('Your password has been reset and a new one has been mailed to you.'); ?></p>
            <?php else : ?>
            <p><?php _e('An email has been sent to the address we have on file for you. If you don&#8217;t get anything within a few minutes, or your email has changed, you may want to get in touch with the webmaster or forum administrator here.'); ?></p>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php bb_get_footer(); ?>
