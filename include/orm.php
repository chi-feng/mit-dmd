<?php

class Object {

  protected $name;
  protected $fields;
  protected $data;
  protected $json_path;
  protected $sort_by;
  protected $sort_order;

  public function __construct($arg1, $arg2 = '') {
    $this->sort_order = 'asc';
    if ($arg1 === 'post') {
      $this->from_array($_POST);
    } else if (is_array($arg1)) {
      $this->from_array($arg1);
    } else {
      $this->from_existing($arg1, $arg2);
    }
  }

  public function get($field) {
    return $this->data[$field];
  }

  public function set($field, $value) {
    $this->data[$field] = $value;
  }

  public function from_existing($field, $value) {
    $arr = json_decode(file_get_contents($this->json_path), true);
    $found = false;
    foreach ($arr as $key => $item) {
      if ($item[$field] == $value) {
        $this->data = $arr[$key];
        $found = true;
      }
    }
    return $found;
  }

  public function from_array($arr) {
    foreach ($this->fields as $name => $field) {
      if ($field['type'] != 'array') {
        $this->data[$name] = array_key_exists($name, $arr) ? $arr[$name] : '';
      } else {
        $this->data[$name] = array();
        if (array_key_exists($name, $arr)) {
          $elements = explode("\n", $arr[$name]);
          foreach ($elements as $element) {
            $this->data[$name][] = trim($element);
          }
        }
      }
    }
  }

  public function max_id($arr) {
    $max_index = 0;
    foreach ($arr as $key => $item) {
      if (intval($item['id']) > $max_index) {
        $max_index = intval($item['id']);
      }
    }
    return $max_index;
  }

  public function insert_front() {
    $arr = json_decode(file_get_contents($this->json_path), true);
    $this->data['id'] = strval($this->max_id($arr) + 1);
    array_unshift($arr, $this->data);
    $json = format_json(json_encode($arr));
    file_put_contents($this->json_path, $json);
  }

  public function insert_back() {
    $arr = json_decode(file_get_contents($this->json_path), true);
    $this->data['id'] = strval($this->max_id($arr) + 1);
    $arr[] = $this->data;
    $json = format_json(json_encode($arr));
    file_put_contents($this->json_path, $json);
  }

  public function update($field, $value) {
    $arr = json_decode(file_get_contents($this->json_path), true);
    $found = false;
    foreach ($arr as $key => $item) {
      if ($item[$field] == $value) {
        $arr[$key] = $this->data;
        $found = true;
      }
    }
    if ($found) {
      $json = format_json(json_encode($arr));
      file_put_contents($this->json_path, $json);
      return true;
    } else {
      return false;
    }
  }

  public function delete($field, $value) {
    $arr = json_decode(file_get_contents($this->json_path), true);
    $found = false;
    foreach ($arr as $key => $item) {
      if ($item[$field] == $value) {
        unset($arr[$key]);
        $found = true;
      }
    }
    if ($found) {
      $json = format_json(json_encode($arr));
      file_put_contents($this->json_path, $json);
      return true;
    } else {
      return false;
    }
  }

  public function sort_function_asc($a, $b) {
    if (strpos($this->sort_by, 'date')) {
      return strtotime($a[$this->sort_by]) > strtotime($b[$this->sort_by]);
    }
    return $a[$this->sort_by] > $b[$this->sort_by];
  }

  public function sort_function_desc($a, $b) {
    if (strpos($this->sort_by, 'date')) {
      return strtotime($a[$this->sort_by]) < strtotime($b[$this->sort_by]);
    }
    return $a[$this->sort_by] < $b[$this->sort_by];
  }

  public function sort() {
    $direction = $this->sort_order;
    $arr = json_decode(file_get_contents($this->json_path), true);
    if (substr(strtolower($direction), 0, 4) == 'desc') {
      usort($arr, array($this, 'sort_function_desc'));
    } else {
      usort($arr, array($this, 'sort_function_asc'));
    }
    $json = format_json(json_encode($arr));
    file_put_contents($this->json_path, $json);
  }

  private function get_edit_form() {
    $html = array();
    foreach ($this->fields as $name => $field) {
      switch ($field['type']) {
        case 'text':
        $html[] = sprintf('<div class="form-group"><label>%s</label><input type="text" name="%s" class="form-control" value="%s" /></div>',
          $field['label'], $name, $this->data[$name]);
        break;
        case 'textarea':
        $html[] = sprintf('<div class="form-group"><label>%s</label><textarea name="%s" class="form-control" rows="6">%s</textarea></div>',
          $field['label'], $name, $this->data[$name]);
        break;
        case 'hidden':
        $html[] = sprintf('<input type="hidden" name="%s" value="%s" />', $name, $this->data[$name]);
        break;
        case 'month':
        $html[] = sprintf('<div class="form-group"><label>%s</label>', $field['label']);
        $html[] = sprintf('<select name="%s" class="form-control">', $name);
        $months = array('','Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec');
        foreach ($months as $idx => $month) {
          $selected = ($idx == $this->data[$name] || $month == $this->data[$name]) ? 'selected="selected"' : '';
          $html[] = sprintf('<option value="%s" %s>%s</option>', $idx, $selected, $month);
        }
        $html[] = '</select></div>';
        break;
        case 'person_type':
        $html[] = sprintf('<div class="form-group"><label>%s</label>', $field['label']);
        $html[] = sprintf('<select name="%s" class="form-control">', $name);
        $values = array(
          'researcher' => 'Researcher',
          'postdoc' => 'Postdoc',
          'grad' => 'Grad Student'
        );
        foreach ($values as $val=>$label) {
          $selected = ($val == $this->data[$name]) ? 'selected="selected"' : '';
          $html[] = sprintf('<option value="%s" %s>%s</option>', $val, $selected, $label);
        }
        $html[] = '</select></div>';
        break;
        case 'group':
        $html[] = sprintf('<div class="form-group"><label>%s</label>', $field['label']);
        $html[] = sprintf('<select name="%s" class="form-control">', $name);
        $values = Publication::get_groups();
        foreach($values as $val=>$label) {
          $selected = ($val == $this->data[$name]) ? 'selected="selected"' : '';
          $html[] = sprintf('<option value="%s" %s>%s</option>', $val, $selected, $label);
        }
        $html[] = '</select></div>';
        break;
        case 'pub_type':
        $html[] = sprintf('<div class="form-group"><label>%s</label>', $field['label']);
        $html[] = sprintf('<select name="%s" class="form-control">', $name);
        $values = array(
          'journal' => 'Journal Article',
          'conference' => 'Conference Proceeding',
          'thesis' => 'Thesis',
          'book' => 'Book'
        );
        foreach ($values as $val=>$label) {
          $selected = ($val == $this->data[$name]) ? 'selected="selected"' : '';
          $html[] = sprintf('<option value="%s" %s>%s</option>', $val, $selected, $label);
        }
        $html[] = '</select></div>';
        break;
        case 'date':
        $html[] = sprintf('<div class="form-group"><label>%s</label><input type="text" name="%s" class="form-control" value="%s" /></div>',
          $field['label'], $name, $this->data[$name]);
        break;
        case 'time':
        $html[] = sprintf('<div class="form-group"><label>%s</label><input type="text" name="%s" class="form-control" value="%s" /></div>',
          $field['label'], $name, $this->data[$name]);
        break;
        case 'array':
        $value = implode("\n", $this->data[$name]);
        $html[] = sprintf('<div class="form-group"><label>%s</label><textarea name="%s" class="form-control" rows="5">%s</textarea></div>',
          $field['label'], $name, $value);
        break;
      }
    }
    return implode('', $html);
  }

  public function edit() {
    // $return = '<h2>Editing '.$this->name.'</h2>';
    $return = '<form class="edit-'.$this->name.'" action="?a=update&t='.$this->name.'" method="post">';
    $return .= '<fieldset><legend>Edit '.$this->name.'</legend>';
    $return .= $this->get_edit_form();
    $return .= '<input type="hidden" name="id" value="'.$this->data['id'].'" />';
    $return .= '<input type="hidden" name="update_'.$this->name.'" value="true" />';
    $return .= '<label></label><input type="submit" value="Update" class="btn" />';
    $return .= '</fieldset></form>';
    return $return;
  }

  public function create() {
    $return = '';
    $return .= '<form class="create-'.$this->name.'" action="?a=insert&t='.$this->name.'" method="post">';
    $return .= '<fieldset><legend>Create '.$this->name.'</legend>';
    $return .= $this->get_edit_form();
    $return .= '<input type="hidden" name="insert_'.$this->name.'" value="true" />';
    $return .= '<label></label><input type="submit" value="Create" class="btn" />';
    $return .= '</fieldset></form>';
    return $return;
  }

  public function view_row($row) {
    $return = '';
    foreach($this->list_field as $field_name) {
      $value = array_key_exists($field_name, $row) ? truncate($row[$field_name], 1000) : '';
      $return .= '<td class="value">' . $value .'</td>';
    }
    return $return;
  }

  public function view_all() {
    $return = '';
    $return .= '<p><a class="btn btn-primary" href="?a=create&t='.$this->name.'">Create new '.$this->name.'</a>
    <a class="btn btn-default" href="?a=sort&t='.$this->name.'">Sort '.$this->name.'s ('.$this->sort_order.')</a></p>';
    $return .= '<table class="table table-striped">';
    $arr = json_decode(file_get_contents($this->json_path), true);
    $return .= '<thead><tr><th class="col-md-1"></th>';
    foreach($this->list_field as $field_name) {
      $return .= '<th>'.$field_name.'</th>';
    }
    $return .= '<th class="col-md-1"></th></tr></thead><tbody>';
    foreach ($arr as $idx => $val) {
      $return .= '<tr class="list-'.$this->name.'">';
      $return .= '<td class="edit-button">';
      $return .= '<a class="btn btn-xs btn-primary" href="?a=edit&t='.$this->name.'&id='.$val['id'].'"><i class="fa fa-pencil"></i> Edit</a>';
      $return .= '</td>';
      $return .= $this->view_row($val);
      $return .= '<td class="delete-button">';
      $return .= '<a class="btn btn-xs btn-danger confirm" href="?a=delete&t='.$this->name.'&id='.$val['id'].'"><i class="fa fa-trash"></i> Delete</a>';
      $return .= '</td>';
      $return .= '</tr>';
    }
    $return .= '</tbody></table>';
    return $return;
  }

}

class Announcement extends Object {
  public function __construct($arg1, $arg2 = '') {
    $this->name = 'Announcement';
    $this->json_path = 'json/announcements.json';
    $this->fields = array(
      'id' => array('label' => 'ID', 'type' => 'hidden'),
      'date' => array('label' => 'Date', 'type' => 'date'),
      'timestamp' => array('label' => 'Timestamp (machine-readable)', 'type' => 'date'),
      'content' => array('label' => 'Content', 'type' => 'textarea')
    );
    $this->list_field = array('content', 'timestamp', 'date');
    parent::__construct($arg1, $arg2);
    $this->sort_by = 'timestamp';
    $this->sort_order = 'desc';
  }

}

class Team extends Object {
  public function __construct($arg1, $arg2 = '') {
    $this->name = 'Team';
    $this->json_path = 'json/team.json';
    $this->fields = array(
      'id' => array('label' => 'ID', 'type' => 'hidden'),
      'name' => array('label' => 'Name', 'type' => 'text'),
      'type' => array('label' => 'Type', 'type' => 'person_type'),
      'affiliation' => array('label' => 'Affiliation', 'type' => 'text')
    );
    $this->sort_by = 'name';
    $this->list_field = array('name', 'type', 'affiliation');
    parent::__construct($arg1, $arg2);
  }

  public function sort() {
    $arr = json_decode(file_get_contents($this->json_path), true);
    usort($arr, array($this, 'sort_people'));
    $json = format_json(json_encode($arr));
    file_put_contents($this->json_path, $json);
  }

  public function sort_people($a, $b) {
    $a_tok = explode(' ', $a['name']);
    $a_lname = $a_tok[1];
    $b_tok = explode(' ', $b['name']);
    $b_lname = $b_tok[1];
    return strtolower($a_lname) > strtolower($b_lname);
  }

}

class Profile extends Object {
  public function __construct($arg1, $arg2 = '') {
    $this->name = 'Profile';
    $this->json_path = 'json/profiles.json';
    $this->fields = array(
      'id' => array('label' => 'ID', 'type' => 'hidden'),
      'name' => array('label' => 'Name', 'type' => 'text'),
      'position' => array('label' => 'Position', 'type' => 'text'),
      'institution' => array('label' => 'Institution', 'type' => 'text'),
      'website' => array('label' => 'Website', 'type' => 'text'),
      'education' => array('label' => 'Education', 'type' => 'textarea'),
      'research' => array('label' => 'DiaMonD Research', 'type' => 'text'),
      'collaborations' => array('label' => 'DiaMonD Collaborations', 'type' => 'text'),
      'about' => array('label' => 'About', 'type' => 'textarea'),
      'impact' => array('label' => 'Impact of DiaMonD', 'type' => 'textarea')
    );
    $this->sort_by = 'name';
    $this->list_field = array('name', 'position', 'institution');
    parent::__construct($arg1, $arg2);
  }

  public function sort() {
    $arr = json_decode(file_get_contents($this->json_path), true);
    usort($arr, array($this, 'sort_people'));
    $json = format_json(json_encode($arr));
    file_put_contents($this->json_path, $json);
  }

  public function sort_people($a, $b) {
    $a_tok = explode(' ', $a['name']);
    $a_lname = $a_tok[1];
    $b_tok = explode(' ', $b['name']);
    $b_lname = $b_tok[1];
    return strtolower($a_lname) > strtolower($b_lname);
  }

}

class Publication extends Object {
  public function __construct($arg1, $arg2 = '') {
    $this->name = 'Publication';
    $this->json_path = 'json/publications.json';
    $this->fields = array(
      'id' => array('label' => 'ID', 'type' => 'hidden'),
      'title' => array('label' => 'Title', 'type' => 'text'),
      'pub_type' => array('label' => 'Type', 'type' => 'pub_type'),
      'authors' => array('label' => 'Authors', 'type' => 'text'),
      'url' => array('label' => 'URL', 'type' => 'text'),
      'publication' => array('label' => 'Name of publication', 'type' => 'text'),
      'metadata' => array('label' => 'Volume/number/pages', 'type' => 'text'),
      'year' => array('label' => 'Year', 'type' => 'text'),
      'group' => array('label' => 'Group', 'type' => 'group')
    );
    $this->sort_by = 'order';
    $this->list_field = array('Type', 'Publication');
    parent::__construct($arg1, $arg2);
    $this->sort_order = 'asc';
  }

  public static function get_groups() {
    return array(''=>'Select a group',
'biros'=>'Biros, George',
'dawson'=>'Dawson, Clint',
'estep'=>'Estep, Don',
'gable'=>'Gable, Carl',
'ghattas'=>'Ghattas, Omar',
'gunzburger'=>'Gunzburger, Max',
'juanes'=>'Juanes, Ruben',
'marzouk'=>'Marzouk, Youssef',
'moser'=>'Moser, Robert',
'oden'=>' Oden, J. Tinsley',
'pannala'=>'Pannala, Sreekanth',
'turner'=>'Turner, John',
'vesselinov'=>'Vesselinov, Monty',
'willcox'=>'Willcox, Karen',
'ying'=>'Ying, Lexing'
);
  }

  public function get_max_order() {
    $arr = json_decode(file_get_contents($this->json_path), true);
    $max_index = 0;
    foreach ($arr as $key => $item) {
      if (intval($item['order']) > $max_index) {
        $max_index = intval($item['order']);
      }
    }
    return $max_index;
  }

  public function view_row($row) {
    $style = '';
    $journal = sprintf('%s, %s, %s',
      $row['publication'], $row['metadata'], $row['year']);
    return sprintf('<td>%s</td><td class="value">%s &ldquo;%s.&rdquo; %s</td>',
      $row['pub_type'], $row['authors'], $row['title'], $journal);
  }

  public function sort() {
    $arr = json_decode(file_get_contents($this->json_path), true);
    usort($arr, array($this, 'sort_publications'));
    $json = format_json(json_encode($arr));
    file_put_contents($this->json_path, $json);
  }

  public function sort_publications($a, $b) {
    if ($a['year'] < $b['year']) {
      return true;
    } else if ($a['year'] == $b['year']) {
      return get_lname($a['authors']) > get_lname($b['authors']);
    } else {
      return false;
    }
  }

}

function get_lname($auth) {
  $tokens = explode(' ', $auth);
  if (substr($tokens[0], -1) == '.') {
    foreach ($tokens as $tok) {
      if (substr($tok, -1) != '.') {
        return $tok;
      }
    }
    return $tokens[1];
  } elseif (substr($tokens[0], -1) == ',') {
    return $tokens[0];
  } else {
    foreach ($tokens as $idx=>$tok) {
      if ($idx > 0 && substr($tok, -1) != '.') {
        return $tok;
      }
    }
    return $tokens[0];
  }
}

function truncate($str, $len) {
  if (strlen($str) > $len) {
    return substr($str, 0, $len - 3) . '...';
  } else {
    return $str;
  }
}

function format_json( $json )
{
    $result = '';
    $level = 0;
    $prev_char = '';
    $in_quotes = false;
    $ends_line_level = NULL;
    $json_length = strlen( $json );

    for( $i = 0; $i < $json_length; $i++ ) {
        $char = $json[$i];
        $new_line_level = NULL;
        $post = "";
        if( $ends_line_level !== NULL ) {
            $new_line_level = $ends_line_level;
            $ends_line_level = NULL;
        }
        if( $char === '"' && $prev_char != '\\' ) {
            $in_quotes = !$in_quotes;
        } else if( ! $in_quotes ) {
            switch( $char ) {
                case '}': case ']':
                    $level--;
                    $ends_line_level = NULL;
                    $new_line_level = $level;
                    break;

                case '{': case '[':
                    $level++;
                case ',':
                    $ends_line_level = $level;
                    break;

                case ':':
                    $post = " ";
                    break;

                case " ": case "\t": case "\n": case "\r":
                    $char = "";
                    $ends_line_level = $new_line_level;
                    $new_line_level = NULL;
                    break;
            }
        }
        if( $new_line_level !== NULL ) {
            $result .= "\n".str_repeat( "\t", $new_line_level );
        }
        $result .= $char.$post;
        $prev_char = $char;
    }

    return $result;
}

?>
