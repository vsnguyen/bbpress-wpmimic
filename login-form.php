<form class="login" method="post" action="<?php bb_option('uri'); ?>bb-login.php">
    <p class="register"><?php printf(__('<a href="%1$s">Register</a>'), bb_get_option('uri').'register.php') ?> | <a href="<?php bb_option('uri'); ?>bb-login.php">Forgot password?</a></p>
	<ul class="lform">
    	<li><input onfocus="if(this.value == 'Username'){this.value = '';}" onblur="if(this.value == ''){this.value='Username';}" name="user_login" type="text" id="user_login" size="13" maxlength="40" value="<?php if (!is_bool($user_login)) echo $user_login; ?>Username" tabindex="1" /></li>
		<li><input onfocus="if(this.value == 'Password'){this.value = '';}" onblur="if(this.value == ''){this.value='Password';}" name="password" type="password" id="password" size="13" maxlength="40" value="Password" tabindex="2" /></li>
		<li><input name="remember" type="checkbox" id="remember" class="remember" value="1" tabindex="3"<?php echo $remember_checked; ?> /></li>
		<li><input name="re" type="hidden" value="<?php echo $re; ?>" /><?php wp_referer_field(); ?><input type="submit" name="Submit" id="submit" value="Login" tabindex="4" /></li>
	</ul>
</form>