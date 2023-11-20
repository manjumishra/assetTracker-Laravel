<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\addasset;
use Illuminate\Support\Facades\DB;

class Assetmanage extends Controller
{
    public function add()
    {
        return view('addasset');
    }
    public function show()
    {
        $sel = addasset::all();
        return view('showAsset', compact('sel'));
    }
    public function edit($id)
    {
        $sel = addasset::all()->where('id', $id);
        return view('EditAsset', compact('sel'));
    }
    public function sendasset(Request $req)
    {
        $val = $req->validate(
            [
                'Asset_type' => 'required|unique:addassets',
                'description' => 'required|min:5|max:500',
            ],
            [
                'Asset_type.required' => 'The Asset type field is required',

            ]
        );
        if ($val) {
            $assettype = $req->Asset_type;
            $description = $req->description;
            $data = new addasset();
            $data->Asset_type = $assettype;
            $data->description = $description;
            if ($data->save()) {
                return back()->with('error', 'Data Added Successfully!!!');
            } else
                return back()->with('error', 'Data not Added');
        }
    }


    // For delete Asset Type
    public function delete($id)
    {
        $data = addasset::find($id)->delete();
        return redirect('/show');
    }


    //For data update
    public function update(Request $req)
    {
        $val = $req->validate([
            'Asset_type' => 'required',

        ]);
        if ($val) {
            $data = addasset::where('id', $req->id)->update([
                'Asset_type' => $req->Asset_type,
                'description' => $req->description,
            ]);
            if ($data) {
                return redirect('/show');
            }
        }
    }




    public function index1()
    {

       $result2 = DB::select(DB::raw("select status as total,count('status')as count from addcategories group by status"));
       $chartData = "";
        foreach ($result2 as $list) {
            $name = $list->total == 1 ? "Active" : "In-Active";
            $chartData .= "['" . $name . "',     " . $list->count . "],";
        }
        $arr['chartData'] = rtrim($chartData, ",");



        return view('barchart', $arr);
    }
}
