<?php


namespace Controller;

use Model\Hall;
use Src\Request;
use Src\View;

class HallView{
    public function hall_list(Request $request): string {
        $genrelist = Hall:: all();
        return (new View())->render('site.hall.halls', ['hall_list' => $genrelist]);
    }
    public
    function hall_add(Request $request): string
    {


        if ($request->method === 'POST' && Hall::create($request->all())) {
            $validator = new Validator($request->all(), [
                'number' => ['required', 'number'],
                'appointment'=>['required']
            ], [
                'required' => 'Поле :field пусто',
                'number'=>'Поле :filed должно содержать только цифры'
            ]);
            if ($validator->fails()) {
                $message = json_encode($validator->errors(), JSON_UNESCAPED_UNICODE);
                return new View('site.hall.hall_add', ['errors' => $message]);
            }
            app()->route->redirect('/halls');
        }
        return new View('site.hall.hall_add');
    }
}