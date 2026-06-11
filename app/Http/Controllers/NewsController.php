<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Category;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Muestra el listado de noticias (General o filtrado por Categoría).
     */
    public function index($id_category = null)
    {
        // Obtenemos todas las categorías para el menú lateral/header
        $categories = Category::all();

        // Si no se proporciona una categoría, listamos todas las noticias
        if ($id_category === null) {
            $news_list = News::all(); // Puedes usar News::latest()->get() si quieres las más recientes primero
            $title = 'News archive';
        } else {
            // Filtramos directamente usando Eloquent
            $news_list = News::where('id_category', $id_category)->get();
            $title = 'News By Category';
        }

        // Retornamos la vista única de Blade pasando las variables correspondientes
        return view('frontend.news.index', [
            'news_list'  => $news_list,
            'title'      => $title,
            'categories' => $categories
        ]);
    }

    /**
     * Muestra una noticia en detalle a partir de su slug.
     */
    public function show($slug)
    {
        /* `firstOrFail()` busca el registro por slug. Si no lo encuentra, 
         * Laravel lanza automáticamente una excepción 404 (Page Not Found),
         * ahorrándote el condicional 'if ($news === null)' y el throw.
         */
        $news = News::where('slug', $slug)->firstOrFail();
        $categories = Category::all();
        
        // En Laravel los resultados son objetos, accedemos con la flecha ->
        $title = $news->title;

        return view('frontend.news.view', [
            'news'       => $news,
            'categories' => $categories,
            'title'      => $title
        ]);
    }
}