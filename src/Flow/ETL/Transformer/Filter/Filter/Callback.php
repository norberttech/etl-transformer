<?php

declare(strict_types=1);

namespace Flow\ETL\Transformer\Filter\Filter;

use Flow\ETL\Row;
use Flow\ETL\Transformer\Filter\Filter;

/**
 * @psalm-immutable
 */
final class Callback implements Filter
{
    /**
     * @psalm-var pure-callable(Row) : bool
     *
     * @var callable(Row) : bool
     */
    private $callback;

    /**
     * @psalm-param pure-callable(Row $row) : bool $callback
     *
     * @param callable(Row $row) : bool $callback
     */
    public function __construct(callable $callback)
    {
        $this->callback = $callback;
    }

    public function keep(Row $row) : bool
    {
        return ($this->callback)($row);
    }
}
