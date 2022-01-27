<?php

class TsuboHelper
{
    const TSUBO = 3.30579;
    const MAN = 10000;
    public function toTsubo($value)
    {
        $result = round($value / self::TSUBO );
        return $result;
    }

    public function fromTsubo($value)
    {
        $result = round($value * self::TSUBO);
        return $result;
    }

    public function toMan($value)
    {
        $result = round($value / self::MAN);
        return $result;
    }

    public function fromMan($value)
    {
        $result = round($value * self::MAN);
        return $result;
    }

    public function manPerTsubo($yen, $meter)
    {
        return round($this->toMan($yen) / $this->toTsubo($meter));
    }
}
