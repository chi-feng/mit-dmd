<?php

function seoUrl($string) {
    //Lower case everything
    $string = strtolower($string);
    //Make alphanumeric (removes all other characters)
    $string = preg_replace("/[^a-z0-9_\s-]/", "", $string);
    //Clean up multiple dashes or whitespaces
    $string = preg_replace("/[\s-]+/", " ", $string);
    //Convert whitespaces and underscore to dash
    $string = preg_replace("/[\s_]/", "-", $string);
    return $string;
}

// render featured articles
function show_featured_articles() {
  global $articles;
  $index = 0;
  foreach ($articles as $article) {
    if (isset($article['featured']) && $article['featured'] == 'yes') {
      echo get_article_html($index++, $article);
    }
  }
}

// render a list of articles by id
function show_articles($article_ids) {
  global $articles;
  $index = 0;
  foreach ($articles as $article) {
    if (in_array(intval($article['order']), $article_ids)) {
      echo get_article_html($index++, $article);
    }
  }
}

// get a list of all article authors
function get_article_authors() {
  global $articles;
  $hashmap = array();
  $authors = array();
  foreach ($articles as $index => $article) {
    foreach ($article['authors'] as $author) {
      if (!isset($hashmap[$author])) {
        $hashmap[$author] = true;
        $authors[] = $author;
      }
    }
  }
  sort($authors);
  return $authors;
}

// get a list of all journals
function get_article_journals() {
  global $articles;
  $hashmap = array();
  $journals = array();
  foreach ($articles as $index => $article) {
    if (!isset($hashmap[$article['journal']])) {
      $hashmap[$article['journal']] = 0;
      $journals[] = $article['journal'];
    }
  }
  sort ($journals);
  return $journals;
}

// render short representation of an article
function render_article_short($article) {
  $html = sprintf('%s, &ldquo;%s.&rdquo; %s <strong>%s</strong> %s (%s)', implode(', ', $article['authors']), $article['title'], $article['journal'], $article['volume'], $article['pages'], $article['year']);
  return $html;
}

// render short representation of an article given the article's order id
function show_article_short($order_id) {
  global $articles;
  foreach($articles as $article) {
    if ($article['order'] == $order_id) {
      echo render_article_short($article);
      break;
    }
  }
}

function get_modal($id, $title, $content) {
  return sprintf('
<div class="modal fade" id="%s" tabindex="-1" role="dialog">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<h4 class="modal-title">%s</h4>
</div>
<div class="modal-body">
%s
</div>
<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
</div>
</div>
</div>
</div>', $id, $title, $content);
}

function get_article_bibtex($article) {
  $bibtex_raw = array(
    '@article {',
    '  title = "' . $article['title'] . '",',
    '  author = "' . implode(' and ', $article['authors']) . '",',
    '  journal = "' . $article['journal'] . '",',
    '  volume = "' . $article['volume'] . '",',
    '  year ="' . $article['year'] .'",',
    '  number = "' . $article['number'] . '",',
    '  pages = "' . $article['pages'] . '",',
    '  doi = "' . $article['doi'] . '"',
    "}\n");
  return implode("\n", $bibtex_raw);
}

function get_article_html($index, $article) {

  $journal_pages = (isset($article['pages']) && !empty($article['pages'])) ? ' pp. ' . $article['pages'] : '';
  $journal = '<div class="journal">' . $article['journal'] . ' <strong>' . $article['volume'] . '</strong>' . $journal_pages . ' (' . $article['year'] . ')</div>'. "\n";

  $thumbnail_src = (isset($article['thumbnail']) && !empty($article['thumbnail'])) ? '/images/publications/' . $article['thumbnail'] : '/images/publications/none.png';
  // if ($article['journal'] == 'Submitted') $thumbnail_src = '/images/publications/preprint.png';
  $thumbnail = '<a href="' . $article['fulltext'] . '"><img src="'. $thumbnail_src .'" width="100%" /></a>' . "\n";

  if ($article['journal'] == 'Submitted') {

  }

  $zebra = $index % 2 ? 'even' : 'odd';

  $html = array();
  $html[] = sprintf('
<div class="article col-md-12 %s" id="article-%s">
<div class="col-md-10 col-sm-12">
<div class="row">
<!--
<div class="thumb col-md-2 hidden-sm hidden-xs">%s</div>
-->
<div class="info col-md-12">
<div class="authors">%s</div>
<div class="title"><a href="%s">%s</a></div>
<div class="journal">%s</div>
</div>
</div>
</div>
<!--
<div class="buttons col-md-2 hidden-sm hidden-xs">
<button type="button" class="btn btn-sm btn-default fullwidth" data-toggle="modal" data-target="#article-%s-fulltext">Fulltext</button>
<button type="button" class="btn btn-sm btn-default fullwidth" data-toggle="modal" data-target="#article-%s-abstract">Abstract</button>
<button type="button" class="btn btn-sm btn-default fullwidth" data-toggle="modal" data-target="#article-%s-bibtex">BibTeX</button>
</div>
-->
</div>', $zebra, $index, $thumbnail, implode(', ', $article['authors']), $article['fulltext'], $article['title'], $journal, $index, $index, $index);

  $fulltext = "";
  if (strpos($article['fulltext'], 'arxiv') === false) {
    $fulltext .= '<a class="btn btn-default" href="'.$article['fulltext'].'">View on External Site <i class="icon-external-link"></i> </a>';
    $fulltext .= '<code class="block">'.htmlspecialchars($article['fulltext']).'</code><br />';
    if (isset($article['arxiv']) && !empty($article['arxiv'])) {
      $link = $article['arxiv'];
      if (strpos($article['arxiv'], 'http') === false) {
        $link = 'http://arxiv.org/abs/' . $article['arxiv'];
      }
      $fulltext .= '<a class="btn btn-default" href="'.$link.'">View on arXiv.org</a> ';
      $fulltext .= '<code class="block">'.htmlspecialchars($link).'</code><br />';
    }
  } else {
    $fulltext .= '<a class="btn btn-default" href="'.$article['fulltext'].'">View on arXiv.org</a> ';
    $fulltext .= '<code class="block">'.htmlspecialchars($article['fulltext']).'</code><br />';
  }

  $html[] = get_modal("article-$index-fulltext", "Fulltext options", $fulltext);
  $html[] = get_modal("article-$index-abstract", $article['title'], $article['abstract']);
  $html[] = get_modal("article-$index-bibtex", "BibTeX entry", '<pre>' . get_article_bibtex($article) . '</pre>');

  return implode("", $html);
}

function get_conference_bibtex($conference) {
  $bibtex_raw = array(
    '@inproceedings {',
    '  author = "' . implode(' and ', $conference['authors']) . '",',
    '  title = "' . $conference['title'] . '",',
    '  booktitle = "' . $conference['conference'] . '",',
    '  publisher = "' . $conference['publication'] . '",',
    '  year ="' . $conference['year'] .'",',
    "}\n");
  return implode("\n", $bibtex_raw);
}

function get_conference_html($index, $conference) {

  $zebra = $index % 2 ? 'even' : 'odd';
  $html = array();
  $buttons = '';
  if (array_key_exists('abstract', $conference)) {
    $buttons .= sprintf('<button type="button" class="btn btn-sm btn-default fullwidth" data-toggle="modal" data-target="#conference-%s-abstract">Abstract</button>', $index);
    $html[] = get_modal("conference-$index-abstract", $conference['title'], $conference['abstract']);
  }
  $html[] = get_modal("conference-$index-bibtex", "BibTeX entry", '<pre>' . get_conference_bibtex($conference) . '</pre>');
  $buttons .= sprintf('<button type="button" class="btn btn-sm btn-default fullwidth" data-toggle="modal" data-target="#conference-%s-bibtex">BibTeX</button>', $index);

  $html[] = sprintf('
<div class="article col-md-12 clearfix %s" id="conference-%s">
<div class="col-md-10 col-sm-12">
<div class="row">
<div class="col-md-12">
<div class="authors">%s</div>
<div class="title"><a href="%s">%s</a></div>
<div class="conference">%s</div>
<div class="publication">%s (%s)</div>
</div>
</div>
</div>
<div class="col-md-2 hidden-sm hidden-xs">
%s
</div>
</div>', $zebra, $index, implode(', ', $conference['authors']), $conference['url'], $conference['title'], $conference['conference'], $conference['publication'], $conference['year'], $buttons);

  return implode("", $html);
}


function get_other_html($index, $other) {

  $zebra = $index % 2 ? 'even' : 'odd';
  $html = array();
  $buttons = '';
  $html[] = get_modal("other-$index-bibtex", "BibTeX entry", '<pre>' . $other['bibtex'] . '</pre>');
  $buttons .= sprintf('<button type="button" class="btn btn-sm btn-default fullwidth" data-toggle="modal" data-target="#other-%s-bibtex">BibTeX</button>', $index);

  $html[] = sprintf('
<div class="article col-md-12 clearfix %s" id="other-%s">
<div class="col-md-10 col-sm-12">
<div class="row">
<div class="col-md-12">
<div class="authors">%s</div>
<div class="title"><a href="%s">%s</a></div>
<div class="publication">%s</div>
</div>
</div>
</div>
<div class="col-md-2 hidden-sm hidden-xs">
%s
</div>
</div>', $zebra, $index, implode(', ', $other['authors']), $other['url'], $other['title'], $other['publication'], $buttons);

  return implode("", $html);
}

?>
