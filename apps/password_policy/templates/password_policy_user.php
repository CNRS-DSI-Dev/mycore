<form id="password_policy" class="section">
	<h2><a name="ppe"></a><?php p($l->t('Local My CoRe password Policy Enforcement')); ?></h2>
	<p><?php p($l->t('The following password restrictions are currently in place:')); ?></p>
	<p><?php p($l->t('All passwords are required to be at least %d characters in length and;', $_['minlength'])); ?></p>
	<ul style="list-style: circle; margin-left: 20px;">
		<?php if(OC_Password_Policy::getMixedCase()){ ?>
		<li> <?php p($l->t('Must contain UPPER and lower case characters')); ?></li>
		<?php } ?>
		<?php if(OC_Password_Policy::getNumbers()){ ?>
		<li> <?php p($l->t('Must contain numbers')); ?></li>
		<?php } ?>

		<?php if(OC_Password_Policy::getSpecialChars()){ ?>
		<li> <?php p($l->t('Must contain special characters: %s', $_['specialcharlist'])); ?></li>
		<?php }?>

	</ul>
</form>
