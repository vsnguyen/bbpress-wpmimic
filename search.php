<?php bb_get_header(); ?>
        <div class="bbcrumb">Browse: <a href="<?php bb_option('uri'); ?>">Home</a> / <a href="<?php bb_option('uri'); ?>search.php">Search</a> <?php if ( !empty ( $q ) ) : ?>/ <?php echo esc_html($q); ?><?php endif; ?></div>
        <div id="fcontent">
        	<!-- Search -->
			<?php search_form(); ?>
        	
            <?php if ( $relevant ) : ?>
            <table>
            <thead>
            	<tr>
            	<th class="title">Search results for '<?php if ( !empty ( $q ) ) : ?><?php echo wp_specialchars($q); ?><?php endif; ?>'</th>
                <th>Posted</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ( $relevant as $bb_post ) : ?>
            	<tr>
            	<td class="title"><a href="<?php post_link(); ?>"><?php topic_title($bb_post->topic_id); ?></a></td>
                <td><?php printf( bb_datetime_format_i18n( bb_get_post_time( array( 'format' => 'timestamp' ) ) ) ); ?></td>
            	</tr>
            <?php endforeach; ?>
            </tbody>
            </table>
            <?php endif; ?>
            
            <?php if ( $q && !$recent && !$relevant ) : ?>
            <h2>Search</h2>
            <p><?php _e('No results found.') ?></p>
            <?php endif; ?>
        </div>
<?php bb_get_footer(); ?>
