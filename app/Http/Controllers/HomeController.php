<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use App\Models\UserInfo;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $user = User::all();
        return view('home', compact('user'));
    }

    public function user()
    {
        echo '<pre>';
        $user = User::all();
        var_dump($user->toArray());

        $user = User::find(2);
        var_dump($user->toArray());

        $user = User::where('id', 1)->get();
        $ar_user = $user->toArray();
        var_dump($ar_user[0]);

        $user = User::where('id', '>', 0)->find(1);
        $ar_user = $user->toArray();
        var_dump($ar_user);

        $user = User::where('id', '>', 0)->orderBy('name', 'desc')->get();
        $ar_user = $user->toArray();
        var_dump($ar_user);

        //Ленивая загрузка
        $user = User::find(2);
        var_dump($user->name);//загрузка данных происходит тут

        //Жадная загрузка
        $user = User::where('id', 1)->get();//загрузка данных происходит тут
        var_dump($user);

        //Работа с коллекциями
        $users = User::all();
        $users->each(function (User $user, $key) {
            var_dump($user->getName());
            var_dump($user->getEmail());
            var_dump($user->getPublicEmail());
        });

        $users = User::all()->filter(function (User $user, $key) {
            return $user->getName() === 'Clement Koepp';
        });
        $users->each(function (User $user, $key) {
            var_dump($user->getName());
        });

        $user = User::with('userInfo')->find(1);
        var_dump($user->toArray());
    }

    public function request(UserRequest $request)
    {
        $user_id = (int)$request->input('id');
        $email = $request->input('email');
        $pass = $request->input('pass');
        $user = User::where('id', $user_id)->get();
        $response_data['pass'] = $pass;
        $response_data['user'] = $user[0];
        $response_data['info'] = [
            'info_dop' => [
                $request->ip(),
                $request->userAgent(),
                $request->method(),
                $request->url(),
                $request->all(),
                //$request->header(),
                $request->toArray(),
            ],
            'product' => [
                [
                    'id' => 1,
                    'name' => 'product1',
                    'price' => 100,
                ],
                [
                    'id' => 2,
                    'name' => 'product2',
                    'price' => 200,
                ]
            ]
        ];
        return response()->json([
            'result' => 'ok',
            'data' => $response_data
        ]);
    }
}
