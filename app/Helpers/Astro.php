<?php

namespace App\Helpers;

define('SBC', 5.670373e-8);
define('INV360', 1 / 360);
define('ARC', 360 / 28);
define('AU', 149597870700);

class Astro
{
    public int $seed, $init_value;

    public function __construct($seed = null)
    {
        $this->seed = $seed ?? config('ath.galaxy.seed');
        $this->modifier = config('ath.long_max');
        $this->init_value = (48271 * $this->seed % $this->modifier);
    }

    public function galactic_habitable_zone($radius = null): array
    {
        $radius = $radius ?? config('ath.galaxy.g_radius');
        $inner = $radius * .47;
        $outer = $radius * .60;
        return ['inner_radius' => $inner, 'outer_radius' => $outer];
    }

    public function stellar_objects($stellar_density = null, $g_radius = null): array
    {
        $stellar_density = $stellar_density ?? config('ath.galaxy.stellar_density');
        $g_radius = $g_radius ?? config('ath.galaxy.g_radius');
        $o = round((($stellar_density * ((4 / 3) * PI * $g_radius ^ 3)) * 0.9 * 0.0000003), 0);
        $b = round((($stellar_density * ((4 / 3) * PI * $g_radius ^ 3)) * 0.9 * 0.0013), 0);
        $a = round((($stellar_density * ((4 / 3) * PI * $g_radius ^ 3)) * 0.9 * 0.006), 0);
        $f = round((($stellar_density * ((4 / 3) * PI * $g_radius ^ 3)) * 0.9 * 0.03), 0);
        $g = round((($stellar_density * ((4 / 3) * PI * $g_radius ^ 3)) * 0.9 * 0.076), 0);
        $k = round((($stellar_density * ((4 / 3) * PI * $g_radius ^ 3)) * 0.9 * 0.121), 0);
        $m = round((($stellar_density * ((4 / 3) * PI * $g_radius ^ 3)) * 0.9 * 0.7645), 0);
        $d = round((($stellar_density * ((4 / 3) * PI * $g_radius ^ 3)) * 0.09), 0);
        $lty = round((($stellar_density * ((4 / 3) * PI * $g_radius ^ 3)) * 2.5), 0);
        $other = round((($stellar_density * ((4 / 3) * PI * $g_radius ^ 3)) * 0.01), 0);
        $total = $o + $b + $a + $f + $g + $k + $m + $d + $lty + $other;

        return [
            'O' => $o, 'B' => $b, 'A' => $a, 'F' => $f,
            'G' => $g, 'K' => $k, 'M' => $m, 'D' => $d,
            'L/T/Y' => $lty, 'Other' => $other,
            'Total' => $total,
        ];
    }

    public function star_systems()
    {
        $total_objects = self::stellar_objects()['Total'];
        $ss4 = round((($total_objects / 1.58) * 0.03), 0);
        $ss3 = round((($total_objects / 1.58) * 0.08), 0);
        $ss2 = round((($total_objects / 1.58) * 0.33), 0);
        $ss1 = $total_objects - (($ss2 * 2) + ($ss3 * 3) + ($ss4 * 4));
        $sst = $ss1 + $ss2 + $ss3 + $ss4;
        return [
            'single_star_systems' => $ss1,
            'binary_star_systems' => $ss2,
            'triple_star_systems' => $ss3,
            'quadruple_star_systems' => $ss4,
            'tn_star_systems' => $sst,
        ];
    }

    public function star_system_coordinate_generator($radius = null)
    {
        $radius = $radius ?? config('ath.galaxy.n_radius');
        $sst = self::star_systems()['tn_star_systems'];
        $star_systems = ['Home Star System' => ['x' => 0, 'y' => 0, 'z' => 0, 'ly' => 0]];
        for ($ssc = 1; $ssc <= $sst; $ssc++) {
            $name = 'Star System #' . $ssc;
            $rho_raw[$ssc] = (48271 * ($ssc > 1 ? $phi_raw[$ssc - 1] : $this->init_value)) % $this->modifier;
            $theta_raw[$ssc] = (48271 * $rho_raw[$ssc]) % $this->modifier;
            $phi_raw[$ssc] = (48271 * $theta_raw[$ssc]) % $this->modifier;
            $rho_norm[$ssc] = $rho_raw[$ssc] / $this->modifier;
            $theta_norm[$ssc] = $theta_raw[$ssc] / $this->modifier;
            $phi_norm[$ssc] = $phi_raw[$ssc] / $this->modifier;
            $rho[$ssc] = $rho_norm[$ssc] ^ (1 / 3) * $radius;
            // $rho[$ssc] = $rho_norm[$ssc] * $radius;
            $theta[$ssc] = $theta_norm[$ssc] * 2 * PI;
            $phi[$ssc] = acosd(2 * $phi_norm[$ssc] - 1);

            $x[$ssc] = $rho[$ssc] * sind($phi[$ssc]) * cosd($theta[$ssc]);
            $y[$ssc] = $rho[$ssc] * sind($phi[$ssc]) * sind($theta[$ssc]);
            $z[$ssc] = $rho[$ssc] * cosd($phi[$ssc]);
            // dump((float)($rho_norm[$ssc]) * $radius);
            array_push($star_systems, [$name => ['x' => $x[$ssc], 'y' => $y[$ssc], 'z' => $z[$ssc], 'ly' => $rho[$ssc]]]);
        }
        dump(min($rho[1], $rho[$sst]), max($rho[1], $rho[$sst]));
        return $star_systems;
    }
}

function nijl(int $y, int $m, int $d, float $lon = null, float $lat = null)
{
    $lon = $lon ?? config('ath.longitude');
    $lat = $lat ?? config('ath.latitude');
    $days = days_from_civil($y, $m, $d);
    $Jdate = 2494800 + $days;
    $n0 = ($Jdate - 2494800 - 0.0009) - ($lon / 360);
    $n = round($n0);
    $J0 = 2494800 + 0.0009 + ($lon / 360) + $n;
    $M = (357.2591 + 0.98560028 * ($J0 - 2494800)) % 360;
    $C = (1.9148 * sind($M)) + (0.02 * sind(2 * $M)) + (0.0003 * sind(3 * $M));
    $el_lon = ($M + 102.9372 + $C + 180) % 360;
    $Jtransit = $J0 + (0.0053 * sind($M)) - (0.0069 * sind(2 * $el_lon));
    $hour_angle = asind(sind($el_lon) * sind(23.45));
    $H = acosd((sind(-0.83) - sind($lat) * sind($hour_angle)) / (cosd($lat) * cosd($hour_angle)));
    $J00 =  2494800  +  0.0009  +  (($H  +  $lon) / 360)  +  $n;
    $Jset = $J00 + (0.0053 * sind($M)) - (0.0069 * sind(2 * $el_lon));
    $Jrise = $Jtransit - ($Jset - $Jtransit);
}






function max_age($mass = null): float|false
{
    $mass = $mass ?? config('ath.nijl.mass');
    $luminosity = luminosity($mass);
    return ($mass >= .075 && $mass <= 100) ? ($mass / $luminosity) * 10 : false;
}

function radius($mass = null): float|false
{
    $mass = $mass ?? config('ath.nijl.mass');
    if ($mass > .075 && $mass <= 100) {
        return ($mass < 1) ? $mass ^ .8 : $mass ^ .57;
    } else {
        return false;
    }
}

function density($mass = null): float|false
{
    $mass = $mass ?? config('ath.nijl.mass');
    if ($mass > .075 && $mass <= 100) {
        $radius = radius($mass);
        return $mass / $radius ^ 3;
    } else {
        return false;
    }
}

function luminosity(float $mass = null)
{
    $mass = $mass ?? config('ath.nijl.mass');
    $aM = (-141.7 * $mass ^ 4) + (232.4 * $mass ^ 3) - (121.1 * $mass ^ 2) + (33.29 * $mass) + .215;
    if ($mass > .075 && $mass <= 100) {
        if ($mass < .43) {
            $luminosity = .23 * $mass ^ 2.3;
        } elseif ($mass > .43 && $mass <= 2) {
            $luminosity = $mass ^ 4;
        } elseif ($mass > 2 && $mass <= 55) {
            $luminosity = 1.4 * $mass ^ 3.5;
        } else {
            $luminosity = 32000 * $mass;
        }
    } else {
        return false;
    }
    return (float) $luminosity;
    // return (float) $mass ^ $aM;
}

function temperature($mass = null): float|false
{
    $mass = $mass ?? config('ath.nijl.mass');
    if ($mass > .075 && $mass <= 100) {
        $radius = radius($mass);
        return (($mass / $radius ^ 2) ^ .25) * 5776;
    } else {
        return false;
    }
}

function habitable_zone($mass = null): array|null
{
    // =IF(AND(C13>=0.075,C13<=100),ROUND(SQRT(C17/1.1),3)&" - "&
    // ROUND(SQRT(C17/0.53),3),"NA")
    $mass = $mass ?? config('ath.nijl.mass');
    if ($mass > .075 && $mass <= 100) {
        $luminosity = luminosity($mass);
        $inner = sqrt($luminosity / 1.1);
        $outer = sqrt($luminosity / .53);
        return ['hz_inner' => $inner, 'hz_outer' => $outer];
    } else {
        return false;
    }
}

function inner_limit($mass = null)
{
    // =ROUND(2.455*($C$7*696340)*(($C$8*1408)/5400)^(1/3)/149600000,4)
    $radius = radius($mass) * 696300;
    $density = density($mass) * 1408;
    return 2.455 * $radius * ($density / 5400) ^ (1 / 3) / (AU / 1000);
}
