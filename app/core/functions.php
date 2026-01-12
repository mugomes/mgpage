<?php
if (!defined('MGPAGE')) {
    exit;
}

function CleanDB(?string $valor): ?string
{
    if (is_null($valor)) {
        $txt = '';
    } else {
        $txt = trim($valor);
        $txt = strip_tags($txt);
        $txt = addslashes($txt);
    }

    return $txt;
}

function servername(bool $comprotocolo = true, bool $semwww = false): string
{
    $sServer = '';
    $servername = CleanDB(getenv('SERVER_NAME'));

    if ($comprotocolo) {
        if (empty(getenv('HTTPS'))) {
            $txtProtocolo = 'http://';
        } else {
            if (getenv('HTTPS') !== 'off') {
                $txtProtocolo = 'https://';
            } else {
                $txtProtocolo = 'http://';
            }
        }

        $sServer = $txtProtocolo;
    }

    if ($semwww) {
        $sServer .= str_replace('www.', '', $servername);
    } else {
        $sServer .= $servername;
    }

    return $sServer;
}