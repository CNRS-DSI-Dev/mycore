<?php
/* Copyright (c) 2014, Joas Schilling nickvergessen@owncloud.com
 * This file is licensed under the Affero General Public License version 3
 * or later. See the COPYING-README file. */

/** @var OC_L10N $l */
/** @var array $_ */
$l = $_['overwriteL10N'];

print_unescaped($l->t('Hello %s,', array($_['username'])));
p("\n");
p("\n");

if ($_['timeframe'] == \OCA\Activity\UserSettings::EMAIL_SEND_HOURLY) {
	print_unescaped($l->t("You are receiving this email because in the last hour the following things happened at %s", array($_['owncloud_installation'])));
} else if ($_['timeframe'] == \OCA\Activity\UserSettings::EMAIL_SEND_DAILY) {
	print_unescaped($l->t("You are receiving this email because in the last day the following things happened at %s", array($_['owncloud_installation'])));
} else {
	print_unescaped($l->t("You are receiving this email because in the last week the following things happened at %s", array($_['owncloud_installation'])));
}
p("\n");
p("\n");

foreach ($_['activities'] as $activityData) {
	print_unescaped($l->t('* %1$s - %2$s', $activityData));
	p("\n");
}
p("\n");
