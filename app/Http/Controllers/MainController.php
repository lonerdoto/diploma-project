<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\ApplicationType;
use App\Models\EmployeeApplication;
use App\Models\Statement;
use App\Models\Status;
use App\Models\User;
use App\Rules\PhoneNumberComplete;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class MainController extends Controller
{
    public function showHome()
    {
        return view('welcome'); // Показать главную страницу
    }

    public function contacts()
    { // Показать страницу контакты
        return view('contacts');
    }

    public function showCreateApplication() // Показать страницу создания заявки
    {
        $applicationTypes = DB::table('application_types')->
        orderBy('created_at', 'desc')->get();
        return view('create-application', [
            'applicationTypes' => $applicationTypes
        ]);
    }
    public function createApplication(Request $request)
    { // Логика создания заявки
        $credentials = $request->validate([
            'description' => 'required|min:10|max:4000',
            'type' => 'required|string',
            'files' => 'array|max:9',
            'files.*' => 'mimes:jpg,jpeg,png,bmp,xlsx,docx,pdf,svg,zip,7zip|max:10000'
        ]);
        $paths = [];
        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $file) {
                $filename = $file->getClientOriginalName();
                $file->storeAs('uploads', $filename, 'public');
                $paths[] = $filename;
            }
        }
        $credentials['user_id'] = Auth::id();
        $credentials['application_type_id'] = $request->{'application-type-id'};
        $credentials['files'] = json_encode($paths);
        EmployeeApplication::create($credentials);
        Session::flash('success', 'Заявление отправлено');
        return response()->json(['redirect_url' => url()->previous()]);
    }
    public function applications(Request $request)
    { // Показать страницу со всеми заявками пользователя
        $applicationTypes = ApplicationType::all();
        $statuses = Status::all();
        $query = $request->input('user-search');
        $type = $request->input('application-type');
        $status = $request->input('application-status');
        $queryBuilder = EmployeeApplication::where('user_id', Auth::id())
            ->orderBy('created_at', 'desc');
        if (!empty($query)) {
            $queryBuilder->where('description', 'LIKE', "%{$query}%");
        }
        if (!empty($type)) {
            $queryBuilder->where('type', $type);
        }
        if (!empty($status)) {
            $queryBuilder->where('status', $status);
        }
        $employeeApplications = $queryBuilder->paginate(12);
        return view('employee-applications', [
            'employeeApplications' => $employeeApplications,
            'applicationTypes' => $applicationTypes,
            'statuses' => $statuses,
            'userSearch' => $query
        ]);
    }
    public function profile($id) // Показать страницу профиля
    {
        $previousUrl = url()->previous();
        $currentUrl = url()->current();
        if(auth()->id() === (int)$id || auth()->user()->role === "admin" || auth()->user()->role === "dispatcher") {
            $user = User::find($id);
            if(isset($user)) {
                return view('profile', [
                    'user' => $user
                ]);
            } else {
                if ($previousUrl && $previousUrl !== $currentUrl) {
                    return redirect()->back()->withErrors(['Такого пользователя не существет']);
                } else {
                    return redirect()->route('home');
                }
            }
        } else {
            if ($previousUrl && $previousUrl !== $currentUrl) {
                return redirect()->back();
            } else {
                return redirect()->route('home');
            }
        }
    }
    public function deleteAvatar(Request $request) {
        $user = User::find($request->id);
        $user->avatar = null;

        $user->save();
        if( $user->id === auth()->id()) {
            return redirect()->back()->with('success', "Ваш аватар удалён");
        } else {
            return redirect()->back()->with('success', "Аватар пользователя « $user->name » удалён");
        }
    }
    public function updateAvatar(Request $request, $id) // Логика обновления аватара пользователя
    {
        $request->validate([
            'avatar' => 'required|image|max:2048',
        ]);
        try {
            $user = User::find($id);
            if ($request->hasFile('avatar')) {
                $file = $request->file('avatar');
                $filename = $file->getClientOriginalName();
                $file->storeAs('uploads', $filename, 'public');
                $user->avatar = $filename;
                $user->save();
                return response()->json(['message' => 'Аватар успешно обновлен', 'avatar' => $filename]);
            }
            return response()->json(['error' => 'Файл не загружен'], 400);
        } catch (\Exception $e) {
            \Log::error('Error updating avatar: ' . $e->getMessage());
            return response()->json(['error' => 'Ошибка сервера'], 500);
        }
    }

    public function updatePhone(Request $request, $id)  // Логика обновления номера телефона пользователя
    {
        $request->validate([
            'input-phone' => ['required', 'string', 'max:20', new PhoneNumberComplete],
        ]);

        $user = User::find($id);
        $user->phone = $request->input('input-phone');
        $user->save();

        return redirect()->back()->with('success', 'Номер телефона обновлен');
    }


}
