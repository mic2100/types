<?php

namespace Mic2100\Types;

/**
 * Class StringObject
 *
 * @description Provides an OOP approach to the native PHP string methods.
 * @package Mic2100\Types
 * @author Michael Bardsley <@mic_bardsley>
 */
class StringObject
{
    /**
     * @var string
     */
    protected $value;

    /**
     * Constructor
     *
     * @param string $string
     */
    public function __construct($string = '')
    {
        $this->set($string);
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return (string) $this->get();
    }

    /**
     * @return static
     */
    public function __clone()
    {
        return new static($this->get());
    }

    /**
     * Sets the string
     *
     * @param string $string
     * @return $this
     */
    public function set($string = '')
    {
        $this->value = (string) $string;

        return $this;
    }

    /**
     * Gets the string
     *
     * @return string
     */
    public function get()
    {
        return $this->value;
    }

    /**
     * @link http://php.net/manual/en/function.addcslashes.php
     * @param string $charlist e.g. 'A..z'
     * @return $this
     */
    public function addCSlashes($charlist)
    {
        $this->set(addcslashes($this->get(), $charlist));

        return $this;
    }

    /**
     * @link http://php.net/manual/en/function.addslashes.php
     * @return $this
     */
    public function addSlashes()
    {
        $this->set(addslashes($this->get()));

        return $this;
    }

    /**
     * @link http://php.net/manual/en/function.bin2hex.php
     * @return $this
     */
    public function bin2Hex()
    {
        $this->set(bin2hex($this->get()));

        return $this;
    }

    /**
     * @link http://php.net/manual/en/function.chunk-split.php
     * @param int $length
     * @param string $end
     * @return $this
     */
    public function chunkSplit($length = 76, $end = PHP_EOL)
    {
        $this->set(chunk_split($this->get(), $length, $end));

        return $this;
    }

    /**
     * @link http://php.net/manual/en/function.count-chars.php
     * @param int $mode
     * @return mixed
     */
    public function countChars($mode = 0)
    {
        return count_chars($this->get(), $mode);
    }

    /**
     * @link http://php.net/manual/en/function.crc32.php
     * @return $this
     */
    public function crc32()
    {
        $this->set(crc32($this->get()));

        return $this;
    }

    /**
     * @link http://php.net/manual/en/function.crypt.php
     * @param <null|string> $salt
     * @return $this
     */
    public function crypt($salt = null)
    {
        $this->set(crypt($this->get(), $salt));

        return $this;
    }

    /**
     * @link http://php.net/manual/en/function.explode.php
     * @param string $delimiter
     * @param <null|int> $limit
     * @return array
     */
    public function explode($delimiter, $limit = null)
    {
        return explode($delimiter, $this->get(), $limit);
    }

    /**
     * @link http://php.net/manual/en/function.hebrev.php
     * @link http://php.net/manual/en/function.hebrevc.php
     * @param int $maxCharsPerLine
     * @param bool $newLineConversion
     * @return $this
     */
    public function hebrev($maxCharsPerLine = 0, $newLineConversion = false)
    {
        $this->set(
            $newLineConversion ? hebrevc($this->get(), $maxCharsPerLine) : hebrev($this->get(), $maxCharsPerLine)
        );

        return $this;
    }

    /**
     * @link http://php.net/manual/en/function.hex2bin.php
     * @param string $data
     * @return $this
     */
    public function hex2bin($data)
    {
        $this->set(hex2bin($data));

        return $this;
    }

    /**
     * @link http://php.net/manual/en/function.html-entity-decode.php
     * @param int $flags
     * @param null $encoding
     * @return $this
     */
    public function htmlEntityDecode($flags = ENT_COMPAT | ENT_HTML401, $encoding = null)
    {
        $this->set(html_entity_decode($this->get(), $flags, $encoding ?: ini_get("default_charset")));

        return $this;
    }

    /**
     * @links http://php.net/manual/en/function.htmlentities.php
     * @param int $flags
     * @param null $encoding
     * @param bool $doubleEncode
     * @return $this
     */
    public function htmlEntities($flags = ENT_COMPAT | ENT_HTML401, $encoding = null, $doubleEncode = true)
    {
        $this->set(htmlentities($this->get(), $flags, $encoding ?: ini_get("default_charset"), $doubleEncode));

        return $this;
    }

    /**
     * @link http://php.net/manual/en/function.htmlspecialchars-decode.php
     * @param int $flags
     * @return $this
     */
    public function htmlSpecialCharsDecode($flags = ENT_COMPAT | ENT_HTML401)
    {
        $this->set(htmlspecialchars_decode($this->get(), $flags));

        return $this;
    }

    /**
     * @link http://php.net/manual/en/function.htmlspecialchars.php
     * @param int $flags
     * @param null $encoding
     * @param bool $doubleEncode
     * @return $this
     */
    public function htmlSpecialChars($flags = ENT_COMPAT | ENT_HTML401, $encoding = null, $doubleEncode = true)
    {
        $this->set(htmlspecialchars($this->get(), $flags, $encoding ?: ini_get("default_charset"), $doubleEncode));

        return $this;
    }

    /**
     * The implode parameter order is in the order array then string this is acceptable on the PHP site.
     * Although the PHP manual states that ideally they should be string then array.
     *
     * @link http://php.net/manual/en/function.implode.php
     * @param array $array
     * @param null $pieces
     * @return $this
     */
    public function implode(array $array, $pieces = null)
    {
        $this->set(implode($array, $pieces));

        return $this;
    }

    /**
     * @link http://php.net/manual/en/function.lcfirst.php
     * @return $this
     */
    public function lcFirst()
    {
        $this->set(lcfirst($this->get()));

        return $this;
    }

    /**
     * @link http://php.net/manual/en/function.levenshtein.php
     * @param string $string
     * @param <null|int> $costIns
     * @param <null|int> $costRep
     * @param <null|int> $costDel
     * @return int
     */
    public function levenshtein($string , $costIns = null , $costRep = null, $costDel = null)
    {
        return levenshtein($this->get(), $string, $costIns, $costRep, $costDel);
    }

    /**
     * @link http://php.net/manual/en/function.ltrim.php
     * @param string $mask
     * @return $this
     */
    public function lTrim($mask = '')
    {
        $this->set(ltrim($this->get(), $mask));

        return $this;
    }

    /**
     * @link http://php.net/manual/en/function.md5.php
     * @param bool $rawOutput
     * @return $this
     */
    public function md5($rawOutput = false)
    {
        $this->set(md5($this->get(), $rawOutput));

        return $this;
    }

    /**
     * @link http://php.net/manual/en/function.metaphone.php
     * @param int $phonemes
     * @return $this
     */
    public function metaPhone($phonemes = 0)
    {
        $this->set(metaphone($this->get(), $phonemes));

        return $this;
    }

    /**
     * @link http://php.net/manual/en/function.money-format.php
     * @param int $number
     * @return $this
     */
    public function moneyFormat($number)
    {
        $this->set(money_format($this->get(), $number));

        return $this;
    }

    /**
     * @link http://php.net/manual/en/function.nl2br.php
     * @param bool $xhtml
     * @return $this
     */
    public function nl2br($xhtml = true)
    {
        $this->set(nl2br($this->get(), $xhtml));

        return $this;
    }

    /**
     * @link http://php.net/manual/en/function.number-format.php
     * @param <int|float> $number
     * @param int $decimals
     * @param string $decimalPoint
     * @param string $thousandsSeperator
     * @return $this
     */
    public function numberFormat($number, $decimals = 0, $decimalPoint = '.', $thousandsSeperator = ',')
    {
        $this->set(number_format($number, $decimals, $decimalPoint, $thousandsSeperator));

        return $this;
    }

    /**
     * @link http://php.net/manual/en/function.ord.php
     * @return int
     */
    public function ord()
    {
        return ord($this->get());
    }

    /**
     * @link http://php.net/manual/en/function.parse-str.php
     * @param array $array
     * @return $this
     */
    public function parseStr(array &$array = null)
    {
        parse_str($this->get(), $array);

        return $this;
    }

    /**
     * @link http://php.net/manual/en/function.quoted-printable-decode.php
     * @link http://php.net/manual/en/function.quoted-printable-encode.php
     * @param bool $encode
     * @return $this
     */
    public function quotedPrintable($encode = false)
    {
        $this->set($encode ? quoted_printable_encode($this->get()) : quoted_printable_decode($this->get()));

        return $this;
    }

    /**
     * @link http://php.net/manual/en/function.quotemeta.php
     * @return $this
     */
    public function quoteMeta()
    {
        $this->set(quotemeta($this->get()));

        return $this;
    }

    /**
     * @link http://php.net/manual/en/function.rtrim.php
     * @param string $mask
     * @return $this
     */
    public function rTrim($mask = '')
    {
        $this->set(rtrim($this->get(), $mask));

        return $this;
    }

    /**
     * @link http://php.net/manual/en/function.sha1.php
     * @param bool $rawOutput
     * @return $this
     */
    public function sha1($rawOutput = false)
    {
        $this->set(sha1($this->get(), $rawOutput));

        return $this;
    }

    /**
     * @link http://php.net/manual/en/function.similar-text.php
     * @param string $string
     * @param <float|null> $percent
     * @return int
     */
    public function similarText($string = '', &$percent = null)
    {
        return similar_text($this->get(), $string, $percent);
    }

    /**
     * @link http://php.net/manual/en/function.soundex.php
     * @return $this
     */
    public function soundEx()
    {
        $this->set(soundex($this->get()));

        return $this;
    }

    /**
     * @link http://php.net/manual/en/function.str-getcsv.php
     * @param string $delimiter
     * @param string $enclosure
     * @param string $escape
     * @return array
     */
    public function strGetCsv($delimiter = ',', $enclosure = '"', $escape = '\\')
    {
        return str_getcsv($this->get(), $delimiter, $enclosure, $escape);
    }

    /**
     * @link http://php.net/manual/en/function.str-ireplace.php
     * @link http://php.net/manual/en/function.str-replace.php
     * @param mixed $search
     * @param mixed $replace
     * @param bool $caseSensitive
     * @param <int|null> $count
     * @return $this
     */
    public function replace($search, $replace, $caseSensitive = true, &$count = null)
    {
        $this->set(
            $caseSensitive
                ? str_replace($search, $replace, $this->get(), $count)
                : str_ireplace($search, $replace, $this->get(), $count)
        );

        return $this;
    }

    /**
     * @link http://php.net/manual/en/function.str-pad.php
     * @param int $length
     * @param string $string
     * @param int $type
     * @return $this
     */
    public function pad($length, $string = ' ', $type = STR_PAD_RIGHT)
    {
        $this->set(str_pad($this->get(), $length, $string, $type));

        return $this;
    }

    /**
     * @link http://php.net/manual/en/function.str-repeat.php
     * @param int $multipler
     * @return $this
     */
    public function repeat($multipler)
    {
        $this->set(str_repeat($this->get(), $multipler));

        return $this;
    }

    /**
     * @link http://php.net/manual/en/function.str-rot13.php
     * @return $this
     */
    public function rot13()
    {
        $this->set(rot13($this->get()));

        return $this;
    }

    /**
     * @link http://php.net/manual/en/function.str-shuffle.php
     * @return $this
     */
    public function shuffle()
    {
        $this->get(str_shuffle($this->get()));

        return $this;
    }

    /**
     * @link http://php.net/manual/en/function.str-split.php
     * @param int $length
     * @return array
     */
    public function split($length = 1)
    {
        return str_split($this->get(), $length);
    }

    /**
     * @link http://php.net/manual/en/function.str-word-count.php
     * @param int $format
     * @param <int|null> $charlist
     * @return mixed
     */
    public function wordCount($format = 0, $charlist = null)
    {
        return str_word_count($this->get(), $format, $charlist);
    }

    /**
     * @link http://php.net/manual/en/function.strcasecmp.php
     * @param string $string
     * @return int
     */
    public function caseCmp($string)
    {
        return strcasecmp($this->get(), $string);
    }

    /**
     * @link http://php.net/manual/en/function.strcmp.php
     * @param string $string
     * @return int
     */
    public function cmp($string)
    {
        return strcmp($this->get(), $string);
    }

    /**
     * @link http://php.net/manual/en/function.strcoll.php
     * @param string $string
     * @return int
     */
    public function coll($string)
    {
        return strcoll($this->get(), $string);
    }

    /**
     * @link http://php.net/manual/en/function.strcspn.php
     * @param string $string
     * @param <int|null> $start
     * @param <int|null> $length
     * @return int
     */
    public function cspn($string, $start = null, $length = null)
    {
        return strcspn($this->get(), $string, $start, $length);
    }

    /**
     * @link http://php.net/manual/en/function.strip-tags.php
     * @param string $allowed
     * @return $this
     */
    public function stripTags($allowed = '')
    {
        $this->set(strip_tags($this->get(), $allowed));

        return $this;
    }

    /**
     * @link http://php.net/manual/en/function.stripcslashes.php
     * @return $this
     */
    public function stripCSlashes()
    {
        $this->set(stripcslashes($this->get()));

        return $this;
    }

    /**
     * @link http://php.net/manual/en/function.stripos.php
     * @link http://php.net/manual/en/function.strpos.php
     * @param string $needle
     * @param bool $caseSensitive
     * @param int $offset
     * @return int
     */
    public function pos($needle, $caseSensitive = true, $offset = 0)
    {
        return $caseSensitive ? strpos($this->get(), $needle, $offset) : stripos($this->get(), $needle, $offset);
    }

    /**
     * @link http://php.net/manual/en/function.stripslashes.php
     * @return $this
     */
    public function stripSlashes()
    {
        $this->set(stripslashes($this->get()));

        return $this;
    }

    /**
     * @link http://php.net/manual/en/function.stristr.php
     * @link http://php.net/manual/en/function.strstr.php
     * @param $needle
     * @param bool $caseSensitive
     * @param bool $beforeNeedle
     */
    public function str($needle, $caseSensitive = true, $beforeNeedle = false)
    {
        $this->set(
            $caseSensitive
                ? strstr($this->get(), $needle, $beforeNeedle)
                : stristr($this->get(), $needle, $beforeNeedle)
        );
    }

    /**
     * @link http://php.net/manual/en/function.strlen.php
     * @return int
     */
    public function len()
    {
        return strlen($this->get());
    }

    /**
     * @link http://php.net/manual/en/function.strnatcasecmp.php
     * @param string $string
     * @param bool $caseSensitive
     * @return int
     */
    public function natcmp($string, $caseSensitive = true)
    {
        return $caseSensitive ? strnatcmp($this->get(), $string) : strnatcasecmp($this->get(), $string);
    }

    /**
     * @link http://php.net/manual/en/function.strncasecmp.php
     * @link http://php.net/manual/en/function.strncmp.php
     * @param string $string
     * @param int $length
     * @param bool $caseSensitive
     * @return int
     */
    public function ncmp($string, $length, $caseSensitive = true)
    {
        return $caseSensitive ? strncmp($this->get(), $string, $length) : strncasecmp($this->get(), $string, $length);
    }

    /**
     * @link http://php.net/manual/en/function.strpbrk.php
     * @param string $list
     * @return static
     */
    public function pbrk($list = '')
    {
        return new static(strpbrk($this->get(), $list));
    }

    /**
     * @link http://php.net/manual/en/function.strrchr.php
     * @param mixed $needle
     * @return static
     */
    public function rchr($needle)
    {
        return new static(strrchr($this->get(), $needle));
    }

    /**
     * @link http://php.net/manual/en/function.strrev.php
     * @return static
     */
    public function rev()
    {
        return new static(strrev($this->get()));
    }

    /**
     * @link http://php.net/manual/en/function.strripos.php
     * @link http://php.net/manual/en/function.strrpos.php
     * @param mixed $needle
     * @param bool $caseSensitive
     * @param int $offset
     * @return int
     */
    public function ripos($needle, $caseSensitive = true, $offset = 0)
    {
        return $caseSensitive ? strrpos($this->get(), $needle, $offset) : strripos($this->get(), $needle, $offset);
    }

    /**
     * @link http://php.net/manual/en/function.strspn.php
     * @param string $mask
     * @param <int|null> $start
     * @param <int|null> $length
     * @return int
     */
    public function spn($mask, $start = null, $length = null)
    {
        return strspn($this->get(), $mask, $start, $length);
    }

    /**
     * @link http://php.net/manual/en/function.strtok.php
     * @param string $token
     * @return string
     */
    public function tok($token)
    {
        $tok = strtok($this->get(), $token);
        while ($tok !== false) {
            $tok = strtok(" \n\t");
            if ($tok) {
                yield $tok;
            }
        }
    }

    /**
     * @link http://php.net/manual/en/function.strtolower.php
     * @return $this
     */
    public function lowerCase()
    {
        $this->set(strtolower($this->get()));

        return $this;
    }

    /**
     * @link http://php.net/manual/en/function.strtoupper.php
     * @return $this
     */
    public function upperCase()
    {
        $this->set(strtoupper($this->get()));

        return $this;
    }

    /**
     * @link http://php.net/manual/en/function.substr.php
     * @param int $start
     * @param <int|null> $length
     * @return $this
     */
    public function cut($start, $length = null)
    {
        $this->set(substr($this->get(), $start, $length));

        return $this;
    }

    /**
     * @link http://php.net/manual/en/function.trim.php
     * @param string $mask
     * @return $this
     */
    public function trim($mask = " \t\n\r\0\x0B")
    {
        $this->set(trim($this->get(), $mask));

        return $this;
    }

    /**
     * @link http://php.net/manual/en/function.ucfirst.php
     * @return $this
     */
    public function ucFirst()
    {
        $this->set(ucfirst($this->get()));

        return $this;
    }

    /**
     * @link http://php.net/manual/en/function.ucwords.php
     * @return $this
     */
    public function ucWords()
    {
        $this->set(ucwords($this->get()));

        return $this;
    }

    /**
     * @link http://php.net/manual/en/function.wordwrap.php
     * @param int $width
     * @param string $break
     * @param bool $cut
     * @return $this
     */
    public function wrap($width = 75, $break = PHP_EOL, $cut = false)
    {
        $this->set(wordwrap($this->get(), $width, $break, $cut));

        return $this;
    }
}
