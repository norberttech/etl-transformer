# ETL Transformers

[![Minimum PHP Version](https://img.shields.io/badge/php-%3E%3D%207.4-8892BF.svg)](https://php.net/)

## Description

Set of ETL generic Transformers, for the detailed usage instruction please look into [tests](tests/Flow/ETL/Transformer/Tests/Unit).

* **Generic**
    * [cast](src/Flow/ETL/Transformer/CastTransformer.php) - [tests](tests/Flow/ETL/Transformer/Tests/Unit/CastTransformerTest.php) 
    * [chain](src/Flow/ETL/Transformer/ChainTransformer.php) - [tests](tests/Flow/ETL/Transformer/Tests/Unit/ChainTransformerTest.php) 
    * [clone entry](src/Flow/ETL/Transformer/CloneEntryTransformer.php) - [tests](tests/Flow/ETL/Transformer/Tests/Unit/CloneEntryTransformerTest.php) 
    * [conditional](src/Flow/ETL/Transformer/ConditionalTransformer.php) - [tests](tests/Flow/ETL/Transformer/Tests/Unit/ConditionalTransformerTest.php) 
    * [dynamic entry](src/Flow/ETL/Transformer/DynamicEntryTransformer.php) - [tests](tests/Flow/ETL/Transformer/Tests/Unit/DynamicEntryTransformerTest.php) 
    * [entry name style converter](src/Flow/ETL/Transformer/EntryNameStyleConverterTransformer.php) - [tests](tests/Flow/ETL/Transformer/Tests/Unit/DynamicEntryTransformerTest.php) 
    * [filter rows](src/Flow/ETL/Transformer/FilterRowsTransformer.php) - [tests](tests/Flow/ETL/Transformer/Tests/Unit/FilterRowsTransformerTest.php) 
    * [group to array](src/Flow/ETL/Transformer/GroupToArrayTransformer.php) - [tests](tests/Flow/ETL/Transformer/Tests/Unit/GroupToArrayTransformerTest.php) 
    * [keep entries](src/Flow/ETL/Transformer/KeepEntriesTransformer.php) - [tests](tests/Flow/ETL/Transformer/Tests/Unit/KeepEntriesTransformerTest.php) 
    * [math operation](src/Flow/ETL/Transformer/MathOperationTransformer.php) - [tests](tests/Flow/ETL/Transformer/Tests/Unit/MathOperationTransformerTest.php) 
    * [remove entries](src/Flow/ETL/Transformer/RemoveEntriesTransformer.php) - [tests](tests/Flow/ETL/Transformer/Tests/Unit/RemoveEntriesTransformerTest.php) 
    * [rename entries](src/Flow/ETL/Transformer/RenameEntriesTransformer.php) - [tests](tests/Flow/ETL/Transformer/Tests/Unit/RenameEntriesTransformerTest.php) 
    * [static entry](src/Flow/ETL/Transformer/StaticEntryTransformer.php) - [tests](tests/Flow/ETL/Transformer/Tests/Unit/StaticEntryTransformerTest.php) 
* **Array**
    * [array collection get](src/Flow/ETL/Transformer/ArrayCollectionGetTransformer.php) - [tests](tests/Flow/ETL/Transformer/Tests/Unit/ArrayCollectionGetTransformerTest.php)
    * [array collection merge](src/Flow/ETL/Transformer/ArrayCollectionMergeTransformer.php) - [tests](tests/Flow/ETL/Transformer/Tests/Unit/ArrayCollectionMergeTransformerTest.php)
    * [array dot get](src/Flow/ETL/Transformer/ArrayDotGetTransformer.php) - [tests](tests/Flow/ETL/Transformer/Tests/Unit/ArrayDotGetTransformerTest.php)
    * [array rename](src/Flow/ETL/Transformer/ArrayDotRenameTransformer.php) - [tests](tests/Flow/ETL/Transformer/Tests/Unit/ArrayDotRenameTransformerTest.php)
    * [array expand](src/Flow/ETL/Transformer/ArrayExpandTransformer.php) - [tests](tests/Flow/ETL/Transformer/Tests/Unit/ArrayExpandTransformerTest.php)
    * [array keys style converter](src/Flow/ETL/Transformer/ArrayKeysStyleConverterTransformer.php) - [tests](tests/Flow/ETL/Transformer/Tests/Unit/ArrayKeysStyleConverterTransformerTest.php)
    * [array merge](src/Flow/ETL/Transformer/ArrayMergeTransformer.php) - [tests](tests/Flow/ETL/Transformer/Tests/Unit/ArrayMergeTransformerTest.php)
    * [array reverse](src/Flow/ETL/Transformer/ArrayMergeTransformer.php) - [tests](tests/Flow/ETL/Transformer/Tests/Unit/ArrayMergeTransformerTest.php)
    * [array sort](src/Flow/ETL/Transformer/ArraySortTransformer.php) - [tests](tests/Flow/ETL/Transformer/Tests/Unit/ArraySortTransformerTest.php)
    * [array unpack](src/Flow/ETL/Transformer/ArrayUnpackTransformer.php) - [tests](tests/Flow/ETL/Transformer/Tests/Unit/ArrayUnpackTransformerTest.php)
* **Object**
    * [object method](src/Flow/ETL/Transformer/ObjectMethodTransformer.php) - [tests](tests/Flow/ETL/Transformer/Tests/Unit/ObjectMethodTransformerTest.php)
    * [object to array](src/Flow/ETL/Transformer/ObjectToArrayTransformer.php) - [tests](tests/Flow/ETL/Transformer/Tests/Unit/ObjectToArrayTransformerTest.php)
* **String**
    * [null string into null entry](src/Flow/ETL/Transformer/NullStringIntoNullEntryTransformer.php) - [tests](tests/Flow/ETL/Transformer/Tests/Unit/NullStringIntoNullEntryTransformerTest.php)
    * [string concat](src/Flow/ETL/Transformer/StringConcatTransformer.php) - [tests](tests/Flow/ETL/Transformer/Tests/Unit/StringConcatTransformerTest.php)
    * [string entry value case converter](src/Flow/ETL/Transformer/StringEntryValueCaseConverterTransformer.php) - [tests](tests/Flow/ETL/Transformer/Tests/Unit/StringEntryValueCaseConverterTransformerTest.php)
    * [string format](src/Flow/ETL/Transformer/StringFormatTransformer.php) - [tests](tests/Flow/ETL/Transformer/Tests/Unit/StringFormatTransformerTest.php)
* **Callback** - *Might come with performance degradation*
    * [callback entry](src/Flow/ETL/Transformer/CallbackEntryTransformer.php) - [tests](tests/Flow/ETL/Transformer/Tests/Unit/CallbackEntryTransformerTest.php)
    * [callback row](src/Flow/ETL/Transformer/CallbackRowTransformer.php) - [tests](tests/Flow/ETL/Transformer/Tests/Unit/CallbackRowTransformerTest.php)    

## Serialization

In order to allow serialization of callable base transformers please
add into your dependencies [opis/closure](https://github.com/opis/closure) library:

```
{
  "require": {
    "opis/closure": "^3.5"
  }
}
```


## Custom Transformer

> If possible it's recommended to avoid writing custom transformers. Official transformers are optimized 
> again internal mechanisms which you might not be able to achieve in your custom code. 


Custom should only implement `Transformer` interface: 

Example: 
```php
<?php

use Flow\ETL\Transformer;
use Flow\ETL\Rows;

class NotNorbertTransformer implements Transformer
{
    public function transform(Rows $rows) : Rows
    {
        return $rows->filter(fn(Row $row) => $row->get('name')->value() !== "Norbert");
    }
}
```

## Complex Transformers

Below transformers might not be self descriptive and might require some additional options/dependencies. 

### Transformer - FilterRows

Available Filters

- [All](src/Flow/ETL/Transformer/Filter/Filter/All.php)
- [Any](src/Flow/ETL/Transformer/Filter/Filter/Any.php)
- [Callback](src/Flow/ETL/Transformer/Filter/Filter/Callback.php)
- [EntryEqualsTo](src/Flow/ETL/Transformer/Filter/Filter/EntryEqualsTo.php)
- [EntryNotEqualsTo](src/Flow/ETL/Transformer/Filter/Filter/EntryNotEqualsTo.php)
- [EntryNotNull](src/Flow/ETL/Transformer/Filter/Filter/EntryNotNull.php)
- [EntryNotNumber](src/Flow/ETL/Transformer/Filter/Filter/EntryNotNumber.php)
- [EntryNumber](src/Flow/ETL/Transformer/Filter/Filter/EntryNumber.php)
- [EntryExists](src/Flow/ETL/Transformer/Filter/Filter/EntryExists.php)
- [Opposite](src/Flow/ETL/Transformer/Filter/Filter/Opposite.php)
- [ValidValue](src/Flow/ETL/Transformer/Filter/Filter/ValidValue.php) - optionally integrates with [Symfony Validator](https://github.com/symfony/validator)

### Transformer - Conditional

Transforms only those Rows that met given condition.

Available Conditions 

- [All](src/Flow/ETL/Transformer/Condition/All.php)
- [Any](src/Flow/ETL/Transformer/Condition/Any.php)
- [ArrayDotExists](src/Flow/ETL/Transformer/Condition/ArrayDotExists.php)
- [ArrayDotValueEqualsTo](src/Flow/ETL/Transformer/Condition/ArrayDotValueEqualsTo.php)
- [ArrayDotValueGreaterOrEqualThan](src/Flow/ETL/Transformer/Condition/ArrayDotValueGreaterOrEqualThan.php)
- [ArrayDotValueGreaterThan](src/Flow/ETL/Transformer/Condition/ArrayDotValueGreaterThan.php)
- [ArrayDotValueLessOrEqualThan](src/Flow/ETL/Transformer/Condition/ArrayDotValueLessOrEqualThan.php)
- [ArrayDotValueLessThan](src/Flow/ETL/Transformer/Condition/ArrayDotValueLessThan.php)
- [EntryExists](src/Flow/ETL/Transformer/Condition/EntryExists.php)
- [EntryInstanceOf](src/Flow/ETL/Transformer/Condition/EntryInstanceOf.php)
- [EntryNotNull](src/Flow/ETL/Transformer/Condition/EntryNotNull.php)
- [EntryValueEqualsTo](src/Flow/ETL/Transformer/Condition/EntryValueEqualsTo.php)
- [EntryValueGreaterOrEqualThan](src/Flow/ETL/Transformer/Condition/EntryValueGreaterOrEqualThan.php)
- [EntryValueGreaterThan](src/Flow/ETL/Transformer/Condition/EntryValueGreaterThan.php)
- [EntryValueLessOrEqualThan](src/Flow/ETL/Transformer/Condition/EntryValueLessOrEqualThan.php)
- [EntryValueLessThan](src/Flow/ETL/Transformer/Condition/EntryValueLessThan.php)
- [None](src/Flow/ETL/Transformer/Condition/None.php)
- [Opposite](src/Flow/ETL/Transformer/Condition/Opposite.php)
- [ValidValue](src/Flow/ETL/Transformer/Condition/ValidValue) - optionally integrates with [Symfony Validator](https://github.com/symfony/validator)


### Transformer - Cast


Casting Types: 

* [CastEntries](src/Flow/ETL/Transformer/Cast/CastEntries.php)
* [CastArrayEntryEach](src/Flow/ETL/Transformer/Cast/CastArrayEntryEach.php)  
* [CastToDateTime](src/Flow/ETL/Transformer/Cast/CastToDateTime.php)
* [CastToString](src/Flow/ETL/Transformer/Cast/CastToString.php)
* [CastToInteger](src/Flow/ETL/Transformer/Cast/CastToInteger.php)
* [CastToFloat](src/Flow/ETL/Transformer/Cast/CastToFloat.php)  
* [CastToJson](src/Flow/ETL/Transformer/Cast/CastToJson.php)
* [CastToArray](src/Flow/ETL/Transformer/Cast/CastToArray.php)
* [CastJsonToArray](src/Flow/ETL/Transformer/Cast/CastJsonToArray.php)

### Transformer - EntryNameStyleConverter

This transformer requires `jawira/case-converter` in the project

```
composer require jawira/case-converter
```

Supported styles: 

``` 
public const CAMEL = 'camel';
public const PASCAL = 'pascal';
public const SNAKE = 'snake';
public const ADA = 'ada';
public const MACRO = 'macro';
public const KEBAB = 'kebab';
public const TRAIN = 'train';
public const COBOL = 'cobol';
public const LOWER = 'lower';
public const UPPER = 'upper';
public const TITLE = 'title';
public const SENTENCE = 'sentence';
public const DOT = 'dot';
```

For the more details, please visit [jawira/case-converter](https://github.com/jawira/case-converter) documentation.

### Transformer - ArrayKeysStyleConverter

This transformer requires `jawira/case-converter` in the project.

```
composer require jawira/case-converter
```

Supported styles:

``` 
public const CAMEL = 'camel';
public const PASCAL = 'pascal';
public const SNAKE = 'snake';
public const ADA = 'ada';
public const MACRO = 'macro';
public const KEBAB = 'kebab';
public const TRAIN = 'train';
public const COBOL = 'cobol';
public const LOWER = 'lower';
public const UPPER = 'upper';
public const TITLE = 'title';
public const SENTENCE = 'sentence';
public const DOT = 'dot';
```

For the more details, please visit [jawira/case-converter](https://github.com/jawira/case-converter) documentation.

### Transformer - ArrayDotGet

Read more about dot notation in [flow-php/array-dot](https://github.com/flow-php/array-dot) documentation.

### Transformer - ArrayDotRename

Read more about dot notation in [flow-php/array-dot](https://github.com/flow-php/array-dot) doumentation.

### Transformer - MathOperation

**Warning, do not use for operations that require high precision since it's using native php arithmetic operations.**

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
