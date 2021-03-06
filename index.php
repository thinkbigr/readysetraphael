<?php

use AllanKiezel\ReadySetRaphael\SVG;
use AllanKiezel\ReadySetRaphael\Parser as Parser;

require __DIR__.'/vendor/autoload.php';

try {

    $xml =  file_get_contents(__DIR__ . '/svg/test.svg');

    $svg = SVG::getInstance('rsr');
    $svg->setSVG($xml);

    $parser = new Parser($svg->getSVG());
    $parser->init();

} catch (Exception $e) {
    echo $e->getMessage() . '<br>';
    echo $e->getTraceAsString();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title></title>
    <script src="https://raw.github.com/DmitryBaranovskiy/raphael/master/raphael-min.js" type="text/javascript" charset="utf-8"></script>
</head>

<body>
<div id="rsr"></div>
<div id="output"></div>
<script><?php $parser->generateJs(); ?></script>
</body>