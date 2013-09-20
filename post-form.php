            <div class="post">
				<div class="post-content resp">
					<?php if ( !bb_is_topic() ) : ?>
					<input name="topic" type="text" id="topic" size="50" maxlength="80" tabindex="1" />
					<?php endif; do_action( 'post_form_pre_post' ); ?>
					<textarea name="post_content" cols="50" rows="8" id="post_content" tabindex="3"></textarea>
					<input id="tags-input" name="tags" type="text" size="50" maxlength="100" value="<?php bb_tag_name(); ?>" tabindex="4" />
					
					<?php if ( bb_is_tag() || bb_is_front() ) : ?>
						<?php bb_new_topic_forum_dropdown(); ?>
					<?php endif; ?>
					<input type="submit" id="postformsub" name="Submit" value="<?php echo esc_attr__( 'Submit' ); ?>" tabindex="4" />   
				</div>
				
				<div class="post-user">
					<?php post_author_avatar($size='100'); ?>
					<ul>
						<li><a href="<?php post_anchor_link(); ?>">#</a> <?php post_author_link(); ?></li>
						<li><?php post_author_title(); ?></span></li>
					</ul>
				</div>    
			</div>
