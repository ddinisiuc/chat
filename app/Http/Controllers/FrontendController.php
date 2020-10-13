<?php

namespace App\Http\Controllers;

use App\Events\NewEvent;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class FrontendController extends Controller
{
    public function index(){
        $arr = [
            ['title' => 'Dinisiuc'],
            ['title' => 'Daniil']
        ];
        return view('index', compact('arr'));
    }

    public function getJson(){
        return [
            'product' => 'Cocacola',
            'price' => 11,
            'features' =>[
                'chip', 'bad for health', 'black color'
            ]
        ];
    }

    public function chartData(){
        return [
            'labels' =>['Март', 'Декабрь'],
            'datasets' => [
                [
                    'label' => 'Iphone',
                    'backgroundColor' => 'red',
                    'data' => [rand(0,300), rand(0,500)]
                ],
                [
                    'label' => 'Xperia',
                    'backgroundColor' => 'green',
                    'data' => [100, 300]
                ],
            ]
        ];
    }

    public function newEvent(Request $request){
        $result = [
            'labels' =>['Март', 'Декабрь'],
            'datasets' => [
                [
                    'label' => 'Iphone',
                    'backgroundColor' => 'red',
                    'data' => [rand(0,300), rand(0,500)]
                ],
            ]
        ];

        if($request->has('label')){
            $result['labels'][] = $request->label;
            $result['datasets'][0]['data'][] = (integer)$request->sale;
        }

        if($request->realtime == 'true'){
            event(new NewEvent($result));
        }

        return $result;
    }

    public function getFacebookAlbum(){
        $user = User::find(6);
        $response = Http::get('https://graph.facebook.com/v8.0/'.$user->fb_id.'/albums?access_token='.$user->fb_token);
        $data = json_decode($response->body(), true)['data'];

        return $data;
    }

    public function getAlbumPhotos(){
        $user = User::find(6);
        $response = Http::get('https://graph.facebook.com/v8.0/2511672328905516/photos?fields=photos,source&access_token='.$user->fb_token);

        $data = json_decode($response->body(), true)['data'];

        return view('welcome', compact('data'));
    }

    public function chat(){
        
        return view('chat');
    }
}
