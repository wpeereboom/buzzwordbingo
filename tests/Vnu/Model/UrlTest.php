<?php
/**
 * Winfred Peereboom <wpeereboom@gmail.com>
 */

namespace Vnu\Model;

class UrlTest extends \PHPUnit_Framework_TestCase
{

    public function testGetUrl()
    {
        $url = "http://www.example.org";
        $urlModel = new Url($url);
        $this->assertEquals($url, $urlModel->getUrl());
    }
}
 