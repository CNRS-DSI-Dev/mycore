<div id="firstrunwizard">

<a id="closeWizard" class="close">
	<img class="svg" src="<?php print_unescaped(OCP\Util::imagePath('core', 'actions/close.svg')); ?>">
</a>
<h1><?php p($l->t('Welcome to %s', array($theme->getTitle()))); ?></h1>


<!-- <h2><?php p($l->t('Connect your desktop apps to %s', array($theme->getName()))); ?></h2> -->
<h2><?php p($l->t('Connect your desktop apps')); ?></h2>
<a target="_blank" href="<?php p($_['clients']['desktop']); ?>">
	<img src="<?php print_unescaped(OCP\Util::imagePath('core', 'desktopapp.png')); ?>" />
</a>
<h2><?php p($l->t('Get the apps to sync your files'));?></h2>
<a target="_blank" href="<?php p($_['clients']['android']); ?>">
	<img src="<?php print_unescaped(OCP\Util::imagePath('core', 'googleplay.png')); ?>" />
</a>
<a target="_blank" href="<?php p($_['clients']['ios']); ?>">
	<img src="<?php print_unescaped(OCP\Util::imagePath('core', 'appstore.png')); ?>" />
</a>
<br><br><br>
<a target="_blank" class="button" href="<?php print_unescaped(OC_Config::getValue('custom_knowledgebaseurl',''));?>">
	<img class="appsmall svg" src="<?php print_unescaped(OCP\Util::imagePath('core', 'actions/info.svg')); ?>" /> <?php p($l->t('Documentation'));?>
</a>
<br>

<p class="footnote">
<!--
<?php if (OC_Util::getEditionString() === ''): ?>
<?php print_unescaped($l->t('There’s more information in the <a target="_blank" href="%s">documentation</a> and on our <a target="_blank" href="http://owncloud.org">website</a>.', array(link_to_docs('user_manual')))); ?><br>
<?php print_unescaped($l->t('If you like ownCloud,
	<a href="mailto:?subject=ownCloud
		&body=ownCloud is a great open software to sync and share your files. 
		You can freely get it from http://owncloud.org">
		recommend it to your friends</a>
	and <a href="http://owncloud.org/promote"
		target="_blank">spread the word</a>!')); ?>
<?php else: ?>
© 2014 <a href="https://owncloud.com" target="_blank">ownCloud Inc.</a>
<?php endif; ?>
</p>
-->
<p><?php print_unescaped($theme->getShortFooter()); ?></p>
</div>
