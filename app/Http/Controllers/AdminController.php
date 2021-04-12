<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAdminRequest;
use App\Models\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Request $request)
    {
        $admins = Admin::query()
                       ->orderBy('created_at', 'desc')
                       ->paginate(10);

        return view('admins.index', compact('admins'));
    }

    /**
     * @param null $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function showCreateOrEdit($id = null)
    {
        if (count(Admin::all()) > 9 && is_null($id)) {
            return redirect()->route('admins.index');
        }

        $admin = null;
        if ($id) {
            $admin = Admin::query()->find($id);
        }

        return view('admins.edit', compact('admin'));
    }

    /**
     * @param \App\Http\Requests\CreateAdminRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function createOrEdit(CreateAdminRequest $request): \Illuminate\Http\RedirectResponse
    {
        $admin = Admin::query()->find($request->id);
        if ($admin) {
            $isSuperAdmin = $admin->is_super_admin;
        } else {
            $isSuperAdmin = 0;
        }
        Admin::updateOrCreate(['id' => $request->id],
            [
                'username'       => $request->username,
                'password'       => bcrypt($request->password),
                'is_super_admin' => $isSuperAdmin,
            ]);

        return redirect()->route('admins.index');
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id): \Illuminate\Http\RedirectResponse
    {
        Admin::destroy($id);

        return back();
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function changeStatus(Request $request): \Illuminate\Http\JsonResponse
    {
        $admin = Admin::find($request->id);
        $admin->is_super_admin = $request->status;
        $admin->save();

        if ($admin) {
            return response()->json(['success']);
        }

        return response()->json(['error']);
    }
}
