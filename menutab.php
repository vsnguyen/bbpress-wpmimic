        <ul>
            <li><a href="<?php bb_option('uri'); ?>">Home</a></li>
            <li <?php if(is_bb_search()) { ?><?php } else { ?>class="current"<?php } ?>><a href="<?php bb_option('uri'); ?>">Forums</a></li>
            <li><a href="http://vietsonnguyen.com">About</a></li>
            <li <?php if(is_bb_search()) { ?>class="current"<?php } ?>><a href="<?php bb_option('uri'); ?>search.php">Search</a></li>
            <li class="donate"><a href="<?php bb_option('uri'); ?>topic/1">Download</a></li>
        </ul>