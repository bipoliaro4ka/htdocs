<?php
namespace Controller;

use Model\Author;
use Model\Book;
use Model\Book_reader;
use Model\Genre;
use Model\Hall;
use Model\Publisher;
use Src\Request;
use Src\Validator\Validator;
use Src\View;


class GiveView
{
    public function give_book(Request $request): string
    {
        $message = null;

        $author_list = Author::all();
        $hall_list = Hall::all();
        $genre_list = Genre::all();
        $publisher_list = Publisher::all();

        if ($request->method === "POST") {
            $path = '/htdocs/public/static/media/covers/';

            if (Book::create([
                'name' => str($request->name),
                'cover' => str(( $path . $file_name)),
                'author_id' => str($request->author_id),
                'date_publish' => date($request->date_publish),
                'price' => (int) ($request->price),
                'annotation' =>str( $request->annotation),
                'genre_id' => (int) $request->genre_id,
                'hall_id' => (int) $request->hall_id,
                'publisher_id' => (int) $request->publisher_id,
                'rent' => true, 
                'status'=>$request->status
            ])) {
                app()->route->redirect('/books');
            }
        }

        return (new View())->render('site.book.give_book', ['hall_list' => $hall_list,
            'genre_list' => $genre_list,
            'publisher_list' => $publisher_list,
            'author_list'=>$author_list,
            'errors' => $message]);
    }
}