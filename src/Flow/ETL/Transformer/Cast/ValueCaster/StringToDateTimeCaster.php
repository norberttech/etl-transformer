<?php

declare(strict_types=1);

namespace Flow\ETL\Transformer\Cast\ValueCaster;

use Flow\ETL\Exception\InvalidArgumentException;
use Flow\ETL\Transformer\Cast\ValueCaster;

/**
 * @psalm-immutable
 */
final class StringToDateTimeCaster implements ValueCaster
{
    private ?string $timeZone;

    private ?string $toTimeZone;

    /**
     * $timezone - this value should be used for datetime values that does not come with explicit tz to avoid using system default.
     * For example when the datetime is "2020-01-01 00:00:00" and we know that it's utc, then $timeZone should be set to 'UTC'.
     *
     * $toTimeZone - this value should be used to convert datetime to different timezone. So when the datetime comes in one timezone
     * "2020-01-01 00:00:00 UTC" and we want to convert it to America/Los_Angeles use $toTimeZone = 'America/Los_Angeles".
     * If datetime comes without origin timezone, like for example '2020-01-01 00:00:00' but we know it's UTC
     * and we want to cast it to 'America/Los_Angeles' use $timeZone = 'UTC' and $toTimeZone = 'America/Los_Angeles'.
     *
     * @param null|string $timeZone
     * @param null|string $toTimeZone
     */
    public function __construct(?string $timeZone = null, ?string $toTimeZone = null)
    {
        $this->timeZone = $timeZone;
        $this->toTimeZone = $toTimeZone;
    }

    public function cast($value) : \DateTimeImmutable
    {
        if (!\is_string($value)) {
            throw new InvalidArgumentException('Only string can be casted to DateTime, got ' . \gettype($value));
        }

        if ($this->timeZone && $this->toTimeZone) {
            return (new \DateTimeImmutable($value, new \DateTimeZone($this->timeZone)))->setTimezone(new \DateTimeZone($this->toTimeZone));
        }

        if ($this->timeZone) {
            return new \DateTimeImmutable($value, new \DateTimeZone($this->timeZone));
        }

        if ($this->toTimeZone) {
            return (new \DateTimeImmutable($value))->setTimezone(new \DateTimeZone($this->toTimeZone));
        }

        return new \DateTimeImmutable($value);
    }
}
