<?php
/**
 * Winfred Peereboom <wpeereboom@gmail.com>
 */

namespace Vnu\FileParser;

use Vnu\Model\BuzzWord;
use Vnu\Collection;

class BuzzWordFileParser extends FileParser implements FileParserInterface
{

    /**
     * Get the buzzwords from the file
     *
     * @return Collection
     */
    public function getStructuredContent()
    {
        if (is_null($this->fileContent)) {
            return;
        }

        $buzzWordCollection = new Collection();

        $lines = explode("\n", $this->fileContent);

        foreach ($lines as $line) {
            if(trim($line) == '') {
                continue;
            }
            $parts = explode(',', $line);
            $buzzWordCollection->add(new BuzzWord($parts[0], $parts[1]));
        }

        return $buzzWordCollection;
    }
}