<?php

namespace Flow\ETL\Transformer\Condition\ValidValue;

interface Validator
{
    /**
     * @param mixed $value
     * @return bool
     */
    public function isValid($value) : bool;
}