<?php

namespace App\Http\Controllers;

use App\Noticia;
use Illuminate\Http\Request;

class NoticiaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($pagina="1")
    {
        $itemsperpagina=10;
        $inicio=($pagina-1)*$itemsperpagina;
        $total=Noticia::count();
        $paginas=ceil($total/$itemsperpagina);
        if($pagina>$paginas){
            return response('Sorry, not found!', 404);
        }
        $noticias=Noticia::skip($inicio)->take($itemsperpagina)->get();
       
        if($noticias){
           $filtered=$noticias->map(function($noticia){
               return $noticia->only(['id','titulo','idcategoria','fechapublicacion']);
            });
        return response($filtered, 200);
    }
        else{
        return response('Sorry, not found!', 404);
        }
    }

    public function showIdNoticia($id=NULL)
    {
       if ($id===NULL){
        return response('Sorry, not found!', 404);
        };
           
        $noticia=Noticia::find($id);
        if($noticia){
            return response($noticia, 200);
        }
        else{
            return response('Sorry, not found!', 404);
        }
    }

    public function showIdCategoria($id=NULL, $pagina="1")
    {
        if ($id===NULL){
            return response('Sorry, not found!', 404);
            };
        $itemsperpagina=10;
        $inicio=($pagina-1)*$itemsperpagina;
        $total=Noticia::where('idcategoria',$id)->count();
        $paginas=ceil($total/$itemsperpagina);  
        if($pagina>$paginas){
            return response('Sorry, not found!', 404);
        }           
        $noticia=Noticia::where('idcategoria',$id)->skip($inicio)->take($itemsperpagina)->get();
        if($noticia){
            return response($noticia, 200);
        }
        else{
            return response('Sorry, not found!', 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Noticia  $noticia
     * @return \Illuminate\Http\Response
     */
    public function edit(Noticia $noticia)
    {
        //
    }

        /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Noticia  $noticia
     * @return \Illuminate\Http\Response
     */
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Noticia  $noticia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Noticia $noticia)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Noticia  $noticia
     * @return \Illuminate\Http\Response
     */
    public function destroy(Noticia $noticia)
    {
        //
    }
}
