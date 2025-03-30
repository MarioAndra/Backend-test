<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
    public function company()
    {
        return $this->belongsTo(Company::class);
    }


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
