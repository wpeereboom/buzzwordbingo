<?php
/**
 * Winfred Peereboom <wpeereboom@gmail.com>
 */

namespace Vnu;


interface ScoreListInterface {

    public function getFinalResult();

    public function addCandidate($name, $score);
} 