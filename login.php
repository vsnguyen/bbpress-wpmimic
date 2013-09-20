<?php bb_get_header(); ?>
<div class="bbcrumb">Browse: <a href="<?php bb_option('uri'); ?>">Home</a> / <?php _e('Login'); ?></div>
<div class="wrapper">
    <div id="forums">
        <div id="fcontent">
        <form method="post" action="<?php bb_option('uri'); ?>bb-login.php">
        <fieldset>
        <h2><?php _e('Login'); ?></h2>
        <table id="register">
        <?php if ( $user_exists ) : ?>
            <tr valign="top">
                <td scope="row"  class="title"><?php _e('Username:'); ?></td >
                <td ><input name="user_login" type="text" value="<?php echo $user_login; ?>" /></td >
            </tr>
            <tr valign="top" class="error">
                <td scope="row"  class="title"><?php _e('Password:'); ?></td >
                <td ><input name="password" type="password" /><br />
                <?php _e('Incorrect password'); ?></td >
            </tr>
        <?php elseif ( isset($_POST['user_login']) ) : ?>
            <tr valign="top" class="error">
                <td scope="row" class="title"><?php _e('Username:'); ?></td >
                <td ><input name="user_login" type="text" value="<?php echo $user_login; ?>" /><br />
                <?php _e('this username does not exist.'); ?> <a href="<?php bb_option('uri'); ?>register.php?user=<?php echo $user_login; ?>"><?php _e('Register it?'); ?></a></td >
            </tr>
            <tr valign="top">
                <td scope="row"  class="title"><?php _e('Password:'); ?></td >
                <td ><input name="password" type="password" /></td >
            </tr>
        <?php else : ?>
            <tr valign="top" class="error">
                <td scope="row"  class="title"><?php _e('Username:'); ?></td >
                <td ><input name="user_login" type="text" /><br />
            </tr>
            <tr valign="top">
                <td scope="row"  class="title"><?php _e('Password:'); ?></td >
                <td ><input name="password" type="password" /></td >
            </tr>
        <?php endif; ?>
            <tr valign="top">
                <td scope="row"  class="title"><?php _e('Remember me:'); ?></td >
                <td ><input name="remember" type="checkbox" id="remember" value="1"<?php echo $remember_checked; ?> /></td >
            </tr>
            <tr>
                <td scope="row"  class="title">&nbsp;</td >
                <td >
                    <input name="re" type="hidden" value="<?php echo $redirect_to; ?>" />
                    <input type="submit" value="<?php echo attribute_escape( isset($_POST['user_login']) ? __('Try Again &raquo;'): __('Log in &raquo;') ); ?>" />
                    <?php wp_referer_field(); ?>
                </td >
            </tr>
        </table>
        </fieldset>
        </form>
        
        <?php if ( $user_exists ) : ?>
        <form method="post" action="<?php bb_option('uri'); ?>bb-reset-password.php">
        <fieldset>
            <p><?php _e('If you would like to recover the password for this account, you may use the following button to start the recovery process:'); ?></p>
            <table>
                <tr>
                    <td class="title"></td >
                    <td >
                        <input name="user_login" type="hidden" value="<?php echo $user_login; ?>" />
                        <input type="submit" value="<?php echo attribute_escape( __('Recover Password &raquo;') ); ?>" />
                    </td >
                </tr>
            </table>
        </fieldset>
        </form>
        <?php endif; ?>
        </div>
    </div>
</div>
<?php bb_get_footer(); ?>