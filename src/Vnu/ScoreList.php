<?php
/**
 * Winfred Peereboom <wpeereboom@gmail.com>
 */

namespace Vnu;

class ScoreList implements ScoreListInterface
{

    /**
     * @var array
     */
    private $scoreList = array();

    /**
     * Get the list of candidates in the order of the highest score
     *
     * @return array
     */
    public function getFinalResult()
    {
        $this->sortList();

        return $this->scoreList;
    }

    /**
     * Add a candidate to the score list
     *
     * @param string $name
     * @param int $score
     */
    public function addCandidate($name, $score)
    {
        $this->scoreList[] = array('name' => $name, 'score' => (int)$score);
    }

    /**
     * Get the unsorted candidate list
     * @return array
     */
    public function getScoreList()
    {
        return $this->scoreList;
    }

    private function sortList()
    {
        foreach ($this->scoreList as $key => $row) {
            $score[$key]  = $row['score'];
            $url[$key] = $row['name'];
        }

        array_multisort($score, SORT_DESC, $url, SORT_ASC, $this->scoreList);
    }
} 