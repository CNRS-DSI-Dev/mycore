<?php OCP\Util::addStyle('lostpassword', 'resetpassword'); ?>

    <form action="<?php print_unescaped($_['link']) ?>" id="reset-password" method="post">
        <fieldset>
            <p>
                <label for="password" class="infield"><?php p($l->t('New password')); ?></label>
                <input type="password" name="password" id="password" value="" placeholder="<?php p($l->t('New Password')); ?>" required />
                <img class="svg" id="password-icon" src="<?php print_unescaped(image_path('', 'actions/password.svg')); ?>" alt=""/>
            </p>
            <input type="submit" id="submit" value="<?php p($l->t('Reset password')); ?>" />
        </fieldset>
        <fieldset id="gohome" style="display:none" class="warning">
            <p><?php print_unescaped($l->t("Mot de passe changé avec succès. Vous allez être redirigé vers la page d'acceuil du service. <a href=\"/\">Cliquez ici pour y accéder tout de suite</a>.")); ?></p>
        </fieldset>
    </form>

<div id="password_policy" class="section">
</div>

<?php OCP\Util::addScript('core', 'lostpassword'); ?>
<?php OCP\Util::addScript('password_policy', 'lostpassword'); ?>

<div>
