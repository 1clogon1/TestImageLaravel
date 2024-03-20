<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use ZipArchive;
use File;

class ImageController extends Controller
{



    function Translate_Image($value)
    {
        $converter = array(
            'а' => 'a',    'б' => 'b',    'в' => 'v',    'г' => 'g',    'д' => 'd',
            'е' => 'e',    'ё' => 'e',    'ж' => 'zh',   'з' => 'z',    'и' => 'i',
            'й' => 'y',    'к' => 'k',    'л' => 'l',    'м' => 'm',    'н' => 'n',
            'о' => 'o',    'п' => 'p',    'р' => 'r',    'с' => 's',    'т' => 't',
            'у' => 'u',    'ф' => 'f',    'х' => 'h',    'ц' => 'c',    'ч' => 'ch',
            'ш' => 'sh',   'щ' => 'sch',  'ь' => '',     'ы' => 'y',    'ъ' => '',
            'э' => 'e',    'ю' => 'yu',   'я' => 'ya'
        );
        $value = strtr($value, $converter);
        return $value;
    }

    public function Create_Image(Request $request)
    {

        $validateImageData = $request->validate([
            'images' => 'required|max:5',
            'images.*' => 'mimes:jpg,png,jpeg,gif,svg'
        ]);

        if($request->hasfile('images'))
        {
            foreach($request->file('images') as $key => $file)
            {
                $name_all = $file->getClientOriginalName();
                //Проверяем есть ли такое название
                $name = $this->Translate_Image(Str::lower(pathinfo($name_all, PATHINFO_FILENAME)));
                $image = Image::where('name', $name)->first();
                $path = $file->store('images', 'public');
                $url = str_replace('images/', '', $path);
                if($image==null){
                    $user= Image::create([
                        'name'=>$name,
                        'image'=> $url,
                    ]);
                }
                else{
                    Image::create([
                        'name'=>$name."_".uniqid(),
                        'image'=>$url
                    ]);
                }

            }
        }

        return redirect('Create')->with('status', 'Фотографии добавлены');
    }

    function Download_Image(Request $request){

        if(Storage::disk('public')->exists($request->file)){
            $path = Storage::disk('public')->path($request->file);
            $content = file_get_contents($path);
            return response($content)->withHeaders([
                'Content-Type'=>mime_content_type($path)
            ]);
        }
        return redirect('/404');
    }


    function Download_Image_zip($url){

        $file_path = public_path("image.zip");
        if(File::exists($file_path)) File::delete($file_path);

        $zip = new ZipArchive;
        $fileName = "image.zip";
        $path= 'storage/images/'.$url;
        if($zip->open(public_path($fileName),ZipArchive::CREATE)===TRUE){
                $realtiveNameZipFile =basename($path);
                $zip->addFile($path,$realtiveNameZipFile);
            $zip->close();
        }
        return response()->download(public_path($fileName));

    }

    public function Sort($sort){
        if($sort=='name'){
            $image = Image::orderBy('name', 'asc')->get();
            return view('image',[
                'image'=>$image
            ]);
        }
        else if($sort=='date_time'){
            $image = Image::orderBy('created_at', 'desc')->get();
            return view('image',[
                'image'=>$image
            ]);
        }


    }

    public function Get_Image_Info(){
        $image = Image::get();
        return response()->json($image);

    }
    public function Get_Image_Info_Id($id){
        $image = Image::where('id', $id)->first();
        if($image!=null){
            return response()->json($image);
        }
    }


}
