<?php
/**
 * Winfred Peereboom <wpeereboom@gmail.com>
 */

namespace Vnu;

use Vnu\Model\BuzzWord;

class CollectionTest extends \PHPUnit_Framework_TestCase
{
    public function testAddBuzzword()
    {
        $buzzWord = $this->getBuzzWord();

        $collection = new Collection();
        $collection->add($buzzWord);

        $this->assertSame($buzzWord, $collection->current());
    }

    public function testRewind()
    {
        $buzzWord1 = $this->getBuzzWord();
        $buzzWord2 = $this->getBuzzWord();
        $collection = new Collection();
        $collection->add($buzzWord1);
        $collection->add($buzzWord2);

        $this->assertEquals($buzzWord1, $collection->current());
        $collection->next();
        $this->assertEquals($buzzWord2, $collection->current());
        $collection->rewind();
        $this->assertEquals($buzzWord1, $collection->current());
    }

    public function testValid()
    {
        $collection = new Collection();
        $collection->add($this->getBuzzWord());

        $this->assertTrue($collection->valid());
    }

    public function testKeyWithinIterable()
    {
        $buzzWord = $this->getBuzzWord();
        $collection = new Collection();
        $collection->add($buzzWord);

        $this->assertEquals(0, $collection->key());
    }

    /**
     * @return BuzzWord
     */
    protected function getBuzzWord()
    {
        return new BuzzWord('Example', rand());
    }
}
 