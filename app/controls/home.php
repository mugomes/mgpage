<?php
if (!defined('MGPAGE')) {
    exit;
}

$tpl->var('siteTitle', 'MGPage');
$tpl->includeFile('content', $appRoot . '/views/home.html');

$start = microtime(true);

$sum = 0;
for ($i = 1; $i <= 100000; $i++) {
    $sum += $i;
}

// Calcula tempo decorrido
$elapsed = microtime(true) - $start;

$tpl->var('tempo', $elapsed);
