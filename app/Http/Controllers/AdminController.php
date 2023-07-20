<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{

    public function save(Request $request): \Illuminate\Http\RedirectResponse
    {
        DB::table('avto_spare')->insert([
            'name' => $request->input('nameOfSpare'),
            'articul' => $request->input('articul'),
            'type_avto_id' => $request->input('typeAvto'),
            'type_id' => $request->input('type'),
            'image_link' => $_FILES['linkToFile']['name'],
            'price' => $request->input('price'),
            'description' => $request->input('description')
        ]);

        $path = "img/".$_FILES['linkToFile']['name'];

        move_uploaded_file($_FILES['linkToFile']['tmp_name'], $path);

        $lastId = DB::table('avto_spare')->select('id')->get()->last();

        // загрузка доп изображений



        return redirect()->to(route('user.admin'));


    }
}
