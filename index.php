<?php 
    
    // Configurate
    $_PUBLIC_WEB_FOLDER = 'html';
    $_SECURE_WEB_FOLDER = 'secure';
    $secure_path = str_replace($_PUBLIC_WEB_FOLDER,$_SECURE_WEB_FOLDER,__DIR__);
    require_once($secure_path . '/controllers/init.php');
    
    // Beräkningen av curpage borde ligga i Site där även funktionen translate_url borde finnas.
    $curpage = translate_url(htmlentities($_GET['page'] ?? 'index.md'),$secure_path . '/models/content');
    
    // Varför skickar jag in curpage både till constructorn och till routern?
    $hub = new Site(__DIR__, $curpage);

    // Rout and render requested page
    $hub->route($curpage);
    
    
    function translate_url($url, $path) {
        
        if ($url == 'index.md' || $url == '') return 'index.md';

        if ($url == 'registration') return 'registration';
        
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