<?php


namespace Vnu;

use Iterator;
use Vnu\Model\Model;

class Collection implements Iterator
{
    private $collection = array();

    /**
     * Add a model to the collection
     *
     * @param Model $model
     */
    public function add(Model $model)
    {
        $this->collection[] = $model;
    }

    /**
     * Rewind the array
     */
    public function rewind()
    {
        reset($this->collection);
    }

    /**
     * Get the current element
     *
     * @return mixed
     */
    public function current()
    {
        return current($this->collection);
    }

    /**
     * Get the key of the current element
     *
     * @return mixed
     */
    public function key()
    {
        return key($this->collection);
    }

    /**
     * Set the pointer to the next element
     */
    public function next()
    {
        next($this->collection);
    }

    /**
     * Check element is valid
     *
     * @return bool
     */
    public function valid()
    {
        return $this->key() !== null;
    }

}