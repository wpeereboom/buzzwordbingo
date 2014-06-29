<?php
/**
 * Winfred Peereboom <wpeereboom@gmail.com>
 */

namespace Vnu;

use Vnu\Score\ResultList;

class ResultListTest extends \PHPUnit_Framework_TestCase
{

    public function testAddItems()
    {
        $name = "First record";
        $score = 100;

        $resultList = new ResultList();
        $resultList->addCandidate($name, $score);

        $this->assertEquals(array(array('name' => $name, 'score' => $score)), $resultList->getScoreList());
    }

    public function testFinalResults()
    {
        $expectedResult = array(
            array('name' => 'first', 'score' => 100),
            array('name' => 'second', 'score' => 20),
            array('name' => 'third', 'score' => 3),
        );

        $resultList = new ResultList();
        foreach ($expectedResult as $candidate) {
            $resultList->addCandidate($candidate['name'], $candidate['score']);
        }

        $this->assertEquals($expectedResult, $resultList->getFinalResult());
    }

    public function testSecondCandidateIsBetter()
    {
        $resultList = new ResultList();
        $resultList->addCandidate('John', 1200);
        $resultList->addCandidate('Wilma', 1500);

        $result = $resultList->getFinalResult();

        $this->assertEquals('Wilma', $result[0]['name']);
        $this->assertEquals('John', $result[1]['name']);
    }

}
 