# ETL Transformers

[![Minimum PHP Version](https://img.shields.io/badge/php-%3E%3D%207.4-8892BF.svg)](https://php.net/)

## Description

Set of ETL generic Transformers

## Transformer - FilterRows

Filter out rows

```php 
<?php

use Flow\ETL\Transformer\Filter\EntryEqualsTo;
use Flow\ETL\Transformer\FilterRowsTransformer;
use Flow\ETL\Row;
use Flow\ETL\Rows;

$transformer = new FilterRowsTransformer(
    new EntryEqualsTo('status', 'NEW'),
);

$transformer->transform(
    new Rows(
        Row::create(new Row\Entry\StringEntry('status', 'PENDING')),
        Row::create(new Row\Entry\StringEntry('status', 'SHIPPED')),
        Row::create(new Row\Entry\StringEntry('status', 'NEW')),
    )
);

```

## Transformer - RemoveEntriesTransformer

Remove transformers by name from each row.

```php
<?php

use Flow\ETL\Row;
use Flow\ETL\Rows;
use Flow\ETL\Transformer\RemoveEntriesTransformer;

$transformer = new RemoveEntriesTransformer('id', 'array');

$transformer->transform(
    Row::create(
        new Row\Entry\IntegerEntry('id', 1),
        new Row\Entry\StringEntry('name', 'Row Name'),
        new Row\Entry\ArrayEntry('array', ['test'])
    )
);
```

## Transformer - ArrayUnpackTransformer

Unpacks ArrayEntry into dedicated Entries detecting each array element type.

```php
<?php

use Flow\ETL\Exception\RuntimeException;
use Flow\ETL\Row;
use Flow\ETL\Rows;
use Flow\ETL\Transformer\ArrayUnpackTransformer;
use Flow\ETL\Transformer\RemoveEntriesTransformer;

$arrayUnpackTransformer = new ArrayUnpackTransformer('array_entry');

$rows = (new RemoveEntriesTransformer('array_entry'))->transform(
    $arrayUnpackTransformer->transform(
        new Rows(
            Row::create(
                new Row\Entry\ArrayEntry('array_entry', [
                    'id' => 1,
                    'status' => 'PENDING',
                    'enabled' => true,
                    'datetime' =>  new \DateTimeImmutable('2020-01-01 00:00:00 UTC'),
                    'array' => ['foo', 'bar'],
                    'json' => '["foo", "bar"]',
                    'object' => new \stdClass(),
                    'null' => null,
                ]),
            ),
        ),
    )
);

$this->assertEquals(
    new Rows(
        Row::create(
            new Row\Entry\IntegerEntry('id', 1),
            new Row\Entry\StringEntry('status', 'PENDING'),
            new Row\Entry\BooleanEntry('enabled', true),
            new Row\Entry\DateTimeEntry('datetime', new \DateTimeImmutable('2020-01-01 00:00:00 UTC')),
            new Row\Entry\ArrayEntry('array', ['foo', 'bar']),
            new Row\Entry\JsonEntry('json', ['foo', 'bar']),
            new Row\Entry\ObjectEntry('object', new \stdClass()),
            new Row\Entry\NullEntry('null')
        ),
    ),
    $rows
);
```


## Development

In order to install dependencies please, launch following commands:

```bash
composer install
composer install --working-dir ./tools
```

## Run Tests

In order to execute full test suite, please launch following command:

```bash
composer build
```

It's recommended to use [pcov](https://pecl.php.net/package/pcov) for code coverage however you can also use
xdebug by setting `XDEBUG_MODE=coverage` env variable.
