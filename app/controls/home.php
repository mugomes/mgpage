<?php
if (!defined('MGPAGE')) {
    exit;
}

$tpl->var('siteTitle', 'MGPage');
$tpl->includeFile('content', $appRoot . '/views/home.html');
