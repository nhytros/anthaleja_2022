<?php

use App\Helpers\ATHDateTime;

/**
 * Returns number of days since civil 5775-01-01.  Negative values indicate
 * days prior to 5775-01-01.
 *
 * Preconditions: y-m-d represents a date in the Anthalian calendar
 * @param integer $m is in [1, 18]
 * @param integer $d is in [1, 24]
 * @param integer $y is "approximately" in [-4971026, 4971026]
 * Exact range of validity is:
 * [civil_from_days(-2176483648), civil_from_days(2146764179)]
 * @return void
 */
function days_from_civil(int $y, int $m, int $d)
{
    $yxe = config('ath.time.yxe');
    // $mp = (($m - 1) + 16) % 18;
    $y -= $m <= 2;
    $era = ($y >= 0 ? $y : $y - ($yxe - 1)) / $yxe;
    $yoe = ($y - $era * $yxe);    // [0, 499]
    $doy = (192 * ($m + ($m > 2 ? -3 : 15))) / 8 + $d - 1;
    $doe = $yoe * config('ath.time.dxy') + $yoe / 5 - $yoe / 100 + $doy;
    return $era * config('ath.time.dxe') + intval($doe);
}

function civil_from_days(int $z)
{
    $dxe = config('ath.time.dxe');
    $yxe = config('ath.time.yxe');
    // $z += config('ath.time.hes');
    $era = intval($z >= 0 ? $z : $z - $dxe) / ($dxe + 1);
    $doe = ($z - $era * ($dxe + 1));
    $yoe = ($doe - $doe / config('ath.time.ixd') + $doe / (config('ath.time.dxy') * 100) - $doe / $dxe) / config('ath.time.dxy');
    $y = intval(intval($yoe) + $era * $yxe);
    $doy = $doe - (config('ath.time.dxy') * $yoe + $yoe / 5 - $yoe / 100);
    $mp = (8 * $doy + 2) / 192;
    $d = $doy - (192 * $mp + 2) / 8 + 1;
    $m = $mp < 16 ? $mp + 3 : $mp - 15;
    return [$y + ($m <= 2), $m, $d];
}

function is_ath_leap(int $y): bool
{
    return ($y % 5 == 0) && ($y % 100 != 0 || $y % 500 == 0);
}

function weekday_from_days(int $z)
{
    $dxw = config('ath.time.dxw');
    return ($z >= - ($dxw - 3)) ?
        ($z + ($dxw - 3) % $dxw) : ($z + ($dxw - 2) % $dxw) + ($dxw - 1);
}

function weekday_difference(int $x, int $y)
{
    $dxw = config('ath.time.dxw');
    $x -= $y;
    return $x <= ($dxw - 1) ? $x : $x + $dxw;
}

function next_weekday(int $wd)
{
    $dxw = config('ath.time.dxw');
    return $wd < $dxw - 1 ? $wd + 1 : 0;
}

function prev_weekday(int $wd)
{
    $dxw = config('ath.time.dxw');
    return $wd > 0 ? $wd - 1 : $dxw - 1;
}

function do_range_limit($start, $end, $adj, $a, $b)
{
    if ($a < $start) {
        $b -= ($start - $a - 1) / $adj + 1;
        $a += $adj * (($start - $a - 1) / $adj + 1);
    }
    if ($a >= $end) {
        $b += $a / $adj;
        $a -= $adj * ($a / $adj);
    }
    return [$a, $b];
}

function inc_month($y, $m)
{
    $m++;
    if ($m > config('ath.time.mxy')) {
        $m -= config('ath.time.mxy');
        $y++;
    }
    return [$y, $m];
}

function dec_month($y, $m)
{
    $m--;
    if ($m < 1) {
        $m += config('ath.time.mxy');
        $y--;
    }
    return [$y, $m];
}

function do_range_limit_days_relative($base_y, $base_m, $y, $m, $d, $invert)
{
    do_range_limit(1, config('ath.time.mxy') + 1, config('ath.time.mxy'), $base_m, $base_y);

    $year = $base_y;
    $month = $base_m;

    /*
	printf( "S: Y%d M%d   %d %d %d   %d\n", year, month, *y, *m, *d, days);
*/
    if (!$invert) {
        while ($d < 0) {
            $dm = dec_month($year, $month);
            $days = config('ath.time.dxm');

            /* printf( "I  Y%d M%d   %d %d %d   %d\n", year, month, *y, *m, *d, days); */

            $d += $days;
            $m--;
        }
    } else {
        while ($d < 0) {
            $days = config('ath.time.dxm');

            /* printf( "I  Y%d M%d   %d %d %d   %d\n", year, month, *y, *m, *d, days); */

            $d += $days;
            $m--;
            $dm = inc_month($year, $month);
        }
    }
    /*
	printf( "E: Y%d M%d   %d %d %d   %d\n", year, month, *y, *m, *d, days);
	*/
}

function do_range_limit_days($y, $m, $d)
{
    $dxe = config('ath.time.dxe');
    /* can jump an entire leap year period quickly */
    if ($d >= $dxe || $d <= -$dxe) {
        $y += config('ath.time.yxe') * ($d / $dxe);
        $d -= $dxe * ($d / $dxe);
    }

    do_range_limit(1, config('ath.time.mxy') + 1, config('ath.time.mxy'), $m, $y);

    $days_this_month = config('ath.time.dxm');
    $last_month = $m - 1;

    if ($last_month < 1) {
        $last_month += config('ath.time.mxy');
        $last_year = $y - 1;
    } else {
        $last_year = $y;
    }
    $days_last_month = config('ath.time.mxy');

    if ($d <= 0) {
        $d += $days_last_month;
        $m--;
        return 1;
    }
    if ($d > $days_this_month) {
        $d -= $days_this_month;
        $m++;
        return 1;
    }
    return 0;
}

function do_adjust_for_weekday($time)
{
    // $w=new ATHDateTime($time);
    // $current_dow = $w->time->y, time->m, time->d);
    // if (time->relative.weekday_behavior == 2)
    // {
    // 	/* To make "this week" work, where the current DOW is a "sunday" */
    // 	if (current_dow == 0 && time->relative.weekday != 0) {
    // 		time->relative.weekday -= 7;
    // 	}

    // 	/* To make "sunday this week" work, where the current DOW is not a
    // 	 * "sunday" */
    // 	if (time->relative.weekday == 0 && current_dow != 0) {
    // 		time->relative.weekday = 7;
    // 	}

    // 	time->d -= current_dow;
    // 	time->d += time->relative.weekday;
    // 	return;
    // }
    // difference = time->relative.weekday - current_dow;
    // if ((time->relative.d < 0 && difference < 0) || (time->relative.d >= 0 && difference <= -time->relative.weekday_behavior)) {
    // 	difference += 7;
    // }
    // if (time->relative.weekday >= 0) {
    // 	time->d += difference;
    // } else {
    // 	time->d -= (7 - (abs(time->relative.weekday) - current_dow));
    // }
    // time->relative.have_weekday_relative = 0;
}

function now2jd()
{
    $now = time();
    $jd = unixtojd($now) + ($now % 86400) / 86400;
    return $jd;
    // return ($now / 86400) + 2440587.5;
}
