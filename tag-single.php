<?php bb_get_header(); ?>
<div class="bbcrumb"><span class="nav"><?php tag_pages(); ?></span>Browse: <a href="<?php bb_option('uri'); ?>">Home</a> / <a href="<?php bb_option('uri'); ?>tags.php">Tags</a> / <?php bb_tag_name(); ?></div>
<div class="wrapper">
    <div id="forums">
        <div id="sidebar">
            <h2>Tag: <?php bb_tag_name(); ?></h2>
            <div class="sbox">
                <ul>
                    <li><a href="<?php bb_tag_rss_link(); ?>" class="rss-link"><?php _e('<abbr title="Really Simple Syndication">RSS</abbr> link for this tag.') ?></a></li>
                </ul>
                <?php manage_tags_forms(); ?>
            </div>
        </div>
        <div id="content">
            <?php do_action('tag_above_table', ''); ?>
            <?php if ( $topics ) : ?>
            <table id="latest">
            <tr>
                <th class="title"><?php bb_tag_name(); ?> Topics &mdash; <?php new_topic(); ?></th>
                <th><?php _e('Posts'); ?></th>
                <th><?php _e('Last Poster'); ?></th>
                <th><?php _e('Freshness'); ?></th>
            </tr>
            <?php foreach ( $topics as $topic ) : ?>
            <tr<?php topic_class(); ?>>
                <td class="title"><?php bb_topic_labels(); ?> <a href="<?php topic_link(); ?>"><?php topic_title(); ?></a></td>
                <td><?php topic_posts(); ?></td>
                <td><?php topic_last_poster(); ?></td>
                <td><a href="<?php topic_last_post_link(); ?>"><?php topic_time(); ?></a></td>
            </tr>
            <?php endforeach; ?>
            </table>
            <?php endif; ?>
            <?php post_form(); ?>
            <?php do_action('tag_below_table', ''); ?>
    	</div>
	</div>
</div>
<?php bb_get_footer(); ?>