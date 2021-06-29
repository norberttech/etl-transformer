<?php

declare(strict_types=1);

namespace Flow\ETL\Transformer\Cast\ArrayEntryEach;

use Flow\ETL\Transformer\Cast\CastArrayEntryEach;
use Flow\ETL\Transformer\Cast\ValueCaster;

/**
 * @psalm-immutable
 */
final class CastArrayEntryEachToJson extends CastArrayEntryEach
{
    public function __construct(string $arrayEntryName)
    {
        parent::__construct($arrayEntryName, new ValueCaster\AnyToJsonCaster());
    }

    public static function nullable(string $arrayEntryName) : self
    {
        return new self($arrayEntryName);
    }
}
