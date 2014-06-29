<?php
/**
 * Winfred Peereboom <wpeereboom@gmail.com>
 */

namespace Vnu;

use Vnu\JobPosting\Retriever;

class RetrieverTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider getTestData
     *
     * @param string $part
     * @param bool $result
     */
    public function testGetContent($part, $result)
    {
        $jobPostingRetriever = new Retriever();
        $url = __DIR__ . '/../../assets/senior_developer.html';

        $this->assertEquals($result, strpos($jobPostingRetriever->getContent($url), $part));
    }

    public function getTestData()
    {
        return array(
            array('kleine Scrum teams waar', true),
            array('Senior Webdeveloper', true),
            array('<div id="vacature-detail-view">', false),
            array('<span class="end"></span>', false),
            array('Carri&egrave;reniveau', false),
            array('Carrièreniveau', true),
        );
    }

}
 