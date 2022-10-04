<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Useraccess;
use Auth;
use QrCode;
use DNS1D;
use DNS2D;
use Validator;

class HelpersController extends Controller
{
    public static function getListMenu(){
    	$listmenu = '{
    "data": [{
        "dropdown":"0",
        "url":"dashboard",
        "name":"Dashboard",
        "class":"",
        "icon":"fa fa-tachometer-alt",
        "list_child":[]
    }, { 
        "dropdown":"1",
        "url":"",
        "name":"Master",
        "class":"",
        "icon":"clr-red fa fa-database",
        "list_child":[{
            "dropdown":"0",
            "url":"users",
            "name":"Users",
            "class":"",
            "icon":"clr-blue fa fa-users",
            "list_child":[]
        }, { 
            "dropdown":"0",
            "url":"now",
            "name":"Now Playing",
            "class":"",
            "icon":"clr-blue bi bi-person-bounding-box",
            "list_child":[]
        }, { 
            "dropdown":"0",
            "url":"popular",
            "name":"Popular",
            "class":"",
            "icon":"clr-blue bi bi-person-bounding-box",
            "list_child":[]
        },{ 
            "dropdown":"0",
            "url":"top",
            "name":"Top Rated",
            "class":"",
            "icon":"clr-blue bi bi-person-bounding-box",
            "list_child":[]
        },
        { 
            "dropdown":"0",
            "url":"up",
            "name":"Up Coming",
            "class":"",
            "icon":"clr-blue bi bi-person-bounding-box",
            "list_child":[]
        }
        ]
    }   ]
}';
    	return json_decode($listmenu);
    }

    public static function checkaccess($name_access = '', $key_access = ''){
        if(Auth::user()->id_role == 99) return true;
        if($name_access != '' && $key_access != ''){

            $checkaccess = Useraccess::select('val_access')->where('id_users', Auth::user()->id)->where('name_access', $name_access)->where('key_access', $key_access)->first();
            if(isset($checkaccess->val_access) && $checkaccess->val_access == 1) return true;
        }
        return false;
    }

    public static function access_crudList(){
        return array('view', 'add', 'edit', 'delete', 'import', 'export');
    }

    public function generateqrcode($text = 'Hello', $size = 250){
        $str = QrCode::size($size)->generate($text);
        $re = '/<svg(.*)<\/svg>/m';
        preg_match_all($re, $str, $matches, PREG_SET_ORDER, 0);

        $svg = '';
        if(isset($matches[0][1])){
            $svg = '<svg '.$matches[0][1].'</svg>';
        } 
        return json_encode(['data' => [$svg], 'status' => '200'], 200);
    }

    public function generateBarcode($text = '0000000000', $tinggi = 60, $jarak_spasi = 3){
        if(is_numeric($text)) {
            $str = DNS1D::getBarcodeSVG($text, 'UPCE', $jarak_spasi, $tinggi);
            $re = '/<svg(.*)<\/svg>/ms';
            preg_match_all($re, $str, $matches, PREG_SET_ORDER, 0);
            $svg = '';
            if(isset($matches[0][1])){
                $svg = '<svg'.$matches[0][1].'</svg>';
            } 
            return json_encode(['data' => [$svg], 'status' => '200'], 200);
        } else {
            return json_encode(['data' => ['false : is not numeric'], 'status' => '200'], 200);
        }
        
    }

    // // ## Copy this to validator

    // $validator = Validator::make($params = $request->all(), [
    //   'image' => 'mimes:jpeg,png,jpg,gif,svg|max:2048'
    // ]);

    // if ($validator->fails()) {
    //   return response()->json(['errors'=>$validator->errors()]);
    // }

    public static function uploadImage($request, $imagename='nameprod12222'){

        if($request->file() != null) {
            foreach($request->file() as $key => $img)
            {
                $extention = $img->getClientOriginalExtension(); // asli berhasil
                $imageNameExtension = $imagename.'.'.$extention; // will be save name $imagename.$extention asli
                $imgmove = $img->move(public_path('images/uploads'), $imageNameExtension); // asli berhasil
                // dd($img->getRealPath());
                $Thumbnails = 'Thumbnail-'.$imagename.'.'.$extention;
                // $thumbnails = Image::make($imgmove->getRealPath())->resize(50,50)->save('public/images/uploads'. $imagename.'-thumbnail.'.$extention); // asli berhasi;
                // dd($Thumbnails);
                // Image::make($imgmove->getRealPath())->resize(250,250)->save('images/uploads/'.$Thumbnails); // asli berhasi;
            }
            return $imageNameExtension;
        }
        return false;
    }
    public static function generateKodekaryawan($namadepan = '', $namabelakang = 0)
    {
        // nama_products, total product berdasarkan kategori, brand products
        if($namadepan != '')
        { 
            $hasil = self::DapetHurufDepan($namadepan);
            // $total_count = Product::where('category_id', $category_id)->count()+1;
            $untukstrtotime = strtotime(date('YmdHis'));
            return $hasil.$namabelakang.$untukstrtotime;
        } else {
            return false;
        } 
    }

    public static function DapetHurufDepan($a)
    {
        $words = explode(" ", $a);
        $acronym = "";

        foreach ($words as $w) 
        {
            $acronym .= $w[0];
        }

        return $acronym;
    }
}
