<?php

declare(strict_types=1);

namespace Flow\ETL\Transformer;

use Flow\ETL\Row;
use Flow\ETL\Row\Entry;
use Flow\ETL\Rows;
use Flow\ETL\Transformer;

/**
 * @psalm-immutable
 */
final class GroupToArrayTransformer implements Transformer
{
    private string $groupByEntry;

    private string $newEntryName;

    public function __construct(string $groupByEntry, string $newEntryName)
    {
        $this->groupByEntry = $groupByEntry;
        $this->newEntryName = $newEntryName;
    }

    public function transform(Rows $rows) : Rows
    {
        /** @var array<array-key, array<mixed>> $entries */
        $entries = [];

        /**
         * @psalm-var pure-callable(Row $row) : void $iterator
         */
        $iterator = function (Row $row) use (&$entries) : void {
            /** @var array<array-key, array<mixed>> $entries */
            $groupValue = (string) $row->valueOf($this->groupByEntry);

            if (!\array_key_exists($groupValue, $entries)) {
                $entries[$groupValue] = [];
            }

            $entries[$groupValue][] = $row->toArray();
        };

        /** @psalm-suppress UnusedMethodCall */
        $rows->each($iterator);

        $rows = new Rows();

        /** @var array<mixed> $entry */
        foreach ($entries as $entry) {
            $rows = $rows->add(
                Row::create(
                    new Entry\ArrayEntry(
                        $this->newEntryName,
                        $entry
                    )
                )
            );
        }

        return $rows;
    }
}
