<?php
$tpl['tab'] = 'Young Gems';
?>
<!-- <p><a href="/young-gems">&laquo; Back to DiaMonD&rsquo;s Young Gems</a></p>-->
<?php
$profiles = json_decode(file_get_contents('json/profiles.json'), true);
echo '<div class="row"><div class="col-md-11">';
foreach($profiles as $profile) {
  if (seoUrl($profile['name']) == $urlname) {
    printf('<div class="row"><div class="col-sm-4"><img src="/images/profiles/%s.png" class="profile"></div>', $urlname);
    printf('<div class="col-sm-8"><h3 class="fancy">%s</h3><p>%s<br />%s<br /><a href="%s">%s</a></p>
      <h5>Education</h5><p>%s</p>
      <h5>DiaMonD Research</h5><p>%s</p>
      <h5>DiaMonD Collaborations</h5><p>%s</p>',
      $profile['name'],
      $profile['position'],
      $profile['institution'],
      $profile['website'],
      $profile['website'],
      nl2br($profile['education']),
      $profile['research'],
      $profile['collaborations']
    );

    echo '</div>';
    echo '</div>';


/*
    if (!empty($profile['research'])) {
      printf('<div class="row"><div class="col-sm-4"><h4 class="pull-right">DiaMonD Research</h4></div><div class="col-sm-8"><p>%s</p></div></div>', $profile['research']);
    }

    if (!empty($profile['collaborations'])) {
      printf('<div class="row"><div class="col-sm-4"><h4 class="pull-right">DiaMonD Collaborations</h4></div><div class="col-sm-8"><p>%s</p></div></div>', $profile['collaborations']);
    }
    */

    if (!empty($profile['about'])) {
      printf('<div class="row info"><div class="col-sm-4"><h4 class="pull-right">About</h4></div><div class="col-sm-8"><p>%s</p></div></div>', $profile['about']);
    }
    if (!empty($profile['impact'])) {
      printf('<div class="row info"><div class="col-sm-4"><h4 class="pull-right">Impact of DiaMonD</h4></div><div class="col-sm-8"><p>%s</p></div></div>', $profile['impact']);
    }

    $tpl['page_title'] = $profile['name'];
    break;
  }
}
echo '</div></div>';

?>

<style>
img.profile{
  width:75%;
  display:block;
  float:right;
  margin-top:24px
}
.info { margin-top: 10px; }
.info p {margin-top: 8px; }
</style>
