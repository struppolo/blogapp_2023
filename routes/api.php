<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Post;
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
});
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