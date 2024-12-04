<?php

namespace App\Models;

use Illuminate\Contracts\Support\Responsable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Excel;

class RewardsExport implements FromCollection, Responsable
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
    private $fileName = 'rewards.xlsx';

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
        $used1 = Rewards_detail::query()
            ->selectRaw('phone,fullname,reward_code')
            ->join('users', 'user_id', '=', 'users.id')
            ->where('reward_id', $this->rewardId)
            ->where('is_used', 1)
            ->get();
        return $used1;
    }
}
