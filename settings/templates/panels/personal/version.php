<div class="section">
	<h2 class="app-name"><?php p($l->t('Version'));?></h2>
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
