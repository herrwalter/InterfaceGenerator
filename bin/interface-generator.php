#!/usr/bin/env php
<?php

require_once '/../autoloader.php';

$lang = strtoupper(ArgvHandler::getArgumentValue('-lang'));
$folder = ArgvHandler::getArgumentValue('-folder');
$json = ArgvHandler::getArgumentValue('-json');

if( $lang == null ){
    die('language not defined. Set it with "-lang {php/java}"');
}
if( $folder == null ){
    die('folder not defined. Set it with "-folder {path/to/generate/interface/in}"');
}
if( $json == null ){
    die('folder not defined. Set it with "-folder {path/to/json/with/interface/specifications}"');
}
$generatorClassName = $lang.'Generator';
$generator = new $generatorClassName();
$generator->setJson($json);
$generator->setFolder($folder);
$generator->generate();