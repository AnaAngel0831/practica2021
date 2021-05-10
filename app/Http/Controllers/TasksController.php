<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TasksController extends Controller
{
  public function tasks()
      {
          $tasks = Tasks::with('board,user')->paginate(10);

          return view(
              'tasks.index',
              ['tasks' => $tasks]
          );
      }

      public function edit($id)
      {
          $task = DB::find($id);

          return response()->json([
              'data' => $task
          ]);
      }

      public function update(Request $request, $id)
      {
          DB::table('boards')->updateOrCreate(
              ['id' => $id]

          );

          return response()->json(['success' => true]);

      }

      public function delete($id)
      {

          $task = Tasks::find()->where('id', $id)->first();
          $task->delete();
          return response()->json([
              'message' => 'Task deleted successfully!'
          ]);

      }
  }
