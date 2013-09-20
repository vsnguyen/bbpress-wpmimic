<?php bb_get_header(); ?>
<div class="bbcrumb"><span class="nav"><?php topic_pages(); ?></span>Browse: <a href="<?php bb_option('uri'); ?>">Home</a> / <a href="<?php forum_link(); ?>"><?php forum_name(); ?></a> / <?php topic_title(); ?></div>
<div id="topics"><!-- Topics -->
    <div id="aboutpost">
        <h2>Info</h2>
        <ul>
            <li><?php printf(__('Posted %1$s ago'), get_topic_start_time(), get_topic_author()) ?></li>
            <li><?php printf(__('By %2$s'), get_topic_start_time(), get_topic_author()) ?></li>
            <li><?php printf(__('<a href="%1$s">Latest reply</a> from %2$s'), attribute_escape( get_topic_last_post_link() ), get_topic_last_poster()) ?></li>
            <?php if ( bb_is_user_logged_in() ) : $class = 0 === is_user_favorite( bb_get_current_user_info( 'id' ) ) ? ' class="is-not-favorite"' : ''; ?>
            <li<?php echo $class;?> id="favorite-toggle"><?php user_favorites_link(); ?></li>
            <?php endif; do_action('topicmeta'); ?>
            <li><a href="<?php topic_rss_link(); ?>" class="rss-link"><?php _e('RSS feed for this topic') ?></a></li>
        </ul>   
        <?php if ( bb_current_user_can( 'delete_topic', get_topic_id() ) || bb_current_user_can( 'close_topic', get_topic_id() ) || bb_current_user_can( 'stick_topic', get_topic_id() ) || bb_current_user_can( 'move_topic', get_topic_id() ) ) : ?>
        <h2>Administer</h2>
        <ul>     
            <li><?php topic_delete_link(); ?></li>
            <li><?php topic_close_link(); ?></li>
            <li><?php topic_sticky_link(); ?></li>
            <li><?php topic_move_dropdown(); ?></li>
        </ul>    
        <?php endif; ?>
        <h2>Tags</h2>
        <?php topic_tags(); ?>
    </div>
    <div id="entry">
        <h2<?php topic_class( 'topictitle' ); ?>>
            <span id="topic_labels"><?php bb_topic_labels(); ?></span><?php topic_title(); ?> <span id="topic_posts">(<?php topic_posts_link(); ?>)</span>
        </h2>             
        <?php do_action('under_title', ''); ?>
        <?php if ($posts) : ?><?php foreach ($posts as $bb_post) : $del_class = post_del_class(); ?>
        <?php bb_post_template(); ?>        
        <?php endforeach; endif; ?>
        <?php if ( topic_is_open( $bb_post->topic_id ) ) : ?>
            <?php  if(bb_is_user_logged_in())	{ echo post_form();} ?>
        <?php else : ?>
            <h2><?php _e('Topic Closed') ?></h2>
            <p><?php _e('This topic has been closed to new replies.') ?></p>
        <?php endif; ?>
    </div>
</div><!-- //t -->
<div class="bbcrumb"><span class="nav"><?php topic_pages(); ?></span>Browse: <a href="<?php bb_option('uri'); ?>">Home</a> / <a href="<?php forum_link(); ?>"><?php forum_name(); ?></a> / <?php topic_title(); ?></div>
<?php bb_get_footer(); ?>