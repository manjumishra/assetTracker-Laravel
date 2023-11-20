<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\addasset;
use App\Models\addcategory;
use Illuminate\Support\Facades\DB;

class Categorymanage extends Controller
{
    // For Show Categiory page
    public function addcat()
    {
        $sel = addasset::all();
        return view('addcategory', compact('sel'));
    }


    //For add category
    public function sendcat(Request $req)
    {
        $val = $req->validate([
            'name' => 'required',
            'assettype' => 'required',
        ]);
        if ($val) {
            $name = $req->name;
            $code = rand(1000000000000000, 9999999999999999);
            $assettype = $req->assettype;
            $status = $req->active;
            $file = $req->file('image');
            $dest = public_path('/uploads');
            $filename = "Image-" . rand() . "-" . time() . "." . $file->extension();
            $data = new addcategory();
            $data->name = $name;
            $data->code = $code;
            $data->type_id = $assettype;
            $data->status = 1;
            $data->image = $filename;
            if ($data->save()) {
                $file->move(public_path('/uploads'), $filename);
                return back()->with('error', 'Data Added Successfully');
            } else
                return back()->with('error', 'Data not Added');
        }
    }


    // For show category list
    public function show()
    {
        $sel = addcategory::all();
        return view('showCategory', compact('sel'));
    }

    //For delete products
    public function delete($id)
    {
        $data = addcategory::find($id)->delete();
        return redirect('/showcat');
    }

    // For show Edit page
    public function edit($id)
    {
        $data = addasset::all();
        $sel = addcategory::all()->where('id', $id);
        return view('EditCategory', compact('sel', 'data'));
    }



    //For edit
    public function updatecat(Request $req)
    {
        $val = $req->validate([
            'name' => 'required',

        ]);
        if ($val) {
            $data = addcategory::where('id', $req->id)->update([
                'name' => $req->name,
                'type_id' => $req->assettype,
            ]);

            return redirect('/showcat');
        }
    }

  //For Pie Chart
    public function index()
    {
        $result = DB::select(DB::raw("select count(*)as total,name from addcategories group by name"));
        $chartData = "";
        foreach ($result as $list) {
            $chartData .= "['" . $list->name . "',     " . $list->total . "],";
        }
        $arr['chartData'] = rtrim($chartData, ",");
        return view('piechart', $arr);
    }
}
