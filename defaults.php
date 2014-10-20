<?php

/* Theming the name and slogan of your ownCloud installation is as easy 
as copying this content to a brandnew 
/themes/[replace-by-your-theme-name]/defaults.php 
and replacing the strings in __construct() with your best name ideas */ 

class OC_Theme {

    private $myEntity;
    private $myName;
    private $myTitle;
    private $myBaseUrl;
    private $mySlogan;
    private $myLogoClaim;
    private $mySyncClientUrl;
    private $myDocBaseUrl;

    function __construct() {

        // basics
        $this->myEntity = "CNRS"; /* e.g. company name, used for footers and copyright notices */
        $this->myName = "Service My CoRe"; /* short name, used when referring to the service */
        $this->myTitle = "My CoRe"; /* can be a longer name, for titles */
        $this->myBaseUrl = "http://www.offres-de-services-unites.net";
        $this->mySlogan = "My CoRe, partage et nomadisme";
        $this->myLogoClaim = "";
        $this->myDocBaseUrl = "https://aide.core-cloud.net/mycore/";

        // for perfectionists (others: just keep it like this)
        $this->defaultSyncClientUrl = " http://owncloud.org/sync-clients/";
        $this->defaultDocBaseUrl = "https://aide.core-cloud.net/mycore/";

    }

    public function getBaseUrl() {
        return $this->myBaseUrl;
    }

    public function getSyncClientUrl() {
        return $this->mySyncClientUrl;
    }

    public function getDocBaseUrl() {
        return $this->myDocBaseUrl;
    }   

    public function getTitle() {
        return $this->myTitle;
    }

    public function getName() {
        return $this->myName;
    }

    public function getEntity() {
        return $this->myEntity;
    }

    public function getSlogan() {
        return $this->mySlogan;
    }

    public function getLogoClaim() {
        return $this->myLogoClaim;
    }

    public function getShortFooter() {
        $footer = "<a href=\"". $this->getBaseUrl() . "\" target=\"_blank\">" . $this->getEntity() . "</a>" . ' – ' . $this->getSlogan(). ' - <a href="https://aide.core-cloud.net/mycore/Documents/myCoRe_CGU.pdf" target="_blank">CGU</a>';
        return $footer;
    }

    public function getLongFooter() {
        $footer = $this->getShortFooter();
        return $footer;
    }

}
