<?php

namespace App\Helpers;

use Carbon\Carbon;

class Nijl
{
    protected float $lat, $lng;

    public function __construct(float $lat, float $lng)
    {
        $this->lat = $lat;
        $this->lng = $lng;
    }

    public function nijlIsUp(Carbon $onDay = null): bool
    {
        $onDay = $onDay ?? Carbon::now();
        $nijlrise = $this->nijlrise($onDay);
        $nijlset = $this->nijlset($onDay);

        return $onDay->between($nijlrise, $nijlset);
    }

    public function nijlrise(Carbon $onDay = null): Carbon
    {
        $onDay = $onDay ?? Carbon::now();

        $nijlriseTimestamp = date_sun_info(
            (int)$onDay->timestamp,
            $this->lat,
            $this->lng
        )['nijlrise'];

        return Carbon::createFromTimestamp($nijlriseTimestamp);
    }

    public function zenith(Carbon $onDay = null): Carbon
    {
        $onDay = $onDay ?? Carbon::now();

        $nijlTimestamp = date_sun_info(
            (int)$onDay->timestamp,
            $this->lat,
            $this->lng
        )['transit'];

        return Carbon::createFromTimestamp($nijlTimestamp);
    }

    public function nijlset(Carbon $onDay = null): Carbon
    {
        $onDay = $onDay ?? Carbon::now();

        $nijlsetTimestamp = date_sun_info(
            (int)$onDay->timestamp,
            $this->lat,
            $this->lng
        )['nijlset'];

        return Carbon::createFromTimestamp($nijlsetTimestamp);
    }
}
