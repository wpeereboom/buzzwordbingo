<?php
/**
 * Winfred Peereboom <wpeereboom@gmail.com>
 */

namespace Vnu\FileParser;

class FileParser implements FileParserInterface
{

    /**
     * @var string
     */
    protected $fileContent = null;

    /**
     * Set the content of the file
     *
     * @param string $fileContent
     */
    public function setFileContent($fileContent)
    {
        $this->fileContent = $fileContent;
    }

    /**
     * Get the content in structured way
     *
     * @return mixed
     */
    public function getStructuredContent()
    {
        return $this->fileContent;
    }
}