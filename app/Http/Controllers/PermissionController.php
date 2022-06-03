<?php

namespace App\Http\Controllers;

<<<<<<< HEAD
=======
use Illuminate\Http\Request;
>>>>>>> 0b22223b030ec5aa59d241b716309ddeabcd4103
use App\Models\Permission;
use App\Http\Requests\Permission\StoreRequest;
use App\Http\Requests\Permission\UpdateRequest;
use App\Models\Role;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
<<<<<<< HEAD
    public function __construct()
    {
        $this->middleware('role:' . config('app.admin_role'));
    }
    public function index()
    {
        $this->authorize('index',Role::class);
=======
    /*
    public function __construct()
    {
        $this->middleware('role:' . config('app.admin_role'));
    }}*/
    public function index()
    {
        //$this->authorize('index',Role::class);
>>>>>>> 0b22223b030ec5aa59d241b716309ddeabcd4103
        return view('backoffice.pages.permission.index',[
            'permissions'=>Permission::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
<<<<<<< HEAD
        $this->authorize('create',Role::class);
=======
        //$this->authorize('create',Role::class);
>>>>>>> 0b22223b030ec5aa59d241b716309ddeabcd4103
        return view('backoffice.pages.permission.create',[
            'roles'=>Role::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request, Permission $permission)
    {

        $permission = $permission->store($request);
        return redirect()->route('backoffice.permission.show',$permission);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function show(Permission $permission)
    {
<<<<<<< HEAD
        $this->authorize('view', $permission);
=======
        //$this->authorize('view', $permission);
>>>>>>> 0b22223b030ec5aa59d241b716309ddeabcd4103
        return view('backoffice.pages.permission.show',[
            'permission' => $permission
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function edit(Permission $permission)
    {
<<<<<<< HEAD
        $this->authorize('update', $permission);
=======
        //$this->authorize('update', $permission);
>>>>>>> 0b22223b030ec5aa59d241b716309ddeabcd4103
        return view('backoffice.pages.permission.edit',[
            'permission'=>$permission,
            'roles'=>Role::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRequest  $request
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Permission $permission)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permission $permission)
    {
<<<<<<< HEAD
        $this->authorize('delete', $permission);
=======
        //$this->authorize('delete', $permission);
>>>>>>> 0b22223b030ec5aa59d241b716309ddeabcd4103
        $role = $permission->role;
        $permission->delete();
        return redirect()->route('backoffice.role.show',$role);
    }
}
