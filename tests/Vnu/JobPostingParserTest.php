<?php
/**
 * Winfred Peereboom <wpeereboom@gmail.com>
 */

namespace Vnu;

class JobPostingParserTest extends \PHPUnit_Framework_TestCase
{
    public function testGetContent()
    {
        $expectedContent = <<<FILE
http://www.nationalevacaturebank.nl/vacature/4211646/Senior+Webdeveloper/1
http://www.itbanen.nl/vacature/4232896/Software+Architect/2
http://www.intermediair.nl/vacature/4212341/Senior+QA+Engineer/2

FILE;

        $jobPostingParser = new JobPostingParser();
        $url = __DIR__ . '/../../resources/job_postings.in';

        $this->assertEquals($expectedContent,$jobPostingParser->getContent($url));
    }
}
 