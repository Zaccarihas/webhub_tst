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

function generate_navbar_info($content_folder='') {
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
