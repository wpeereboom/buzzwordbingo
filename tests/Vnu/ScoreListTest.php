<?php
/**
 * Winfred Peereboom <wpeereboom@gmail.com>
 */

namespace Vnu;


class ScoreListTest extends \PHPUnit_Framework_TestCase
{

    public function testAddItems()
    {
        $name = "First record";
        $score = 100;

        $scoreList = new ScoreList();
        $scoreList->addCandidate($name, $score);

        $this->assertEquals(array(array('name' => $name, 'score' => $score)), $scoreList->getScoreList());
    }

    public function testFinalResults()
    {
        $expectedResult = array(
            array('name' => 'first', 'score' => 100),
            array('name' => 'second', 'score' => 20),
            array('name' => 'third', 'score' => 3),
        );

        $scoreList = new ScoreList();
        foreach ($expectedResult as $candidate) {
            $scoreList->addCandidate($candidate['name'], $candidate['score']);
        }

        $this->assertEquals($expectedResult, $scoreList->getFinalResult());
    }

    public function testSecondCandidateIsBetter()
    {
        $scoreList = new ScoreList();
        $scoreList->addCandidate('John', 1200);
        $scoreList->addCandidate('Wilma', 1500);

        $result = $scoreList->getFinalResult();


        $this->assertEquals('Wilma', $result[0]['name']);
        $this->assertEquals('John', $result[1]['name']);
    }

}
 