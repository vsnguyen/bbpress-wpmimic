</div><!-- //forums -->
<div class="wrapper"> 
    <div id="footer"><!-- Footer -->
        <p><a href="http://vietsonnguyen.com/" title="Created by Vietson Nguyen">VSN</a> / <a href="http://bbpress.org/" title="Poowered by bbPress">bbPress</a> / <a href="<?php bb_option('uri'); ?>statistics.php" title="Statistics">Stats</a></p>
        <p class="fright"><?php echo $bbdb->num_queries; ?> queries / <?php bb_timer_stop(1); ?> sec</p>
    </div><!-- //footer -->
</div>
	<?php do_action('bb_foot', ''); ?>  
</body>
</html>