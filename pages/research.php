<?php
$tpl['page_title'] = 'Research';
$tpl['tab'] = 'Research';
?>
<h2>RESEARCH THRUSTS</h2>
<div class="well">
  The DiaMonD team conducts research at the interfaces of our
  <a class="show-overview"><strong><span style="color:#273">core applied mathematics areas</span></strong></a>, <br>
  exploiting our <a class="show-overview"><strong><span style="color:#237">cross-cutting themes</span></strong></a>.
  <strong>Our research falls into four major thrust areas:</strong>
</div>
<div class="row">
<div class="col-md-6">
<div class="panel panel-success">
  <div class="panel-heading">
    <h3 class="panel-title">Fast and reliable solution of multiphysics/multiscale problems</h3>
  </div>
  <ul class="list-group">
    <li class="list-group-item">accurate, robust discretizations</li>
    <li class="list-group-item">error estimation</li>
    <li class="list-group-item">fast solvers</li>
    <li class="list-group-item">stable accurate coupling</li>
  </ul>
</div>
</div>
<div class="col-md-6">
<div class="panel panel-success">
  <div class="panel-heading">
    <h3 class="panel-title">Validation, adaptation and management of models</h3>
  </div>
  <ul class="list-group">
    <li class="list-group-item">goal-driven adaptive model reduction</li>
    <li class="list-group-item">goal-driven model adaptivity</li>
    <li class="list-group-item">Bayesian coarse graining</li>
    <li class="list-group-item">model selection</li>
    <li class="list-group-item">inadequacy modeling</li>
  </ul>
</div>
</div>
</div>

<div class="row">
<div class="col-md-6">
<div class="panel panel-success">
  <div class="panel-heading">
    <h3 class="panel-title">Advanced methods for inference</h3>
  </div>
  <ul class="list-group">
    <li class="list-group-item">goal-oriented, multifidelity, and multiscale methods for inference</li>
    <li class="list-group-item">randomized approaches for inference</li>
    <li class="list-group-item">data-enriched prior construction</li>
    <li class="list-group-item">measure-theoretic methods for inverse sensitivity problems</li>
    <li class="list-group-item">dimension reduction</li>
  </ul>
</div>
</div>
<div class="col-md-6">
<div class="panel panel-success">
  <div class="panel-heading">
    <h3 class="panel-title">Optimization under uncertainty</h3>
  </div>
  <ul class="list-group">
    <li class="list-group-item">optimal control (e.g., remediation strategies)</li>
    <li class="list-group-item">optimal design (e.g., battery design)</li>
    <li class="list-group-item">optimal experimental design (e.g., location of monitoring wells)</li>
    <li class="list-group-item">multifidelity uncertainty quantification</li>
  </ul>
</div>
</div>
</div>

<h2 class="fancy">DRIVING APPLICATIONS</h2>
<p>Our research is motivated by <strong>driving applications</strong> in the areas of
<div class="row applications">
<div class="col-sm-4 text-center">
Subsurface energy and  <br />
environmental flows
</div>
<div class="col-sm-4 text-center">
Electrochemical energy  <br />
storage systems
</div>
<div class="col-sm-4 text-center">
Dynamics of polar <br />
ice sheets
</div>
</div>

<style>
.applications div {padding: 30px 10px; background:#fcc; border: 10px solid #fff; }
</style>
<p>From our driving applications, we abstract a set of mathematical model problems that</p>
<ul>
<li>capture the salient features of the mathematical difficulties</li>
<li>allow for a range of physical complexity of models</li>
<li>are ripe for novel data-to-decision strategies</li>
</ul>

<h2 class="">MODEL PROBLEMS</h2>

<div class="panel panel-info">
  <div class="panel-heading">
    <h3 class="panel-title">Data-to-decision for contaminant migration and remediation</h3>
  </div>
  <div class="panel-body">
    This test-bed is directly related to a chromium plume site underneath Los Alamos. This problem involves inference of uncertain contaminant locations and subsurface properties from sparse concentration data, estimation of prediction quantities of interest (future contaminant concentrations) and their uncertainties, experimental design to determine optimal locations of additional monitoring wells, and optimal design/control to determine a remediation strategy.
  </div>
</div>

<div class="panel panel-info">
  <div class="panel-heading">
    <h3 class="panel-title">Advanced physical models of carbon capture and storage</h3>
  </div>
  <div class="panel-body">
    The focus of this test-bed is to study cutting-edge mathematical models for carbon capture and storage in highly heterogeneous porous media. These phase-field models introduce mathematical complexities significantly beyond what is in current large-scale simulators; e.g., higher-order derivative terms. The solutions to these models have been shown to compare well to physical experiments, and are currently receiving much interest in the porous media community They are excellent test-beds for novel discretizations and linear and nonlinear solvers, eventually progressing to uncertainty quantification and inverse modeling for parameter estimation. As our understanding of these models advances, they could be included as forward models in a data-to-decision framework.
  </div>
</div>

<div class="panel panel-info">
  <div class="panel-heading">
    <h3 class="panel-title">Data-to-decision for carbon capture and storage</h3>
  </div>
  <div class="panel-body">
    This problem contains some overlap with the groundwater contamination problem described above, but in a very different physical setting. It involves inference of uncertain subsurface properties from sparse well bottom hole pressure data, estimation of predictive quantities of interest that describe the future trapped volume of CO2 and the associated prediction uncertainties, experimental design to determine optimal locations of pressure wells, and determination of an optimal control strategy for injection.
  </div>
</div>

<div class="panel panel-info">
  <div class="panel-heading">
    <h3 class="panel-title">Electrochemical energy storage systems</h3>
  </div>
  <div class="panel-body">
    Coupled transport of ions, heat, electrons, and photons are at the heart of energy storage and conversion systems/devices. Transport is strongly influenced by the complex nanostructure, defects, interfaces, strain, and electrostatic fields present in the devices and is also affected by chemical reactions and defect generation during device operation. Today, most of the improvements are driven by experimentation, which is expensive and time-consuming. We are developing computational simulation capabilities to model energy storage devices. We target optimal design—rapid identification of optimal solutions over high-dimensional design spaces—and experimental design—fewer and more targeted experiments conducted to arrive at practical devices. <br /><br />We will build on advances in the DiaMonD research areas to achieve design under uncertainty for this challenging problem: we will quantify model uncertainty by utilizing the model under various conditions where validation data are available; we will quantify the role of parameter uncertainty on device performance; we will construct reduced/surrogate models for the charge transport and use them to rapidly explore the design space to arrive at optimal solutions; and we will bridge scales with mesoscopic/atomistic simulations so that the optimal macroscopic properties to reach high energy/power density can be translated to design of materials, in particular to optimize the ion size/shape, pore diameter and length, and electric field strengths.
  </div>
</div>

<div class="panel panel-info">
  <div class="panel-heading">
    <h3 class="panel-title">Polar ice sheet flow</h3>
  </div>
  <div class="panel-body">
    There is considerable concern whether currently stable portions of the Greenland and Antarctic ice sheets that are grounded below sea level can become unhinged and raise sea level by several meters, perhaps within a few decades to centuries, with enormous consequences for the 200 million people who live near sea level and the 22 of the 50 largest cities in the world at risk of flooding from coastal surges. Current ice sheet models are inadequate for predicting future changes in the polar ice sheets. Ice is modeled as a creeping, viscous, incompressible, non-Newtonian fluid with strain-rate- and temperature-dependent viscosity. Severe mathematical and computational challenges inherent in polar ice sheet modeling place significant barriers on improving predictability of these models. These include highly complex and stretched geometry, highly nonlinear and anisotropic rheology, extremely ill-conditioned linear and nonlinear algebraic systems that arise upon discretization, a broad range of length scales (tens of meters to thousands of kilometers) and time scales (hours to millenium), localization phenomena such as fracture, and complex sub-basal hydrological processes.<br /> <br />However, the greatest mathematical and computational challenge is that the ice sheet model involves uncertain rheological and basal boundary condition parameters that must be inferred from observational data, typically surface velocities. This is a severely ill-posed inverse problem that is best addressed within the framework of Bayesian inference. Quantifying the uncertainty in the unknown parameters then provides us with an ice sheet model that can yield predictions of not only the ice flux into the ocean, but the confidence we have in that prediction. Moreover, once parameter uncertainties are established, we can pose the question of where (very expensive-to-drill) ice cores can be made so that knowledge gained can best reduce uncertainties in the model. Unfortunately, both this so-called optimal experimental design problem as well as the Bayesian inverse problem are intractable using current methods. The expense of a forward ice flow simulation (hours on thousands of cores for a moderately resolved model) and the high- dimensionality of parameters (order of millions) mean that entirely new inference and optimization under uncertainty methods are required. An additional challenge is that boundary conditions and rheological models are phenomenological, and thus must be augmented with inadequacy models.
  </div>
</div>
