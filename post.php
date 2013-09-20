	<div class="post position<?php post_position(); ?>">
        <div class="post-content">
			<?php post_text(); ?>
            <span class="aadmin"><?php bb_post_admin(); ?></span>
        </div>
    	<div class="post-user">
			<?php post_author_avatar_link($size='100'); ?>
            <ul>
                <li><a href="<?php post_anchor_link(); ?>">#</a> <?php post_author_link(); ?></li>
                <li><?php post_author_title_link(); ?></span></li>
                <li><?php printf( __('%s'), bb_get_post_time() ); ?></li>
            </ul>
        </div>     
	</div>