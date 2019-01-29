<?php
$tpl['page_title'] = 'DiaMonD’s Young Gems';
$tpl['tab'] = 'Young Gems';

$profiles = json_decode(file_get_contents('json/profiles.json'), true);

?>
<h2 class="fancy">DiaMonD’s Young Gems</h2>
<br />
<div class="row">
<div class="col-lg-9 col-md-10">

<p class="lead">Training of young researchers has been a significant focus and accomplishment of DiaMonD. To date, 21 young DiaMonD researchers have gone on to tenure-track university positions or permanent Lab position.</p>

<p class="aside">To learn more about each researcher&rsquo;s background and impact of DiaMonD, please click on their profile.</p>
</div>
</div>
<div class="row">
<div class="col-md-12">
<?php

$cols = 6;
$rows = ceil(count($profiles) / $cols);


for ($i = 0; $i < $rows; $i++) {
  echo '<div class="row">';
  $start = intval($i*$cols);
  $end = min(intval($i*$cols+$cols), intval(count($profiles)));
  for ($j = $start; $j < $end; $j++) {
    $profile = $profiles[$j];
    $profile['url'] = seoUrl($profile['name']);
    printf('<div class="col-xs-6 col-sm-4 col-md-4 col-lg-2 text-center">
    <a href="/profile/%s"><img src="images/profiles/%s.png" alt="%s.png" class="profile" /></a>
    <span class="name"><a href="/profile/%s">%s</a></span>
    <span class="position">%s</span>
    <span class="institution">%s</span>
    <span class="website"><a href="%s">www</a></span>
    </div>',
    $profile['url'],
    $profile['url'],
    $profile['url'],
    $profile['url'],
    $profile['name'],
    $profile['position'],
    $profile['institution'],
    $profile['website']);
  }
  echo '</div>';
}
?>

</div>
</div>

<style>
.small {font-size: 85%; }
.name { display: block; text-align: center; font-weight: bold; }
.email { display: none; }
.position { display: block; text-align:center; font-size: 85%; font-weight: bold; }
.institution { display: block; text-align:center; font-size: 85%; }
.website { display: none; }
img.profile {display:block; margin: 10px auto 0;background:#fafafa; width:100%;}
</style>
