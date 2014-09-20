#!/usr/bin/env php
<?php

require_once '/../autoloader.php';

$lang = ArgvHandler::getArgumentValue('-lang');
$folder = ArgvHandler::getArgumentValue('-folder');
$json = ArgvHandler::getArgumentValue('-json');

if( $lang == null ){
    die('language not defined. Set it with "-lang {php/java/all}"');
}
if( $folder == null ){
    die('folder not defined. Set it with "-folder {path/to/generate/interface/in}"');
}
if( $json == null ){
    die('json not defined. Set it with "-json {path/to/json/with/interface/specifications}"');
}
// if language is all, run all languages
if( strtoupper($lang) == 'ALL' ){
    $languages = array('JAVA','PHP' );
    foreach($languages as $lang){
        runGenerator($lang, $json, $folder);
    }
} else { // run specified language
    runGenerator($lang, $json, $folder);
}

/**
 * Runs a generator
 * @param type $lang
 */
function runGenerator($lang, $json, $folder){
    $generatorClassName = strtoupper($lang).'Generator';
    $generator = new $generatorClassName();
    $generator->setJson($json);
    $generator->setFolder($folder);
    $generator->generate();
}