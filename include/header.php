<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo SITE_ROOT; ?>/css/dmd.css">
<link rel='stylesheet' id='divi-fonts-css'  href='http://fonts.googleapis.com/css?family=Open+Sans:400,600&#038;subset=latin,latin-ext' type='text/css' media='all' />
<link href='https://fonts.googleapis.com/css?family=Roboto:400' rel='stylesheet' type='text/css'>
<link href="https://fonts.googleapis.com/css?family=EB+Garamond" rel="stylesheet">
<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<title><?php echo $tpl['site_name']; ?> | <?php echo $tpl['page_title']; ?> </title>
</head>
<body role="document">
<!-- custom header -->
<div id="header">
<div id="title">
<div id="title-wrap">
<div class="container">
<div class="row">
<div class="col-md-12">
<a href="/"><img class="logo" src="<?php echo SITE_ROOT; ?>/images/dmd-logo.png" /></a>
<h2 class="tagline pull-right hidden-xs hidden-sm">An Integrated Multifaceted Approach to Mathematics<br />
at the Interfaces of Data, Models, and Decisions</h2>
</div>
</div>
</div>
</div>
</div>
</div>
<!-- static navbar -->
<nav class="navbar navbar-inverse navbar-static-top">
<div class="container">
<div class="navbar-header">
<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
<span class="sr-only">Toggle navigation</span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</button>
<a class="navbar-brand hidden-lg hidden-md hidden-sm" href="/home"><?php echo $tpl['site_name'];?></a>
</div>
<div id="navbar" class="navbar-collapse collapse">
<ul class="nav navbar-nav">
<?php
if (!array_key_exists('tab', $tpl))
  $tpl['tab'] = 'Home';

$tabs = array(
  array('Home', '/home'),
  array('Team', '/team'),
  array('Young Gems', '/young-gems'),
  array('Research', '/research'),
  array('Highlights', '/highlights'),
  array('Publications', '/publications'),
  array('Events', '/events')
);

foreach ($tabs as $tab) {
  $url = $tab[1];
  $name = $tab[0];
  $active = $tpl['tab'] == $name ? ' class="active"' : '';
  printf("<li%s><a href=\"%s%s\">%s</a></li>\n", $active, SITE_ROOT, $url, $name);
}
?>
</ul>
</div>
</div>
</nav>
<!-- main container -->
<div class="container" role="main">
<div class="row">
<?php
if ($tpl['show_sidebar']) {
  echo '<div class="col-lg-9 col-md-12">';
} else {
  echo '<div class="col-lg-12">';
}
?>
