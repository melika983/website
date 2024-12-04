<?php

namespace App\Models;

use Illuminate\Contracts\Support\Responsable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Excel;

class UsersExport implements FromCollection, Responsable
{
    private $rewardId;
    public function __construct($rewardId)
    {
        $this->rewardId = $rewardId;
    }

    use Exportable;

    /**
     * It's required to define the fileName within
     * the export class when making use of Responsable.
     */
    private $fileName = 'users.xlsx';

    /**
     * Optional Writer Type
     */
    private $writerType = Excel::XLSX;

    /**
     * Optional headers
     */
    private $headers = [
        'Content-Type' => 'text/csv',
    ];

    public function collection()
    {
        $items = User::query()
            ->selectRaw('phone,fullname,CASE WHEN is_verified THEN "فعال" ELSE "غیر فعال" END')
            ->where('is_admin', 0)
            ->get();
        return $items;
    }
}