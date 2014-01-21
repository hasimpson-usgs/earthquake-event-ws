<?php

	// Load the configuration. This will put a $CONFIG array in scope that will
	// have all the configured values available to this script.
	include_once 'configure.php';


// path specific to this feed app version
$APP_DIR = dirname(trim(`pwd`));
$FEED_PATH = $CONFIG['FEED_PATH'] . '/' . $CONFIG['API_VERSION'];
$FDSN_PATH = $CONFIG['FDSN_PATH'];


	// TODO :: Write httpd.conf
	$HTTPD_CONF = '
## This configuration is auto generated by pre-install
## Manual changes will be overwritten
##

########################################################
# FeedApp: Realtime feeds and search
# Primary contact : Jeremy Fee <jmfee@usgs.gov>
# Secondary contact : Eric Martinez <emartinez@usgs.gov>
########################################################

### PRODUCT SEARCH APP

RewriteEngine on



## DONT ALLOW SEARCH ON EARTHQUAKE, need new split architecture first.
## split architecture routing should eliminate need for this section.

RewriteCond %{HTTP_HOST} earthquake.usgs.gov
RewriteRule ' . $FDSN_PATH . ' - [R=404,L]

## END DONT ALLOW SEARCH ON EARTHQUAKE

## DONT ALLOW FEEDS ON COMCAT, need new split architecture first.
## split architecture routing should eliminate need for this section.

RewriteCond %{HTTP_HOST} comcat.cr.usgs.gov
# but allow images in feeds
RewriteCond $1 !images
RewriteRule ' . $FEED_PATH . '(.*) - [R=404,L]

## END DONT ALLOW FEEDS ON COMCAT


# detail is EVENTID.FORMAT
RewriteRule ^' . $FEED_PATH . '/detail/([^\./]+)\.([^/\.]+)$ ' . $FEED_PATH . '/detail.php?eventid=$1&format=$2 [L,PT]
# summary is PARAMS.FORMAT
RewriteRule ^' . $FEED_PATH . '/summary/([^/]+)\.([^/\.]+)$ ' . $FEED_PATH . '/summary.php?params=$1&format=$2 [L,PT]


# fdsn event webservice
RewriteRule ^' . $FDSN_PATH . '$ ' . $FDSN_PATH . '/ [R=301,L]
RewriteRule ^' . $FDSN_PATH . '/([^/]*)$ ' . $FEED_PATH . '/fdsn.php?method=$1 [L,QSA,PT]

Alias ' . $FEED_PATH . ' ' . $APP_DIR . '/htdocs
<Directory ' . $APP_DIR . '/htdocs>
	Order allow,deny
	Allow from all
</Directory>

<Location ' . $FEED_PATH . '/>
	SetEnv APP_URL_PATH ' . $FEED_PATH . '
	SetEnv APP_WEB_DIR ' . $APP_DIR . '/htdocs
	ExpiresActive on
	ExpiresDefault A60
</Location>
';



	$HTTPD_CONF_FILE = dirname(dirname(__FILE__)) . '/conf/httpd.conf';
	file_put_contents($HTTPD_CONF_FILE, $HTTPD_CONF);

?>