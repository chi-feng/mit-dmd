<?php
$tpl['page_title'] = 'Publications';
$tpl['tab'] = 'Publications';
$tpl['show_sidebar'] = false;

$pub_types = array(
  'journal' => 'Journal Articles',
  'conference' => 'Conference Proceedings',
  'thesis' => 'Student Theses',
  'book' => 'Books'
);
?>

<div class="row">
<div class="col-lg-11">

<div class="row">
<div class="col-md-4">
</div>
<div class="col-md-8">
<div class="btn-group pull-right" role="group">
<?php
foreach ($pub_types as $name=>$pub_type) {
  printf('<a href="#%s" class="btn btn-default">%s &darr;</a>', $name, $pub_type);
}
?>
</div>
</div>
</div>
<?php
$publications = json_decode(file_get_contents('json/publications.json'), true);
$counter = 1;
foreach ($pub_types as $name=>$pub_type) {
  printf('<hr><div class="row">
    <div class="col-md-3">
    <h4 class="" id="%s">%s</h4>
    </div>
    <div class="col-md-9">
    <ol class="publications" start="%s">', $name, $pub_type, $counter);
  foreach($publications as $pub) {
    if ($pub['pub_type'] != $name)
      continue;
    $counter++;
    $metadata = (array_key_exists('metadata', $pub) && !empty($pub['metadata'])) ?
      sprintf(', %s', $pub['metadata']) : '';
    printf('<li>%s, <a href="%s">%s</a>, <emph>%s</emph>%s, %s.</li>',
      $pub['authors'], $pub['url'], $pub['title'], $pub['publication'],
      $metadata, $pub['year']);
  }
  echo '</ol></div></div>';
}

?>

</div>
</div>

<style>
ol.publications {  }
ol.publications li { margin-bottom: 10px; }
ol.publications li a { font-weight: bold; }
</style>
