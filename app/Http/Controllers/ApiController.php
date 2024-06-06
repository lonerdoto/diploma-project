<?php

namespace App\Http\Controllers;

use App\Models\EmployeeApplication;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class ApiController extends Controller
{

    public function getTopEmployees()
    {
        $oneWeekAgo = Carbon::now()->subWeek();
        $topEmployees = DB::table('employee_applications')
            ->select('user_id', DB::raw('count(*) as count'))
            ->where('created_at', '>=', $oneWeekAgo)
            ->groupBy('user_id')
            ->orderByDesc('count')
            ->limit(7)
            ->get();
        $topEmployees = $topEmployees->map(function ($item) {
            $employee = DB::table('users')->find($item->user_id);
            $item->user_name = $employee ? $employee->name : 'Unknown';
            return $item;
        });
        return response()->json($topEmployees);
    }
    public function getApplicationsData($period)
    {
        $now = Carbon::now();
        switch ($period) {
            case 'day':
                $start = $now->startOfDay();
                break;
            case 'week':
                $start = $now->startOfWeek();
                break;
            case 'month':
                $start = $now->startOfMonth();
                break;
            default:
                return response()->json(['error' => 'Invalid period'], 400);
        }
        $applications = DB::table('employee_applications')
            ->select(DB::raw('DATE_FORMAT(created_at, "%d-%m-%Y") as date'), DB::raw('count(*) as count'))
            ->where('created_at', '>=', $start)
            ->groupBy('date')
            ->orderBy('date')
            ->get();
        return response()->json($applications);
    }
    public function getCalculatedAnalyticsData() {
        $today = Carbon::today();
        $applicationsCount = DB::table('employee_applications')->count();
        $applicationsTodayCount = EmployeeApplication::whereDate('created_at', $today)->count();
        $usersCount = DB::table('users')->count();
        $usersTodayCount = User::whereDate('created_at', $today)->count();
        $acceptedApplicationsCount = DB::table('employee_applications')
            ->where('status', 'Принято')
            ->count();
        $acceptedApplicationsTodayCount = EmployeeApplication::whereDate('created_at', $today)
            ->where('status', 'Принято')
            ->count();
        $newApplicationsCount = DB::table('employee_applications')
            ->where('status', 'Новое')
            ->count();
        $newApplicationsTodayCount = EmployeeApplication::whereDate('created_at', $today)
            ->where('status', 'Новое')
            ->count();
        return response()->json([
            'applicationsCount' => $applicationsCount,
            'applicationsTodayCount' => $applicationsTodayCount,
            'usersCount' => $usersCount,
            'usersTodayCount' => $usersTodayCount,
            'acceptedApplicationsCount' => $acceptedApplicationsCount,
            'acceptedApplicationsTodayCount' => $acceptedApplicationsTodayCount,
            'newApplicationsCount' => $newApplicationsCount,
            'newApplicationsTodayCount' => $newApplicationsTodayCount
        ]);
    }
    public function getUserStat($userId) {
        $totalApplications = EmployeeApplication::where('user_id', $userId)->count();
        $acceptedApplications = EmployeeApplication::where('user_id', $userId)
            ->where('status', 'Принято')
            ->count();
        $declinedApplications = EmployeeApplication::where('user_id', $userId)
            ->where('status', 'Отклонено')
            ->count();
        return response()->json([
            'total' => $totalApplications,
            'accepted' => $acceptedApplications,
            'declined' => $declinedApplications
        ]);
    }
}
