# My Core theme 

ownCloud theme for My CoRe project at CNRS.

## Install

The theme must be put in the owncloud theme directory, for instance with the name mycore, and then you have to put in the config.php file the parameter 'theme' ==> 'mycore'.

Do not forget to change owner after git clone command for a proper installation.

In order to use custom HTTP errors page, please set "AllowOverride FileInfo" in your httpd.conf file (or something equivalent) and set a .htaccess with something like follow :
ErrorDocument 400 /<path>/themes/mycore/core/templates/documenterror.php?id=400
ErrorDocument 403 /<path>/themes/mycore/core/templates/documenterror.php?id=403
ErrorDocument 404 /<path>/themes/mycore/core/templates/documenterror.php?id=404
ErrorDocument 500 /<path>/themes/mycore/core/templates/documenterror.php?id=500
ErrorDocument 502 /<path>/themes/mycore/core/templates/documenterror.php?id=502
ErrorDocument 503 /<path>/themes/mycore/core/templates/documenterror.php?id=503
ErrorDocument 504 /<path>/themes/mycore/core/templates/documenterror.php?id=504

## Contributing

This theme is developed for an internal deployement of ownCloud at CNRS (French National Center for Scientific Research).

If you want to be informed about this ownCloud project at CNRS, please contact david.rousse@dsi.cnrs.fr, gilian.gambini@dsi.cnrs.fr or marc.dexet@dsi.cnrs.fr

## License and Author

|                      |                                          |
|:---------------------|:-----------------------------------------|
| **Author:**          | David Rousse (<david.rousse@dsi.cnrs.fr>)
| **Copyright:**       | Copyright (c) 2014 CNRS DSI
| **License:**         | AGPL v3, see the COPYING file.

