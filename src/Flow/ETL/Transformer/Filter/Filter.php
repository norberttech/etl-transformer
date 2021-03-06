<?php

declare(strict_types=1);

namespace Flow\ETL\Transformer\Filter;

use Flow\ETL\Row;

/**
 * @psalm-immutable
 */
interface Filter
{
    public function __invoke(Row $row) : bool;
}
