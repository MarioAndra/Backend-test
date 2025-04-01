<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Inquiry extends Model
{

    protected $fillable = [
        'name',
        'email',
        'phone',
        'message',
        'company_id',
        'user_id',

    ];

    protected $appends = [
        'created_from'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];
    public function company()
    {
        return $this->belongsTo(Company::class);
    }


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //! Accessories
    public function getCreatedFromAttribute()
    {
        Carbon::setLocale('ar');
        $diff = $this->created_at->locale('ar')->diffForHumans();
        return preg_replace('/(d+)/', '<strong>$1</strong>', $diff);
    }
}
