<?php /**
 * Copyright (c) 2011, Robin Appelman <icewind1991@gmail.com>
 * This file is licensed under the Affero General Public License version 3 or later.
 * See the COPYING-README file.
 */?>

<div class="clientsbox center">
	<h2><?php p($l->t('Get the apps to sync your files'));?></h2>
	<a href="<?php p($_['clients']['desktop']); ?>" target="_blank">
		<img src="<?php print_unescaped(OCP\Util::imagePath('core', 'desktopapp.png')); ?>" /><br/>
                <span><?php p($l->t('Free client app'))?></span>
	</a>
	<a href="<?php p($_['clients']['android']); ?>" target="_blank">
		<img src="<?php print_unescaped(OCP\Util::imagePath('core', 'googleplay.png')); ?>" /><br/>
		<span><?php p($l->t('Paid client app'))?></span>
	</a>
	<a href="<?php p(OC_Config::getValue('customclient_free_android','')); ?>" target="_blank">
		<img src="<?php print_unescaped(OCP\Util::imagePath('core', 'googleplay.png')); ?>" /><br/>
		<span><?php p($l->t('Free client app'))?></span>
	</a>
	<a href="<?php p($_['clients']['ios']); ?>" target="_blank">
		<img src="<?php print_unescaped(OCP\Util::imagePath('core', 'appstore.png')); ?>" /><br/>
                <span><?php p($l->t('Paid client app'))?></span>
	</a>

	<?php if(OC_APP::isEnabled('firstrunwizard')) {?>
	<p class="center"><a class="button" href="#" id="showWizard"><?php p($l->t('Show First Run Wizard again'));?></a></p>
	<?php }?>
</div>

<div id="warningpass" class="" style="margin: auto; border: 2px solid #d2322d; padding: 5px; width: 60%; text-align: center;">
	<?php p($l->t("Use of these synchronization apps requires a local My CoRe password: ")); ?>
	<a href="#user_servervars2" style="font-weight: bold; text-decoration: underline;"><?php p($l->t("did you ask for this password ?")); ?></a>
</div>


<div id="quota" class="section">
	<div style="width:<?php p($_['usage_relative']);?>%;">
		<p id="quotatext">
			<?php print_unescaped($l->t('You have used <strong>%s</strong> of the available <strong>%s</strong>',
			array($_['usage'], $_['total_space'])));?>
		</p>
	</div>
</div>


<?php
if($_['passwordChangeSupported']) {
?>
<form id="passwordform" class="section">
	<h2><?php p($l->t('Local My CoRe password'));?></h2>
	<div id="passwordchanged"><?php echo $l->t('Your password was changed');?></div>
	<div id="passworderror" class="msg error" style="max-width:40em;text-align:center;"><?php echo $l->t('Unable to change your password');?></div>
	<input type="password" id="pass1" name="oldpassword"
		placeholder="<?php echo $l->t('Current password');?>"
		autocomplete="off" autocapitalize="off" autocorrect="off" />
	<input type="password" id="pass2" name="personal-password"
		placeholder="<?php echo $l->t('New password');?>"
		data-typetoggle="#personal-show"
		autocomplete="off" autocapitalize="off" autocorrect="off" />
	<input type="checkbox" id="personal-show" name="show" /><label for="personal-show"></label>
	<input id="passwordbutton" type="submit" value="<?php echo $l->t('Change password');?>" />
	<br/>

	<div class="strengthify-wrapper"></div>

	<p><?php print_unescaped($l->t("If you don't know your local My CoRe password, please see below, section <a href=\"#user_servervars2\">Useful Informations For Connection With Login / local My CoRe password</a>.")); ?></p>
</form>

<?php
}
?>

<?php
if($_['displayNameChangeSupported']) {
?>
<form id="displaynameform" class="section">
	<h2><?php echo $l->t('Full Name');?></h2>
	<input type="text" id="displayName" name="displayName"
		value="<?php p($_['displayName'])?>"
		autocomplete="on" autocapitalize="off" autocorrect="off" />
    <span class="msg"></span>
	<input type="hidden" id="oldDisplayName" name="oldDisplayName" value="<?php p($_['displayName'])?>" />
</form>
<?php
}
?>

<?php if ($_['enableAvatars']): ?>
<form id="avatar" class="section" method="post" action="<?php p(\OC_Helper::linkToRoute('core_avatar_post')); ?>">
	<h2><?php p($l->t('Profile picture')); ?></h2>
	<div id="displayavatar">
		<div class="avatardiv"></div><br>
		<div class="warning hidden"></div>
		<?php if ($_['avatarChangeSupported']): ?>
		<div class="inlineblock button" id="uploadavatarbutton"><?php p($l->t('Upload new')); ?></div>
		<input type="file" class="hidden" name="files[]" id="uploadavatar">
		<div class="inlineblock button" id="selectavatar"><?php p($l->t('Select new from Files')); ?></div>
		<div class="inlineblock button" id="removeavatar"><?php p($l->t('Remove image')); ?></div><br>
		<?php p($l->t('Either png or jpg. Ideally square but you will be able to crop it.')); ?>
		<?php else: ?>
		<?php p($l->t('Your avatar is provided by your original account.')); ?>
		<?php endif; ?>
	</div>
	<div id="cropper" class="hidden">
		<div class="inlineblock button" id="abortcropperbutton"><?php p($l->t('Cancel')); ?></div>
		<div class="inlineblock button primary" id="sendcropperbutton"><?php p($l->t('Choose as profile image')); ?></div>
	</div>
</form>
<?php endif; ?>

<?php
// create a sub-array for only the two languages we're using
$commonlanguages = array();
foreach($_['commonlanguages'] as $language) {
	if ($language['code'] == 'fr' or $language['code'] == 'en') {
		array_push($commonlanguages, array(
			'code' => $language['code'],
			'name' => $language['name'],
		));
	}
}
?>
<form class="section">
	<h2><?php p($l->t('Language'));?></h2>
	<select id="languageinput" name="lang" data-placeholder="<?php p($l->t('Language'));?>">
		<option value="<?php p($_['activelanguage']['code']);?>">
			<?php p($_['activelanguage']['name']);?>
		</option>
		<?php foreach($commonlanguages as $language):?>
			<option value="<?php p($language['code']);?>">
				<?php p($language['name']);?>
			</option>
		<?php endforeach;?>
	</select>
	<?php if (OC_Util::getEditionString() === ''): ?>
	<a href="http://www.offres-de-services-unites.net/contacts.html"
		target="_blank">
		<em><?php p($l->t('Help translate My CoRe'));?></em>
	</a> /
	<a href="https://www.transifex.com/projects/p/owncloud/team/<?php p($_['activelanguage']['code']);?>/"
		target="_blank">
		<em><?php p($l->t('Help translate ownCloud'));?></em>
	</a>
	<?php endif; ?>
</form>

<?php foreach($_['forms'] as $form) {
	print_unescaped($form);
};?>

<?php if($_['enableDecryptAll']): ?>
<div class="section">

	<h2>
		<?php p( $l->t( 'Encryption' ) ); ?>
	</h2>

	<?php if($_['filesStillEncrypted']): ?>

	<div id="decryptAll">
	<?php p($l->t( "The encryption app is no longer enabled, please decrypt all your files" )); ?>
	<p>
		<input
			type="password"
			name="privateKeyPassword"
			id="privateKeyPassword" />
		<label for="privateKeyPassword"><?php p($l->t( "Log-in password" )); ?></label>
		<br />
		<button
			type="button"
			disabled
			name="submitDecryptAll"><?php p($l->t( "Decrypt all Files" )); ?>
		</button>
		<span class="msg"></span>
	</p>
	<br />
	</div>

	<?php endif; ?>



	<div id="restoreBackupKeys" <?php $_['backupKeysExists'] ? '' : print_unescaped("class='hidden'") ?>>

	<?php p($l->t( "Your encryption keys are moved to a backup location. If something went wrong you can restore the keys. Only delete them permanently if you are sure that all files are decrypted correctly." )); ?>
	<p>
		<button
			type="button"
			name="submitRestoreKeys"><?php p($l->t( "Restore Encryption Keys" )); ?>
		</button>
		<button
			type="button"
			name="submitDeleteKeys"><?php p($l->t( "Delete Encryption Keys" )); ?>
		</button>
		<span class="msg"></span>

	</p>
	<br />

	</div>


</div>
	<?php endif; ?>

<div class="section">
	<h2><?php p($l->t('Version'));?></h2>
	<strong>ownCloud</strong> <?php p(OC_Util::getHumanVersion()) ?><br />
<?php if (OC_Util::getEditionString() === ''): ?>
	<?php print_unescaped($l->t('Developed by the <a href="http://ownCloud.org/contact" target="_blank">ownCloud community</a>, the <a href="https://github.com/owncloud" target="_blank">source code</a> is licensed under the <a href="http://www.gnu.org/licenses/agpl-3.0.html" target="_blank"><abbr title="Affero General Public License">AGPL</abbr></a>.')); ?>
<?php endif; ?>
<?php if (OC_Config::getValue('custom_ods_version','') != ''): ?>
	<br />
	<strong><?php p($l->t('Version of %s:', $theme->getTitle()).' '.OC_Config::getValue('custom_ods_version','')); ?></strong>
		<?php if (OC_Config::getValue('custom_ods_changelogurl','') != ''): ?>
			 - <strong><a href="<?php print_unescaped(OC_Config::getValue('custom_ods_changelogurl','')); ?>"><?php p($l->t('Change log')); ?></a></strong>
		<?php endif; ?>
<?php endif; ?>
<?php
	$cguUrl = '';
    // presence of gtu app ?
    if(OC_APP::isEnabled('gtu')) {
        $cguUrl = \OCP\Config::getAppvalue('gtu', 'url', '');
    }
    // else
    if (empty($cguUrl)) {
        $cguUrl = \OCP\Config::getSystemvalue('custom_termsofserviceurl', '');
    }

	if (!empty($cguUrl)):
?>
        <br />
	<strong><a href="<?php print_unescaped($cguUrl); ?>"><?php p($l->t('GTU')); ?></a> version <?php echo OCP\Config::getAppValue('gtu', 'version','0') ?></strong>
<?php endif; ?>
</div>

<div class="section credits-footer">
	<p><?php print_unescaped($theme->getShortFooter()); ?></p>
</div>
