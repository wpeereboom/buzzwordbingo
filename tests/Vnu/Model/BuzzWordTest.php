<?php
/**
 * Winfred Peereboom <wpeereboom@gmail.com>
 */

namespace Vnu\Model;

class BuzzWordTest extends \PHPUnit_Framework_TestCase
{

    public function testGetWord()
    {
        $word = 'Example';
        $buzzWord = new BuzzWord($word, 10);

        $this->assertEquals($word, $buzzWord->getWord());
    }

    public function testGetScore()
    {
        $score = 10;
        $buzzWord = new BuzzWord('Example', $score);

        $this->assertSame($score, $buzzWord->getScore());
    }

    public function testGetScoreCastToInt()
    {
        $score = "10";
        $buzzWord = new BuzzWord('Example', $score);

        $this->assertSame((int)$score, $buzzWord->getScore());
    }

    /**
     *
     * @dataProvider getWords
     *
     * @param string $word
     * @param string $expected
     */
    public function testCleanUpAWord($word, $expected)
    {
        $buzzWord = new BuzzWord($word, 1);
        $this->assertEquals($expected, $buzzWord->getWord());
    }

    public function getWords()
    {
        return array(
            array(' with space', 'with space'),
            array('normal', 'normal'),
            array('post space ', 'post space'),
            array('"quoted"', 'quoted'),
        );
    }
}
 