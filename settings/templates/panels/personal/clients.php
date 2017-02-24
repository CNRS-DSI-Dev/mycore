<div id="clientsbox" class="section clientsbox">
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

	<div id="warningpass" class="" style="border: 2px solid #d2322d; padding: 5px; width: 60%; text-align: center;">
		<?php p($l->t("Use of these synchronization apps requires a local My CoRe password: ")); ?>
		<a href="?sectionid=additional#user_servervars2" style="font-weight: bold; text-decoration: underline;"><?php p($l->t("did you ask for this password ?")); ?></a>
	</div>
</div>
