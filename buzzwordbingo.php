#!/usr/bin/env php
<?php
require_once __DIR__ . '/vendor/autoload.php';

use Vnu\BuzzwordBingo;
use Vnu\FileParser\BuzzWordFileParser;
use Vnu\FileParser\UrlFileParser;
use Vnu\JobPosting\Retriever;
use Vnu\Score\ResultList;

if(!isset($argv[1]) || !isset($argv[2]) ) {
    echo "No buzzword file or job url list given.";
    exit;
}

/**
 * Initialise the required dependencies
 */
$buzzWordFileParser = new BuzzWordFileParser();
$buzzWordFileParser->setFileContent(file_get_contents($argv[1]));

$urlFileParser = new UrlFileParser();
$urlFileParser->setFileContent(file_get_contents($argv[2]));

$scoreList = new ResultList();
$jobPostingParser = new Retriever();

$bingo = new BuzzwordBingo($buzzWordFileParser, $urlFileParser, $jobPostingParser, $scoreList);
$result = $bingo->run();

include __DIR__ . '/src/templates/results.php';