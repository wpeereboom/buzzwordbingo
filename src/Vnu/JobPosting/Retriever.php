<?php
/**
 * Winfred Peereboom <wpeereboom@gmail.com>
 */

namespace Vnu\JobPosting;

class Retriever implements RetrieverInterface
{
    /**
     * {@inheritdoc}
     */
    public function getContent($url)
    {
        return html_entity_decode(strip_tags(file_get_contents($url)));
    }
} 