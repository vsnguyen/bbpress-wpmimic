	<div id="sidebar"><!-- Sidebar -->
        
		<?php if ( bb_forums() ) : ?>
        <table id="forumlist">
        	<thead>
            <tr>
                <th class="title"><?php _e('Forums'); ?></th>
                <!-- th><?php _e('Topics'); ?></th-->
                <th><?php _e('Posts'); ?></th>
            </tr>
            </thead>
            
            <tbody>
            <?php while ( bb_forum() ) : ?>
            <tr<?php bb_forum_class(); ?>>
                <td  class="title"><?php bb_forum_pad( '<div class="nest">' ); ?><a href="<?php forum_link(); ?>"><?php forum_name(); ?></a> <span><?php forum_description( array( 'before' => '', 'after' => '' ) ); ?></span><?php bb_forum_pad( '</div>' ); ?></td>
                <!--td><?php forum_topics(); ?></td-->
                <td><?php forum_posts(); ?></td>
            </tr>
        	<?php endwhile; ?>
            </tbody>
        </table>
        <?php endif; // bb_forums() ?>
        
        <h2><?php _e('Popular Tags'); ?></h2>
        <div class="sbox"><p><?php bb_tag_heat_map(); ?></p></div>
        
		<?php if ( bb_is_user_logged_in() ) : ?>
        <h2><?php _e('Views'); ?></h2>
        <div class="sbox">
            <ul id="views">
			<?php foreach ( bb_get_views() as $the_view => $title ) : ?>
                <li class="view"><a href="<?php view_link( $the_view ); ?>"><?php view_name( $the_view ); ?></a></li>
			<?php endforeach; ?>
            </ul>
        </div>
        <?php endif; ?>

    </div><!-- //sb -->