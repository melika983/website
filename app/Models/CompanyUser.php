<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompanyUser extends Model
{
    protected $table = 'company_user';

    public function CreateRewardTables()
    {
        return $this->hasMany(Reward::class);
    }

    protected $fillable = [
        'company_id',
        'user_id',
        ' is_used'
    ];
}
