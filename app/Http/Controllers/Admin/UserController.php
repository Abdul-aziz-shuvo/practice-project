<?php

namespace App\Http\Controllers\Admin;

use App\Role;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(10);
        return view('admin/index',compact('users'));
    }

    // /**
    //  * Show the form for creating a new resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function create()
    // {
    //     //
    // }

    // /**
    //  * Store a newly created resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
    //  */
    // public function store(Request $request)
    // {
    //     //
    // }

    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function show($id)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        if(Auth::user()->id == $id)
        {
            Toastr::warning('You can not change your role', 'warning');
            return redirect()->route('users.index');
        }
        
            
        
        $user = User::find($id);
        $roles = Role::all();

        foreach($roles as $role){
            $Rolename[] = $role->name;
        }

             

        if((count($user->hasAnyRoles($Rolename)) == 2) || (count($user->hasAnyRoles($Rolename)) == 3)  || $user->hasAnyRole('user') || $user->hasAnyRole('author '))
        {
            return view('admin.edit',compact('user','roles'));
        }
        else if($user->hasAnyRole('admin')){
            Toastr::warning('You can not change admin role', 'warning');
            return redirect()->route('users.index');
        }
        
        
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
        if(Auth::user()->id == $id)
        {
            return redirect()->route('admin.users.index');
        }



        // get all role from database
        $roles = Role::all();
        foreach($roles as $role){
            $RoleId[] = $role->id;
        }

        // get all request role and restriction 
        foreach($request->roles as $role){
            $roleid = $role;
            if($roleid == $RoleId[0] && (count($request->roles) == 1) ){
                Toastr::warning('You can not give this user admin role', 'warning');
                return redirect()->route('users.edit',$id);
            }
        }
      
       
        $user = User::find($id);
        $user->roles()->sync($request->roles);
        Toastr::success('Successfully updated', 'Success');
        return redirect()->route('users.index');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Auth::user()->id == $id)
        {
            Toastr::warning('You can not delete your role', 'warning');
            return redirect()->route('users.index');
        }


        $user = User::find($id);
        $roles = Role::all();

        foreach($roles as $role){
            $Rolename[] = $role->name;
        }



        if((count($user->hasAnyRoles($Rolename)) == 2) || (count($user->hasAnyRoles($Rolename)) == 3)  || $user->hasAnyRole('user') || $user->hasAnyRole('author '))
        {
            $user->delete();
            $user->roles()->detach();
        
            Toastr::warning('Succesfully deleted', 'Deleted');
            return redirect()->route('users.index');
        }
        else if($user->hasAnyRole('admin')){
            Toastr::warning('You can not delete admin role', 'warning');
            return redirect()->route('users.index');
        }








        // $user->delete();
        
        // Toastr::warning('Succesfully deleted', 'Deleted');
        // return redirect()->route('users.index');
    }
}
