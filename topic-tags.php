<?php if ( $public_tags ) : ?>
<ul id="yourtaglist">
<?php foreach ( $public_tags as $tag ) : ?>
	<li id="tag-<?php echo $tag->tag_id; ?>_<?php echo $tag->user_id; ?>"><a href="<?php bb_tag_link(); ?>" rel="tag"><?php bb_tag_name(); ?></a> <?php bb_tag_remove_link(); ?></li>
<?php endforeach; ?>
</ul>
<?php endif; ?>

<?php if ( !$tags ) : ?>
<ul id=" yourtaglist">
<li><?php printf(__('No <a href="%s">tags</a> yet.'), bb_get_tag_page_link() ); ?></li>
</ul>
<?php endif; ?>
<?php tag_form(); ?>