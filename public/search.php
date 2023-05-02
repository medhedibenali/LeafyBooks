<?php

$pageTitle = 'Search';
require_once 'php/SearchManager.php';
require_once dirname(__FILE__,2).'/templates/searchResults.php';
$scripts=[[
    "src"=>"https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" ,
    "integrity"=>"sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe",
            "crossorigin"=>"anonymous"
]];
require_once '../templates/footer.php';