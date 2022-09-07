<?php

namespace App\Http\Controllers\Traits;

trait CreateAndUpdateTable
{
    public static function CreateAndUpdateTableBoot($model)
    {
        if (auth()->check()) {
            static::creating(function ($model) {
                $model->created_by = auth()->user()->character->id;
            });

            static::updating(function ($model) {
                $model->updated_by = auth()->user()->character->id;
            });
        }
    }
}
