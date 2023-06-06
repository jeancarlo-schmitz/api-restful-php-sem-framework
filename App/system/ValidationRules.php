<?php

namespace system;

use InvalidArgumentException;

class ValidationRules
{
    public const NOT_EMPTY = 'not_empty';
    public const LENGTH = 'length';

    public static function notEmpty()
    {
        return 'not_empty';
    }

    public static function length(int $min = null, int $max = null)
    {
        if ($min === null && $max === null) {
            throw new InvalidArgumentException('Pelo menos o par�metro min ou max deve ser fornecido para a regra de valida��o length');
        }

        $rule = 'length';

        if ($min !== null) {
            $rule .= ":min=$min";
        }

        if ($max !== null) {
            $rule .= ",max=$max";
        }

        return $rule;
    }
}