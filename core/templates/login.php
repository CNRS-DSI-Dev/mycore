<?php /** @var $l OC_L10N */ ?>

<!--[if IE 8]><style>input[type="checkbox"]{padding:0;}</style><![endif]-->
<!-- EMBEDDED-WAYF-START -->
                <script type="text/javascript" src="wayf/index.php/embedded-wayf.js">
                </script>
                <noscript>
                        <p>
                                <strong>Login:</strong> Javascript is not enabled for your web browser. Please use the <a href="/Shibboleth.sso/Login?target=">non-Javascript Login</a>.
                        </p>
                </noscript>
<!-- EMBEDDED-WAYF-END -->

<form method="post" name="login">
	<fieldset>
	<legend><span id="altloginswitch" style="font-size: 140%;"><?php p($l->t('Local account login')) ?></span></legend>
	<div id="altlogin" style="display:block;">
	<?php if (!empty($_['redirect_url'])) {
		print_unescaped('<input type="hidden" name="redirect_url" value="' . OC_Util::sanitizeHTML($_['redirect_url']) . '" />');
	} ?>
		<?php if (isset($_['apacheauthfailed']) && ($_['apacheauthfailed'])): ?>
			<div class="warning">
				<?php p($l->t('Server side authentication failed!')); ?><br>
				<small><?php p($l->t('Please contact your administrator.')); ?></small>
			</div>
		<?php endif; ?>
		<p id="message" class="hidden">
			<img class="float-spinner" src="<?php p(\OCP\Util::imagePath('core', 'loading-dark.gif'));?>"/>
			<span id="messageText"></span>
			<!-- the following div ensures that the spinner is always inside the #message div -->
			<div style="clear: both;"></div>
		</p>
		<p class="grouptop">
			<input type="text" name="user" id="user"
				placeholder="<?php p($l->t('Username')); ?>"
				value="<?php p($_['username']); ?>"
				<?php p($_['user_autofocus'] ? 'autofocus' : ''); ?>
				autocomplete="on" autocapitalize="off" autocorrect="off" required />
			<label for="user" class="infield"><?php p($l->t('Username')); ?></label>
			<img class="svg" src="<?php print_unescaped(image_path('', 'actions/user.svg')); ?>" alt=""/>
		</p>

		<p class="groupbottom">
			<input type="password" name="password" id="password" value=""
				placeholder="<?php p($l->t('Password')); ?>"
				<?php p($_['user_autofocus'] ? '' : 'autofocus'); ?>
				autocomplete="on" autocapitalize="off" autocorrect="off" required />
			<label for="password" class="infield"><?php p($l->t('Password')); ?></label>
			<img class="svg" id="password-icon" src="<?php print_unescaped(image_path('', 'actions/password.svg')); ?>" alt=""/>
		</p>

		<?php if (isset($_['invalidpassword']) && ($_['invalidpassword'])): ?>
		<a id="lost-password" class="warning" href="">
			<?php p($l->t('Forgot your password? Reset it!')); ?>
		</a>
		<?php endif; ?>
		<?php if ($_['rememberLoginAllowed'] === true) : ?>
		<input type="checkbox" name="remember_login" value="1" id="remember_login" />
		<label for="remember_login"><?php p($l->t('remember')); ?></label>
		<?php endif; ?>
		<input type="hidden" name="timezone-offset" id="timezone-offset"/>
		<input type="hidden" name="requesttoken" value="<?php p($_['requesttoken']) ?>" />
		<input type="submit" id="submit" class="login primary" value="<?php p($l->t('Log in')); ?>" disabled="disabled"/>
	</div>
	</fieldset>
</form>

<?php
OCP\Util::addscript('core', 'visitortimezone');
OCP\Util::addScript('core', 'lostpassword');
