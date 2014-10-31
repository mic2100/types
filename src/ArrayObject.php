<?php

namespace Mic2100\Types;

/**
 * Class ArrayObject
 *
 * @description Provides an OOP approach to the native PHP array methods.
 * @package Mic2100\Types
 * @author Michael Bardsley <@mic_bardsley>
 */
class ArrayObject implements \ArrayAccess, \Countable, \JsonSerializable, \Serializable
{
    /**
     * @var array
     */
    protected $value;

    /**
     * Constructor
     *
     * @param array $value
     */
    public function __construct(array $value = [])
    {
        $this->set($value);
    }

    /**
     * Sets the array
     *
     * @param array $value
     * @return $this
     */
    public function set($value = [])
    {
        $this->value = (array) $value;

        return $this;
    }

    /**
     * Gets the array
     *
     * @return array
     */
    public function get()
    {
        return $this->value;
    }

    /**
     * @return static
     */
    public function __clone()
    {
        return new static($this->get());
    }

    /**
     * Returns the array that has been created
     *
     * @return array
     */
    public function toArray()
    {
        return is_array($this->get()) ? $this->get() : [$this->get()];
    }

    /**
     * Returns the array that has been created as an ArrayIterator
     *
     * @return \ArrayIterator
     */
    public function toIterator()
    {
        return new \ArrayIterator($this->get());
    }

    /**
     * Returns the array that has been created as an ArrayObject
     *
     * @return \ArrayObject
     */
    public function toObject()
    {
        return new \ArrayObject($this->get());
    }

    /**
     * @link http://php.net/manual/en/function.arsort.php
     * @param int $flags
     * @return $this
     */
    public function arsort($flags = SORT_REGULAR)
    {
        arsort($this->get(), $flags);

        return $this;
    }

    /**
     * @link http://php.net/manual/en/function.asort.php
     * @param int $flags
     * @return $this
     */
    public function asort($flags = SORT_REGULAR)
    {
        asort($this->get(), $flags);

        return $this;
    }

    /**
     * @link http://php.net/manual/en/function.array-change-key-case.php
     * @param int $case
     * @return $this
     */
    public function changeKeyCase($case = CASE_LOWER)
    {
        $this->set(array_change_key_case($this->get(), $case));

        return $this;
    }

    /**
     * @link http://php.net/manual/en/function.array-chunk.php
     * @param $size
     * @param bool $preserveKeys
     * @return $this
     */
    public function chunk($size, $preserveKeys = false)
    {
        $this->set(array_chunk($this->get(), $size, $preserveKeys));

        return $this;
    }

    /**
     * @link http://php.net/manual/en/function.array-column.php
     * @param $columnKey
     * @param <int|null> $indexKey
     * @return static
     */
    public function column($columnKey, $indexKey = null)
    {
        return new static(array_column($this->get(), $columnKey, $indexKey));
    }

    /**
     * @link http://php.net/manual/en/function.array-combine.php
     * @param array $keys
     * @param array $values
     * @return $this
     */
    public function combine(array $keys, array $values)
    {
        $this->set(array_combine($keys, $values));

        return $this;
    }

    /**
     * @link http://php.net/manual/en/function.array-count-values.php
     * @return static
     */
    public function countValues()
    {
        return new static(array_count_values($this->get()));
    }

    /**
     * @link http://php.net/manual/en/function.array-diff-assoc.php
     * @param array $array
     * @return $this
     */
    public function diffAssoc(array $array)
    {
        $this->set(array_diff_assoc($this->get(), $array));

        return $this;
    }

    /**
     * @link http://php.net/manual/en/function.array-diff-key.php
     * @param array $array
     * @return $this
     */
    public function diffKey(array $array)
    {
        $this->set(array_diff_key($this->get(), $array));

        return $this;
    }

    /**
     * @link http://php.net/manual/en/function.array-diff-uassoc.php
     * @param array $array
     * @param callable $func
     * @return $this
     */
    public function diffUassoc(array $array, callable $func)
    {
        $this->set(array_diff_uassoc($this->get(), $array, $func));

        return $this;
    }

    /**
     * @link http://php.net/manual/en/function.array-diff-ukey.php
     * @param array $array
     * @param callable $func
     * @return $this
     */
    public function diffUkey(array $array, callable $func)
    {
        $this->set(array_diff_ukey($this->get(), $array, $func));

        return $this;
    }

    /**
     * @link http://php.net/manual/en/function.array-diff.php
     * @param array $array
     * @return $this
     */
    public function diff(array $array)
    {
        $this->set(array_diff($this->get(), $array));

        return $this;
    }

    /**
     * @link http://php.net/manual/en/function.array-fill.php
     * @param int $start
     * @param int $num
     * @param mixed $value
     * @return $this
     */
    public function fill($start, $num, $value)
    {
        $this->set(array_fill((int) $start, (int) $num, $value));

        return $this;
    }

    /**
     * @link http://php.net/manual/en/function.array-fill-keys.php
     * @param array $keys
     * @param mixed $value
     * @return $this
     */
    public function fillKeys(array $keys, $value)
    {
        $this->set(array_fill_keys($keys, $value));

        return $this;
    }

    /**
     * @link http://php.net/manual/en/function.array-filter.php
     * @param callable $func
     * @return $this
     */
    public function filter(callable $func)
    {
        $this->set(array_filter($this->get(), $func));

        return $this;
    }

    /**
     * @link http://php.net/manual/en/function.array-flip.php
     * @return $this
     */
    public function flip()
    {
        $this->set(array_flip($this->get()));

        return $this;
    }

    /**
     * @link http://php.net/manual/en/function.in-array.php
     * @param mixed $needle
     * @param bool $strict
     * @return bool
     */
    public function in($needle, $strict = false)
    {
        return in_array($needle, $this->get(), $strict);
    }

    /**
     * @link http://php.net/manual/en/function.array-intersect-assoc.php
     * @param array $array
     * @return $this
     */
    public function intersectAssoc(array $array)
    {
        $this->set(array_intersect_assoc($this->get(), $array));

        return $this;
    }

    /**
     * @link http://php.net/manual/en/function.array-intersect-key.php
     * @param array $array
     * @return $this
     */
    public function intersectKey(array $array)
    {
        $this->set(array_intersect_key($this->get(), $array));

        return $this;
    }

    /**
     * @link http://php.net/manual/en/function.array-intersect-uassoc.php
     * @param array $array
     * @param callable $func
     * @return $this
     */
    public function intersectUassoc(array $array, callable $func)
    {
        $this->set(array_intersect_uassoc($this->get(), $array, $func));

        return $this;
    }

    /**
     * @link http://php.net/manual/en/function.array-intersect-ukey.php
     * @param array $array
     * @param callable $func
     * @return $this
     */
    public function intersectUkey(array $array, callable $func)
    {
        $this->set(array_intersect_ukey($this->get(), $array, $func));

        return $this;
    }

    /**
     * @link http://php.net/manual/en/function.array-intersect.php
     * @param array $array
     * @return $this
     */
    public function intersect(array $array)
    {
        $this->set(array_intersect($this->get(), $array));

        return $this;
    }

    /**
     * @link http://php.net/manual/en/function.array-key-exists.php
     * @param $key
     * @return bool
     */
    public function keyExists($key)
    {
        return isset($this->get()[$key]) || array_key_exists($key, $this->get());
    }

    /**
     * @link http://php.net/manual/en/function.array-keys.php
     * @return static
     */
    public function keys()
    {
        return new static(array_keys($this->get()));
    }

    /**
     * @link http://php.net/manual/en/function.krsort.php
     * @param int $flags
     * @return $this
     */
    public function krsort($flags = SORT_REGULAR)
    {
        krsort($this->get(), $flags);

        return $this;
    }

    /**
     * @link http://php.net/manual/en/function.ksort.php
     * @param int $flags
     * @return $this
     */
    public function ksort($flags = SORT_REGULAR)
    {
        ksort($this->get(), $flags);

        return $this;
    }

    /**
     * @link http://php.net/manual/en/function.array-map.php
     * @param callable $func
     * @return $this
     */
    public function map(callable $func)
    {
        $this->set(array_map($func, $this->get()));

        return $this;
    }

    /**
     * @link http://php.net/manual/en/function.array-merge.php
     * @param array $array
     * @return $this
     */
    public function merge(array $array)
    {
        $this->set(array_merge($this->get(), $array));

        return $this;
    }

    /**
     * @link http://php.net/manual/en/function.natcasesort.php
     * @return $this
     */
    public function natcasesort()
    {
        natcasesort($this->get());

        return $this;
    }

    /**
     * @link http://php.net/manual/en/function.natsort.php
     * @return $this
     */
    public function natsort()
    {
        natsort($this->get());

        return $this;
    }

    /**
     * @link http://php.net/manual/en/function.array-pad.php
     * @param int $size
     * @param mixed $value
     * @return $this
     */
    public function pad($size, $value)
    {
        $this->set(array_pad($this->get(), $size, $value));

        return $this;
    }

    /**
     * @link http://php.net/manual/en/function.array-pop.php
     * @return mixed
     */
    public function pop()
    {
        return array_pop($this->get());
    }

    /**
     * @link http://php.net/manual/en/function.array-product.php
     * @return number
     */
    public function product()
    {
        return array_product($this->get());
    }

    /**
     * @link http://php.net/manual/en/function.array-push.php
     * @param $value
     * @return $this
     */
    public function push($value)
    {
        array_push($this->get(), $value);

        return $this;
    }

    /**
     * @link http://php.net/manual/en/function.array-rand.php
     * @param int $num
     * @return mixed
     */
    public function rand($num = 1)
    {
        return array_rand($this->get(), $num);
    }

    /**
     * @link http://php.net/manual/en/function.array-reduce.php
     * @param $initial
     * @param callable $func
     * @return mixed
     */
    public function reduce($initial, callable $func)
    {
        return array_reduce($this->get(), $func, $initial);
    }

    /**
     * @link http://php.net/manual/en/function.array-replace-recursive.php
     * @param array $array
     * @return $this
     */
    public function replaceRecursive(array $array)
    {
        $this->set(array_replace_recursive($this->get(), $array));

        return $this;
    }

    /**
     * @link http://php.net/manual/en/function.array-replace.php
     * @param array $array
     * @return $this
     */
    public function replace(array $array)
    {
        $this->set(array_replace($this->get(), $array));

        return $this;
    }

    /**
     * @link http://php.net/manual/en/function.array-reverse.php
     * @param bool $preserveKeys
     * @return $this
     */
    public function reverse($preserveKeys = false)
    {
        $this->set(array_reverse($this->get(), (bool) $preserveKeys));

        return $this;
    }

    /**
     * @link http://php.net/manual/en/function.rsort.php
     * @param int $flags
     * @return $this
     */
    public function rsort($flags = SORT_REGULAR)
    {
        rsort($this->get(), $flags);

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
        return array_search($needle, $this->get(), $strict);
    }

    /**
     * @link http://php.net/manual/en/function.array-shift.php
     * @return mixed
     */
    public function shift()
    {
        return array_shift($this->get());
    }

    /**
     * @link http://php.net/manual/en/function.shuffle.php
     * @return $this
     */
    public function shuffle()
    {
        shuffle($this->get());

        return $this;
    }

    /**
     * @link http://php.net/manual/en/function.array-slice.php
     * @param $offset
     * @param null $length
     * @param bool $preserveKeys
     * @return $this
     */
    public function slice($offset, $length = null, $preserveKeys = false)
    {
        $this->set(array_slice($this->get(), $offset, $length, $preserveKeys));

        return $this;
    }

    /**
     * @link http://php.net/manual/en/function.sort.php
     * @param int $flags
     * @return $this
     */
    public function sort($flags = SORT_REGULAR)
    {
        sort($this->get(), $flags);

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
        array_splice($this->get(), $offset, $length, $replacement);

        return $this;
    }

    /**
     * @link http://php.net/manual/en/function.array-sum.php
     * @return number
     */
    public function sum()
    {
        return array_sum($this->get());
    }

    /**
     * @link http://php.net/manual/en/function.uasort.php
     * @param callable $func
     * @return $this
     */
    public function uasort(callable $func)
    {
        uasort($this->get(), $func);

        return $this;
    }

    /**
     * @link http://php.net/manual/en/function.array-udiff-assoc.php
     * @param array $array
     * @param callable $func
     * @return $this
     */
    public function udiffAssoc(array $array, callable $func)
    {
        $this->set(array_udiff_assoc($this->get(), $array, $func));

        return $this;
    }

    /**
     * @link http://php.net/manual/en/function.array-udiff-uassoc.php
     * @param array $array
     * @param callable $valueFunc
     * @param callable $keyFunc
     * @return $this
     */
    public function udiffUassoc(array $array, callable $valueFunc, callable $keyFunc)
    {
        $this->set(array_udiff_uassoc($this->get(), $array, $valueFunc, $keyFunc));

        return $this;
    }

    /**
     * @link http://php.net/manual/en/function.array-udiff.php
     * @param array $array
     * @param callable $func
     * @return $this
     */
    public function udiff(array $array, callable $func)
    {
        $this->set(array_udiff($this->get(), $array, $func));

        return $this;
    }

    /**
     * @link http://php.net/manual/en/function.array-uintersect-assoc.php
     * @param array $array
     * @param callable $func
     * @return $this
     */
    public function uintersectAssoc(array $array, callable $func)
    {
        $this->set(array_uintersect_assoc($this->get(), $array, $func));

        return $this;
    }

    /**
     * @link http://php.net/manual/en/function.array-uintersect-uassoc.php
     * @param array $array
     * @param callable $valueFunc
     * @param callable $keyFunc
     * @return $this
     */
    public function uintersectUassoc(array $array, callable $valueFunc, callable $keyFunc)
    {
        $this->set(array_uintersect_uassoc($this->get(), $array, $valueFunc, $keyFunc));

        return $this;
    }

    /**
     * @link http://php.net/manual/en/function.array-uintersect.php
     * @param array $array
     * @param callable $func
     * @return $this
     */
    public function uintersect(array $array, callable $func)
    {
        $this->set(array_uintersect($this->get(), $array, $func));

        return $this;
    }

    /**
     * @link http://php.net/manual/en/function.uksort.php
     * @param callable $func
     * @return $this
     */
    public function uksort(callable $func)
    {
        uksort($this->get(), $func);

        return $this;
    }

    /**
     * @link http://php.net/manual/en/function.array-unique.php
     * @param int $flags
     * @return $this
     */
    public function unique($flags = SORT_STRING)
    {
        $this->set(array_unique($this->get(), $flags));

        return $this;
    }

    /**
     * @link http://php.net/manual/en/function.array-unshift.php
     * @param $value
     * @return $this
     */
    public function unshift($value)
    {
        array_unshift($this->get(), $value);

        return $this;
    }

    /**
     * @link http://php.net/manual/en/function.usort.php
     * @param callable $func
     * @return $this
     */
    public function usort(callable $func)
    {
        usort($this->get(), $func);

        return $this;
    }

    /**
     * @link http://php.net/manual/en/function.array-values.php
     * @return $this
     */
    public function values()
    {
        $this->set(array_values($this->get()));

        return $this;
    }

    /**
     * @link http://php.net/manual/en/function.array-walk-recursive.php
     * @param callable $func
     * @param null $userData
     * @return $this
     */
    public function walkRecursive(callable $func, $userData = null)
    {
        array_walk_recursive($this->get(), $func, $userData);

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
        array_walk($this->get(), $func, $userData);

        return $this;
    }

    /**
     * (PHP 5 >= 5.0.0)
     * Whether a offset exists
     *
     * @link http://php.net/manual/en/arrayaccess.offsetexists.php
     * @param mixed $offset An offset to check for.
     * @return boolean true on success or false on failure.
     */
    public function offsetExists($offset)
    {
        if (isset($this->get()[$offset]) || array_key_exists($offset, $this->get())) {
            return true;
        }

        return false;
    }

    /**
     * (PHP 5 >= 5.0.0)
     * Offset to retrieve
     *
     * @link http://php.net/manual/en/arrayaccess.offsetget.php
     * @param mixed $offset The offset to retrieve.
     * @return mixed Can return all value types.
     */
    public function offsetGet($offset)
    {
        return $this->get()[$offset];
    }

    /**
     * (PHP 5 >= 5.0.0)
     * Offset to set
     *
     * @link http://php.net/manual/en/arrayaccess.offsetset.php
     * @param mixed $offset The offset to assign the value to.
     * @param mixed $value The value to set.
     * @return void
     */
    public function offsetSet($offset, $value)
    {
        $this->get()[$offset] = $value;

        return;
    }

    /**
     * (PHP 5 >= 5.0.0)
     * Offset to unset
     *
     * @link http://php.net/manual/en/arrayaccess.offsetunset.php
     * @param mixed $offset The offset to unset.
     * @return void
     */
    public function offsetUnset($offset)
    {
        unset($this->get()[$offset]);

        return;
    }

    /**
     * (PHP 5 >= 5.1.0)
     * Count elements of an object
     *
     * @link http://php.net/manual/en/countable.count.php
     * @return int The custom count as an integer.
     */
    public function count()
    {
        return sizeof($this->get());
    }

    /**
     * (PHP 5 >= 5.4.0)
     * Specify data which should be serialized to JSON
     *
     * @link http://php.net/manual/en/jsonserializable.jsonserialize.php
     * @return mixed data which can be serialized by json_encode,
     * which is a value of any type other than a resource.
     */
    public function jsonSerialize()
    {
        return json_encode($this->get());
    }

    /**
     * (PHP 5 >= 5.1.0)
     * String representation of object
     *
     * @link http://php.net/manual/en/serializable.serialize.php
     * @return string the string representation of the object or null
     */
    public function serialize()
    {
        return serialize($this->get());
    }

    /**
     * (PHP 5 >= 5.1.0)
     * Constructs the object
     *
     * @link http://php.net/manual/en/serializable.unserialize.php
     * @param string $serialized The string representation of the object.
     * @throws \RangeException
     * @return void
     */
    public function unserialize($serialized)
    {
        $value = unserialize($serialized);

        if (is_array($value)) {
            throw new \RangeException('Error: unserialize value is not an array');
        }

        $this->value = $value;

        return;
    }
}
