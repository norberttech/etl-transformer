<?php

declare(strict_types=1);

namespace Flow\ETL\Transformer\Condition;

use Flow\ETL\Row;

final class EntryExists implements RowCondition
{
    private string $entryName;

    public function __construct(string $entryName)
    {
        $this->entryName = $entryName;
    }

    public function isMetFor(Row $row) : bool
    {
        return $row->entries()->has($this->entryName);
    }
}
