<?php
define( 'COMP_PATH', __DIR__ );
define( 'COMP_CTRL', COMP_PATH . '/COMPOSITION/Controller' );
define( 'COMP_MODEL', COMP_PATH . '/COMPOSITION/Model' );
define( 'COMP_VIEW', COMP_PATH . '/COMPOSITION/View' );

$vendor = COMP_PATH . '/vendor/autoload.php';

require_once $vendor;

use COMPOSITION\Controller\app\route\MainRoute;

$route = new MainRoute();

$route->route_exists_in(); /***/
?>