<?php

namespace App\Http\Controllers;

<<<<<<< HEAD
use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
=======
use Illuminate\Http\Request;
use App\Models\Permission;
use App\Models\User;
use App\Models\Role;
>>>>>>> 0b22223b030ec5aa59d241b716309ddeabcd4103

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('role:' . config('app.admin_role') . '-' .
<<<<<<< HEAD
            config('app.profedor_role')
=======
            config('app.profesor_role')
>>>>>>> 0b22223b030ec5aa59d241b716309ddeabcd4103
        );

    }
    public function index()
    {
<<<<<<< HEAD
=======
        
>>>>>>> 0b22223b030ec5aa59d241b716309ddeabcd4103
        $this->authorize('index', User::class);
        return view('backoffice.pages.user.index',[
            'users'=> auth()->user()->all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $this->authorize('view', $user);
        return view('backoffice.pages.user.show',[
            'user'=>$user,
            'permissions' => $user->permissions,
            'roles' => $user->roles
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($user)
    {
        $this->authorize('delete', $user);
        $user->delete();
        return redirect()->route('backoffice.user.index');
    }
    public function assign_role(User $user){
<<<<<<< HEAD
        //$this->authorize('assign_role', $user);
=======
        $this->authorize('assign_role', $user);
>>>>>>> 0b22223b030ec5aa59d241b716309ddeabcd4103
        return view('backoffice.pages.user.assign_role',[
            'user'=>$user,
            'roles'=>Role::all()
        ]);
    }
    public function role_assignment(Request $request,User $user){
<<<<<<< HEAD
        //$this->authorize('assign_role', $user);
=======
        $this->authorize('assign_role', $user);
>>>>>>> 0b22223b030ec5aa59d241b716309ddeabcd4103
        $user->role_assignment($request);
        return redirect()->route('backoffice.user.show',$user);

    }
    public function assign_permission(User $user){
<<<<<<< HEAD
        //$this->authorize('assign_permission', $user);
=======
        $this->authorize('assign_permission', $user);
>>>>>>> 0b22223b030ec5aa59d241b716309ddeabcd4103
        return view('backoffice.pages.user.assign_permission',[
            'user' => $user,
            'roles' => $user->roles
        ]);
    }
    public function permission_assignment(Request $request, User $user){
<<<<<<< HEAD
        //$this->authorize('assign_permission', $user);
=======
        $this->authorize('assign_permission', $user);
>>>>>>> 0b22223b030ec5aa59d241b716309ddeabcd4103
        $user->permissions()->sync($request->permissions);
        return redirect()->route('backoffice.user.show',$user);
    }
}
