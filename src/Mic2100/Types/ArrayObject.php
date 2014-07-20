<?php

namespace Mic2100\Types;

/**
 * Class ArrayObject
 *
 * @description Provides an OOP approach to the native PHP array methods.
 * @package Mic2100\Types
 * @author Michael Bardsley <me@mic-b.co.uk>
 */
class ArrayObject implements \ArrayAccess, \Countable, \JsonSerializable
{
    /**
     * @var array
     */
    private $array = [];

    /**
     * Constructor
     *
     * @param array $array
     */
    public function __construct(array $array = [])
    {
        $this->set($array);
    }

    /**
     * Set the array that is currently stored
     *
     * @param array $array
     * @return $this
     */
    public function set(array $array = [])
    {
        $this->array = $array;

        return $this;
    }

    /**
     * Get the array that is currently stored
     *
     * @param string|null $name
     * @return array
     */
    public function get($name = null)
    {
        if (is_null($name)) {
            return $this->array;
        }

        return $this->array[$name];
    }

    /**
     * Returns the array that has been created
     *
     * @return array
     */
    public function toArray()
    {
        return $this->get(null);
    }

    /**
     * Returns the array that has been created as an ArrayIterator
     *
     * @return \ArrayIterator
     */
    public function toIterator()
    {
        return new \ArrayIterator($this->get(null));
    }

    /**
     * @link http://php.net/manual/en/function.arsort.php
     * @param int $flags
     * @return $this
     */
    public function arsort($flags = SORT_REGULAR)
    {
        arsort($this->array, $flags);

        return $this;
    }

    /**
     * @link http://php.net/manual/en/function.asort.php
     * @param int $flags
     * @return $this
     */
    public function asort($flags = SORT_REGULAR)
    {
        asort($this->array, $flags);

        return $this;
    }

    /**
     * @link http://php.net/manual/en/function.array-change-key-case.php
     * @param int $case
     * @return static
     */
    public function changeKeyCase($case = CASE_LOWER)
    {
        return new static(array_change_key_case($this->array, $case));
    }

    /**
     * @link http://php.net/manual/en/function.array-chunk.php
     * @param $size
     * @param bool $preserveKeys
     * @return static
     */
    public function chunk($size, $preserveKeys = false)
    {
        return new static(array_chunk($this->array, $size, $preserveKeys));
    }

    /**
     * @link http://php.net/manual/en/function.array-column.php
     * @param $columnKey
     * @param int|null $indexKey
     * @return static
     */
    public function column($columnKey, $indexKey = null)
    {
        return new static(array_column($this->array, $columnKey, $indexKey));
    }

    /**
     * @link http://php.net/manual/en/function.array-combine.php
     * @param array $keys
     * @param array $values
     * @return static
     */
    public function combine(array $keys, array $values)
    {
        return new static(array_combine($keys, $values));
    }

    /**
     * @link http://php.net/manual/en/function.array-count-values.php
     * @return static
     */
    public function countValues()
    {
        return new static(array_count_values($this->array));
    }

    /**
     * @link http://php.net/manual/en/function.array-diff-assoc.php
     * @param array $array
     * @return static
     */
    public function diffAssoc(array $array)
    {
        return new static(array_diff_assoc($this->array, $array));
    }

    /**
     * @link http://php.net/manual/en/function.array-diff-key.php
     * @param array $array
     * @return static
     */
    public function diffKey(array $array)
    {
        return new static(array_diff_key($this->array, $array));
    }

    /**
     * @link http://php.net/manual/en/function.array-diff-uassoc.php
     * @param array $array
     * @param callable $func
     * @return static
     */
    public function diffUassoc(array $array, callable $func)
    {
        return new static(array_diff_uassoc($this->array, $array, $func));
    }

    /**
     * @link http://php.net/manual/en/function.array-diff-ukey.php
     * @param array $array
     * @param callable $func
     * @return static
     */
    public function diffUkey(array $array, callable $func)
    {
        return new static(array_diff_ukey($this->array, $array, $func));
    }

    /**
     * @link http://php.net/manual/en/function.array-diff.php
     * @param array $array
     * @return static
     */
    public function diff(array $array)
    {
        return new static(array_diff($this->array, $array));
    }

    /**
     * @link http://php.net/manual/en/function.array-fill.php
     * @param int $start
     * @param int $num
     * @param mixed $value
     * @return static
     */
    public function fill($start, $num, $value)
    {
        return new static(array_fill((int) $start, (int) $num, $value));
    }

    /**
     * @link http://php.net/manual/en/function.array-fill-keys.php
     * @param array $keys
     * @param mixed $value
     * @return static
     */
    public function fillKeys(array $keys, $value)
    {
        return new static(array_fill_keys($keys, $value));
    }

    /**
     * @link http://php.net/manual/en/function.array-filter.php
     * @param callable $func
     * @return static
     */
    public function filter(callable $func)
    {
        return new static(array_filter($this->array, $func));
    }

    /**
     * @link http://php.net/manual/en/function.array-flip.php
     * @return static
     */
    public function flip()
    {
        return new static(array_flip($this->array));
    }

    /**
     * @link http://php.net/manual/en/function.in-array.php
     * @param mixed $needle
     * @param bool $strict
     * @return bool
     */
    public function in($needle, $strict = false)
    {
        return in_array($needle, $this->array, $strict);
    }

    /**
     * @link http://php.net/manual/en/function.array-intersect-assoc.php
     * @param array $array
     * @return static
     */
    public function intersectAssoc(array $array)
    {
        return new static(array_intersect_assoc($this->array, $array));
    }

    /**
     * @link http://php.net/manual/en/function.array-intersect-key.php
     * @param array $array
     * @return static
     */
    public function intersectKey(array $array)
    {
        return new static(array_intersect_key($this->array, $array));
    }

    /**
     * @link http://php.net/manual/en/function.array-intersect-uassoc.php
     * @param array $array
     * @param callable $func
     * @return static
     */
    public function intersectUassoc(array $array, callable $func)
    {
        return new static(array_intersect_uassoc($this->array, $array, $func));
    }

    /**
     * @link http://php.net/manual/en/function.array-intersect-ukey.php
     * @param array $array
     * @param callable $func
     * @return static
     */
    public function intersectUkey(array $array, callable $func)
    {
        return new static(array_intersect_ukey($this->array, $array, $func));
    }

    /**
     * @link http://php.net/manual/en/function.array-intersect.php
     * @param array $array
     * @return static
     */
    public function intersect(array $array)
    {
        return new static(array_intersect($this->array, $array));
    }

    /**
     * @link http://php.net/manual/en/function.array-key-exists.php
     * @param $key
     * @return bool
     */
    public function keyExists($key)
    {
        return isset($this->array[$key]) || array_key_exists($key, $this->array);
    }

    /**
     * @link http://php.net/manual/en/function.array-keys.php
     * @return static
     */
    public function keys()
    {
        return new static(array_keys($this->array));
    }

    /**
     * @link http://php.net/manual/en/function.krsort.php
     * @param int $flags
     * @return $this
     */
    public function krsort($flags = SORT_REGULAR)
    {
        krsort($this->array, $flags);

        return $this;
    }

    /**
     * @link http://php.net/manual/en/function.ksort.php
     * @param int $flags
     * @return $this
     */
    public function ksort($flags = SORT_REGULAR)
    {
        ksort($this->array, $flags);

        return $this;
    }

    /**
     * @link http://php.net/manual/en/function.array-map.php
     * @param callable $func
     * @return static
     */
    public function map(callable $func)
    {
        return new static(array_map($func, $this->array));
    }

    /**
     * @link http://php.net/manual/en/function.array-merge.php
     * @param array $array
     * @return static
     */
    public function merge(array $array)
    {
        return new static(array_merge($this->array, $array));
    }

    /**
     * @link http://php.net/manual/en/function.natcasesort.php
     * @return $this
     */
    public function natcasesort()
    {
        natcasesort($this->array);

        return $this;
    }

    /**
     * @link http://php.net/manual/en/function.natsort.php
     * @return $this
     */
    public function natsort()
    {
        natsort($this->array);

        return $this;
    }

    /**
     * @link http://php.net/manual/en/function.array-pad.php
     * @param int $size
     * @param mixed $value
     * @return static
     */
    public function pad($size, $value)
    {
        return new static(array_pad($this->array, $size, $value));
    }

    /**
     * @link http://php.net/manual/en/function.array-pop.php
     * @return mixed
     */
    public function pop()
    {
        return array_pop($this->array);
    }

    /**
     * @link http://php.net/manual/en/function.array-product.php
     * @return number
     */
    public function product()
    {
        return array_product($this->array);
    }

    /**
     * @link http://php.net/manual/en/function.array-push.php
     * @param $value
     * @return $this
     */
    public function push($value)
    {
        array_push($this->array, $value);

        return $this;
    }

    /**
     * @link http://php.net/manual/en/function.array-rand.php
     * @param int $num
     * @return mixed
     */
    public function rand($num = 1)
    {
        return array_rand($this->array, $num);
    }

    /**
     * @link http://php.net/manual/en/function.array-reduce.php
     * @param $initial
     * @param callable $func
     * @return mixed
     */
    public function reduce($initial, callable $func)
    {
        return array_reduce($this->array, $func, $initial);
    }

    /**
     * @link http://php.net/manual/en/function.array-replace-recursive.php
     * @param array $array
     * @return static
     */
    public function replaceRecursive(array $array)
    {
        return new static(array_replace_recursive($this->array, $array));
    }

    /**
     * @link http://php.net/manual/en/function.array-replace.php
     * @param array $array
     * @return static
     */
    public function replace(array $array)
    {
        return new static(array_replace($this->array, $array));
    }

    /**
     * @link http://php.net/manual/en/function.array-reverse.php
     * @param bool $preserveKeys
     * @return static
     */
    public function reverse($preserveKeys = false)
    {
        return new static(array_reverse($this->array, (bool) $preserveKeys));
    }

    /**
     * @link http://php.net/manual/en/function.rsort.php
     * @param int $flags
     * @return $this
     */
    public function rsort($flags = SORT_REGULAR)
    {
        rsort($this->array, $flags);

        return $this;
    }

    /**
     * @link http://php.net/manual/en/function.array-search.php
     * @param $needle
     * @param bool $strict
     * @return mixed
     */
    public function search($needle, $strict = false)
    {
        return array_search($needle, $this->array, $strict);
    }

    /**
     * @link http://php.net/manual/en/function.array-shift.php
     * @return mixed
     */
    public function shift()
    {
        return array_shift($this->array);
    }

    /**
     * @link http://php.net/manual/en/function.shuffle.php
     * @return $this
     */
    public function shuffle()
    {
        shuffle($this->array);

        return $this;
    }

    /**
     * @link http://php.net/manual/en/function.array-slice.php
     * @param $offset
     * @param null $length
     * @param bool $preserveKeys
     * @return static
     */
    public function slice($offset, $length = null, $preserveKeys = false)
    {
        return new static(array_slice($this->array, $offset, $length, $preserveKeys));
    }

    /**
     * @link http://php.net/manual/en/function.sort.php
     * @param int $flags
     * @return $this
     */
    public function sort($flags = SORT_REGULAR)
    {
        sort($this->array, $flags);

        return $this;
    }

    /**
     * @link http://php.net/manual/en/function.array-splice.php
     * @param $offset
     * @param int $length
     * @param array $replacement
     * @return $this
     */
    public function splice($offset, $length = 0, $replacement = [])
    {
        array_splice($this->array, $offset, $length, $replacement);

        return $this;
    }

    /**
     * @link http://php.net/manual/en/function.array-sum.php
     * @return number
     */
    public function sum()
    {
        return array_sum($this->array);
    }

    /**
     * @link http://php.net/manual/en/function.uasort.php
     * @param callable $func
     * @return $this
     */
    public function uasort(callable $func)
    {
        uasort($this->array, $func);

        return $this;
    }

    /**
     * @link http://php.net/manual/en/function.array-udiff-assoc.php
     * @param array $array
     * @param callable $func
     * @return static
     */
    public function udiffAssoc(array $array, callable $func)
    {
        return new static(array_udiff_assoc($this->array, $array, $func));
    }

    /**
     * @link http://php.net/manual/en/function.array-udiff-uassoc.php
     * @param array $array
     * @param callable $valueFunc
     * @param callable $keyFunc
     * @return static
     */
    public function udiffUassoc(array $array, callable $valueFunc, callable $keyFunc)
    {
        return new static(array_udiff_uassoc($this->array, $array, $valueFunc, $keyFunc));
    }

    /**
     * @link http://php.net/manual/en/function.array-udiff.php
     * @param array $array
     * @param callable $func
     * @return static
     */
    public function udiff(array $array, callable $func)
    {
        return new static(array_udiff($this->array, $array, $func));
    }

    /**
     * @link http://php.net/manual/en/function.array-uintersect-assoc.php
     * @param array $array
     * @param callable $func
     * @return static
     */
    public function uintersectAssoc(array $array, callable $func)
    {
        return new static(array_uintersect_assoc($this->array, $array, $func));
    }

    /**
     * @link http://php.net/manual/en/function.array-uintersect-uassoc.php
     * @param array $array
     * @param callable $valueFunc
     * @param callable $keyFunc
     * @return static
     */
    public function uintersectUassoc(array $array, callable $valueFunc, callable $keyFunc)
    {
        return new static(array_uintersect_uassoc($this->array, $array, $valueFunc, $keyFunc));
    }

    /**
     * @link http://php.net/manual/en/function.array-uintersect.php
     * @param array $array
     * @param callable $func
     * @return static
     */
    public function uintersect(array $array, callable $func)
    {
        return new static(array_uintersect($this->array, $array, $func));
    }

    /**
     * @link http://php.net/manual/en/function.uksort.php
     * @param callable $func
     * @return $this
     */
    public function uksort(callable $func)
    {
        uksort($this->array, $func);

        return $this;
    }

    /**
     * @link http://php.net/manual/en/function.array-unique.php
     * @param int $flags
     * @return static
     */
    public function unique($flags = SORT_STRING)
    {
        return new static(array_unique($this->array, $flags));
    }

    /**
     * @link http://php.net/manual/en/function.array-unshift.php
     * @param $value
     * @return $this
     */
    public function unshift($value)
    {
        array_unshift($this->array, $value);

        return $this;
    }

    /**
     * @link http://php.net/manual/en/function.usort.php
     * @param callable $func
     * @return $this
     */
    public function usort(callable $func)
    {
        usort($this->array, $func);

        return $this;
    }

    /**
     * @link http://php.net/manual/en/function.array-values.php
     * @return static
     */
    public function values()
    {
        return new static(array_values($this->array));
    }

    /**
     * @link http://php.net/manual/en/function.array-walk-recursive.php
     * @param callable $func
     * @param null $userData
     * @return $this
     */
    public function walkRecursive(callable $func, $userData = null)
    {
        array_walk_recursive($this->array, $func, $userData);

        return $this;
    }

    /**
     * @link http://php.net/manual/en/function.array-walk.php
     * @param callable $func
     * @param null $userData
     * @return $this
     */
    public function walk(callable $func, $userData = null)
    {
        array_walk($this->array, $func, $userData);

        return $this;
    }

    /**
     * (PHP 5 &gt;= 5.0.0)
     * Whether a offset exists
     *
     * @link http://php.net/manual/en/arrayaccess.offsetexists.php
     * @param mixed $offset An offset to check for.
     * @return boolean true on success or false on failure.
     */
    public function offsetExists($offset)
    {
        if (isset($this->array[$offset]) || array_key_exists($offset, $this->array)) {
            return true;
        }

        return false;
    }

    /**
     * (PHP 5 &gt;= 5.0.0)
     * Offset to retrieve
     *
     * @link http://php.net/manual/en/arrayaccess.offsetget.php
     * @param mixed $offset The offset to retrieve.
     * @return mixed Can return all value types.
     */
    public function offsetGet($offset)
    {
        return $this->array[$offset];
    }

    /**
     * (PHP 5 &gt;= 5.0.0)
     * Offset to set
     *
     * @link http://php.net/manual/en/arrayaccess.offsetset.php
     * @param mixed $offset The offset to assign the value to.
     * @param mixed $value The value to set.
     * @return void
     */
    public function offsetSet($offset, $value)
    {
        $this->array[$offset] = $value;

        return;
    }

    /**
     * (PHP 5 &gt;= 5.0.0)
     * Offset to unset
     *
     * @link http://php.net/manual/en/arrayaccess.offsetunset.php
     * @param mixed $offset The offset to unset.
     * @return void
     */
    public function offsetUnset($offset)
    {
        unset($this->array[$offset]);

        return;
    }

    /**
     * (PHP 5 &gt;= 5.1.0)
     * Count elements of an object
     *
     * @link http://php.net/manual/en/countable.count.php
     * @return int The custom count as an integer.
     */
    public function count()
    {
        return sizeof($this->array);
    }

    /**
     * (PHP 5 &gt;= 5.4.0)
     * Specify data which should be serialized to JSON
     *
     * @link http://php.net/manual/en/jsonserializable.jsonserialize.php
     * @return mixed data which can be serialized by json_encode,
     * which is a value of any type other than a resource.
     */
    public function jsonSerialize()
    {
        return json_encode($this->array);
    }
}
