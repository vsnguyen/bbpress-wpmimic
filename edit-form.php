        	<div class="post">
            	<div class="post-content">
					<?php if ( $topic_title ) : ?>
                    <input name="topic" type="text" id="topic" size="50" maxlength="80"  value="<?php echo esc_attr( get_topic_title() ); ?>" />
                    <?php endif; do_action( 'edit_form_pre_post' ); ?>
                    <textarea name="post_content" cols="50" rows="8" id="post_content"><?php echo apply_filters('edit_text', get_post_text() ); ?></textarea>
                    <input type="submit" name="Submit" value="<?php echo esc_attr__( 'Edit Post &raquo;' ); ?>" />
                    <input type="hidden" name="post_id" value="<?php post_id(); ?>" />
                    <input type="hidden" name="topic_id" value="<?php topic_id(); ?>" />
                    <em><?php _e('Allowed markup:'); ?> <code><?php allowed_markup(); ?></code>. <br /><?php _e('Put code in between <code>`backticks`</code>.'); ?></em>
                </div>
                
                <div class="post-user">
					<?php post_author_avatar($size='100'); ?>
                    <ul>
                        <li><a href="<?php post_anchor_link(); ?>">#</a> <?php post_author_link(); ?></li>
                        <li><?php post_author_title(); ?></span></li>
                    </ul>
                </div>
            </div>