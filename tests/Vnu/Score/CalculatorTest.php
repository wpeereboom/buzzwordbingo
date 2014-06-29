<?php
/**
 * Winfred Peereboom <wpeereboom@gmail.com>
 */

namespace Vnu;

use Vnu\Score\Calculator;

class CalculatorTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @dataProvider getTestData
     */
    public function testCalculateScore($haystack, $needle, $score, $expectedScore)
    {
        $scoreCalculator = new Calculator($haystack, $needle, $score);
        $this->assertEquals($expectedScore, $scoreCalculator->getCalculatedScore());
    }

    public function getTestData()
    {
        return array(
            array('', '', 0, 0),
            array('single','single', 10, 10),
            array('double double','double', 10, 20),
            array('double double','double', 0, 0),
            array('the content', 'none', 10 , 0),
            array('triple triple one double, triple', 'triple', 5, 15),
        );
    }
}
 