<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Company extends Model
{
    protected $fillable = [
        'name',
        'phone',
        'email',
        'industry_id',
        'country_id',
        'user_id',
    ];

    protected $appends = [
        'created_from'
    ];
    protected $hidden = [
        'created_at',
        'updated_at'
    ];



    public function inquiries()
    {
        return $this->hasMany(Inquiry::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function industry()
    {
        return $this->belongsTo(Industry::class);
    }


    //! Accessories
    public function getCreatedFromAttribute()
    {
        Carbon::setLocale('ar');
        $diff = $this->created_at->locale('ar')->diffForHumans();
        return preg_replace('/(d+)/', '<strong>$1</strong>', $diff);
    }
}
