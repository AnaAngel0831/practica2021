<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BoardsController extends Controller
{ public function boards()
    {
        $boards = Boards::with('users')->paginate(10);

        return view(
            'boards.index',
            ['boards' => $boards]
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
            ['id' => $id],
            ['name' => $request->name,  ]
        );

        return response()->json(['success' => true]);

    }

    public function delete($id)
    {

        $board = Boards::find()->where('id', $id)->first();
        $board->delete();
        return response()->json([
            'message' => 'Board deleted successfully!'
        ]);

    }
}
