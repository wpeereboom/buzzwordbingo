<?php
/**
 * Winfred Peereboom <wpeereboom@gmail.com>
 */
namespace Vnu\Model;

class Model {

    /**
     * Clean up the string
     *
     * @param string $item
     * @return string
     */
    protected function cleanUp($item)
    {
        return trim(str_replace('"', '', $item));
    }
} 