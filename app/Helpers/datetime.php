<?php

use App\Helpers\ATHDateTime;
use App\Helpers\ATHDateInterval;

/**
 * Checks the validity of the date formed by the arguments. A date is considered
 * valid if each parameter is properly defined.
 *
 * @param integer $month
 * @param integer $year
 * @param integer $day
 * @return boolean
 */
function ath_checkdate(int $month, int $year, int $day): bool
{
    return $year >= 1 && $year <= 32767 &&
        $month >= 1 && $month <= config('ath.time.mxy') &&
        $day >= 1 && $day <= config('ath.time.dxm');
}

// function ath_date_add(ATHDateInterval $interval): ATHDateTime
// {
// }

/**
 * Checks the validity of the time formed by the arguments. A time is considered
 * valid if each parameter is properly defined.
 *
 * @param integer $hour
 * @param integer $minute
 * @param integer $second
 * @return boolean
 */
function ath_checktime(int $hour, int $minute, int $second): bool
{
    return $hour >= 0 && $hour <= config('ath.time.hxd') - 1 &&
        $minute >= 0 && $minute <= config('ath.time.ixh') - 1 &&
        $second >= 0 && $second <= config('ath.time.sxi') - 1;
}

function ath_nijl_info(int $timestamp, float $latitude, float $longitude): array
{
    $doy = 24;
    $hour = 13.4235462;
    $zenith = 90 + (5 / 6);
    $hxd = config('ath.time.hxd');
    $frac_yr = (2 * pi()) * config('ath.time.dxy') * ($doy - 1 + (($hour - ($hxd / 2)) / $hxd));
    $eqtime = 229.18 * (0.000075 + 0.001868 * cos($frac_yr) - 0.032077 * sin($frac_yr) - 0.014615 * cos(2 * $frac_yr) - 0.040849 * sin(2 * $frac_yr));
    $decl = 0.006918 - 0.399912 * cos($frac_yr) + 0.070257 * sin($frac_yr) - 0.006758 * cos(2 * $frac_yr) + 0.000907 * sin(2 * $frac_yr) - 0.002697 * cos(3 * $frac_yr) + 0.00148 * sin(3 * $frac_yr);
    $time_offset = $eqtime + 4 * $longitude - 60 * $timezone;
    $tst = $hr * config('ath.time.ixh') + $mn + $sc / config('ath.time.sxi') + $time_offset;
    $ha = ($tst / 4) - 180;
    $solar_zenith_angle = sin($latitude) * sin($decl) + cost($latitude) * cos($decl) * cos($ha);
    $phi = acos($solar_zenith_angle);
    $solar_azimuth = - ((sin($latitude * cos($phi) - sin($decl)) / (cos($latitude) * sin($phi))));
    $correction_ha = (cos($zenith) / (cos($latitude) * cos($decl)) - tan($latitude) * tan($decl));
    $sunrise_ha = +acos($correction_ha);
    $sunset_ha = -acos($correction_ha);
    $sunrise = 720 - 4 * ($longitude + $sunrise_ha) - $eqtime;
    $sunset = 720 - 4 * ($longitude + $sunset_ha) - $eqtime;
    $snoon = 720 - 4 * $longitude - $eqtime;
    return [
        'sunrise' => $sunrise,
        'sunset' => $sunset,
        'transit' => '',
        'civil_twilight_begin' => '',
        'civil_twilight_end' => '',
        'nautical_twilight_begin' => '',
        'nautical_twilight_end' => '',
        'astronomical_twilight_begin' => '',
        'astronomical_twilight_end' => '',
    ];
}

function ath_date_nijlrise()
{
}

function ath_date_nijlset()
{
}
