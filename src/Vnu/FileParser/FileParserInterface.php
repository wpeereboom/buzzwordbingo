<?php
/**
 * Winfred Peereboom <wpeereboom@gmail.com>
 */

namespace Vnu\FileParser;

interface FileParserInterface {

    public function setFileContent($fileContent);

    public function getStructuredContent();
} 