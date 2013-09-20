<?php bb_get_header(); ?>
        <div class="bbcrumb"><span class="nav"><?php forum_pages(); ?></span>Browse: <a href="<?php bb_option('uri'); ?>">Home</a> / <a href="<?php forum_link(); ?>"><?php forum_name(); ?></a></div>
        <div id="fcontent">
			<?php if ( bb_forums( $forum_id ) ) : ?>
            <!-- Subforums -->
            <table id="sub-forums">
                <thead>
                <tr>
                    <th class="title"><?php _e('Subforums'); ?></th>
                    <th><?php _e('Topics'); ?></th>
                    <th><?php _e('Posts'); ?></th>
                </tr>
                </thead>
                <tbody>
                <?php while ( bb_forum() ) : ?>
                <tr<?php bb_forum_class(); ?>>
                    <td class="title"><?php bb_forum_pad( '<div class="nest">' ); ?><a href="<?php forum_link(); ?>"><?php forum_name(); ?></a><small><?php forum_description( array( 'before' => '', 'after' => '' ) ); ?></small><?php bb_forum_pad( '</div>' ); ?></td>
                    <td><?php forum_topics(); ?></td>
                    <td><?php forum_posts(); ?></td>
                </tr>
                <?php endwhile; ?>
                </tbody>
            </table>
            <?php endif; ?>
        
            <table id="forum-topics">
                <thead>
                <tr>
                    <th class="title"><?php forum_name(); ?> <?php _e('Topics'); ?> <?php if(bb_is_user_logged_in())	{ echo "&mdash; "; echo bb_new_topic_link(); } ?></th>
                    <th><?php _e('Posts'); ?></th>
                    <th><?php _e('Last Poster'); ?></th>
                    <th><?php _e('Freshness'); ?></th>
                </tr>
                </thead>
                <tbody>
                <!-- Sticky -->
                <?php if ( $topics || $stickies ) : ?>
                <?php if ( $stickies ) : foreach ( $stickies as $topic ) : ?>
                <tr<?php topic_class(); ?>>
                    <td class="title"><?php bb_topic_labels(); ?> <a href="<?php topic_link(); ?>"><?php topic_title(); ?></a></td>
                    <td><?php topic_posts(); ?></td>
                    <td><?php topic_last_poster(); ?></td>
                    <td><a href="<?php topic_last_post_link(); ?>"><?php topic_time(); ?></a></td>
                </tr>
                <?php endforeach; ?>
                <?php endif; ?>
                <?php if ( $topics ) : foreach ( $topics as $topic ) : ?>
                <tr<?php topic_class(); ?>>
                    <td class="title"><?php bb_topic_labels(); ?> <a href="<?php topic_link(); ?>"><?php topic_title(); ?></a></td>
                    <td><?php topic_posts(); ?></td>
                    <td><?php topic_last_poster(); ?></td>
                    <td><a href="<?php topic_last_post_link(); ?>"><?php topic_time(); ?></a></td>
                </tr>
                <?php endforeach; endif; ?>
                <?php endif; ?>
                </tbody>
            </table>     
            <?php forum_pages( array( 'before' => '<div class="nav">', 'after' => '</div>' ) ); ?>      
            <?php if(bb_is_user_logged_in()) { echo post_form(); } ?>
        </div>   
<?php bb_get_footer(); ?>