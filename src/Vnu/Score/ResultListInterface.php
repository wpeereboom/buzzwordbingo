<?php
/**
 * Winfred Peereboom <wpeereboom@gmail.com>
 */

namespace Vnu\Score;

interface ResultListInterface {

    public function getFinalResult();

    public function addCandidate($name, $score);
} 