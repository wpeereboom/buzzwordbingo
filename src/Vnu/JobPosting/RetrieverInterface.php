<?php
/**
 * Winfred Peereboom <wpeereboom@gmail.com>
 */

namespace Vnu\JobPosting;

interface RetrieverInterface {

    /**
     * Get the content of the given url
     *
     * @param string $url
     * @return string
     */
    public function getContent($url);
} 