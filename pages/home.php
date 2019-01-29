<?php
$tpl['page_title'] = 'Home';
$tpl['tab'] = 'Home';
$tpl['show_sidebar'] = true;
$profiles = json_decode(file_get_contents('json/profiles.json'), true);
?>
<p><strong>DiaMonD:</strong> An Integrated Multifaceted Approach to Mathematics at the Interfaces of Data, Models, and Decisions is a U.S. Department of Energy Mathematical Multifaceted Integrated Capabilities Center (MMICC) involving researchers from Colorado State University, Florida State University, Los Alamos National Laboratory, Massachusetts Institute of Technology, Oak Ridge National Laboratory, University of Texas at Austin, and Stanford University.</p>
<h2 class="fancy">MISSION</h2>
<div class="row">
<div class="col-md-4">
<h4>METHODS AND ANALYSIS</h4>
<p>Develop advanced mathematical methods and analysis for multimodel, multiphysics, multiscale model problems driven by frontier DOE applications</p>
</div>
<div class="col-md-4">
<h4>THEORY AND ALGORITHMS</h4>
<p>Create theory and algorithms for integrated inversion, optimization, and uncertainty quantification for these complex problems</p>
</div>
<div class="col-md-4">
<h4>DISSEMINATION</h4>
<p>Disseminate the philosophy of a data-to-decisions approach to modeling and simulation of complex problems to the broader applied math and computational science communities</p>
</div>
</div>
<div class="alert alert-info">Training of young researchers has been a significant focus and accomplishment of DiaMonD. To date, 21 young DiaMonD researchers have gone on to tenure-track university positions or permanent Lab position. <a href="/young-gems"><strong>Learn more</strong></a></div>
<h2>OVERVIEW</h2>
<div class="well">
The DiaMonD team conducts research at the interfaces of the <strong><span style="color:#273">core applied mathematics areas</span></strong>, employing the <strong><span style="color:#237">cross-cutting themes</span></strong>, driven by <strong><span style="color:#723">DOE scientific applications</span></strong>, organized under research thrusts.
</div>
<div id="dmd-overview">
  <div class="panel panel-danger">
    <div class="panel-heading">
      <h3 class="panel-title">DRIVING SCIENTIFIC APPLICATIONS</h3>
    </div>
    <div class="panel-body">
      <div class="col-sm-4 text-center">
      <p>subsurface energy and <br> environmental flows<br />
      <small>(Dawson, Gable &amp; Juanes)</small></p>
      </div>
      <div class="col-sm-4 text-center">
      <p>materials for energy <br>storage and conversion<br />
      <small>(Marzouk &amp; Pannala)</small></p>
      </div>
      <div class="col-sm-4 text-center">
      <p>ice sheet dynamics <br>and future sea level<br />
      <small>(Ghattas &amp; Gunzburger)</small></p>
      </div>
    </div>
  </div>
  <div class="panel panel-success">
    <div class="panel-heading">
      <h3 class="panel-title">CORE APPLIED MATHEMATICS AREAS</h3>
    </div>
    <div class="panel-body">
      <div class="row text-center">
      <div class="col-sm-2 text-center">multiphysics methods<div class="investigators">(Estep)</div></div>
      <div class="col-sm-2 text-center">multiscale methods<div class="investigators">(Oden)</div></div>
      <div class="col-sm-2 text-center">fast algorithms<div class="investigators">(Ying)</div></div>
      <div class="col-sm-2 text-center">model validation &amp; inadequacy<div class="investigators">(Moser)</div></div>
      <div class="col-sm-2 text-center">multimodel &amp; multifidelity methods<div class="investigators">(Willcox)</div></div>
      <div class="col-sm-2 text-center">model <br>reduction<div class="investigators">(Gunzburger)</div></div>
      </div>
      <div class="row text-center">
      <div class="col-sm-2 text-center">inverse problems &amp; data fusion<div class="investigators">(Biros)</div></div>
      <div class="col-sm-2 text-center">optimal design &amp; control<div class="investigators">(Ghattas)</div></div>
      <div class="col-sm-2 text-center">uncertainty quantification<div class="investigators">(Marzouk)</div></div>
      </div>
    </div>
  </div>
    <div class="panel panel-info">
    <div class="panel-heading">
      <h3 class="panel-title">CROSS-CUTTING THEMES</h3>
    </div>
    <div class="panel-body text-center themes">
      <span>advanced discretization</span> •
      <span>adaptivity</span> •
      <span>scalability</span> •
      <span>data-model integration</span><br>
      <span>adjoints &amp; sensitivity</span> •
      <span>dimensionality reduction</span> •
      <span>stochasticity</span> •
      <span>managing uncertainty</span>
    </div>
  </div>
</div>
<style>

#dmd-overview {margin-bottom: 20px; }
#dmd-overview div.investigators {font-size: 85%; color:#555; margin: 0 auto; display: block; width: 100%; padding:5px 0 0 0 !important;}
#dmd-overview .themes span {display:inline-block; padding: 0 0.8em; line-height: 1.7;}


</style>