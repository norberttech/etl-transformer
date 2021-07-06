<?php

namespace Flow\ETL\Transformer\Filter\Filter\ValidValue;

interface Validator
{
    /**
     * @param mixed $value
     * @return bool
     */
    public function isValid($value) : bool;
}