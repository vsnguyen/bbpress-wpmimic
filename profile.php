<?php bb_get_header(); ?>
        <div class="bbcrumb"><span class="nav"><?php profile_pages(); ?></span>Browse: <a href="<?php bb_option('uri'); ?>">Home</a> / <a href="<?php bb_option('uri'); ?>profile.php">Profile</a> / <?php echo get_user_name( $user->ID ); ?></div>
        <div id="sidebar"><!-- Sidebar -->
            <ul>
                <li style="border: none; padding: 25px; background: #eee; border: 1px solid #ddd;"><?php echo bb_get_avatar( $user->ID,$size='250'); ?></li>
				 <?php
                 global $bb_table_prefix;
                 $query1 = "SELECT COUNT(*) FROM ".$bb_table_prefix."posts WHERE poster_id = $user_id AND post_status = 0";
                 $query2 = "SELECT COUNT(*) FROM ".$bb_table_prefix."posts WHERE poster_id = $user_id AND post_status = 0 AND post_position = 1";
                 echo "<li>Forum Posts: ".$bbdb->get_var($query1)."</li>";
                 echo "<li>Topics Started: ".$bbdb->get_var($query2)."</li>"; ?>              
            </ul>
			<?php if (bb_profile_data() ); ?>
            <?php if (is_bb_profile()) profile_menu(); ?>
        </div><!-- /sidebar -->
        <div id="content"><!-- Content -->
            <table>
                <thead>
                <tr>
                    <th class="title"><?php _e('Recent Replies'); ?></th>
                    <th><?php _e('Acvity'); ?></th>
                    <th><?php _e('Reply'); ?></th>
                </tr>
                </thead>
                <tbody>
                <?php if ( $posts ) : ?>
                <?php foreach ($posts as $bb_post) : $topic = get_topic( $bb_post->topic_id ) ?>
                <tr<?php alt_class('replies'); ?>>
                    <td class="title"><a href="<?php topic_link(); ?>"><?php topic_title(); ?></a></td>
                    <td><?php if ( $user->ID == bb_get_current_user_info( 'id' ) ) printf(__('%s ago'), bb_get_post_time()); else printf(__('%s ago'), bb_get_post_time()); ?></td>
                    <td><?php if ( bb_get_post_time( 'timestamp' ) < get_topic_time( 'timestamp' ) ) printf(__('%s ago'), get_topic_time()); else _e('0');?></td>
                </tr>
				<?php endforeach; ?>
            
				<?php else : if ( $page ) : ?>
                <tr>
                	<td class="title"><?php _e('No more replies.') ?></td>
                    <td></td>
                    <td></td>
                </tr>
                <?php else : ?>
                <tr>
                	<td class="title"><?php _e('No replies yet.') ?></td>
                    <td></td>
                    <td></td>
                </tr>
                <?php endif; endif; ?>
                </tbody>
            </table>
            
            <table>
                <thead>
                <tr>
                    <th class="title"><?php _e('Topics Started'); ?></th>
                    <th><?php _e('Started'); ?></th>
                    <th><?php _e('Reply'); ?></th>
                </tr>
                </thead>
                <tbody>
        		<?php if ( $topics ) : ?>
                <?php foreach ($topics as $topic) : ?>
                <tr<?php alt_class('topics'); ?>>
                    <td class="title"><a href="<?php topic_link(); ?>"><?php topic_title(); ?></a></td>
                    <td><?php printf(__('%s ago'), get_topic_start_time()); ?></td>
                    <td><?php if ( get_topic_start_time( 'timestamp' ) < get_topic_time( 'timestamp' ) ) printf(__('%s ago.'), get_topic_time()); else _e('0'); ?></td>
                </tr>
				<?php endforeach; ?>
				<?php else : if ( $page ) : ?>
                <tr>
                	<td class="title"><?php _e('No more topics posted.') ?></td>
                    <td></td>
                    <td></td>
                </tr>
                <?php else : ?>
                <tr>
                	<td class="title"><?php _e('No topics posted yet.') ?></td>
                    <td></td>
                    <td></td>
                </tr>
                <?php endif; endif; ?>
                </tbody>
            </table>
            <?php profile_pages(); ?> 
        </div><!-- /content -->
<?php bb_get_footer(); ?>