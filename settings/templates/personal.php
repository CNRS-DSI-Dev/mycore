<?php /**
 * Copyright (c) 2011, Robin Appelman <icewind1991@gmail.com>
 * This file is licensed under the Affero General Public License version 3 or later.
 * See the COPYING-README file.
 */

/** @var $_ mixed[]|\OCP\IURLGenerator[] */
/** @var \OC_Defaults $theme */


// My CoRe: change left menu

foreach($_['forms'] as $key => $form) {
	if ($form['anchor'] == 'avatar') {
		$_['forms'][$key]['anchor'] = 'quota';
	}
	if ($form['anchor'] == 'clientsbox') {
		unset($_['forms'][$key]);
	}
};
$_['forms'][]= ['anchor' => 'versionId', 'section-name' => $l->t('Version My CoRe')];

?>

<div id="app-navigation">
	<ul>
	<?php foreach($_['forms'] as $form) {
		if (isset($form['anchor'])) {
			$anchor = '#' . $form['anchor'];
			$sectionName = $form['section-name'];
			print_unescaped(sprintf("<li><a href='%s'>%s</a></li>", \OCP\Util::sanitizeHTML($anchor), \OCP\Util::sanitizeHTML($sectionName)));
		}
	}?>
	</ul>
</div>

<div id="app-content">

<div class="clientsbox center">
	<h2><?php p($l->t('Get the apps to sync your files'));?></h2>
	<a href="<?php p($_['clients']['desktop']); ?>" target="_blank">
		<img src="<?php print_unescaped(OCP\Util::imagePath('core', 'desktopapp.svg')); ?>" /><br/>
                <span><?php p($l->t('Free client app'))?></span>
	</a>
	<a href="<?php p($_['clients']['android']); ?>" target="_blank">
		<img src="<?php print_unescaped(OCP\Util::imagePath('core', 'googleplay.png')); ?>" /><br/>
		<span><?php p($l->t('Paid client app'))?></span>
	</a>
	<a href="<?php p(\OCP\Config::getSystemValue('customclient_free_android','')); ?>" target="_blank">
		<img src="<?php print_unescaped(OCP\Util::imagePath('core', 'googleplay.png')); ?>" /><br/>
		<span><?php p($l->t('Free client app'))?></span>
	</a>
	<a href="<?php p($_['clients']['ios']); ?>" target="_blank">
		<img src="<?php print_unescaped(OCP\Util::imagePath('core', 'appstore.svg')); ?>" /><br/>
                <span><?php p($l->t('Paid client app'))?></span>
	</a>
        <a href="<?php p(\OCP\Config::getSystemValue('customclient_paid_windowsphone','')); ?>" target="_blank">
                <img src="<?php print_unescaped(OCP\Util::imagePath('core', 'winphone-store.png')); ?>" /><br/>
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
	<div style="width:<?php p($_['usage_relative']);?>%"
		<?php if($_['usage_relative'] > 80): ?> class="quota-warning" <?php endif; ?>>
		<p id="quotatext">
			<?php print_unescaped($l->t('You are using <strong>%s</strong> of <strong>%s</strong>',
			array($_['usage'], $_['total_space'])));?>
		</p>
	</div>
</div>

<?php
if($_['passwordChangeSupported']) {
	script('jquery-showpassword');
?>
<form id="passwordform" class="section">
	<h2><?php p($l->t('Local My CoRe password'));?></h2>
	<div class="hidden icon-checkmark" id="password-changed"></div>
	<div class="hidden" id="password-error"><?php p($l->t('Unable to change your password'));?></div>
	<br>
	<label for="pass1" class="hidden-visually"><?php echo $l->t('Current password');?>: </label>
	<input type="password" id="pass1" name="oldpassword"
		placeholder="<?php echo $l->t('Current password');?>"
		autocomplete="off" autocapitalize="off" autocorrect="off" />
	<label for="pass2" class="hidden-visually"><?php echo $l->t('New password');?>: </label>
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
<form id="lostpassword" class="section">
	<h2>
		<label for="email"><?php p($l->t('Email'));?></label>
	</h2>
	<input type="email" name="email" id="email" value="<?php p($_['email']); ?>"
		placeholder="<?php p($l->t('Your email address'));?>"
		autocomplete="on" autocapitalize="off" autocorrect="off" />
	<span class="msg"></span><br />
	<em><?php p($l->t('For password recovery and notifications'));?></em>
</form>
<?php
}
?>

<?php if ($_['enableAvatars']): ?>
<form id="avatar" class="section" method="post" action="<?php p(\OC::$server->getURLGenerator()->linkToRoute('core.avatar.postAvatar')); ?>">
	<h2><?php p($l->t('Profile picture')); ?></h2>
	<div id="displayavatar">
		<div class="avatardiv"></div>
		<div class="warning hidden"></div>
		<?php if ($_['avatarChangeSupported']): ?>
		<label for="uploadavatar" class="inlineblock button icon-upload" id="uploadavatarbutton" title="<?php p($l->t('Upload new')); ?>"></label>
		<div class="inlineblock button icon-folder" id="selectavatar" title="<?php p($l->t('Select from Files')); ?>"></div>
		<div class="hidden button icon-delete" id="removeavatar" title="<?php p($l->t('Remove image')); ?>"></div>
		<input type="file" name="files[]" id="uploadavatar" class="hiddenuploadfield">
		<p><em><?php p($l->t('png or jpg, max. 20 MB')); ?></em></p>
		<?php else: ?>
		<?php p($l->t('Picture provided by original account')); ?>
		<?php endif; ?>
	</div>

	<div id="cropper" class="hidden">
		<div class="inlineblock button" id="abortcropperbutton"><?php p($l->t('Cancel')); ?></div>
		<div class="inlineblock button primary" id="sendcropperbutton"><?php p($l->t('Choose as profile picture')); ?></div>
	</div>
</form>
<?php endif; ?>

<div id="groups" class="section">
	<h2><?php p($l->t('Groups')); ?></h2>
	<p><?php p($l->t('You are member of the following groups:')); ?></p>
	<p>
	<?php p(implode(', ', $_['groups'])); ?>
	</p>
</div>

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
	<h2>
		<label for="languageinput"><?php p($l->t('Language'));?></label>
	</h2>
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
	<a href="http://ods.cnrs.fr/contacts.html"
		target="_blank">
		<em><?php p($l->t('Help translate My CoRe'));?></em>
	</a> /
	<a href="https://www.transifex.com/projects/p/owncloud/team/<?php p($_['activelanguage']['code']);?>/"
		target="_blank">
		<em><?php p($l->t('Help translate ownCloud'));?></em>
	</a>
	<?php endif; ?>
</form>

<div id="sessions" class="section">
	<h2><?php p($l->t('Sessions'));?></h2>
	<span class="hidden-when-empty"><?php p($l->t('These are the web, desktop and mobile clients currently logged in to your ownCloud.'));?></span>
	<table>
		<thead class="token-list-header">
			<tr>
				<th><?php p($l->t('Browser'));?></th>
				<th><?php p($l->t('Most recent activity'));?></th>
				<th></th>
			</tr>
		</thead>
		<tbody class="token-list icon-loading">
		</tbody>
	</table>
</div>

<div id="apppasswords" class="section">
	<h2><?php p($l->t('App passwords'));?></h2>
	<span class="hidden-when-empty"><?php p($l->t("You've linked these apps."));?></span>
	<table>
		<thead class="hidden-when-empty">
			<tr>
				<th><?php p($l->t('Name'));?></th>
				<th><?php p($l->t('Most recent activity'));?></th>
				<th></th>
			</tr>
		</thead>
		<tbody class="token-list icon-loading">
		</tbody>
	</table>
	<p><?php p($l->t('An app password is a passcode that gives an app or device permissions to access your %s account.', [$theme->getName()]));?></p>
	<div id="app-password-form">
		<input id="app-password-name" type="text" placeholder="<?php p($l->t('App name')); ?>">
		<button id="add-app-password" class="button"><?php p($l->t('Create new app password')); ?></button>
	</div>
	<div id="app-password-result" class="hidden">
		<span><?php p($l->t('Use the credentials below to configure your app or device.')); ?></span>
		<div class="app-password-row">
			<span class="app-password-label"><?php p($l->t('Username')); ?></span>
			<input id="new-app-login-name" type="text" readonly="readonly"/>
		</div>
		<div class="app-password-row">
			<span class="app-password-label"><?php p($l->t('Password')); ?></span>
			<input id="new-app-password" type="text" readonly="readonly"/>
			<button id="app-password-hide" class="button"><?php p($l->t('Done')); ?></button>
		</div>
	</div>
</div>

<?php foreach($_['forms'] as $form) {
	if (isset($form['form']) and isset($form['form']['page'])) {?>
	<div id="<?php isset($form['anchor']) ? p($form['anchor']) : p('');?>"><?php print_unescaped($form['form']['page']);?></div>
	<?php }
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

<div class="section" id="versionId">
	<h2><?php p($l->t('Version'));?></h2>
	<p><strong>ownCloud</strong> <?php p(OC_Util::getHumanVersion()) ?></p>
	<p><?php include('settings.development.notice.php'); ?></p>
<?php if (\OCP\Config::getSystemValue('custom_ods_version','') != ''): ?>
	<strong><?php p($l->t('Version of %s:', $theme->getTitle()).' '.\OCP\Config::getSystemValue('custom_ods_version','')); ?></strong>
		<?php if (\OCP\Config::getSystemValue('custom_ods_changelogurl','') != ''): ?>
			 - <strong><a href="<?php print_unescaped(\OCP\Config::getSystemValue('custom_ods_changelogurl','')); ?>"><?php p($l->t('Change log')); ?></a></strong>
		<?php endif; ?>
		<?php
			// redhat style
			$hostname = '';
			$confFile = '/etc/sysconfig/network';
			if (is_readable($confFile)) {
				$networkConf = @file($confFile);
				if (!empty($networkConf) and is_array($networkConf)) {
					foreach($networkConf as $line) {
						if (strpos($line, "HOSTNAME") === 0) {
							$hostname = substr($line, 9);
							break;
						}
					}
				}
				$hostname = trim($hostname); // suppress ending \n
				$origin = " (sysconfig)";
			}
			else {
				$hostname = @gethostname();
				$origin = " (gethostname)";

				if (empty($hostname)) {
					$hostname = @php_uname('n');
					$origin = " (php_uname)";
				}
			}

		?>
		<?php if (!empty($hostname)): ?>
			 <span style="color: #fff">- <?php p($hostname . $origin); ?></span>
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

</div>
