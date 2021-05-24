<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

/**
 * Class DashboardController
 *
 * @package App\Http\Controllers
 */
class DashboardController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function index()
    {
       $nrusers=User::where('role',User::ROLE_USER)->count();
       $nradmins=User::where('role',User::ROLE_ADMIN)->count();

       return view(
           'dashboard.index',
           [
               'nradmins'=>$nradmins,
               'nrusers'=>$nrusers
           ]
       );
   }
}
