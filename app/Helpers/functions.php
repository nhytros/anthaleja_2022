<?php

use Illuminate\Support\Facades\Request;

define('PI', 3.14159265358979323846);
define('RADEG', 180 / PI);
define('DEGRAD', PI / 180);

function sind($x)
{
    return sin(($x) * DEGRAD);
}

function cosd($x)
{
    return cos(($x) * DEGRAD);
}

function tand($x)
{
    return tan(($x) * DEGRAD);
}

function atand($x)
{
    return (RADEG * atan($x));
}

function asind($x)
{
    return (RADEG * asin($x));
}

function acosd($x)
{
    return (RADEG * acos($x));
}

function atan2d($x, $y)
{
    return (RADEG * atan2($y, $x));
}

function multiexplode($delimiters = null, $input = "")
{
    $ready = str_replace($delimiters, '|', $input);
    return explode('|', $ready);
}

function genImage($width, $height)
{

    $id = rand(1, 1000);
    return "https://picsum.photos/id/{$id}/{$width}/{$height}.webp";
}

function getStatus($field, $reversed = false)
{
    $status = auth()->user()->character->$field;
    $val = [];
    if ($status <= 19) {
        $val = ['status' => $status ?? 0, 'color' => $reversed ? 'success' : 'secondary'];
    }
    if ($status >= 20) {
        $val = ['status' => $status, 'color' => $reversed ? 'primary' : 'danger'];
    }
    if ($status >= 40) {
        $val = ['status' => $status, 'color' => 'warning'];
    }
    if ($status >= 60) {
        $val = ['status' => $status, 'color' => $reversed ? 'danger' : 'primary'];
    }
    if ($status >= 80) {
        $val = ['status' => $status, 'color' => $reversed ? 'secondary' : 'success'];
    }
    return $val;
}

function athel()
{
    return config('ath.athel_symbol');
}

function duni()
{
    return config('ath.duni_symbol');
}

function toAthel($amount): string|array
{
    $data = [
        '1e63' => 'L',
        '1e60' => 'MI',
        '1e57' => 'N',
        '1e54' => 'O',
        '1e51' => 'PP',
        '1e48' => 'Q',
        '1e45' => 'R',
        '1e42' => 'S',
        '1e39' => 'TD',
        '1e36' => 'U',
        '1e33' => 'V',
        '1e30' => 'W',
        '1e27' => 'X',
        '1e24' => 'Y',
        '1e21' => 'Z',
        '1e18' => 'E',
        '1e15' => 'P',
        '1e12' => 'T',
        '1e9' => 'G',
        '1e6' => 'M',
        '1e3' => 'k',
        '1e0' => '',
    ];
    $decs = 2;
    $div = 1;
    $suffix = '';
    foreach ($data as $val => $sx) {
        if ($amount >= $val) {
            $suffix = $sx;
            $div = $val;

            break;
            // if ($amount <div 1e6) {
            //     $decs = 3;
            //     $div = 1;
            // }
        }
    }
    return athel() . ' ' . number_format($amount / $div, $decs, ';', ' ') . $suffix;
}

function fullAthel($amount)
{
    $athels = intval($amount);
    $duni = round(($amount - $athels) * 100, 0);
    return athel() . ' ' . $athels . ' ' . duni() . ' ' . $duni;
}

function gravatar($email, $size, $set = 'robohash')
{
    $hash = md5(strtolower($email));
    $url = "https://www.gravatar.com/avatar/{$hash}?r=g&d={$set}&s={$size}";
    return '<img src="' . $url . '" />';
}

function getIcon($group, $icon, $extras = [])
{
    $addictions = '';
    if ($extras) {
        foreach ($extras as $extra) {
            $addictions .= ' ' . $extra;
        }
    }
    $output = '<i class="' . $group . ' fa-' . $icon . $addictions . '">' . '</i>';
    return $output;
}

function getActivePage($page)
{
    return Request::is($page) ? ' active' : '';
}

function required_field($label)
{
    return $label . ' <span class="text-danger">*</span>';
}

function dred($key, $field, $model, $permission_group, $edit = false, $delete = false, $restore = false, $destroy = false)
{
    $user = auth()->user();
    $output = '';
    $output .= '<div class="btn-group" role="group" aria-label="Action Buttons">';
    // if ($edit && $user->can($permission_group . '.edit')) {
    // $output .= '<a href="' . route('admin.' . $model . '.edit', $key->$field) . '"';
    $output .= '<a href="' . route($model . '.edit', $key->$field) . '"';
    $output .= 'class="btn btn-primary btn-sm">';
    $output .= getIcon('fas', 'edit');
    $output .= '</a>';
    // }
    // if ($delete && $user->can($permission_group . '.delete')) {
    // $output .= '<a href="' . route('admin.' . $model . '.delete', $key->$field) . '"';
    $output .= '<a href="' . route($model . '.delete', $key->$field) . '"';
    $output .= 'class="btn btn-warning btn-sm">';
    $output .= getIcon('fas', 'trash');
    $output .= '</a>';
    // }
    // if ($restore && $user->can($permission_group . '.restore')) {
    if ($key->trashed()) {
        // $output .= '<a href="' . route('admin.' . $model . '.restore', $key->$field) . '"';
        $output .= '<a href="' . route($model . '.restore', $key->$field) . '"';
        $output .= 'class="btn btn-orange btn-sm">';
        $output .= getIcon('fas', 'undo');
        $output .= '</a>';
    }
    // }
    // if ($destroy && $user->can($permission_group . '.destroy')) {
    if ($key->trashed()) {
        // $output .= '<a href="' . route('admin.' . $model . '.destroy', $key->$field) . '"';
        $output .= '<a href="' . route($model . '.destroy', $key->$field) . '"';
        $output .= 'class="btn btn-danger btn-sm">';
        $output .= getIcon('fas', 'times');
        $output .= '</a>';
    }
    // }
    $output .= '</div>';
    return $output;
}
