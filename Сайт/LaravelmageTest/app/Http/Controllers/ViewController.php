<?php

namespace App\Http\Controllers;

use App\Models\Basket;
use App\Models\Category;
use App\Models\Image;
use App\Models\Orders;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Tests\Integration\Queue\Order;

class ViewController extends Controller
{

    public function View_image(){
        $image = Image::get();
        return view('image',[
            'image'=>$image
        ]);
    }
    public function View_create(){


        return view('create');
    }
}
