<?php
$tpl['page_title'] = 'Events &amp; Announcements';
$tpl['tab'] = 'Events';
?>
<h2 class="fancy">EVENTS &amp; ANNOUNCEMENTS</h2>
<br />
<div class="row">
<div class="col-md-7">
<?php
$announcements = json_decode(file_get_contents('json/announcements.json'),true);
foreach ($announcements as $index => $announcement) {
  printf("<p class=\"announcement\"><strong>%s</strong><br />%s</p>\n", $announcement['date'], $announcement['content']);
  echo '<hr />';
}
?>
</div>
</div>