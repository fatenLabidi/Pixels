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
        'models/Actualites.js',
        'models/Categorie.js',
        'models/Categories.js',
        'models/FicheTechnique.js',
        'models/New.js',
        'models/News.js',
        'models/Quizz.js',
        'models/QuizzList.js',
        'models/Utilisateur.js',
        'models/Theme.js',
        'models/Themes.js',
        // VIEWS
        'views/View_Actualites.js',
        'views/View_Categorie.js',
        'views/View_Categories.js',
        'views/View_FicheTechnique.js',
        'views/View_New.js',
        'views/View_News.js',
        'views/View_Quizz.js',
        'views/View_QuizzList.js',
        'views/View_Theme.js',
        'views/View_Themes.js',       
        // OTHERS        
        // MAIN
        'test.js',
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