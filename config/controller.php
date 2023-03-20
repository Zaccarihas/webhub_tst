<?php

function extract_yaml(&$file) {
    if($file[0] == "---\n"){
        array_shift($file);
        $endrow = array_search("---\n", $file);
        $yaml = yaml_parse(implode(array_slice($file, 0, $endrow)));
        $file = array_splice($file, $endrow+1);
    }
    return $yaml;
};

function _generate_navbar_info($content_folder='') {
    $content_url = CONTENT_ROOT.$content_folder;
    $subs = scandir($content_url);
    $nav = array();
    foreach($subs as $sub){
        if($sub != '.' and $sub != '..') {
            if ($content_folder == '' or $sub != "index.md") {
                if(is_dir($content_url.$sub)){
                    $sub = $sub."/index.md";
                }

                // Extract the title from the file
                $file_content = file($content_url.$sub);
                $sub_yaml = extract_yaml($file_content);
                $nav[] = [
                    'url' =>$content_folder.$sub, 
                    'title' => $sub_yaml["Title"]
                ];
            }
        }
    }
    return $nav;
}

function generate_navbar_info($list, $path='') {
    $nav = array();
    foreach($list as $idx => $itm) {
        if($idx == 0){
            $itm = "index.md";
        } 
        if(is_array($itm)) {
            $itm = $itm[0].'/index.md';
        }
        $file_content = file(CONTENT_ROOT."/$path".$itm);
        $sub_yaml = extract_yaml($file_content);
        $nav[] = [
            'url' => $path.$itm,
            'title' => $sub_yaml['Title']
        ];        
    }
    return $nav;
}

function generate_sidebar_info($list, $path='') {
    $nav = array();
    foreach($list as $idx => $itm) {
        if(is_array($itm)) {
            $itm = $itm[0].'/index.md';
        }
        $file_content = file(CONTENT_ROOT."/$path".$itm);
        $sub_yaml = extract_yaml($file_content);
        $nav[] = [
            'url' => $path.$itm,
            'title' => $sub_yaml['Title']
        ];        
    }
    return $nav;
}

function get_sub_level(&$list, $path) {

    // echo "<hr><br>Incoming: $path";
    $pos = strpos($path, '/');
    // echo "<br>Pos: $pos";
    if ($pos != null){
        $folder = substr($path, 0, $pos);
        $path = substr($path, $pos+1);
        // echo "<br>Folder: $folder";
        // echo "<br>Path: $path";
        foreach ($list as $idx => $itm){
            // echo "<br>Item: ";
            //print_r($itm);
            if (is_array($itm) and $itm[0]==$folder) {
                // is path empty
                if($path == ""){
                    $parent = array_shift($itm);
                    return $itm;
                } else {
                    return get_sub_level($itm, $path);
                }                
            }            
        }
    }
    return null;
}
