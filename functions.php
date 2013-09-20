<?php


/** Code from bbMystique **/
if ( !function_exists( 'bb_auto_crumbs' ) ) :
/**
 * Generate Bread Crumbs
 *
 * @since 1.1
 * @param mixed $args
 */
function bb_auto_crumbs( $args = '' ) {
	echo apply_filters( 'bb_auto_crumbs', bb_get_auto_crumbs( $args ), $args );
}
endif;

if ( !function_exists( 'bb_get_auto_crumbs' ) ) :
/**
 * Generate Bread Crumbs
 *
 * @since 1.1
 * @param mixed $args
 */
function bb_get_auto_crumbs( $args ) {
	$defaults = array(
		'class'		=> 'bbcrumb',	/* Class for <div>, can be false */
		'id'		=> false,	/* ID for <div>, can be false */
		'span_current'	=> true,	/* The class for current page, can be false if you do not want any class (not for forum) */
		'current'	=> false,	/* Override the 'current' text (not for forum) */
		'force'		=> false,	/* Some pages like 404 have to force a to generate crumbs, this might also be used by plugins */
		'separator'	=> ' / '
	);
	$args = wp_parse_args( $args, $defaults );

	$r		= '';
	$crumbs		= array( bb_get_uri() => bb_get_option( 'name' )  );
	$location	= !$args['force'] ? bb_get_location() : $args['force'];
	$class		= $args['class'] ? ' class="' . $args['class'] . '"' : '';
	$id		= $args['id'] ? ' id="' . $args['id'] . '"' : '';

	switch ( $location ) {
		case 'front-page': /* For new topic */
			global $forums;
			if ( !$forums && isset( $_GET['new'] ) && '1' == $_GET['new'] )
				$crumbs['current'] = __( 'Add New Topic', 'WPMimic' );
			break;
		case 'login-page':
			$crumbs['current'] = __( 'Log in', 'WPMimic' );
			break;
		case 'profile-base': /* Is forced */
			global $user_id, $profile_page_title;
			$crumbs[get_user_profile_link( $user_id )] = get_user_display_name( $user_id );
			$crumbs['current'] = $profile_page_title;
			break;
		case 'profile-page': /* Also for favorites and profile edit */
			global $user_id;
			$crumbs[get_user_profile_link( $user_id )] = get_user_display_name( $user_id );
			if ( $tab = isset( $_GET['tab'] ) ? $_GET['tab'] : bb_get_path( 2 ) ) {
				if ( $tab == 'favorites' )
					$crumbs['current'] = __( 'Favorites', 'WPMimic' );
				elseif ( $tab == 'edit' )
					$crumbs['current'] = __( 'Edit Profile', 'WPMimic' );
			} else {
				$crumbs['current'] = __( 'Profile', 'WPMimic' );
			}
			break;
		case 'register-page':
			$crumbs['current'] = __( 'Register', 'WPMimic' );
			break;
		case 'search-page':
			$crumbs['current'] = __( 'Search', 'WPMimic' );
			break;
		case 'stats-page':
			$crumbs['current'] = __( 'Statistics', 'WPMimic' );
			break;
		case 'tag-page':
			$crumbs[bb_get_tag_page_link()] = __( 'Tags', 'WPMimic' );
			if ( bb_is_tag() )
				$crumbs['current'] = bb_get_tag_name();
			break;
		case 'view-page':
			$crumbs['current'] = get_view_name();
			break;
		case 'topic-page':
			$crumbs['direct_return'] = bb_get_forum_bread_crumb( array( 'separator' => $args['separator'] ) );
			$crumbs['current'] = $args['separator'] . get_topic_title();
			break;
		case 'forum-page':
			$crumbs['direct_return'] = bb_get_forum_bread_crumb( array( 'separator' => $args['separator'] ) );
			break;
		case 'topic-edit-page':
			$crumbs['current'] = __( 'Edit Post', 'WPMimic' );
			break;
		case '404': /* Is forced */
			$crumbs['current'] = __( 'Page not found!', 'WPMimic' );
			break;
		default:
			$crumbs = apply_filters( 'bb_get_auto_crumbs_location', $crumbs, $location, $args );
			break;
	}

	if ( count( $crumbs ) > 1 ) {
		$r .= '<div ' . $class . $id . '">';
		foreach ( $crumbs as $url => $text ) {
			switch ( $url ) {
				case 'direct_return': /* No &raquo, span or link, direct return */
					$r .= $text;
					break;
				case 'current': /* Checks if there is text for current, if not uses the one given in above switch. Also checks if span_current class is given or not */
					if ( !empty( $args['current'] ) )
						$text = $args['current'];
					$r .= ( !$args['span_current'] ) ? $text : '<span class="' . $args['current'] . '">' . $text . '</span>';
					break;
				case null: /* If no url, then just return with a &raquo; */
					$r .= $text . ' &raquo; ';
					break;
				default:
					$sep = in_array( $location, array( 'forum-page', 'topic-page' ) ) ? '' : $args['separator']; /* Separator is added in bb_get_form_bread_crumb too */
					$r .= '<a href="' . $url . '">' . $text . '</a>' . $sep;
					break;
			}
		}
		$r .= '</div>';
	}

	return apply_filters( 'bb_get_auto_crumbs', $r, $args );
}
endif;
