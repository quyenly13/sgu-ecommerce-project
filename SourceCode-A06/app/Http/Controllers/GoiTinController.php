<?php

namespace App\Http\Controllers;
use App\Models\Goitin;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Input;
class GoiTinController extends Controller
{
  function index()
  {
    $goitins = Goitin::all();
    return view('webmaster.quanlygoitin',['goitins'=>$goitins]);
  }
  function insert()
  {
    return view('webmaster.themgoitin');
  }
  function postinsert()
  {
    $rules = array(
        'giagoitin'=> 'required',
        'soluong'=>'required'
    );
    $validator = Validator::make(Input::all(), $rules);

    // process
    if ($validator->fails()) {
        return redirect()->back()
            ->withErrors($validator)
            ->withInput(Input::all());
    } else {
        // store

        $goitin = new Goitin;
        $goitin->don_gia = Input::get('giagoitin');
        $goitin->so_luong = Input::get('soluong');
      $goitin->save();

        // redirect

        return redirect()->back()->with('success', 'Cập nhật thành công');;
    }
  }
  function edit($id)
  {
    $goitin = Goitin::find($id);
    return view('webmaster.thongtingoitin',['goitin'=>$goitin]);
  }

  function postedit($id)
  {
      // validate
      // read more on validation at http://laravel.com/docs/validation
      $rules = array(
          'giagoitin'=> 'required',
          'soluong'=>'required'
      );
      $validator = Validator::make(Input::all(), $rules);

      // process
      if ($validator->fails()) {
          return redirect()->back()
              ->withErrors($validator)
              ->withInput(Input::all());
      } else {
          // store
          $goitin = Goitin::find($id);
          $goitin->don_gia = Input::get('giagoitin');
          $goitin->so_luong = Input::get('soluong');
        $goitin->save();


          // redirect

          return redirect()->back()->with('success', 'Cập nhật thành công');;
      }
  }

   function remove($id)
{
    // delete
    $goitin = Goitin::find($id);
    $goitin->delete();
    return redirect()->back()->with('success', 'Xóa thành công');
}

}
