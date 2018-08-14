<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Note;
use Jenssegers\Date\Date;

class NoteController extends Controller
{
    public function store(Request $request)
    {
        $note = Note::create([
            'text' => $request->text,
            'user_id' => $request->user_id,
            'order_id' => $request->order_id
        ]);
        $note->date = $note->created_at->format('d F \,\ Y \a\ \\l\\a\\s h:i:a');
        $note->user = $note->user;
        return response()->json($note);
    }

    public function destroy($id)
    {
        Note::findOrFail($id)->delete();
    }

}
