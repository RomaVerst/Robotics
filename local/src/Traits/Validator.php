<?php

namespace App\Robotics\Traits;

trait Validator
{
    public function validation(array $list): array
    {
        foreach ($list as $code => &$value) {
            if (is_array($value)) {
                continue;
            }
            $value = htmlspecialcharsbx(trim(strip_tags($value)));
        }
        unset($value);
        return $list;
    }
}
