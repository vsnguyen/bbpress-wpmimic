<?php bb_get_header(); ?>
        <div class="bbcrumb">Browse: <a href="<?php bb_option('uri'); ?>">Home</a> / <?php echo $profile_page_title; ?></div>
    	<div id="fcontent"><!-- FContent -->
            <h2><?php echo get_user_name( $user->ID ); ?></h2>
            <?php bb_profile_base_content(); ?>
		</div><!-- //fcontent -->
<?php bb_get_footer(); ?>