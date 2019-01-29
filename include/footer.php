</div>
<?php if ($tpl['show_sidebar']) { ?>
<div class="col-lg-3 hidden-md hidden-sm hidden-xs">
<div class="panel panel-default">
<div class="panel-heading"><a href="/events" style="color:#000;">Events</a></div>
<div class="panel-body">
<?php
$announcements = json_decode(file_get_contents('json/announcements.json'),true);
foreach ($announcements as $index => $announcement)
  if ($index < 7)
    printf("<p class=\"announcement\"><strong>%s</strong><br />%s</p>\n", $announcement['date'], $announcement['content']);
?>
<p><a href="/events">More events</a></p>
</div>
</div>
</div>
<?php } ?>
</div> <!-- .row -->
</div> <!-- .container -->
<footer class="footer">
<div class="container">
<div class="row sponsors">
<a href="" class="sponsor"><img src="<?php echo SITE_ROOT; ?>/images/colorado-logo.png" width="100%"></a>
<a href="" class="sponsor"><img src="<?php echo SITE_ROOT; ?>/images/fsu-logo.png" width="100%"></a>
<a href="" class="sponsor"><img src="<?php echo SITE_ROOT; ?>/images/lanl-logo.png" width="100%"></a>
<a href="" class="sponsor"><img src="<?php echo SITE_ROOT; ?>/images/mit-logo.png" width="100%"></a>
<a href="" class="sponsor"><img src="<?php echo SITE_ROOT; ?>/images/ornl-logo.png" width="100%"></a>
<a href="" class="sponsor"><img src="<?php echo SITE_ROOT; ?>/images/ut-logo.png" width="100%"></a>
<a href="" class="sponsor"><img src="<?php echo SITE_ROOT; ?>/images/stanford-logo.png" width="100%"></a>
</div>
</div>
<div class="row">
<div class="col-md-12 copy">
&copy; <?php echo date('Y'); ?> DiaMonD. All Rights Reserved. <a target="_blank" href="https://diamond.scripts.mit.edu:444/admin.php">Admin</a>
</div>
</div>
</div>
</footer>
<script type="text/javascript">
var _gaq = _gaq || [];
_gaq.push(['_setAccount', 'UA-38300402-1']);
_gaq.push(['_trackPageview']);
(function() {
var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
})();
</script>
</body>
</html>