<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\CompanyUser;
use App\Models\Reward;
use App\Models\RewardsExport;
use App\Models\Statics;
use App\Models\User;

// Ensure your User model is correctly imported
use App\Models\UsersExport;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Models\Rewards_detail;
use Illuminate\Support\Facades\DB;
use Morilog\Jalali\CalendarUtils;
use Morilog\Jalali\Jalalian;
use Vtiful\Kernel\Excel;

class RewardController extends Controller
{
    public function company($uuid)
    {
        //$uuid = url()->uuid;
        $company = Company::query()->where('uuid', $uuid)->first();
        if (Auth::check())
            $this->connect($uuid);
        return view('site.company', compact('company'));
    }

    public function connect($uuid)
    {
        //$uuid = url()->uuid;
        $company = Company::query()->where('uuid', $uuid)->first();
        if (CompanyUser::query()->where('company_id', $company->id)->where('user_id', Auth::id())->exists()) {
            return redirect(env('SITE_URL') . '/companies');
        }

        $companyUser = new CompanyUser();
        $companyUser->company_id = $company->id;
        $companyUser->user_id = Auth::user()->id;
        $companyUser->save();
        return redirect(env('SITE_URL') . '/companies');
    }

    public function randomReward()
    {
        if (!Auth::user()) {
            return;
        }
        date_default_timezone_set('Asia/Tehran');

        $companyId = $_POST['companyId'];
        $found = CompanyUser::query()->where('company_id', $companyId)->where('user_id', Auth::id())->first();
        if ($found == null) {
            return ['success' => false, 'message' => "دسترسی ندارید"];
        }
        if ($found->is_used == 1) {
            return ['success' => false, 'message' => "شما تاست رو ریختی"];
        }
        $found->is_used = 1;
        $found->save();
        $user = User::query()->find(Auth::user()->id);

        $query = Rewards_detail::query()
            ->selectRaw('rewards_details.*')
            ->join('rewards', 'reward_id', '=', 'rewards.id')
            ->where('company_id', $companyId)
            ->where('is_used', 0)
            ->where('is_emergency', 0)
            ->where('random_dt', '<', date('Y-m-d H:i:s'));
        $p = $user->phone;
        if (
            !str_starts_with($p, '0920')
            && !str_starts_with($p, '0921')
            && !str_starts_with($p, '0922')
            && !str_starts_with($p, '0923')
            && !str_starts_with($p, '920')
            && !str_starts_with($p, '921')
            && !str_starts_with($p, '922')
            && !str_starts_with($p, '923')
        ) {
            $query->where('exclusive_rightel', 0);
        }
        $rewardDetail = $query->first();
        if ($rewardDetail != null) {
            $rewardDetail = Rewards_detail::query()->find($rewardDetail->id);
            $rewardDetail->is_used = 1;
            $rewardDetail->user_id = Auth::user()->id;
            $rewardDetail->save();
            //DB::table('rewards_details')->->update(['is_used' => 1, 'user_id' => Auth::user()->id]);
            //dd($rewardDetail);
            $smsTemplateId = $rewardDetail->rewards->sms_template_id ?? '253673';
            Statics::sms([
                'mobile' => $user->phone,
                'templateId' => $smsTemplateId,
                'parameters' => [
                    [
                        'name' => 'name',
                        'value' => $user->fullname,
                    ],
                    [
                        'name' => 'pin',
                        'value' => $rewardDetail->reward_code,
                    ],
                ],
            ]);
            return ['success' => true, 'message' => "تبریک شما برنده جایزه شدید جایزه شما: <br /> $rewardDetail->reward"];
        }
        return ['success' => false, 'message' => "ممنون از حضور شما متاسفانه برنده نشدید"];
    }

    public function createRandomDt($rewardId)
    {
        return Rewards_detail::makeDt($rewardId);
    }

    public function Reward()
    {

        $Reward = Reward::query()->paginate(10);
        // dd($Company);
        return view('admin.Reward', compact('Reward'));
    }

    public function info(Request $request)
    {
        $reward = Reward::query()->find($request->id);
        //\Morilog\Jalali\Jalalian::forge($item->start_dt)->format('Y-m-d H:i:s')
        $reward->start_d = \Morilog\Jalali\Jalalian::forge(date_format(date_create($reward->start_dt), 'Y-m-d'))->format('Y-m-d');
        $reward->start_t = date_format(date_create($reward->start_dt), 'H:i:s');
        $reward->end_d = \Morilog\Jalali\Jalalian::forge(date_format(date_create($reward->end_dt), 'Y-m-d'))->format('Y-m-d');
        $reward->end_t = date_format(date_create($reward->end_dt), 'H:i:s');
        return $reward;
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'company_id' => 'required',
            'total' => 'required',
            'total_emergency' => 'required',
        ]);

        $inputs = $request->all();
        //dd($inputs);
        $reward = null;
        if (isset($inputs['id']) && strlen($inputs['id']) > 0) {
            $reward = Reward::query()->find($inputs['id']);
            unset($inputs['id']);
        }
        if (isset($inputs['start_d']) && strlen($inputs['start_d']) > 0) {
            $jDate = Statics::fixDate($inputs['start_d']);
            if ($jDate != null)
                $inputs['start_dt'] = \Morilog\Jalali\Jalalian::fromFormat('Y-m-d', $jDate)->toCarbon()->format('Y-m-d') . ' ' . $inputs['start_t'];
            else
                $inputs['start_dt'] = null;

        } else {
            $inputs['start_dt'] = null;
        }
        if (isset($inputs['end_d']) && strlen($inputs['end_d']) > 0) {
            $jDate = Statics::fixDate($inputs['end_d']);
            if ($jDate != null)
                $inputs['end_dt'] = \Morilog\Jalali\Jalalian::fromFormat('Y-m-d', $jDate)->toCarbon()->format('Y-m-d') . ' ' . $inputs['end_t'];
            else
                $inputs['end_dt'] = null;
        } else {
            $inputs['end_dt'] = null;
        }

        unset($inputs['end_d']);
        unset($inputs['start_d']);
        unset($inputs['start_t']);
        unset($inputs['end_t']);

        if (!$reward) {
            $reward = new Reward();
        }
        $reward->fill($inputs);
        $reward->save();
        return back()->with('success', 'ثبت موفق');
    }

    public function details(Request $request)
    {
        $items = Rewards_detail::query()
            ->selectRaw('rewards_details.*,fullname,phone')
            ->leftJoin('users', 'user_id', '=', 'users.id')
            ->where('reward_id', $request->id)
            ->orderByRaw('id DESC')
            ->paginate(10);

        $usedCount = Rewards_detail::query()
            ->join('users', 'user_id', '=', 'users.id')
            ->where('reward_id', $request->id)
            ->where('is_used', 1)
            ->count();
        return view('admin.reward_detail', compact('items', 'usedCount'));
    }

    public function delete(Request $request)
    {
        $request->validate([
            'id' => 'required',
        ]);
        Rewards_detail::query()->where('reward_id', $_POST['id'])->where('is_used', 0)->delete();
        $reward = Reward::query()->find($_POST['id']);
        $reward->delete();
        return redirect()->back();
    }

    public function deleteDetail(Request $request)
    {
        $request->validate([
            'id' => 'required',
        ]);
        Rewards_detail::query()->where('id', $_POST['id'])->delete();
        return back()->with('success', 'حذف موفق');
    }

    public function importExcel(Request $request)
    {
        $request->validate([
            'excelFile' => 'required',
        ]);
        $inputs = $request->all();
        $reward_id = $inputs['reward_id'];
        $rewardObj = Reward::query()->find($reward_id);

        $data = \Maatwebsite\Excel\Facades\Excel::toArray(null, $_FILES['excelFile']['tmp_name']);
        if (count($data) > 0) {
            $usedCount = Rewards_detail::query()
                ->where('reward_id', $reward_id)
                ->where('is_used', 1)
                ->where('is_emergency', 0)
                ->count();
            $counts = $rewardObj->total - $usedCount;
            if (count($data[0]) > $counts) {
                return back()->withErrors(['pass' => "حد اکثر تعداد $counts قابل ثبت است."]);
            }
            $start_dt = null;
            if (isset($inputs['start_d']) && strlen($inputs['start_d']) > 0) {
                $jDate = Statics::fixDate($inputs['start_d']);
                if ($jDate != null)
                    $start_dt = \Morilog\Jalali\Jalalian::fromFormat('Y-m-d', $jDate)->toCarbon()->format('Y-m-d') . ' ' . $inputs['start_t'];

            }
            if ($start_dt == null || $start_dt < $rewardObj->start_dt) {
                return back()->withErrors(['pass' => "تاریخ شروع نامعتبر"]);
            }
            $end_dt = null;
            if (isset($inputs['end_d']) && strlen($inputs['end_d']) > 0) {
                $jDate = Statics::fixDate($inputs['end_d']);
                if ($jDate != null)
                    $end_dt = \Morilog\Jalali\Jalalian::fromFormat('Y-m-d', $jDate)->toCarbon()->format('Y-m-d') . ' ' . $inputs['end_t'];
            }
            if ($end_dt == null || $end_dt > $rewardObj->end_dt) {
                return back()->withErrors(['pass' => "تاریخ پایان نامعتبر"]);
            }
            $startTime = Carbon::parse($start_dt);
            $finishTime = Carbon::parse($end_dt);
            $totalDuration = $startTime->diffInSeconds($finishTime);

            foreach ($data[0] as $value) {
                $reward = $value[0];
                $reward_code = $value[1];
                if (!Rewards_detail::query()->where('reward_id', $reward->id)->where('reward_code', $reward_code)->exists()) {
                    $sec = rand(0, $totalDuration);
                    $st = Carbon::parse($start_dt);
                    $startTTemp = $st->addSecond($sec);
                    $rewardDetail = new Rewards_detail();
                    $rewardDetail->user_id = null;
                    $rewardDetail->is_emergency = 0;
                    $rewardDetail->is_used = 0;
                    $rewardDetail->reward_code = $reward_code;
                    $rewardDetail->reward = $reward;
                    $rewardDetail->reward_id = $reward_id;
                    $rewardDetail->random_dt = $startTTemp;
                    $rewardDetail->save();
                }
            }
            return back()->with(['success' => "ثبت موفق"]);
        }
        return back()->withErrors(['pass' => "ثبت ناموفق"]);
    }

    public function reportExcel(Request $request)
    {
        return (new RewardsExport($request->id))->download('winners.xlsx');
    }


}
