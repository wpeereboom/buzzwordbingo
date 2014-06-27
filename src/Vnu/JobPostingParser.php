<?php
/**
 * Winfred Peereboom <wpeereboom@gmail.com>
 */

namespace Vnu;

use Vnu\Exception\InCorrectUrlException;

class JobPostingParser implements JobPostingParserInterface
{
    /**
     * @inherit
     */
    public function getContent($url)
    {
        return strip_tags(file_get_contents($url));
    }
} 