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

function generate_navbar() {
    $nav = "<nav class='navbar'><ul>";
    $subs = scandir('../../../secure/nav/content');
    foreach($subs as $sub){
        if($sub != '.' and $sub != '..') {
            if(is_dir('../../../secure/nav/content/'.$sub)){
                // Lägg in katalogens index.md titel
                $sub = $sub."/index.md";
            }
            // Extract the title from the file
            $file_content = file('../../../secure/nav/content/'.$sub);
            $sub_yaml = extract_yaml($file_content);
            $nav .= "<li><a href='index.php?page=".$sub."'>".$sub_yaml["Title"]."</a></li>";
        }
    }
    $nav .= "</ul></nav>";
    return $nav;
};

echo "Hello";


