<?php

use Mic2100\Types\ArrayObject;

class ArrayObjectTests extends \PHPUnit_Framework_Testcase
{
    protected $array;

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

        $this->assertNotSame($this->assoc_array_sample(), $ao->toArray());
        $this->assertSame($this->arsort_assoc_array_sample(), $ao->toArray());
    }

    public function test_asort()
    {
        $ao = (new ArrayObject($this->assoc_array_sample()))->asort();

        $this->assertSame($this->asort_assoc_array_sample(), $ao->toArray());
    }

    public function test_change_key_case()
    {
        $ao = (new ArrayObject($this->assoc_array_sample()))->changeKeyCase(CASE_UPPER);

        foreach ($ao->toArray() as $key => $value) {
            $this->assertTrue($key === strtoupper($key));
        }

        $ao = (new ArrayObject($this->assoc_array_sample()))->changeKeyCase(CASE_LOWER);

        foreach ($ao->toArray() as $key => $value) {
            $this->assertTrue($key === strtolower($key));
        }
    }

    public function test_chunk()
    {
        $ao = (new ArrayObject($this->assoc_array_sample()))->chunk(2);

        $this->assertSame(2, count($ao[0]));
        $this->assertSame(2, count($ao[1]));
        $this->assertSame(1, count($ao[2]));
    }

    public function test_column()
    {
        $ao = (new ArrayObject($this->create_random_multi_dim_array('key', 10, 50)))->column(2);

        $this->assertSame(10, $ao->count());
        $this->assertSame(50, strlen($ao[0]));

    }

    public function test_combine()
    {
        $keys = ['one', 'two', 'three', 'four', 'five'];
        $values = ['valueone', 'valuetwo', 'valuethree', 'valuefour', 'valuefive'];

        $ao = (new ArrayObject($this->assoc_array_sample()))->combine($keys, $values);

        foreach($ao->toArray() as $key => $value) {
            $this->assertTrue(in_array($key, $keys));
            $this->assertTrue(in_array($value, $values));
        }
    }

    public function test_count_values()
    {
        $array = [
            'one_hundred',
            'one_hundred',
            'two_hundred',
            'one_hundred',
            'two_hundred',
        ];

        $ao = (new ArrayObject($array))->countValues();

        $this->assertTrue($ao['one_hundred'] === 3);
        $this->assertTrue($ao['two_hundred'] === 2);
    }

    public function test_diff_assoc()
    {
        $array1 = ['a' => 'green', 'b' => 'brown', 'c' => 'blue', 'red'];
        $array2 = ['a' => 'green', 'yellow', 'red'];

        $array3 = ['b' => 'brown', 'c' => 'blue', 0 => 'red'];

        $ao = (new ArrayObject($array1))->diffAssoc($array2);

        $this->assertSame($array3, $ao->toArray());
    }

    protected function assoc_array_sample()
    {
        return [
            'one' => 'abc',
            'two' => 'def',
            'three' => 'ghi',
            'four' => 'jkl',
            'five' => 'mno',
        ];
    }

    protected function arsort_assoc_array_sample()
    {
        return [
            'five' => 'mno',
            'four' => 'jkl',
            'three' => 'ghi',
            'two' => 'def',
            'one' => 'abc',
        ];
    }

    protected function asort_assoc_array_sample()
    {
        return [
            'one' => 'abc',
            'two' => 'def',
            'three' => 'ghi',
            'four' => 'jkl',
            'five' => 'mno',
        ];
    }

    protected function create_random_multi_dim_array($type = 'assoc', $iterations = 100, $length = 30)
    {
        $array = [];
        for($i = 0; $i < $iterations; $i++) {
            switch ($type) {
                case 'key':
                    $array[] = $this->create_random_array($iterations, $length);
                    break;
                case 'assoc':
                default:
                    $array[] = $this->create_random_assoc_array($iterations, $length);
                    break;
            }

        }

        return $array;
    }

    protected function create_random_array($iterations = 100, $length = 30)
    {
        $array = [];
        for($i = 0; $i < $iterations; $i++) {
            $array[] = $this->get_random_string($length);
        }

        return $array;
    }

    protected function create_random_assoc_array($iterations = 100, $length = 30)
    {
        $array = [];
        $key = 'aaa';
        for($i = 0; $i < $iterations; $i++) {
            $array[$key++] = $this->get_random_string($length);
        }

        return $array;
    }

    protected function get_random_string($length = 30)
    {
        return substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
    }
}
