<?php
/**
 * Winfred Peereboom <wpeereboom@gmail.com>
 */

namespace Vnu\Model;


class Url extends Model
{

    /**
     * @var string
     */
    private $url;

    /**
     * @param string $url
     */
    public function __construct($url)
    {
        $this->url = $this->cleanUp($url);
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }
} 