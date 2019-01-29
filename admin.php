<?php

define('SITE_ROOT', '');

ini_set('display_errors', 'On');
// Report all errors except E_NOTICE
error_reporting(E_ALL & ~E_NOTICE);

$tpl = array('content'=>'');


require_once('include/orm.php');

$types = array('Announcement', 'Publication', 'Team', 'Profile');

$action = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'home';
$type = isset($_REQUEST['t']) ? $_REQUEST['t'] : '';

$tpl['content'] = '<p>Use the buttons above to modify site contents</p>';

if ($action == 'view') {
  $object = new $type(array());
  $tpl['content'] = $object->view_all();
}

if ($action == 'create') {
  $object = new $type(array());
  if ($type == 'Conference' || $type == 'Article') {
    $object->set('order', $object->get_max_order() + 1);
  }
  $tpl['content'] = $object->create();
}

if ($action == 'edit') {
  $object = new $type('id', $_REQUEST['id']);
  $tpl['content'] = $object->edit();
}

if ($action == 'update') {
  $object = new $type('post');
  $object->update('id', $_REQUEST['id']);
  header('Location: ?a=view&t=' . $type);
}

if ($action == 'insert') {
  $object = new $type('post');
  $object->insert_front();
  header('Location: ?a=view&t=' . $type);
}

if ($action == 'delete') {
  $object = new $type(array());
  $object->delete('id', $_REQUEST['id']);
  header('Location: ?a=view&t=' . $type);
}

if ($action == 'sort') {
  $object = new $type(array());
  $object->sort();
  header('Location: ?a=view&t=' . $type);
}


?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
<body role="document">
<nav class="navbar navbar-inverse navbar-static-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?php echo SITE_ROOT;?>/home">Home</a>
    </div>
    <div id="navbar" class="navbar-collapse collapse">
      <ul class="nav navbar-nav">
        <?php
        foreach ($types as $t) {
          printf('<li%s><a href="?a=view&t=%s">%s</a></li>',
            ($type == $t ? ' class="active"' : ''), $t, $t);
        }
        ?>
      </ul>
    </div>
  </div>
</nav>
<div class="container" role="main">
<div class="row">
<div class="col-md-12">
<?php
echo $tpl['content'];
?>
</div>
</div>
</div>
</body>
</html>
