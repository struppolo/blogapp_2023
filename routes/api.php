<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
*/
Route::get('/posts',function(){
return Post::all();
})->middleware('auth:sanctum');
Route::get('/posts/{id}',function($id){
return Post::findOrFail($id);
});
Route::post('/posts/create',function(Request $request){   
$post = new Post;
$post->titolo =  $request->input('titolo');
$post->contenuto =  $request->input('contenuto');
$post->user_id =1;
$post->save();
return "Post saved";
});
Route::patch('/posts/{id}',function(Request $request,$id){
$post = Post::findOrFail($id);
$post->titolo =  $request->input('titolo');
$post->contenuto =  $request->input('contenuto');
$post->save();
});
Route::delete('/posts/{id}', function($id){
$id = Post::findOrFail($id);
$id->delete();
});

// https://laravel.com/docs/10.x/authentication#authenticating-users
// ricreo l'autenticazione di laravel per ottenere il token da api

Route::post('/login', function (Request $request) {
    $credentials = $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required'],
    ]);

    if (Auth::attempt($credentials)) {
   //     $request->session()->regenerate();
    $token = Auth::user()->createToken('apiToken');
      return ['token' => $token->plainTextToken];
    }

    else return 'The provided credentials do not match our records.';
   


});