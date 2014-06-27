<?php
/**
 * Winfred Peereboom <wpeereboom@gmail.com>
 */

namespace Vnu\FileParser;

use Vnu\Collection;
use Vnu\Model\Url;

class UrlFileParserTest extends \PHPUnit_Framework_TestCase
{

    public function testGetStructuredContent()
    {
        $urlCollection = new Collection();

        $urls = array(
            'http://example.org',
            'https://yahoo.com',
            'http://vacature.com',
        );

        foreach($urls as $url){
            $urlCollection->add(new Url($url));
        }

        $urlFileParser = new UrlFileParser();
        $urlFileParser->setFileContent(implode("\n", $urls));
        $this->assertEquals($urlCollection, $urlFileParser->getStructuredContent());
    }

    /**
     * @dataProvider getEmptyLines
     */
    public function testEmptyLinesAreIgnored($emptyLine)
    {
        $urlFileParser = new UrlFileParser();
        $urlFileParser->setFileContent(implode("\n", array($emptyLine)));

        $this->assertFalse($urlFileParser->getStructuredContent()->valid());
    }

    public function getEmptyLines()
    {
        return array(
            array(''),
            array('        '),
            array(null),
        );
    }
}
 