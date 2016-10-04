<?php
	$ppe_url = \OCP\Config::getSystemValue('password_policy_faq', '');
?>
<div id="controls">
	<form id="newuser" autocomplete="off">
		<input id="newusername" type="text"
			placeholder="<?php p($l->t('Username'))?>"
			autocomplete="off" autocapitalize="off" autocorrect="off" />
		<input
			type="password" id="newuserpassword"
			placeholder="<?php p($l->t('Password'))?>"
			autocomplete="off" autocapitalize="off" autocorrect="off" />
		<input id="newemail" type="text" style="display:none"
			   placeholder="<?php p($l->t('E-Mail'))?>"
			   autocomplete="off" autocapitalize="off" autocorrect="off" />
		<div class="groups"><div class="groupsListContainer multiselect button" data-placeholder="<?php p($l->t('Groups'))?>"><span class="title groupsList"></span><span class="icon-triangle-s"></span></div></div>
		<input type="submit" class="button" value="<?php p($l->t('Create'))?>" />
	</form>

	<span id="ppe_warning" style="color: red; font-weight: bold">
		<?php
			print_unescaped($l->t("Warning : <a href=\"")) ;
			print_unescaped($ppe_url) ;
			print_unescaped($l->t("\">password constraints</a> must be respected!"));
		?>
	</span>

	<form class="searchbox" action="#" method="post" role="search" novalidate>
		<label for="searchbox" class="hidden-visually">
			<?php p($l->t('Search'));?>
		</label>
		<input id="searchbox" type="search" name="query"
			value="" required
			autocomplete="off" tabindex="5">
	</form>

	<?php if((bool)$_['recoveryAdminEnabled']): ?>
	<div class="recoveryPassword">
	<input id="recoveryPassword"
		   type="password"
		   placeholder="<?php p($l->t('Admin Recovery Password'))?>"
		   title="<?php p($l->t('Enter the recovery password in order to recover the users files during password change'))?>"
		   alt="<?php p($l->t('Enter the recovery password in order to recover the users files during password change'))?>"/>
	</div>
	<?php endif; ?>
</div>
