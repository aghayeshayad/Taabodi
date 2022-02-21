<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\DataTables;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    function __construct()
    {
        $this->middleware('role');
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $users = User::orderBy('id','DESC')->paginate(5);
        return view('users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|Response|View
     */
    public function create(User $users)
    {
        $roles = Role::all();
        $userRole = $users->roles()->get();
        return view('users.create',compact('roles', 'users', 'userRole'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'nullable|email',
            'city' => 'nullable',
            'postal_code' => 'nullable',
            'first_address' => 'nullable',
            'second_address' => 'nullable',
            'mobile' => 'required|unique:users,mobile',
            'password' => 'required|same:confirm-password',
            'roles' => 'required'
        ]);

        $input = $request->all();
        $input['password'] = Hash::make($input['password']);

        $user = User::create($input);
        $user->assignRole($request->input('roles'));

        return redirect()->route('admin.users.index')->with('success','User created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return View
     */
    public function show($id)
    {
        $users = User::find($id);
        return view('users.show',compact('users'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return View
     */
    public function edit($id)
    {
        $users = User::find($id);
        $roles = Role::all();
        $userRole = $users->roles()->get();
        return view('users.edit',compact('users','roles','userRole'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'roles' => 'required'
        ]);
        $input = $request->all();
        $user = User::find($id);
        $user->update($input);
        DB::table('model_has_roles')->where('model_id',$id)->delete();

        $user->assignRole($request->input('roles'));

        return redirect()->route('admin.users.index')->with('success','User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        User::findOrFail($id)->delete();

        return  response('Ok!Deleted content successfully!', Response::HTTP_OK);
    }

    /**
     * Restored contents
     *
     * @param Request $request
     * @return Response
     */
    public function restore(Request $request)
    {
        User::withTrashed()->findOrFail($request->id)->restore();

        return response('Ok!Restored content successfully!', Response::HTTP_OK);
    }

    /**
     * Return contents list data
     */
    public function list()
    {
        return DataTables::of(User::withTrashed())
            ->addColumn('roles', function ($users) {
                return $this->rolesColumn($users);
            })->addColumn('actions', function ($users) {
                return $this->actionColumn($users);
            })->rawColumns(['roles','actions'])->make(true);
    }

    /**
     * Contents list action column
     *
     * @param User $users
     * @return View
     */
    private function actionColumn($users)
    {
        return view('users.partials.action_column', compact('users'));
    }

    /**
     * Contents list action column
     *
     * @param User $users
     * @return Response
     */
    private function rolesColumn($users)
    {
        $s = "";
        if(!empty($users->getRoleNames())) {
            foreach ($users->getRoleNames() as $v){
                $s = $s." ".$v;
            }
            return $s;
        }
    }
}
