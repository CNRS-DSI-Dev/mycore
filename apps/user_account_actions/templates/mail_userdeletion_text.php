<?php
/**
 * ownCloud - User_Account_Actions
 *
 * @author Patrick Paysant <ppaysant@linagora.com>
 * @copyright 2014 CNRS DSI
 * @license This file is licensed under the Affero General Public License version 3 or later. See the COPYING file.
 */

    print_unescaped($l->t("User %s just has been deleted (%s)\n", array($_['userUID'], $_['datetime'])));
?>

--
<?php p($theme->getName() . ' - ' . $theme->getSlogan()); ?>
<?php print_unescaped("\n".$theme->getDocBaseUrl());
