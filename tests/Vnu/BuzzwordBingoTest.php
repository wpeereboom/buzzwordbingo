<?php
/**
 * Winfred Peereboom <wpeereboom@gmail.com>
 */

namespace Vnu;

use Vnu\Model\BuzzWord;
use Vnu\Model\Url;
use Vnu\Score\ResultList;

class BuzzwordBingoTest extends \PHPUnit_Framework_TestCase
{

    public function testBuzzwordBingo()
    {
        $jobs = $this->getJobs();
        $buzzWords = $this->getBuzzWords();

        $bingo = new BuzzwordBingo(
            $this->getBuzzWordFileParserMock($buzzWords),
            $this->getUrlParserMock($jobs),
            $this->getJobPostingRetrieverMock($jobs),
            new ResultList()
        );
        $result = $bingo->run();

        $this->assertTrue(is_array($result));

        foreach($jobs as $job) {
            $this->assertEquals($job['url'], $result[$job['expectedIndexPosition']]['name']);
        }
    }

    /**
     * @param array $jobs
     * @return \PHPUnit_Framework_MockObject_MockObject
     */
    protected function getUrlParserMock($jobs)
    {
        $urlFileParserMock = $this->getMockBuilder('Vnu\FileParser\UrlFileParser')->getMock();
        $urlCollection = new Collection();

        foreach($jobs as $key => $job) {
            $urlCollection->add(new Url($job['url']));
        }

        $urlFileParserMock->expects($this->once())->method('getStructuredContent')->will($this->returnValue($urlCollection));
        return $urlFileParserMock;
    }

    /**
     * @param array $buzzWords
     *
     * @return \PHPUnit_Framework_MockObject_MockObject
     */
    protected function getBuzzWordFileParserMock($buzzWords)
    {
        $buzzWordFileParserMock = $this->getMockBuilder('Vnu\FileParser\BuzzWordFileParser')->getMock();
        $buzzWordFileParserMock->expects($this->any())->method('getStructuredContent')->will($this->returnValue($buzzWords));
        return $buzzWordFileParserMock;
    }

    /**
     * @param array $jobs
     * @return \PHPUnit_Framework_MockObject_MockObject
     */
    protected function getJobPostingRetrieverMock($jobs)
    {
        $jobPostingParserMock = $this->getMockBuilder('Vnu\JobPosting\Retriever')->getMock();

        foreach($jobs as $key => $job) {
            $jobPostingParserMock->expects($this->at($key))->method('getContent')->will($this->returnValue($job['content']));
        }

        return $jobPostingParserMock;
    }

    /**
     * @return array
     */
    protected function getJobs()
    {
        $jobs =
            array(
                array(
                    'url' => 'http://some-dummy-url.org',
                    'content' => '<html><body><p>Puppet</p><br/>Agile</body></html>',
                    'expectedIndexPosition' => 1,
                ),
                array(
                    'url' => 'http://some-second.org',
                    'content' => '<html><body><p>Bla</p><br/>Management, Programming out of the box. Programming in the box</body></html>',
                    'expectedIndexPosition' => 2,
                ),
                array(
                    'url' => 'http://some-third.org',
                    'content' => '<html><body><p>Oog voor detail</p><br/>Management, Programming, PHP en reliable teamplayer. Dit voor een motivated marktconform salaris</body></html>',
                    'expectedIndexPosition' => 0,
                ),
            );
        return $jobs;
    }

    /**
     * @return array
     */
    protected function getBuzzWords()
    {
        $buzzWordCollection = new Collection();
        $buzzWordCollection->add(new BuzzWord('Buzz', 10));
        $buzzWordCollection->add(new BuzzWord('Agile', 40));
        $buzzWordCollection->add(new BuzzWord('Management', 20));
        $buzzWordCollection->add(new BuzzWord('Programming', 4));
        $buzzWordCollection->add(new BuzzWord('reliable teamplayer', 10));
        $buzzWordCollection->add(new BuzzWord('Oog voor detail', 12));
        $buzzWordCollection->add(new BuzzWord('motivated', 18));
        $buzzWordCollection->add(new BuzzWord('marktconform salaris', 23));
        return $buzzWordCollection;
    }
}
