<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    //
    protected $guarded = [];

    public function getActiveAttribute($attr)
    {
        return $this->activeOptions()[$attr];
    }


    protected $attributes = [
        'active' => 1
    ];



    public function scopeActive($qry)
    {
        return $qry->where('active', 1);
    }



    public function scopeInactive($qry)
    {
        return $qry->where('active', 0);
    }

    public function company()
    {
        return  $this->belongsTo(Company::class);
    }

    public function activeOptions()
    {

        return [
            1 => 'Active',
            0 =>  'Inactive',
            2 => 'InProgress'
        ];
    }
}
