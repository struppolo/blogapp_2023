<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{

    // Mostro la lista di tutti i post
    public function index() {
        $posts = DB::table('posts')
        ->join('users', 'users.id', '=', 'posts.user_id')
        ->select('posts.*', 'users.name as autore')->get();
        return view('posts.index', ['posts' => $posts]);
    }

    // Mostro il form di creazione del nuovo post
    public function create() {
        return view('posts.create');
    }

    // Salvo i dati ricevuti dal form sul DB e ritorno alla lista dei post
    public function store(Request $request) {
        DB::table('posts')->insert([
            'titolo' => $request->titolo,
            'contenuto' => $request->contenuto,
            'user_id' => Auth::id(),
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        return redirect()->route('posts.index');
    }

    // Mostro il form di modifica di uno specifico post
    public function edit($id) {
        $post = DB::table('posts')->find($id);

        return view('posts.edit', ['post' => $post]);
    }

    // Salvo i dati modificati dello specifico post
    public function update(Request $request, $id) {
        $updated_post = DB::table('posts')->where('id', $id)->update([
            'titolo' => $request->titolo,
            'contenuto' => $request->contenuto,
            'updated_at' => \Carbon\Carbon::now()
        ]);

        return redirect()->route('posts.index');
    }

    // Elimino un post
    public function delete($id) {
        $deleted_post = DB::table('posts')->where('id', $id)->delete();
        return redirect()->route('posts.index');
    }

}
