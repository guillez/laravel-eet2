<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Noticia;
use Illuminate\Http\Request;
//Agregadas
use App\Http\Requests\V1\NoticiaRequest;
use Illuminate\Support\Facades\Auth;

class NoticiaController extends Controller
{
    // constructor agregado
  /*  public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['index', 'show']]);
    }*/


/**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //abort_unless(Auth::check(), 404);
       // $user = $request->user();

       // if ($user->isAdmin()) {
         //   $posts = Post::orderBy('created_at', 'desc')->get();
       // } elseif ($user->isStaff()) {
            $noticias = Noticia::where('estado', 'creado')->orderBy('created_at', 'desc')->get();
       // } else {
       //     abort_unless(Auth::check(), 404);
       // }
       /* return view('noticias', [
            'noticias' => $noticias
        ]);*/
        return \response($noticias);
    }
   /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\V1\PostRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {

        $request->validate([
            'titulo'=>'required|max:20',
            'descripcion'=>'required|max:255',
            'estado'=>'creado'
        ]);

        $noticia = Noticia::create($request->all());

        return \response($noticia);

        /*$request->validated();

        $user = Auth::user();

        $post = new Post();
        $post->user()->associate($user);
        $url_image = $this->upload($request->file('image'));
        $post->image = $url_image;
        $post->title = $request->input('title');
        $post->description = $request->input('description');

        $res = $post->save();

        if ($res) {
            return response()->json(['message' => 'Post create succesfully'], 201);
        }
        return response()->json(['message' => 'Error to create post'], 500);*/



    }

    private function upload($id)
    {
        $noticia = Noticia::findOrFail($id)->update($request->all());

        return \response($noticia);

       /* $path_info = pathinfo($image->getClientOriginalName());
        $post_path = 'images/post';

        $rename = uniqid() . '.' . $path_info['extension'];
        $image->move(public_path() . "/$post_path", $rename);
        return "$post_path/$rename";*/
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $noticia = Noticia::findOrFail($id);

        return \response($noticia);
    }

  

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
       // Noticia::destroy($id);

       // return \response(content: "Eliminado");
    }
}
