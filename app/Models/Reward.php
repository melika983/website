<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reward extends Model
{
    public function CreateCompanyTable()
    {
        return $this->belongsTo(Company::class);
    }

    protected $fillable = [
        'name',
        'description',
        'company_id',
        'start_dt',
        'end_dt',
        'total',
        'total_emergency',

    ];
}
