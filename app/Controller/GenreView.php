<?php


namespace Controller;

use Model\Genre;
use Src\Request;
use Src\View;

class GenreView{
    public function genre_list(Request $request): string {
        $genrelist = Genre:: all();
        return (new View())->render('site.genre.genres', ['genre_list' => $genrelist]);
    }
    public
    function genre_add(Request $request): string
    {
        if ($request->method === 'POST' && Genre::create($request->all())) {
            $validator = new Validator($request->all(), [
                'name' => ['required']
            ], [
                'required' => 'Поле :field пусто',
            ]);
            if ($validator->fails()) {
                $message = json_encode($validator->errors(), JSON_UNESCAPED_UNICODE);
                return new View('site.genre.genre_add', ['errors' => $message]);
            }

            app()->route->redirect('/genres');
        }
        return new View('site.genre.genre_add');
    }
}