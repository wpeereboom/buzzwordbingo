<?php
/**
 * Winfred Peereboom <wpeereboom@gmail.com>
 */

namespace Vnu;

use Vnu\Exception\InCorrectUrlException;

interface JobPostingParserInterface {

    /**
     * Get the content of the given url
     *
     * @param string $url
     * @return string
     */
    public function getContent($url);
} 