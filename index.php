<?php

define('SITE_NAME', 'DiaMonD');
define('SITE_ROOT', '');

ini_set('display_errors', 'On');
// Report all errors except E_NOTICE
error_reporting(E_ALL & ~E_NOTICE);

date_default_timezone_set('America/New_York');

include 'include/biblio.php';

$tpl = array();
$tpl['site_name'] = SITE_NAME;
$tpl['show_sidebar'] = false;

// get route from request URI, e.g. /foo/bar/1 -> array('foo','bar','1')
$request_uri = explode('/', explode('?', $_SERVER['REQUEST_URI'])[0]);
$script_name = explode('/', $_SERVER['SCRIPT_NAME']);
for ($i = 0; $i < sizeof($script_name); $i++) {
  if ($request_uri[$i] === $script_name[$i]) {
    unset($request_uri[$i]);
  }
}
$route = array_filter(array_values($request_uri));

// default route
if (empty($route[0])) {
  $route = array('home');
}

// check if route exists
$request = implode($route, '/');

if ($route[0] == 'profile') {
  $urlname = $route[1];
  ob_start();
  include("pages/profile.php");
  $tpl['contents'] = ob_get_contents();
  ob_end_clean();
  include "include/header.php";
  echo $tpl['contents'];
  include "include/footer.php";
  exit();
}

if (!file_exists("pages/$request.php")) {
  header("HTTP/1.0 404 Not Found");
  $request = '404';
}

ob_start();
include("pages/$request.php");
$tpl['contents'] = ob_get_contents();
ob_end_clean();

include "include/header.php";
echo $tpl['contents'];
include "include/footer.php";

?>
