<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Rewards_detail extends Model
{
    public static function makeDt($reward_id)
    {
        $reward = Reward::query()->find($reward_id);

        $startTime = Carbon::parse($reward->start_dt);
        $finishTime = Carbon::parse($reward->end_dt);
        $totalDuration = $startTime->diffInSeconds($finishTime);
        Rewards_detail::query()->where('reward_id', $reward_id)->where('is_used',0)->where('is_emergency',0)->delete();
        $usedCount = Rewards_detail::query()->where('reward_id', $reward_id)->where('is_used',1)->where('is_emergency',0)->count();
        $counts = $reward->total - $usedCount;
        while ($counts > 0) {
            $sec = rand(0, $totalDuration);
            $st = Carbon::parse($reward->start_dt);
            $startTTemp = $st->addSecond($sec);
            //print_r($startTTemp."<br/>");
            $rewardDetail = new Rewards_detail();
            $rewardDetail->user_id = null;
            $rewardDetail->is_emergency = 0;
            $rewardDetail->is_used = 0;
            $rewardDetail->reward_id = $reward_id;
            $rewardDetail->random_dt = $startTTemp;
            $rewardDetail->save();
            $counts--;
        }

        return $totalDuration;
    }
    public static function makeEmergencies($reward_id)
    {
        $reward = Reward::query()->find($reward_id);

        Rewards_detail::query()->where('reward_id', $reward_id)->where('is_used',0)->where('is_emergency',1)->delete();
        $usedCount = Rewards_detail::query()->where('reward_id', $reward_id)->where('is_used',1)->where('is_emergency',1)->count();
        $counts = $reward->total_emergency - $usedCount;
        while ($counts > 0) {
            $rewardDetail = new Rewards_detail();
            $rewardDetail->user_id = null;
            $rewardDetail->is_used = 0;
            $rewardDetail->is_emergency = 1;
            $rewardDetail->reward_id = $reward_id;
            $rewardDetail->random_dt = $reward->start_dt;
            $rewardDetail->save();
            $counts--;
        }
    }

    public function rewards() {
        return $this->belongsTo(Reward::class, 'reward_id');
    }

    protected $fillable = [
        'user_id',
        'is_used',
        'reward_id',
        'random_dt',

    ];
}
