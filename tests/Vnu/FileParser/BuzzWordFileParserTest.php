<?php
/**
 * Winfred Peereboom <wpeereboom@gmail.com>
 */

namespace Vnu\FileParser;

use Vnu\Model\BuzzWord;
use Vnu\Collection;

class BuzzWordFileParserTest extends \PHPUnit_Framework_TestCase
{

    public function testGetStructuredContent()
    {
        $buzzWordCollection = new Collection();
        $buzzWordCollection->add(new BuzzWord('Buzzer', 1));
        $buzzWordCollection->add(new BuzzWord('Word', 2));
        $buzzWordCollection->add(new BuzzWord('TestIt', 100));
        $buzzWordCollection->add(new BuzzWord('UnitTests', 200));

        $input = "\"Buzzer\", 1\n\"Word\", 2\n\"TestIt\", 100\n\"UnitTests\", 200\n";

        $buzzWordFileParser = new BuzzWordFileParser();
        $buzzWordFileParser->setFileContent($input);
        $this->assertEquals($buzzWordCollection, $buzzWordFileParser->getStructuredContent());
    }

    public function testEmptyContentReturnsNoBuzzWord()
    {
        $buzzWordFileParser = new BuzzWordFileParser();
        $buzzWordFileParser->setFileContent(null);
        $this->assertEmpty($buzzWordFileParser->getStructuredContent());
    }
}
 