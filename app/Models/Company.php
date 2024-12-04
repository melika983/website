<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{

    protected $fillable = [
        'name',
        'address',
        'contact_name',
        'contact_position',
        'contact_phone',
        'description',
        'uuid',
    ];
    public function CreateRewardTables()
    {
        return $this->hasMany(Reward::class);
    }

    public function user()
    {
        return $this->belongsToMany(User::class, 'company_user');
    }


}
