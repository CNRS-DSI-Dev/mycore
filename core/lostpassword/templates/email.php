<?php
\OCP\Util::addScript('password_policy', 'password_policy_user');
$tpl = new OCP\Template('password_policy', 'password_policy_user');

echo str_replace('{link}', $_['link'], $l->t('Use the following link to reset your password: {link}'));
?>

<?php if(\OCP\App::isEnabled('password_policy')){ p($l->t('The following password restrictions are currently in place:')); ?>
 
<?php p('- '.$l->t('Length of password at least: %s', OC_Password_Policy::getMinLength())); ?>

<?php if(OC_Password_Policy::getMixedCase()){ 
	p('- '.$l->t('Password must contain upper and lower case characters'));
} ?>

<?php if(OC_Password_Policy::getNumbers()){
	p('- '.$l->t('Password must contain numbers'));
} ?>

<?php if(OC_Password_Policy::getSpecialChars()){ 
	p('- '.$l->t('Password must contain following special characters: %s', OC_Password_Policy::getSpecialCharsList()));
}}  ?>

