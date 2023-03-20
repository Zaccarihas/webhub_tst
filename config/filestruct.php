<?php

function get_folder($url = ''){

    if ($url == '') {
        $url = 'content';
        $parent = 'content';
    }

    // Initiate the list
    $pos = strrpos($url, '/');
    if ($pos != null){
        $parent = substr($url,$pos + 1);
    }
    
    $list = [$parent];

    // Traversera genom content
    $dir = scandir($url);
    foreach ($dir as $itm){
        if($itm != '.' and $itm != '..'){
            if(is_dir("$url/$itm")){
                array_push($list, get_folder($url.'/'.$itm));
                //array_push($list, [$itm]);
            } else {
                if ($itm != 'index.html') {
                    array_push($list, $itm);
                }
            }
        }
    }
    return $list;
}

function create_tree($list){
    $tree = '<ul>';
    foreach($list as $itm){
        $tree .= "<li>";
        if(is_array($itm)) {
            // Rekursivt anrop för att skapa subnivå
            $tree .= create_tree($itm);
        } else {
            $tree .= "$itm";
        }
        $tree .= "</li>";
    }
    $tree .= '</ul>';
    return $tree;
}
