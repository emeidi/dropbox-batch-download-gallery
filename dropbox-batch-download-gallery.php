<?php
    // Manually save the Dropbox HTML page containing the gallery as "index.html" in the current folder
    $raw = file_get_contents('./index.html');
    
    $pattern = '#(https://www.dropbox.com/sh/[a-zA-Z0-9\_\-\./]+)\?dl=0#';
    
    $numMatches = preg_match_all($pattern,$raw,$matches);
    
    $urls = array();
    foreach($matches[1] as $match) {
        $url = $match . "?dl=1";
        $md5 = md5($url);
        
        if(!isset($urls[$md5])) {
            $urls[$md5] = $url;
        }
    }
    
    $pattern = '#/([a-zA-Z0-9\-\_\.]+)\?dl=1#'; // Might require tweaking in case the uploader used other characters in his filenames
    foreach($urls as $url) {
        $numMatches = preg_match($pattern,$url,$match);
        
        print 'wget -c -O "' . $match[1] . '" "' . $url . '"' . "\n";
    }
?>