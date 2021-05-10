<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

/**
 * Class AdminController
 *
 * @package App\Http\Controllers
 */
 class AdminController extends Controller
 {
     public function users()
     {
         $users = DB::table('users')->paginate(10);

         return view(
             'users.index',
             [
                 'users' => $users
             ]
         );
     }
     public function edit(Request $request,$id)
    {
        $userData = UserData::find($id);

        return view('userData.edit',compact('userData','id'));

    }


     public function update(Request $request, $id)
     {
         DB::table('users')->updateOrCreate(
             ['id' => $id],
             ['role' => $request->role]
         );
         $user->save();

         return response()->json(['success' => true]);

     }

     public function delete($id)
     {

         $user = User::find()->where('id', $id)->first();
         $user->delete();
         return response()->json([
             'message' => 'User deleted successfully!'
         ]);

     }
 }
