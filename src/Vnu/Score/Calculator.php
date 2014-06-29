<?php
/**
 * Winfred Peereboom <wpeereboom@gmail.com>
 */

namespace Vnu\Score;

class Calculator
{

    /**
     * @var string
     */
    private $haystack;

    /**
     * @var string
     */
    private $needle;

    /**
     * @var int
     */
    private $score;

    public function __construct($haystack, $needle, $score)
    {
        $this->haystack = $haystack;
        $this->needle = $needle;
        $this->score = (int) $score;
    }

    /**
     * Calculate the score of the occurrences of word in haystack
     *
     * @return int
     */
    public function getCalculatedScore()
    {
        $score = 0;

        if ($this->needleOccursInHaystack($this->haystack, $this->needle)) {
            $score = $score + substr_count($this->haystack, $this->needle) * $this->score;
        }

        return $score;
    }

    /**
     * @param $content
     * @param $word
     *
     * @return int
     */
    protected function needleOccursInHaystack($content, $word)
    {
        return !empty($word) && !(strpos($content, $word) === false);
    }
} 