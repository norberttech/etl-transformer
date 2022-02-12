<?php

declare(strict_types=1);

namespace Flow\ETL\Transformer;

use Flow\ETL\Row;
use Flow\ETL\Rows;
use Flow\ETL\Transformer;

/**
 * @psalm-immutable
 */
final class CallbackRowTransformer implements Transformer
{
    /**
     * @psalm-var pure-callable(Row) : Row
     * @phpstan-var callable(Row) : Row
     */
    private $callable;

    /**
     * @psalm-param pure-callable(Row) : Row $callable
     *
     * @param callable(Row) : Row $callable
     */
    public function __construct(callable $callable)
    {
        $this->callable = $callable;
    }

    /**
     * @phpstan-ignore-next-line
     *
     * @return array{callable: pure-callable(Row) : Row}
     */
    public function __serialize() : array
    {
        return [
            'callable' => $this->callable,
        ];
    }

    /**
     * @phpstan-ignore-next-line
     *
     * @param array{callable: pure-callable(Row) : Row} $data
     * @psalm-suppress MoreSpecificImplementedParamType
     */
    public function __unserialize(array $data) : void
    {
        $this->callable = $data['callable'];
    }

    public function transform(Rows $rows) : Rows
    {
        return $rows->map($this->callable);
    }
}
