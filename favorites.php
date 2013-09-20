<?php bb_get_header(); ?>
<div class="bbcrumb"><span class="nav"><?php favorites_pages(); ?></span>Browse: <a href="<?php bb_option('uri'); ?>">Home</a> / <a href="<?php bb_option('uri'); ?>profile.php">Profile</a> / <?php echo get_user_name( $user->ID ); ?> / Favorite</div>
<div class="wrapper">
    <div id="forums">
        <div id="sidebar">
            <ul>
                <li style="border: none; padding: 25px; background: #eee; border: 1px solid #ddd;"><?php echo bb_get_avatar( $user->ID,$size='250'); ?></li>
                 <?php
                 global $bb_table_prefix;
                 $query1 = "SELECT COUNT(*) FROM ".$bb_table_prefix."posts WHERE poster_id = $user_id AND post_status = 0";
                 $query2 = "SELECT COUNT(*) FROM ".$bb_table_prefix."posts WHERE poster_id = $user_id AND post_status = 0 AND post_position = 1";
                 echo "<li>Forum Posts: ".$bbdb->get_var($query1)."</li>";
                 echo "<li>Topics Started: ".$bbdb->get_var($query2)."</li>"; ?>
                <?php if ( $user_id == bb_get_current_user_info( 'id' ) ) : ?>
                <li><?php printf(__('<a href="%s"><abbr title="Really Simple Syndication">RSS</abbr> feed</a>.'), attribute_escape( get_favorites_rss_link( bb_get_current_user_info( 'id' ) ) )) ?></li>
                <?php endif; ?>                  
            </ul>
            <?php if (bb_profile_data() ); ?>
            <?php if (is_bb_profile()) profile_menu(); ?>
        </div>        
        <div id="content">
            <table>
            <thead>
            <tr>
                <th class="title"><?php _e('Current Favorites'); ?><?php if ( $topics ) echo ' (' . $favorites_total . ')'; ?></th>
                <th><?php _e('Posts'); ?></th>
                <th><?php _e('Freshness'); ?></th>
                <th><?php _e('Remove'); ?></th>
            </tr>
            </thead>
            <tbody>
            <?php if ( $topics ) : ?>
            <?php foreach ( $topics as $topic ) : ?>
            <tr<?php topic_class(); ?>>
                <td class="title"><?php bb_topic_labels(); ?> <a href="<?php topic_link(); ?>"><?php topic_title(); ?></a></td>
                <td><?php topic_posts(); ?></td>
                <td><a href="<?php topic_last_post_link(); ?>"><?php topic_time(); ?></a></td>
                <td><?php user_favorites_link('', array('mid'=>'&times;'), $user_id); ?></td>
            </tr>
            <?php endforeach; ?>
            <?php else: if ( $user_id == bb_get_current_user_info( 'id' ) ) : ?>
            
            <tr>
                <td class="title"><?php _e('You currently have no favorites.'); ?></td>
                <td></td>
                <td></td>
            </tr>           
            <?php else : ?>
            <tr>
                <td class="title"><?php echo get_user_name( $user_id ); ?> <?php _e('currently has no favorites.'); ?></td>
                <td></td>
                <td></td>
            </tr>        
            <?php endif; endif; ?>
            </tbody>
            </table>
            <?php favorites_pages(); ?>
        </div>
	</div>
</div>
<div class="bbcrumb"><span class="nav"><?php favorites_pages(); ?></span>Browse: <a href="<?php bb_option('uri'); ?>">Home</a> / <a href="<?php bb_option('uri'); ?>profile.php">Profile</a> / <?php echo get_user_name( $user->ID ); ?> / Favorite</div>
<?php bb_get_footer(); ?>