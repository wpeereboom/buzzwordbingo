<?php
/**
 * Winfred Peereboom <wpeereboom@gmail.com>
 */

namespace Vnu\Model;

class BuzzWord extends Model
{

    /**
     * @var string
     */
    private $word;

    /**
     * @var int
     */
    private $score;

    /**
     * @param string $word
     * @param int $score
     */
    public function __construct($word, $score)
    {
        $this->word = $this->cleanUp($word);
        $this->score = (int)trim($score);
    }

    /**
     * Get the score
     *
     * @return mixed
     */
    public function getScore()
    {
        return $this->score;
    }

    /**
     * Get the word
     *
     * @return mixed
     */
    public function getWord()
    {
        return $this->word;
    }
} 