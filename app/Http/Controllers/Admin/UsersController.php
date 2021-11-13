<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use App\Models\UserCounty;
use Illuminate\Http\Request;
use Auth;
use App\Models\Activity_log;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 15;

        if (!empty($keyword)) {
            $users = User::select('users.id', 'name', 'email', 
                DB::raw('group_concat(county) as counties'))
                ->leftJoin('user_county', 'user_county.user_id', '=', 'users.id')
                ->where('name', 'LIKE', "%$keyword%")->orWhere('email', 'LIKE', "%$keyword%")
                ->orderBy('users.created_at', 'desc')->groupBy('users.id')->paginate($perPage);
        } else {
            $users = User::select('users.id', 'name', 'email', 
                DB::raw('group_concat(county) as counties'))
                ->leftJoin('user_county', 'user_county.user_id', '=', 'users.id')
                ->orderBy('users.created_at', 'desc')->groupBy('users.id')->paginate($perPage);
        }

        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        $roles = Role::select('id', 'name', 'label')->get();
        $roles = $roles->pluck('label', 'name');

        return view('admin.users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return void
     */
    public function store(Request $request)
    {
        $this->validate(
            $request,
            [
                'name' => 'required',
                'email' => 'required|string|max:255|email|unique:users',
                'password' => 'required',
                'roles' => 'required'
            ]
        );

        $data = $request->except('password');
        $data['password'] = bcrypt($request->password);
        $user = User::create($data);

        foreach ($request->roles as $role) {
            $user->assignRole($role);
        }

        return redirect('admin/users')->with('flash_message', 'User added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function show($id)
    {
        $user = User::findOrFail($id);

        return view('admin.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function edit($id)
    {
        $roles = Role::select('id', 'name', 'label')->get();
        $roles = $roles->pluck('label', 'name')->prepend('Select Role','');

        $user = User::with('roles')->select('id', 'name', 'email')->findOrFail($id);
        $user_roles = [];
        foreach ($user->roles as $role) {
            $user_roles[] = $role->name;
        }

        return view('admin.users.edit', 
            compact('user', 'roles', 'user_roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int      $id
     *
     * @return void
     */
    public function update(Request $request, $id)
    {
        $this->validate(
            $request,
            [
                'name' => 'required',
                'email' => 'required|string|max:255|email|unique:users,email,' . $id,
                'roles' => 'required',
                'user-counties' => 'required',
                'password'=>'nullable|min:5|confirmed'
            ]
        );

        $data = $request->except('password', 'user-counties');

       // dd($request->all());

        if ($request->has('password') && !empty($request->password)) {
            $data['password'] = bcrypt($request->password);
        }

        $user = User::find($id);

        $user_counties = $request->get('user-counties');
        $uc = [];
        foreach($user_counties  as $user => $user_county){
            $uc[] =  ['user_id'=> $id, 'county'=>$user_county];
        }
        UserCounty::insert($uc);

        return redirect('admin/users')->with('flash_message', 'User updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function destroy($id)
    {
        User::destroy($id);

        return redirect('admin/users')->with('flash_message', 'User deleted!');
    }

    public function show_profile()
    {
    
      $user= User::findOrFail(Auth::user()->id);
       
       return  view('admin.users.profile',compact('user'));
    }

    public  function  update_profile(Request $request,$id)
    {

         $this->validate(
            $request,
            [
                'name' => 'required',
                'email' => 'required|string|max:255|email|unique:users,email,' . $id,
                'password'=>'nullable|min:5|confirmed'

            ]
        );

        //dd($request->all());

       $data = $request->except('password');
        if ($request->has('password')) {
            $data['password'] = bcrypt($request->password);
        }

        $user = User::findOrFail($id);
        $user->update($data);

    return redirect('admin/profile')->with('flash_message', 'Profile updated!');

    }

    public  function  profile_activity_log()
    {
     $activitylogs = Activity_log::where('causer_id',Auth::user()->id)->get();

      return view('admin.users.profile_activity',compact('activitylogs'));

   }

   public  function  showManageUser($id)
   {

    $roles = Role::select('id', 'name', 'label')->get();
    //$roles = $roles->pluck('label', 'name');
    $roles = $roles->pluck('label', 'name')->prepend('Select Role','');


    $user = User::with('roles')->select('id', 'name', 'email')->findOrFail($id);
    $user_roles = [];
    foreach ($user->roles as $role) {
        $user_roles[] = $role->name;
    }
    $cts = DB::table('county')->select('county')->get();
    $counties = [];
    foreach($cts as $key=>$county){
        $counties[] = $county->county;
    }
    $user_counties = [];
    $urs = DB::table('user_county')->select('county')->where('user_id', $id)->get();

    foreach($urs as $key=>$county){
        $user_counties[] = $county->county;
    }

    return  view('admin.users.manage_user',
        compact('user','roles','user_roles', 'counties', 'user_counties'));
   }


}
