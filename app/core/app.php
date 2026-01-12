<?php

use MiTemplate\MiTemplate;

if (!defined("MGPAGE")) {
    exit;
}

$appRoot = dirname(__FILE__, 2);

include_once($appRoot . '/libs/vendor/autoload.php');
include_once(__DIR__ . '/functions.php');

$tpl = new MiTemplate($appRoot . '/views/layout.html');

$tpl->var('fullURL', servername(true, true));
include_once($appRoot . '/controls/home.php');

// Minifier
include_once($appRoot . '/libs/tinyhtmlminify/tinyhtmlminify.php');
$minifier = new TinyHtmlMinifier([
    'collapse_whitespace' => true,
    'disable_comments' => false
]);

// Show Content
$sHTML = $minifier->minify($tpl->render());
echo $sHTML;
