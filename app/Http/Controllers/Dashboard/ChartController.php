<?php

namespace App\Http\Controllers\Dashboard;

use App\Person;
use App\Traits\ConnectionTrait;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use LaravelEnso\Charts\Factories\Bar;
use LaravelEnso\Charts\Factories\Bubble;
use LaravelEnso\Charts\Factories\Doughnut;
use LaravelEnso\Charts\Factories\Line;
use LaravelEnso\Charts\Factories\Pie;
use LaravelEnso\Charts\Factories\Polar;
use LaravelEnso\Charts\Factories\Radar;
use LaravelEnso\Multitenancy\Enums\Connections;
use LaravelEnso\Multitenancy\Services\Tenant;

class ChartController extends Controller
{
    use ConnectionTrait;
    // use SystemConnection;

    public function line()
    {
        return (new Line())
            ->title('Income')
            ->labels(['January', 'February', 'March', 'April', 'May', 'June', 'July'])
            ->datasets([
                'Sales' => [65, 59, 80, 81, 26, 25, 10],
                'Revenue' => [15, 29, 60, 31, 56, 65, 44],
            ])->fill()
            ->get();
    }

    public function bar()
    {
        return (new Bar())
            ->title('Sales')
            ->labels(['Ian', 'Feb', 'Mar'])
            ->datasets([
                'Sales' => [1233, 1231, 3123],
                'Spendings' => [1250, 1730, 5300],
                'Profit' => [1250 - 1233, 1730 - 1231, 5300 - 3123],
            ])->get();
    }

    public function pie()
    {
        // \DB::table('some')->get();
        $male = \DB::table('people')->where('sex', 'M')->get()->count();
        $female = \DB::table('people')->where('sex', 'F')->get()->count();
        $unknown = \DB::table('people')->whereNull('sex')->get()->count();
        $sv = \Session::get('db', env('DB_DATABASE'));
        $user = Auth::user();
        $companies = $user->person->company();
        $current_db = \Session::get('companyId');

        // return $current_db;
        // return $sv;
        return (new Pie())
            ->title('Genders')
            ->labels(['Male', 'Female', 'Unknown'])
            ->datasets([$male, $female, $unknown])
            ->get();
    }

    public function doughnut()
    {
        return (new Doughnut())
            ->title('Colors Two')
            ->labels(['Green', 'Red', 'Azzure'])
            ->datasets([400, 50, 100])
            ->get();
    }

    public function radar()
    {
        return (new Radar())
            ->title('Habits')
            ->labels([
                'Eating', 'Drinking', 'Sleeping', 'Designing', 'Coding', 'Cycling', 'Running',
            ])
            ->datasets([
                '2005' => [65, 59, 90, 81, 56, 55, 40],
                '2006' => [28, 48, 40, 19, 96, 27, 100],
            ])->get();
    }

    public function polar()
    {
        return (new Polar())
            ->title('Again Colors')
            ->labels(['Green', 'Red', 'Azzure', 'Portocaliu', 'Purple'])
            ->datasets([11, 16, 7, 14, 14])
            ->get();
    }

    public function bubble()
    {
        return (new Bubble())
            ->title('City Population by Age')
            ->labels(['Geneva', 'Besel', 'Bucharest'])
            ->datasets([
                0 => [[1010, 59, 4800], [2011, 55, 1800], [1012, 45, 2000], [413, 58, 4400]],
                1 => [[2010, 48, 1700], [1211, 67, 1200], [2012, 96, 1233], [813, 35, 3000]],
                2 => [[1510, 44, 2000], [811, 62, 1500], [212, 55, 1299], [1213, 39, 4000]],
            ])->get();
    }

    // change database to use
    public function changedb(Request $request)
    {
        $prevConn = $this->getConnection();
        $company_id = $request->get('company_id');
        if (! empty($company_id)) {
            $db = Connections::Tenant.$company_id;
            $this->setConnection(Connections::Tenant, $db);
        } else {
            $this->setConnection('mysql');
        }
        $changeConn = $this->getConnection();

        $peoplesattached = \DB::connection($changeConn)->table('people')->get()->count();
        $familiesjoined = \DB::connection($changeConn)->table('families')->get()->count();

        return json_encode([
            'changedb' => $prevConn === $changeConn ? true : false,
            'familiesjoined' => $familiesjoined,
            'peoplesattached' => $peoplesattached,
        ]);
    }

    // get companies of user.
    public function getDB()
    {
        $user = Auth::user();
        $companies = $user->person->companies()->get();
        $ret = [];
        $ret['company'] = $companies;

        return $ret;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    }

    public function trial()
    {
        $user = auth()->user();
        if ($user->subscribed('default')) {
            $days = Carbon::now()->diffInDays(Carbon::parse($user->subscription('default')->asStripeSubscription()->current_period_end));
        } else {
            $days = Carbon::now()->diffInDays($user->trial_ends_at);
        }

        return ['days' => $days];
    }
}
