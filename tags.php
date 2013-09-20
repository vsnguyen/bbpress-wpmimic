<?php bb_get_header(); ?>
<div class="bbcrumb">Browse: <a href="<?php bb_option('uri'); ?>">Home</a> / <?php _e('Tags'); ?></div>
<div class="wrapper">
	<div id="forums">
    	<div class="fcontent">
    		<h2>Tags</h2>
    		<?php bb_tag_heat_map( 9, 38, 'pt', 80 ); ?>
    	</div>
	</div>
</div>
<?php bb_get_footer(); ?>