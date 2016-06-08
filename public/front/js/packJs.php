<?php
/*
|--------------------------------------------------------------------------
| Merge files
|--------------------------------------------------------------------------
|
*/
    $files = [
        // LIBRARIES
        'lib/jquery.js',
        'lib/underscore.js',
        'lib/backbone.js',
        'lib/backbone.pclia.js',
        'lib/handlebars.js',
        'lib/handlebars.pclia.js',
        // MODELS
        'models/ModelNew.js',
        'models/News.js',
        // VIEWS
        'views/View_New.js',
        'views/View_News.js',
        // OTHERS
        // MAIN
        'news.js',
    ];

    $js = '';
    foreach ($files as $file) {
        $js = $js . file_get_contents($file) . "\n";
    }

/*
|--------------------------------------------------------------------------
| Regroupe toutes les templates en une seule varaiable Js global
|--------------------------------------------------------------------------
|
*/
    $templates = [];
    $dirTemplate = 'templates/';
    foreach (glob($dirTemplate . '*.html') as $filename) {
        $viewName = str_ireplace('.html', '', $filename);
        $viewName = substr($viewName, strlen($dirTemplate));
        $content = file_get_contents($filename);
        $templates[$viewName] = preg_replace('/\s+/u', ' ', $content);
    }
    $jsonTemplate = json_encode($templates);

    header("Content-type: application/javascript");
    echo "var JST = {$jsonTemplate};\n";
    echo $js;
