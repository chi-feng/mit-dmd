<?php
$tpl['page_title'] = 'Highlights';
$tpl['tab'] = 'Highlights';
?>

<?php
if (isset($_GET['p']) || isset($_GET['refs'])) {
	$p = $_GET['p'];
	if (isset($_GET['refs']))
		$p = 'refs';
	echo '<a href="/highlights">Back to research highlights</a><div class="row htlatex"><div class="col-lg-9">';
	readfile("pages/highlights/$p.html");
	echo '</div></div>';
} else {
?>
<h2>Research Highlights</h2>
<p>Here we highlight a small number of Diamond research accomplishments, selected to showcase research that cuts across multiple research thrusts and sub-thrusts. Each of these highlights is an example of research that aligns with the objectives of the MMICCs program: to 
advance multifaceted, integrated mathematics that spans novel formulations, discretizations, algorithm development, data analysis techniques, uncertainty quantification methodologies, optimization techniques, machine learning, and other mathematical and statistical approaches; and to address mathematical problems with clear relevance and significant impact for scientific advances.</p>
<div class="list-group">
<a class="list-group-item" href="?p=1">1. Prediction of fluid velocity distribution from pore structure in porous media (MIT, UT-Austin)</a>
<a class="list-group-item" href="?p=2">2. Stochastic inverse modeling and decision support using a measure-theoretic framework (CSU, UC Denver, UT-Austin, FSU, LANL)</a>
<a class="list-group-item" href="?p=3">3. Characterization of subsurface geologic heterogeneity: A new perspective using dimensionality reduction (LANL)</a>
<a class="list-group-item" href="?p=4">4. Representing uncertainty due to model inadequacy (UT-Austin, MIT, ORNL)</a>
<a class="list-group-item" href="?p=5">5. Electrochemical energy storage systems (ORNL, UT Austin)</a>
<a class="list-group-item" href="?p=6">6. Multifidelity uncertainty quantification (MIT, FSU, LANL)</a>
<a class="list-group-item" href="?p=7">7. Error estimation for reduced models (CSU, FSU) </a>
<a class="list-group-item" href="?p=8">8. Fast algorithms for highly oscillatory problems (Stanford) </a>
<a class="list-group-item" href="?p=9">9. Scalable joint parameter–model reduction for Bayesian inverse problems (MIT, UT Austin) </a>
<a class="list-group-item" href="?p=10">10. An extreme scale implicit solver for highly-heterogeneous PDEs (UT-Austin, NYU) </a>
<a class="list-group-item" href="?p=11">11. Adaptive model selection, validation, and uncertainty quantification in complex multi-scale systems (UT-Austin) </a>
<a class="list-group-item" href="?p=12">12. Large-scale algorithms for Bayesian inversion, with application to flow of the Antarctic ice sheet (UT-Austin, NYU, UC Merced)</a>
<a class="list-group-item" href="?p=13">13. Bayesian nonlinear optimal experimental design for systems governed by PDEs (UT Austin, MIT) </a>
<a class="list-group-item" href="?p=refs">DiaMonD publications, 2012–2016</a>
</div>
<style>
ol li { margin-top: 1em; }
</style>
<?php
}
?>

<style>
.htlatex p {   text-align: justify;
  -webkit-hyphens: auto;
    -moz-hyphens: auto;
  hyphens: auto;
}
.htlatex nav { position: sticky;
    top: 1rem;
    height: calc(100vh - 4rem);
    }
.tabular tr { border-color: #000; }
/* start css.sty */
.cmr-7{font-size:70%;}
.cmmi-7{font-size:70%;font-style: italic;}
.cmmi-10{font-style: italic;}
.cmsy-7{font-size:70%;}
.cmtt-10{font-family: monospace;}
.cmtt-10{font-family: monospace;}
.cmbx-10{ font-weight: bold;}
.cmti-10{ font-style: italic;}
.cmr-8{font-size:80%;}
.cmmi-8{font-size:80%;font-style: italic;}
.cmsy-8{font-size:80%;}
.cmtt-8{font-size:80%;font-family: monospace;}
.cmtt-8{font-family: monospace;}
.cmr-9{font-size:90%;}
p.noindent { text-indent: 0em; margin:0; }
td p.noindent { text-indent: 0em; margin-top:0em; }
p.nopar { text-indent: 0em; }
p.indent{ text-indent: 1.5em; margin:0; }
@media print {div.crosslinks {visibility:hidden;}}
a img { border: 0; }
center { margin-top:1em; margin-bottom:1em; }
td center { margin-top:0em; margin-bottom:0em; }
.Canvas { position:relative; }
img.math{vertical-align:middle;}
li p.indent { text-indent: 0em }
li p:first-child{ margin-top:0em; }
li p:last-child, li div:last-child { margin-bottom:0.5em; }
li p~ul:last-child, li p~ol:last-child{ margin-bottom:0.5em; }
.enumerate1 {list-style-type:decimal;}
.enumerate2 {list-style-type:lower-alpha;}
.enumerate3 {list-style-type:lower-roman;}
.enumerate4 {list-style-type:upper-alpha;}
div.newtheorem { margin-bottom: 2em; margin-top: 2em;}
.obeylines-h,.obeylines-v {white-space: nowrap; }
div.obeylines-v p { margin-top:0; margin-bottom:0; }
.overline{ text-decoration:overline; }
.overline img{ border-top: 1px solid black; }
td.displaylines {text-align:center; white-space:nowrap;}
.centerline {text-align:center;}
.rightline {text-align:right;}
div.verbatim {font-family: monospace; white-space: nowrap; text-align:left; clear:both; }
.fbox {padding-left:3.0pt; padding-right:3.0pt; text-indent:0pt; border:solid black 0.4pt; }
div.fbox {display:table}
div.center div.fbox {text-align:center; clear:both; padding-left:3.0pt; padding-right:3.0pt; text-indent:0pt; border:solid black 0.4pt; }
div.minipage{width:100%;}
div.center, div.center div.center {text-align: center; margin-left:1em; margin-right:1em;}
div.center div {text-align: left;}
div.flushright, div.flushright div.flushright {text-align: right;}
div.flushright div {text-align: left;}
div.flushleft {text-align: left;}
.underline{ text-decoration:underline; }
.underline img{ border-bottom: 1px solid black; margin-bottom:1pt; }
.framebox-c, .framebox-l, .framebox-r { padding-left:3.0pt; padding-right:3.0pt; text-indent:0pt; border:solid black 0.4pt; }
.framebox-c {text-align:center;}
.framebox-l {text-align:left;}
.framebox-r {text-align:right;}
span.thank-mark{ vertical-align: super }
span.footnote-mark sup.textsuperscript, span.footnote-mark a sup.textsuperscript{ font-size:80%; }
div.tabular, div.center div.tabular {text-align: center; margin-top:0.5em; margin-bottom:0.5em; }
table.tabular td p{margin-top:0em;}
table.tabular {margin-left: auto; margin-right: auto;}
td p:first-child{ margin-top:0em; }
td p:last-child{ margin-bottom:0em; }
div.td00{ margin-left:0pt; margin-right:0pt; }
div.td01{ margin-left:0pt; margin-right:5pt; }
div.td10{ margin-left:5pt; margin-right:0pt; }
div.td11{ margin-left:5pt; margin-right:5pt; }

td.td00{ padding-left:0pt; padding-right:0pt; }
td.td01{ padding-left:0pt; padding-right:5pt; }
td.td10{ padding-left:5pt; padding-right:0pt; }
td.td11{ padding-left:5pt; padding-right:5pt; }
.hline hr, .cline hr{ height : 1px; margin:0px; }
.tabbing-right {text-align:right;}
span.TEX {letter-spacing: -0.125em; }
span.TEX span.E{ position:relative;top:0.5ex;left:-0.0417em;}
a span.TEX span.E {text-decoration: none; }
span.LATEX span.A{ position:relative; top:-0.5ex; left:-0.4em; font-size:85%;}
span.LATEX span.TEX{ position:relative; left: -0.4em; }
div.float, div.figure {margin-left: auto; margin-right: auto;}
div.float img {text-align:center;}
div.figure img {text-align:center;}
.marginpar {width:20%; float:right; text-align:left; margin-left:auto; margin-top:0.5em; font-size:85%; text-decoration:underline;}
.marginpar p{margin-top:0.4em; margin-bottom:0.4em;}
table.equation {width:100%;}
.equation td{text-align:center; }
td.equation { margin-top:1em; margin-bottom:1em; } 
td.equation-label { width:5%; text-align:center; }
td.eqnarray4 { width:5%; white-space: normal; }
td.eqnarray2 { width:5%; }
table.eqnarray-star, table.eqnarray {width:100%;}
div.eqnarray{text-align:center;}
div.array {text-align:center;}
div.pmatrix {text-align:center;}
table.pmatrix {width:100%;}
span.pmatrix img{vertical-align:middle;}
div.pmatrix {text-align:center;}
table.pmatrix {width:100%;}
span.bar-css {text-decoration:overline;}
img.cdots{vertical-align:middle;}
.partToc a, .partToc, .likepartToc a, .likepartToc {line-height: 200%; font-weight:bold; font-size:110%;}
.index-item, .index-subitem, .index-subsubitem {display:block}
div.caption {text-indent:0em; margin-left:1em; margin-right:1em; text-align:left;   text-align: justify;
  -webkit-hyphens: auto;
    -moz-hyphens: auto;
  hyphens: auto;}
div.caption span.id{font-weight: bold; white-space: nowrap; }
h1.partHead{text-align: center}
span.biblabel { display:inline-block; width: 3em; text-indent: 0em; }
span.bibsp { display: none; }
p.bibitem { text-indent: -3em; margin-left: 3em; margin-top:0.6em; margin-bottom:0.6em; }
p.bibitem-p { text-indent: 0em; margin-left: 2em; margin-top:0.6em; margin-bottom:0.6em; }
.paragraphHead, .likeparagraphHead { margin-top:2em; font-weight: bold;}
.subparagraphHead, .likesubparagraphHead { font-weight: bold;}
.quote {margin-bottom:0.25em; margin-top:0.25em; margin-left:1em; margin-right:1em; text-align:justify;}
.verse{white-space:nowrap; margin-left:2em}
div.maketitle {text-align:center;}
h2.titleHead{text-align:center;}
div.maketitle{ margin-bottom: 2em; }
div.author, div.date {text-align:center;}
div.thanks{text-align:left; margin-left:10%; font-size:85%; font-style:italic; }
div.author{white-space: nowrap;}
.quotation {margin-bottom:0.25em; margin-top:0.25em; margin-left:1em; }
.abstract p {margin-left:5%; margin-right:5%;}
div.abstract {width:100%;}
.figure img.graphics {margin-left:10%;}
.subfigcaption {margin-top:1em; margin-left:1em; text-align:center;}
div.subfigure {text-align:center;display:inline-block;}
div.algorithm table.caption { border-bottom: 1px solid black; margin-bottom:1pt; }
.ALCitem {width:2em; text-align:right;display:inline-block;font-size:0.8em;}
.ALIndent{display:inline-block;}
.equation td{text-align:center; }
.equation-star td{text-align:center; }
table.equation-star { width:100%; }
table.equation { width:100%; }
table.align, table.alignat, table.xalignat, table.xxalignat, table.flalign {width:95%; margin-left:5%; white-space: nowrap;}
table.align-star, table.alignat-star, table.xalignat-star, table.flalign-star {margin-left:auto; margin-right:auto; white-space: nowrap;}
td.align-label { width:5%; text-align:center; }
td.align-odd { text-align:right; padding-right:0.3em;}
td.align-even { text-align:left; padding-right:0.6em;}
table.multline, table.multline-star {width:100%;}
td.gather {text-align:center; }
table.gather {width:100%;}
div.gather-star {text-align:center;}
div.tabular, div.center div.tabular {text-align: center; margin-top:0.5em; margin-bottom:0.5em; }
table.tabular td p{margin-top:0em;}
table.tabular {margin-left: auto; margin-right: auto;}
td p:first-child{ margin-top:0em; }
td p:last-child{ margin-bottom:0em; }
div.td00{ margin-left:0pt; margin-right:0pt; }
div.td01{ margin-left:0pt; margin-right:5pt; }
div.td10{ margin-left:5pt; margin-right:0pt; }
div.td11{ margin-left:5pt; margin-right:5pt; }
table[rules] {border-left:solid black 0.4pt; border-right:solid black 0.4pt; }
td.td00{ padding-left:0pt; padding-right:0pt; }
td.td01{ padding-left:0pt; padding-right:5pt; }
td.td10{ padding-left:5pt; padding-right:0pt; }
td.td11{ padding-left:5pt; padding-right:5pt; }
table[rules] {border-left:solid black 0.4pt; border-right:solid black 0.4pt; }
.hline hr, .cline hr{ height : 1px; margin:0px; }
div.array {text-align:center;}
div.boxedminipage{border : 1px solid; margin-top:1pt; margin-bottom:1pt;}
#TBL-1 colgroup{border-left: 1px solid black;border-right:1px solid black;}
#TBL-1{border-collapse:collapse;}
#TBL-1 colgroup{border-left: 1px solid black;border-right:1px solid black;}
#TBL-1{border-collapse:collapse;}
#TBL-1 colgroup{border-left: 1px solid black;border-right:1px solid black;}
#TBL-1{border-collapse:collapse;}
#TBL-1 colgroup{border-left: 1px solid black;border-right:1px solid black;}
#TBL-1{border-collapse:collapse;}
#TBL-2 colgroup{border-left: 1px solid black;border-right:1px solid black;}
#TBL-2{border-collapse:collapse;}
#TBL-2 colgroup{border-left: 1px solid black;border-right:1px solid black;}
#TBL-2{border-collapse:collapse;}
#TBL-2 colgroup{border-left: 1px solid black;border-right:1px solid black;}
#TBL-2{border-collapse:collapse;}
#TBL-2 colgroup{border-left: 1px solid black;border-right:1px solid black;}
#TBL-2{border-collapse:collapse;}
#TBL-2 colgroup{border-left: 1px solid black;border-right:1px solid black;}
#TBL-2{border-collapse:collapse;}
#TBL-2 colgroup{border-left: 1px solid black;border-right:1px solid black;}
#TBL-2{border-collapse:collapse;}
#TBL-2 colgroup{border-left: 1px solid black;border-right:1px solid black;}
#TBL-2{border-collapse:collapse;}
#TBL-2 colgroup{border-left: 1px solid black;border-right:1px solid black;}
#TBL-2{border-collapse:collapse;}
#TBL-2 colgroup{border-left: 1px solid black;border-right:1px solid black;}
#TBL-2{border-collapse:collapse;}
/* end css.sty */


.figure img { max-width: 100%;}
h3.sectionHead { text-transform: none; }
</style>