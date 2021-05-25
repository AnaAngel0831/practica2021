<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use App\Models\Board;
use App\Models\Task;
use App\Models\User;

 /* Class DashboardController
 *
 * @package App\Http\Controllers
 */
class DashboardController extends Controller
{

     /* @return Application|Factory|View
     */
    public function index()
    {

        $user = Auth::user();
        $tasks = Task::get()->count();
        $users= User::get()->count();
        $user = Auth::user();
        $boards = Board::query();
      if ($user->role === User::ROLE_USER) {
          $boards = $boards->where(function ($query) use ($user) {
              $query->where('user_id', $user->id)
                  ->orWhereHas('boardUsers', function ($query) use ($user) {
                      $query->where('user_id', $user->id);
                  });
          });
      }
        return view('dashboard.index',['nrboards'=> $boards,'nrtasks' =>$tasks, 'nrusers' => $users]);
    }
}
