<?php

declare(strict_types=1);

namespace Flow\ETL\Transformer;

use Flow\ETL\Row;
use Flow\ETL\Rows;
use Flow\ETL\Transformer;

/**
 * @psalm-immutable
 */
final class CloneEntryTransformer implements Transformer
{
    private string $from;

    private string $to;

    public function __construct(string $from, string $to)
    {
        $this->from = $from;
        $this->to = $to;
    }

    public function transform(Rows $rows) : Rows
    {
        /** @psalm-var pure-callable(\Flow\ETL\Row) : \Flow\ETL\Row $clone */
        $clone = function (Row $row) : Row {
            return $row->add($row->get($this->from)->rename($this->to));
        };

        return $rows->map($clone);
    }
}
