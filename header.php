<?php
$_head_profile_attr = '';
if ( bb_is_profile() ) {
	global $self;
	if ( !$self ) {
		$_head_profile_attr = ' profile="http://www.w3.org/2006/03/hcard"';
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"<?php bb_language_attributes( '1.1' ); ?>>
<head>
	<title><?php bb_title() ?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="distribution" content="global" />
    <meta name="robots" content="follow, all" />
    
	<?php bb_feed_head(); ?>
    <link rel="stylesheet" href="<?php bb_option('uri'); ?>/bb-templates/WPMimic/resets.css" type="text/css" />
	<link rel="stylesheet" href="<?php bb_stylesheet_uri(); ?>" type="text/css" />    
	<?php if ( 'rtl' == bb_get_option( 'text_direction' ) ) : ?>
	<link rel="stylesheet" href="<?php bb_stylesheet_uri( 'rtl' ); ?>" type="text/css" />
	<?php endif; ?>

	<?php bb_head(); ?>
    <!--[if IE]>
    	<style type="text/css">
        	#header ul {margin-top:-8px;}
            #remember	{border: none; background: none;}
            #topics input,
            #topics textarea,
            #forums input,
            #forums textarea	{margin-bottom: 5px;}
            .post-user li.last-child	{border: none;}
		</style>        
    <![endif]-->
</head>

<body id="<?php bb_location(); ?>">

<div class="wrapper header"><!-- Headerbar -->
	<div id="header">
    
    	<!-- Forum Title and Description -->
        <h1><a href="<?php bb_option('uri'); ?>"><?php bb_option('name'); ?></a>
        <span class="description"><?php if ( bb_get_option('description') ) : ?><?php bb_option('description'); ?><?php endif; ?></span></h1>
        <?php search_form(); ?>
        
        <!-- Menu Tab -->
        <?php include_once("menutab.php"); ?>
    </div>
</div><!-- //W-H -->

<div class="wrapper headline"><!-- Headerline -->
	<div id="headline">
        <h2>
			<?php if(is_front()) { echo "Forums"; } ?>
			<?php if(is_bb_search())	{ echo "Search"; } ?>
			<?php if(bb_is_profile)	{ echo get_user_name($user->ID); } ?>
			<?php if(bb_tag_name)	{ echo bb_tag_name(); } ?>
			<?php forum_name(); ?>
            <?php if(in_array (bb_get_location(), array ('register-page'))) echo Registration; ?>
            <?php if(in_array (bb_get_location(), array ('login-page'))) echo Login; ?>
            <?php if(in_array (bb_get_location(), array ('stats-page'))) echo Statistics; ?>
        </h2>
        <div class="hlright"><?php if ( !in_array( bb_get_location(), array( 'login-page', 'register-page' ) ) ) login_form(); ?></div>
    </div>
</div><!-- //W-U -->
<div id="forums"><!-- Forums -->