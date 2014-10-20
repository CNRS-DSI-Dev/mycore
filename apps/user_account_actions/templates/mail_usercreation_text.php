<?php
/**
 * ownCloud - User_Account_Actions
 *
 * @author Patrick Paysant <ppaysant@linagora.com>
 * @copyright 2014 CNRS DSI
 * @license This file is licensed under the Affero General Public License version 3 or later. See the COPYING file.
 */

    print_unescaped($l->t("User %s just has been created (%s)\n", array($_['userUID'], $_['datetime'])));
    print_unescaped($l->t("Home directory: %s.\n\n", array($_['home'])));
?>

--
<?php p($theme->getName() . ' - ' . $theme->getSlogan()); ?>
<?php print_unescaped("\n".$theme->getDocBaseUrl());
