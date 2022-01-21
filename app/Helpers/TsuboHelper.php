<?php

class TsuboHelper
{
    public function toTsubo($value)
    {
        $result = round($value/3.30579);
        return $result;
    }

    public function fromTsubo($value)
    {
        $result = round($value * 3.30579);
        return $result;
    }
}
