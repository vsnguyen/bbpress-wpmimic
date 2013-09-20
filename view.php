<?php bb_get_header(); ?>
<div class="bbcrumb"><span class="nav"><?php view_pages(); ?></span>Browse: <a href="<?php bb_option('uri'); ?>">Home</a> / <?php view_name(); ?></div>
<div class="wrapper">
    <div id="forums">
        <div id="fcontent">
            <table>
            <thead>
            <tr>
                <th class="title"><?php _e('Topic'); ?></th>
                <th><?php _e('Posts'); ?></th>
                <th><?php _e('Last Poster'); ?></th>
                <th><?php _e('Freshness'); ?></th>
            </tr>
            </thead>
            <tbody>
			<?php if ( $topics || $stickies ) : ?>
            <?php if ( $stickies ) : foreach ( $stickies as $topic ) : ?>
            <tr<?php topic_class(); ?>>
                <td class="title"><?php bb_topic_labels(); ?> <big><a href="<?php topic_link(); ?>"><?php topic_title(); ?></a></big></td>
                <td><?php topic_posts(); ?></td>
                <td><?php topic_last_poster(); ?></td>
                <td><a href="<?php topic_last_post_link(); ?>"><?php topic_time(); ?></a></td>
            </tr>
            <?php endforeach; endif; ?>    
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
        </div>
    </div>
</div>
<div class="breadcrumbs"><span class="nav"><?php view_pages(); ?></span>Browse: <a href="<?php bb_option('uri'); ?>">Home</a> / <?php view_name(); ?></div>
<?php bb_get_footer(); ?>