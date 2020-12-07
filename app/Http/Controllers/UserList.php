<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use App\Helpers\LogActivity;
use App\Auth;


class UserList extends Controller
{
    public function list(){
        $users = User::with('roles')->get();  
        return view('user_list', ['users'=>$users]);
    }

    public function giveAdmin($Id){
        $user = User::where('id', $Id)->firstOrFail();
        $adminRole = Role::where('name', 'Admin')->firstOrFail();

        $user->roles()->attach($adminRole->id);
    //return $Id;
       return redirect('/user_list');

    }

    public function removeAdmin($Id){
        $user = User::where('id', $Id)->firstOrFail();
        $adminRole = Role::where('name', 'Admin')->firstOrFail();

        $user->roles()->detach($adminRole->id);
    //return $Id;
       return redirect('/user_list');

    }

    public function giveSeller($Ids){
        $user = User::where('id', $Ids)->firstOrFail();
        $sellerRole = Role::where('name', 'Seller')->firstOrFail();

        $user->roles()->attach($sellerRole->id);
        LogActivity::addToLog('Seller Account Created');
    //return $Id;
       return redirect('/user_list');

    }

    public function giveSellerap($Ids){
        $user = User::where('id', $Ids)->firstOrFail();
        $sellerRole = Role::where('name', 'Seller')->firstOrFail();

        $user->roles()->attach($sellerRole->id);
        LogActivity::addToLog('Seller Account Created');
    //return $Id;
       return redirect('/home_admin');

    }

    public function removeSeller($Ids){
        $user = User::where('id', $Ids)->firstOrFail();
        $sellerRole = Role::where('name', 'Seller')->firstOrFail();

        $user->roles()->detach($sellerRole->id);
    //return $Id;
       return redirect('/user_list');

    }

    public function updatePic(Request $req,$id){
        $remove = User::find($id);
        $imagepath = $req->file('photo')->store('public');
        $imagename = substr($imagepath,7);
        $remove->photo =  $imagename;
        $remove->name = $req->name;
        $remove->save();
        return redirect('user_profile');

    }

    

  
}
