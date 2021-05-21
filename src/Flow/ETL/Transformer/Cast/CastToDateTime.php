<?php

declare(strict_types=1);

namespace Flow\ETL\Transformer\Cast;

use Flow\ETL\Row\Entry\DateTimeEntry;

final class CastToDateTime extends CastEntry
{
    public function __construct(string $entryName, string $format, ?string $timeZone = null, ?string $toTimeZone = null)
    {
        parent::__construct(
            $entryName,
            DateTimeEntry::class,
            [$format],
            function (string $dateTimeString) use ($timeZone, $toTimeZone) : \DateTimeImmutable {
                if ($timeZone && $toTimeZone) {
                    return (new \DateTimeImmutable($dateTimeString, new \DateTimeZone($timeZone)))->setTimezone(new \DateTimeZone($toTimeZone));
                }

                if ($timeZone) {
                    return new \DateTimeImmutable($dateTimeString, new \DateTimeZone($timeZone));
                }

                if ($toTimeZone) {
                    return (new \DateTimeImmutable($dateTimeString))->setTimezone(new \DateTimeZone($toTimeZone));
                }

                return new \DateTimeImmutable($dateTimeString);
            }
        );
    }
}
