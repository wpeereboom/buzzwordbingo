#!/usr/bin/env php
<?php
require_once __DIR__ . '/vendor/autoload.php';

use Vnu\BuzzwordBingo;

$bingo = new BuzzwordBingo();
echo $bingo->run();
