	<div class="search">
        <form action="<?php bb_option('uri'); ?>search.php" method="get">
            <input onfocus="if(this.value == 'Search'){this.value = '';}" onblur="if(this.value == ''){this.value='Search';}" type="text" size="25" maxlength="100" value="Search" name="q" />
            <?php if( empty($q) ) : ?>
            <input type="submit" value="<?php echo attribute_escape( __('Search') ); ?>" class="inputButton" />
            <?php else : ?>
            <input type="submit" value="<?php echo attribute_escape( __('Search again') ); ?>" class="inputButton" />
            <?php endif; ?>
        </form>
	</div>