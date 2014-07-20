<?php

use Mic2100\Types\ArrayObject;

class ArrayObjectTests extends \PHPUnit_Framework_Testcase
{
    public function test_set_get_iterator_with_an_associative_array()
    {
        $ao = new ArrayObject;

        $this->assertInstanceOf('Mic2100\Types\ArrayObject', $ao->set($this->assoc_array_sample()));

        $this->assertSame($this->assoc_array_sample(), $ao->get());
        $this->assertInstanceOf('ArrayIterator', $ao->toIterator());
    }

    public function test_arsort()
    {
        $ao = new ArrayObject($this->assoc_array_sample());

        $ao->arsort();

        $this->assertNotSame($this->assoc_array_sample(), $ao);
        $this->assertSame($this->arsort_assoc_array_sample(), $ao->toArray());
    }

    protected function assoc_array_sample()
    {
        return [
            'one' => true,
            'two' => true,
            'three' => true,
            'four' => true,
            'five' => true,
        ];
    }

    protected function arsort_assoc_array_sample()
    {
        return [
            'five' => true,
            'four' => true,
            'three' => true,
            'two' => true,
            'one' => true,
        ];
    }
}
