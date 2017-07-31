<?php

class TextWork
{
    public $put;

    /**
     * TextWork constructor.
     * @param $file
     */
    public function __construct($file)
    {
        is_file($file) ? $this->put = $file : NULL;
    }

    /**
     * @return array|bool
     */
    public function getArray()
    {
        return file($this->put);
    }

    /**
     * @return array|bool
     */
    public function validateArray()
    {
        foreach ($arr = $this->getArray() as $i => $item) {
            if (preg_match("/[a-zA-Z]/", $item)) {
                unset($arr[$i]);
            }
        }
        return $arr;
    }

    /**
     * @return array
     */
    public function explodeArray()
    {
        $arr = [];
        foreach ($this->validateArray() as $item) {
            $arr[] = explode(' ', $item);
        }
        return $arr;
    }

    /**
     * @return array
     */
    public function getSum()
    {
        $arr = array_values($this->explodeArray());
        foreach ($arr as $i => $value) {
            $arr[$i] = array_sum($value);
        }
        return $arr;
    }

    /**
     * @return array
     */
    public function getResult()
    {
        $sort = $this->getSum();
        asort($sort);
        $arr = [];
        foreach ($sort as $i => $value) {
            $arr[$i] = $value;
        }
        $arr = array_reverse($arr, true);
        return $arr;
    }

}




