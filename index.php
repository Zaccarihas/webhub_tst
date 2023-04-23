<?php 
    
    // Configurate
    require_once('/var/www/secure/nav/controllers/init.php');
    require_once('/var/www/secure/nav/controllers/cls_site.php');
    //$curpage = htmlentities($_GET['page'] ?? 'index.md');
    $curpage = translate_url(htmlentities($_GET['page'] ?? 'index.md'),'/var/www/secure/nav/models/content');

    $hub = new Site(__DIR__, $curpage);

    // Rout and render requested page
    
    // echo "<pre>";
    // echo "Calling router with $curpage";

    $hub->route($curpage);
    //echo $curpage;
    //echo "<hr><hr><br>Filepath from url: ".translate_url($curpage, '/var/www/secure/nav/models/content');
    
    function translate_url($url, $path) {
        
        if ($url == 'index.md' || $url == '') return 'index.md';
        
        // Hämta nästa sökord
        $pos = strpos($url,'/');
        $target = strpos($url,'/') ? substr($url,0,$pos) : $url;
        $sublevel = $pos ? substr($url, $pos+1) : '';
        
        // Hämta content för den föreslagna nivån
        $folder = scandir($path);
        
        foreach($folder as $itm) {
            if($itm != '.' && $itm != '..'){
                $ext = strpos($itm,'.');
                $itm_name = $ext ? substr($itm,0,$ext) : $itm;
                if($itm_name == $target){
                    if(is_dir($path.'/'.$itm)){
                        return $target.'/'.translate_url($sublevel, $path.'/'.$target);
                    } else {
                        return $itm;
                    }
                }
            }
        }

        return 'index.md';
    }