<?php

namespace App\Http\Controllers;

use App\Models\ApplicationType;
use App\Models\DispatcherApplication;
use App\Models\EmployeeApplication;
use App\Models\Status;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin.role');
    }
    public function showAdmin() {
        return view('admin.admin-welcome');
    }
    public function showUsersList(Request $request)
    {
        $roles = DB::table('roles')->get();
        $role = $request->input('application-type');
        $search = $request->{'user-search'};
        $queryBuilder = DB::table('users')->orderBy('created_at', 'desc');
        if (!empty($search)) {
            $queryBuilder->where('name', 'LIKE', "%$search%");
        }
        if(!empty($role)) {
            $queryBuilder->where('role', $role);
        }
        $users = $queryBuilder->paginate(16);
        return view('admin.users-list', [
            'users' => $users,
            'roles' => $roles,
            'userSearch' => $search
        ]);
    }
    public function deleteUser(Request $request)
    {
        $user = User::find($request->id);
        if(!empty($user)) {
            if($user->id !== auth()->id()) {
                $user->delete();
                return redirect()->back()->with('success', "Пользователь  « $user->name » удалён");
            } else {
                return redirect()->back()->with('success', "Нельзя удалить себя же");
            }
        } else {
            return redirect()->back()->withErrors("Ошибка, пользователь не найден");
        }
    }
    public function editUser(Request $request)
    {
        $user = User::find((int)$request->{'user-id'});
        if (!empty($user)) {
            $user->name = $request->{'input-name'};
            $user->{'director-name'} = $request->{'input-director-name'} == "Не указано" ? null : $request->{'input-director-name'};
            $user->department = $request->{'input-department'} == "Не указан" ? null : $request->{'input-department'};
            $user->phone = $request->{'input-phone'} == "Не указан" ? null : $request->{'input-phone'};
            $user->role = $request->{'select-role'};
            $user->save();
            return redirect()->back()->with('success', "Пользователь « $user->name » отредактирован");
        } else {
            return redirect()->back()->withErrors("Ошибка, пользователь не найден");
        }
    }
    public function showApplicationStatus()
    {
        $statuses = DB::table('statuses')->orderBy('created_at', 'desc')->paginate(12);
        return view('admin.add-application-status', [
            'statuses' => $statuses
        ]);
    }
    public function addApplicationStatus(Request $request)
    {
        $credentials = $request->validate([
            'status' => 'required'
        ]);
        Status::create($credentials);
        return redirect()->back()->with('success', "Новый статус создан");
    }
    public function deleteApplicationStatus(Request $request)
    {
        $status = Status::find($request->id);
        if(!empty($status)) {
            $status->delete();
            return redirect()->back()->with('success', "Статус «  $status->status » удалён");
        } else  return redirect()->back()->withErrors("Ошибка, статус не найден");
    }
    public function editApplicationStatus(Request $request)
    {
        $status = Status::find((int)$request->{'user-id'});
        if(!empty($status)) {
            $oldStatusName = $status->status;
            $status->status = $request->status;
            $status->save();
            return redirect()->back()->with('success', "Статус «  $oldStatusName » отредактирован");
        } else return redirect()->back()->withErrors("Ошибка, статус не найден");

    }
    public function showAddApplicationType()
    {
        $applicationTypes = DB::table('application_types')->orderBy('created_at', 'desc')->paginate(12);

        return view('admin.add-application-type', [
            'applicationTypes' => $applicationTypes
        ]);
    }
    public function addApplicationType(Request $request)
    {
        $credentials = $request->validate([
            'type' => 'required'
        ]);
        ApplicationType::create($credentials);
        return redirect()->back()->with('success', "Новый тип заявки создан");
    }
    public function deleteApplicationType(Request $request)
    {
        $applicationType = ApplicationType::find($request->id);
        if(!empty($applicationType)) {
            $applicationType->delete();

            return redirect()->back()->with('success', "Тип заявки «  $applicationType->type » удалён");
        } else return redirect()->back()->withErrors("Ошибка, тип заявки не найден");
    }
    public function editApplicationType(Request $request)
    {
        $applicationType = ApplicationType::find((int)$request->{'user-id'});
        if (!empty($applicationType)) {
            $oldTypeName = $applicationType->type;
            $applicationType->type = $request->{'type'};
            $applicationType->save();
            return redirect()->back()->with('success', "Тип заявки « $oldTypeName » отредактирован");
        } else return redirect()->back()->withErrors("Ошибка, тип заявки не найден");
    }
    public function usersApplications(Request $request)
    {
        $applicationTypes = ApplicationType::all();
        $statuses = Status::all();
        $query = $request->input('user-search');
        $type = $request->input('application-type');
        $status = $request->input('application-status');
        $queryBuilder = EmployeeApplication::orderBy('created_at', 'desc');
        if (!empty($query)) {
            $queryBuilder->where(function ($queryBuilder) use ($query) {
                $queryBuilder->where('description', 'LIKE', "%{$query}%")
                    ->orWhereHas('user', function ($userQuery) use ($query) {
                        $userQuery->where('name', 'LIKE', "%{$query}%");
                    });
            });
        }
        if (!empty($type)) {
            $queryBuilder->where('type', $type);
        }
        if (!empty($status)) {
            $queryBuilder->where('status', $status);
        }
        $employeeApplications = $queryBuilder->paginate(10);
        return view('admin.users-applications', [
            'employeeApplications' => $employeeApplications,
            'applicationTypes' => $applicationTypes,
            'statuses' => $statuses,
            'userSearch' => $query
        ]);
    }
    public function deleteUserApplication(Request $request)
    {
        $employeeApplication = EmployeeApplication::find($request->id);
       if(!empty($employeeApplication)) {
           $employeeApplication->delete();

           return redirect()->back()->with('success', "Заявка удалена");
       } else return redirect()->back()->withErrors("Ошибка, заявка не найдена");
    }
    public function dispatcherApplications(Request $request)
    {
        $applicationTypes = ApplicationType::all();
        $statuses = Status::all();
        $query = $request->input('user-search');
        $status = $request->input('application-status');
        $date_start = $request->input('date-start');
        $date_end = $request->input('date-end');
        $queryBuilder = DispatcherApplication::query()
            ->select('dispatcher_applications.*')
            ->leftJoin('users', 'users.id', '=', 'dispatcher_applications.user_id');
        if (!empty($date_start) && !empty($date_end)) {
            try {
                $start = Carbon::createFromFormat('Y-m-d', $date_start)->startOfDay();
                $end = Carbon::createFromFormat('Y-m-d', $date_end)->endOfDay();
                $queryBuilder->whereBetween('dispatcher_applications.created_at', [$start, $end]);
            } catch (\Exception $e) {
                return redirect()->back()->withErrors('Неверный формат даты')->withInput();
            }
        } else {
            $queryBuilder->orderBy('dispatcher_applications.created_at', 'desc');
        }
        if (!empty($query)) {
            $queryBuilder->where('users.name', 'LIKE', "%{$query}%");
        }
        if (!empty($status)) {
            $queryBuilder->where('dispatcher_applications.status', $status);
        }
        $dispatcherApplications = $queryBuilder->paginate(20);
        return view('admin.dispatcher-applications', [
            'dispatcherApplications' => $dispatcherApplications,
            'applicationTypes' => $applicationTypes,
            'statuses' => $statuses,
            'user_search' => $query,
            'date_start' => $date_start,
            'date_end' => $date_end
        ]);
    }
    public function addDispatcherApplication(Request $request) {
        $credentials = $request->validate([
            'initiator' => 'required|min:5',
            'system_name' => 'required|min:5',
            'planned_work' => 'required|min:5',
            'work_duration' => 'required|min:5',
            'approval_date' => 'required|min:5|date',
            'approval_result' => 'required|min:5',
            'communicated_by' => 'required|min:5',
        ]);
        $credentials['user_id'] = auth()->id();
        DispatcherApplication::create($credentials);
        return redirect()->back()->with('success', "Запись создана");
    }
    public function editDispatcherApplication (Request $request) {
        $dispatcherApplication = DispatcherApplication::find((int)$request->{'user-id'});
        $dispatcherApplication->initiator = $request->{'initiator'};
        $dispatcherApplication->system_name = $request->{'system_name'};
        $dispatcherApplication->planned_work = $request->{'planned_work'};
        $dispatcherApplication->work_duration = $request->{'work_duration'};
        $dispatcherApplication->approval_date = $request->{'approval_date'};
        $dispatcherApplication->approval_result = $request->{'approval_result'};
        $dispatcherApplication->communicated_by = $request->{'communicated_by'};
        $dispatcherApplication->status = $request->{'select-status'};
        $dispatcherApplication->save();
        return redirect()->back()->with('success', "Запись №$dispatcherApplication->id отредактирована");
    }
    public function deleteDispatcherApplication(Request $request)
    {
        $dispatcherApplication = DispatcherApplication::find($request->id);
        if(!empty($dispatcherApplication)) {
            $dispatcherApplication->delete();
            return redirect()->back()->with('success', "Запись удалена");
        } else {
            return redirect()->back()->withErrors("Ошибка, запись не найдена");
        }
    }
    public function editUserApplication(Request $request)
    {
        $request->validate([
            'textarea-description' => 'string',
            'select-status' => 'required|string'
        ]);
        $userApplication = EmployeeApplication::find((int)$request->{'application-id'});
       if(!empty($userApplication)) {
           $userApplication->status = $request->{'select-status'};
           $userApplication->description = $request->{'textarea-description'};
           $userName = $userApplication->user->name;
           $userApplication->save();
           return redirect()->back()->with('success', "Заявка от « $userName » отредактирована");
       }  else  return redirect()->back()->withErrors("Ошибка, заявка не найдена");
}
    public function updateDepartment(Request $request, $id) // Логика обновления отдела пользователя
    {
        $request->validate([
            'input-department' => 'required|string|min:3|max:50',
        ]);
        try {
            $user = User::find($id);
            $user->department = $request->{'input-department'};
            $user->save();
            return redirect()->back()->with(['success' => 'Отдел обновлен']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Internal server error'], 500);
        }
    }
    public function updateDirectorName(Request $request, $id) // Логика обновления ФИО руководителя
    {
        $request->validate([
            'input-director-name' => 'required|string|min:10',
        ]);
        $user = User::find($id);
        if (!empty($user)) {
            $user->{'director-name'} = $request->{'input-director-name'};
            $user->save();
            return redirect()->back()->with(['success' => 'ФИО руководителя обновлено']);
        } else return redirect()->back()->withErrors("Ошибка, пользователь не найден");
    }
}
