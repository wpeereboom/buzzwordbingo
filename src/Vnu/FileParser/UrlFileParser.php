<?php
/**
 * Winfred Peereboom <wpeereboom@gmail.com>
 */

namespace Vnu\FileParser;


use Vnu\Collection;
use Vnu\Model\Url;

class UrlFileParser extends FileParser implements FileParserInterface
{
    /**
     * Get the urls from a file
     *
     * @return array
     */
    public function getStructuredContent()
    {
        $urlCollection = new Collection();

        $lines = explode("\n", $this->fileContent);
        foreach($lines as $line) {
            if(trim($line) == '') {
                continue;
            }
            $urlCollection->add(new Url($line));
        }

        return $urlCollection;
    }
} 