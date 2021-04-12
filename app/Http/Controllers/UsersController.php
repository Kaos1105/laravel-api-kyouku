<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UploadRequest;
use App\Imports\UsersImport;
use App\Models\Users;
use Illuminate\Http\Request;

class UsersController extends Controller
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
        $users = Users::query()
                     ->when($request->keyword, function ($query) use ($request) {
                         return $query->where('email', 'like', "%$request->keyword%")
                                      ->orWhere('security_code', 'like', "%$request->keyword%");
                     })
                     ->when($request->sort, function ($query) use ($request) {
                         return $query->orderBy('video_type', $request->sort);
                     })
                     ->orderBy('order')
                     ->paginate(20)
                     ->appends($request->all());

        return view('users.index', compact('users'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function new(Request $request)
    {
        $users = $request->all();

        return view('users.new', compact('users'));
    }

    /**
     * @param \App\Http\Requests\CreateUserRequest $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function preview(CreateUserRequest $request)
    {
        $user = $request->all();

        return view('users.preview', compact('user'));
    }

    /**
     * @param \App\Http\Requests\CreateUserRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function create(CreateUserRequest $request): \Illuminate\Http\RedirectResponse
    {
        Users::create(array_merge($request->validated(), ['order' => $this->order()]));

        //Mail::to($user->email)->send(new SendWatchPassword($user));

        return redirect()->route('users.index');
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function import()
    {
        return view('users.import_user');
    }

    /**
     * @param \App\Http\Requests\UploadRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function previewImportUsers(UploadRequest $request): \Illuminate\Http\RedirectResponse
    {
        $file = $request->file('file');
        [$import, $error] = (new UsersImport())->importFile($file);
        if ($import === 'error_file') {
            return back()->with('error', 'CSVのフォマットは正しくありません。');
        }
        if ($error > 0) {
            return back()->with('data', $import);
        }

        return back()->with('result', $import);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function importUsers(Request $request): \Illuminate\Http\JsonResponse
    {
        foreach ($request->data as $data) {
            Users::create([
                'email'         => $data['email'],
                'security_code' => $data['watch_password'],
                'video_type'    => $data['video_type'],
                'order'         => $this->order(),
            ]);
        }

        return response()->json([
            'status'  => 'success',
            'message' => 'ファイルアップが完了しました。',
        ]);
    }

    /**
     * @return int|mixed
     */
    public function order(): int
    {
        $order_max = Users::query()->whereNull('deleted_at')->max('order');
        if (is_null($order_max)) {
            $order_max = 0;
        } else {
            $order_max += 1;
        }

        return $order_max;
    }
}
