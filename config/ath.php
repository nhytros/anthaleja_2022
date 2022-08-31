<?php
$rdn = 951586057;
$adn = 2494800;
$yxe = 500;
$mxy = 18;
$dxy = 432;
$dxe = $dxy * $yxe;
$dxm = 24;
$dxw = 7;
$hxd = 28;
$ixh = 60;
$ixd = $ixh * $hxd;
$sxi = 60;
$sxh = $sxi * $ixh;
$sxd = $sxh * $hxd;
$sxw = $sxd * $dxw;
$sxm = $sxd * $dxm;
$sxy = $sxd * $dxy;
$uxh = $sxh * 1e6;
$long_max = 2147483647;
$long_min = (-$long_max - 1);

return [
    'version' => '0.1.0',
    'email_suffix' => '@anthaleja.ath',
    'athel_symbol' => chr(234) . chr(156) . chr(178),
    'duni_symbol' => chr(196) . chr(145),
    'long_max' => $long_max,
    'long_min' => $long_min,
    'latitude' =>   36.6752718333,
    'longitude' => -36.5165126665,

    'galaxy' => [
        'seed' => 368895,
        'g_radius' => 2100,
        'n_radius' => 12,
        'stellar_density' => .00371
    ],
    'nijl' => [
        'mass' => 1.086998615541,
        'age' => 4.2,
        'spacing_factor' => .3495,
    ],


    'time' => [
        'rdn' => $rdn,
        'adn' => $adn,
        'hes' => 2494800,
        'mxy' => $mxy,
        'yxe' => $yxe,
        'dxe' => $dxe,
        'dxy' => $dxy,
        'dxm' => $dxm,
        'dxw' => $dxw,
        'hxd' => $hxd,
        'ixh' => $ixh,
        'ixd' => $ixd,
        'sxi' => $sxi,
        'sxi' => $sxi,
        'sxh' => $sxh,
        'sxd' => $sxd,
        'sxw' => $sxw,
        'sxm' => $sxm,
        'sxy' => $sxy,
        'uxh' => $uxh,
        'days' => ['0.Nijahr', '1.Majahr', '2.Bejahr', '3.Ĉejahr', '4.Dyjahr', '5.Fejahr', '6.Ĝejahr'],
        'months' => ['Ĝenamai', 'Febamai', 'Maramai', 'Apramai', 'Magamai', 'Ĝumai', 'Lumai', 'Agomai', 'Etamai', 'Oktamai', 'Enamai', 'Dekamai', 'Triamai', 'Kamai', 'Pentamai', 'Esamai', 'Ektamai', 'Beoktamai'],
    ],
    'locale' => [
        'abday' => ['0d', '1d', '2d', '3d', '4d', '5d', '6d'],
        'abmon' => ['1mo', '2mo', '3mo', '4mo', '5mo', '6mo', '7mo', '8mo', '9mo', '10mo', '11mo', '12mo', '13mo', '14mo', '15mo', '16mo', '17mo', '18mo'],
        'd_t_fmt' => '%a %d %b %Y %r %Z',
        'd_fmt' => '%m/%d/%Y',
        't_fmt' => '%r',
        'era' => '',
        'era_year' => '',
        'alt_digits' => '',
        'era_d_t_fmt' => '',
        'era_t_fmt' => '',
        'time-era-num-entries' => 0,
        'time-era-entries' => "S",
        'week-ndays' => 7,
        'week-1stday' => 19971130,
        'week-1stweek' => 1,
        'first_weekday' => 1,
        'first_workday' => 2,
        'cal_direction' => 1,
        'timezone' => '',
        'date_fmt' => "%a %b %e %r %Z %Y",
        'time-codeset' => "UTF-8",
    ],
    'numeric' => [
        'decimal_point' => ';',
        'thousand_sep' => ' ',
        'grouping' => '3;3',
    ],
    'monetary' => [
        'curr_symbol' => 'ATH ',
        'positive_sign' => '',
        'negative_sign' => '-',
    ],
    'litted' => [
        'c_prefix' => 'ld/',
        'u_prefix' => 'u/',
    ],
];
