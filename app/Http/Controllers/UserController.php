<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Permission;
use App\Models\User;
use App\Models\Role;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

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
            config('app.profesor_role')
        );

    }
    public function index()
    {

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
        $userAnt = $user;
        $user->delete();

        $user = Auth::user();
        $info = [
            'id usuario' => $user->id,
            'tipo usuario' => $user->tipo,
            'antiguo registro' => $userAnt,
        ];
        Log::channel('mydailylogs')->info('Eliminar Usuario: ', $info);

        return redirect()->route('backoffice.user.index');
    }

    public function assign_role(User $user){
        $this->authorize('assign_role', $user);
        return view('backoffice.pages.user.assign_role',[
            'user'=>$user,
            'roles'=>Role::all()
        ]);
    }

    public function role_assignment(Request $request,User $user){
        $this->authorize('assign_role', $user);
        $user->role_assignment($request);
        return redirect()->route('backoffice.user.show',$user);

    }

    public function assign_permission(User $user){
        $this->authorize('assign_permission', $user);
        return view('backoffice.pages.user.assign_permission',[
            'user' => $user,
            'roles' => $user->roles
        ]);
    }

    public function permission_assignment(Request $request, User $user){
        $this->authorize('assign_permission', $user);
        $user->permissions()->sync($request->permissions);
        return redirect()->route('backoffice.user.show',$user);
    }

}
