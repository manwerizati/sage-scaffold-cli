<?php

require_once 'BlockGenerator.php';

if (!isset($argv[1])) {
    echo "Podaj nazwę bloku";
    exit;
}

$blockName = $argv[1];

$generator = new BlockGenerator($blockName);
$generator->generate();