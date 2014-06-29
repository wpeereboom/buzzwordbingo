<?php
/**
 * Winfred Peereboom <wpeereboom@gmail.com>
 */

namespace Vnu\FileParser;

class FileParserTest extends \PHPUnit_Framework_TestCase
{

    public function testGetStructuredContent()
    {
        $expected = 'Some content';
        $fileParser = new FileParser();
        $fileParser->setFileContent($expected);
        $this->assertEquals($expected, $fileParser->getStructuredContent());
    }
}
 