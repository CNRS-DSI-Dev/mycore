<?php
/**
 * ownCloud - User_Account_Actions
 *
 * @author Patrick Paysant <ppaysant@linagora.com>
 * @copyright 2014 CNRS DSI
 * @license This file is licensed under the Affero General Public License version 3 or later. See the COPYING file.
 */
?>
<table cellspacing="0" cellpadding="0" border="0" width="100%">
<tr><td>
<table cellspacing="0" cellpadding="0" border="0" width="600px">
<tr>
<td bgcolor="<?php p($theme->getMailHeaderColor());?>" width="20px">&nbsp;</td>
<td bgcolor="<?php p($theme->getMailHeaderColor());?>">
<img src="<?php p(OC_Helper::makeURLAbsolute(image_path('', 'logo-mail.png'))); ?>" alt="<?php p($theme->getName()); ?>"/>
</td>
</tr>
<tr><td colspan="2">&nbsp;</td></tr>
<tr>
<td width="20px">&nbsp;</td>
<td style="font-weight:normal; font-size:0.8em; line-height:1.2em; font-family:verdana,'arial',sans;">
<?php
    print_unescaped($l->t("<p>User %s just has been created (%s)</p>\n", array($_['userUID'], $_['datetime'])));
    print_unescaped($l->t("<p>Home directory: %s.</p>\n<br/>\n", array($_['home'])));
?>
</td>
</tr>
<tr><td colspan="2">&nbsp;</td></tr>
<tr>
<td width="20px">&nbsp;</td>
<td style="font-weight:normal; font-size:0.8em; line-height:1.2em; font-family:verdana,'arial',sans;">--<br>
<?php p($theme->getentity()); ?> -
<?php p($theme->getSlogan()); ?>
<br><a href="<?php p($theme->getDocBaseUrl()); ?>"><?php p($theme->getDocBaseUrl());?></a>
</td>
</tr>
<tr>
<td colspan="2">&nbsp;</td>
</tr>
</table>
</td></tr>
</table>
