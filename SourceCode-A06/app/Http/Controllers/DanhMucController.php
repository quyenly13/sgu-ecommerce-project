<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Danhmuc;
use Validator;
use Illuminate\Support\Facades\Input;
class DanhMucController extends Controller
{
  function index()
  {
    $danhmucs = Danhmuc::all();
    return view('webmaster.quanlydanhmuc',['danhmucs'=>$danhmucs]);
  }
  function insert()
  {
    return view('webmaster.themdanhmuc');
  }
  function postinsert(Request $request)
  {
    $rules = array(
        'tendanhmuc'=> 'required',
        'mota'=>'required',
        'anh_dai_dien'=>'required|mimes:jpeg,png,jpg,gif,svg|max:2048'
    );
    $validator = Validator::make(Input::all(), $rules);

    // process
    if ($validator->fails()) {
        return redirect()->back()
            ->withErrors($validator)
            ->withInput(Input::all());
    }
    else
    {
        // luu anh
        $file = $request->file('anh_dai_dien');
        $name = $file->getClientOriginalName();
        $name_new = str_random(9)."_".$name;
        $file->move('uploads/cat_img',$name_new);
        //store
        $danhmuc = new Danhmuc;
        $danhmuc->ten_danh_muc = Input::get('tendanhmuc');
        $danhmuc->mo_ta = Input::get('mota');
        $danhmuc->anh_dai_dien =  'uploads/cat_img/'.$name_new;
        $danhmuc->save();

        // redirect

        return redirect()->back()->with('success', 'Thêm thành công danh  mục');
    }
  }
  function edit($id)
  {
    $danhmuc = Danhmuc::find($id);
    return view('webmaster.thongtindanhmuc',['danhmuc'=>$danhmuc]);
  }

  function postedit($id,Request $request)
  {

      // validate
      // read more on validation at http://laravel.com/docs/validation
      $rules = array(
          'tendanhmuc'=> 'required',
          'mota'=>'required',
      );
      $validator = Validator::make(Input::all(), $rules);

      // process
      if ($validator->fails()) {
          return redirect()->back()
              ->withErrors($validator)
              ->withInput(Input::all());
      } else {
          // store
          $danhmuc = Danhmuc::find($id);
            $danhmuc->ten_danh_muc   = Input::get('tendanhmuc');
            $danhmuc->mo_ta     = Input::get('mota');
            if($request->anh_dai_dien!="")
            {
              // luu anh
              $file = $request->file('anh_dai_dien');
              $name = $file->getClientOriginalName();
              $name_new = str_random(9)."_".$name;
              $file->move('uploads/cat_img',$name_new);
              //store
              $danhmuc->anh_dai_dien =  'uploads/cat_img/'.$name_new;
            }
            $danhmuc->save();

          // redirect

          return redirect()->back()->with('success', 'Cập nhật thành công danh mục');;
      }
  }

   function remove($id)
{
    // delete
    $danhmuc= Danhmuc::find($id);
    $danhmuc->delete();
    return redirect()->back()->with('success', 'Xóa thành công danh mục');
}

}
