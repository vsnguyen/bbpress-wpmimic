<?php bb_get_header(); ?>
        <div class="bbcrumb">Browse: <a href="<?php bb_option('uri'); ?>">Home</a> / Statistics</div>
    	<div id="sidebar">
        	<h2>Statistics</h2>
            <dl>
                <dt><?php _e('Registered Users'); ?></dt>
                <dd><strong><?php total_users(); ?></strong></dd>
                <dt><?php _e('Posts'); ?></dt>
                <dd><strong><?php total_posts(); ?></strong></dd>
            </dl>
        </div>
        
        <div id="content">
			<?php if ($popular) : ?>
     		<table>
            	<thead>
                	<tr>
                    <th class="title"><?php _e('Most Popular Topics'); ?></th>
                    </tr>
                </thead>
                <tbody>
            	<?php foreach ($popular as $topic) : ?>
                <tr>
            	<td class="title"><?php bb_topic_labels(); ?> <a href="<?php topic_link(); ?>"><?php topic_title(); ?></a> &#8212; <?php topic_posts(); ?> posts</td>
                </tr>
            	<?php endforeach; ?>
            	</tbody>
            </table>
            <?php endif; ?>
        </div>
<?php bb_get_footer(); ?>