<?php bb_get_header(); ?>

	<?php include_once('main-forums.php'); ?>
    <div id="content"><!-- Content -->
        <?php if ( $topics || $super_stickies ) : ?>  
        <table id="forum-topics">
        	<thead>
            <tr>
                <th  class="title"><?php _e('Latest Discussions'); ?> <?php if(bb_is_user_logged_in())	{ echo "&mdash; "; echo bb_new_topic_link(); } ?></th>
                <th><?php _e('Posts'); ?></th>
                <th><?php _e('Last Poster'); ?></th>
                <th><?php _e('Freshness'); ?></th>
            </tr>
            </thead>
            <tbody>
			<?php if ( $super_stickies ) : foreach ( $super_stickies as $topic ) : ?>
            <tr<?php topic_class(); ?>>
                <td class="title"><?php bb_topic_labels(); ?> <a href="<?php topic_link(); ?>"><?php topic_title(); ?></a></td>
                <td><?php topic_posts(); ?></td>
                <td><?php topic_last_poster(); ?></td>
                <td><a href="<?php topic_last_post_link(); ?>"><?php topic_time(); ?></a></td>
            </tr>
            <?php endforeach; endif; ?>
			<?php if ( $topics ) : foreach ( $topics as $topic ) : ?>
            <tr<?php topic_class(); ?>>
                <td  class="title"><?php bb_topic_labels(); ?> <a href="<?php topic_link(); ?>"><?php topic_title(); ?></a></td>
                <td><?php topic_posts(); ?></td>
                <td><?php topic_last_poster(); ?></td>
                <td><a href="<?php topic_last_post_link(); ?>"><?php topic_time(); ?></a></td>
            </tr>
            <?php endforeach; endif; ?>
            </tbody>
        </table>
        <?php endif; // $topics ?>
		<?php bb_latest_topics_pages( array( 'before' => '<div class="nav">', 'after' => '</div>' ) ); ?>
        <?php  if(bb_is_user_logged_in())	{ echo post_form();} ?>
    </div><!-- //c -->

<?php bb_get_footer(); ?>