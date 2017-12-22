<?php

namespace App\Http\Controllers\Customer;

use App\Models\Sanpham;
use App\Models\Merchant;
use App\Models\Danhmuc;
use App\Models\Danhgia;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Query\Builder;

class ProductsController extends Controller {
    /**
     * Search for items in our e-commerce store
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */


    public function showDetail(){
        $categories = Danhmuc::orderBy('id', 'desc')->take(6)->get();
        return view('customer.pages.product-detail', compact($categories));
    }

    public function getDetail(Request $req)
    {
        $product = Sanpham::where('id', $req->id)->first();
        // dd($product->id_m);
        $merchant = Merchant::where('id_m', $product->id_m)->first();
        $rating = Danhgia::where('id_m', $product->id_m)->get();
        $numRating = $rating->count();
        $avgScore = number_format($rating->avg('diem_so'), 1, '.', '');
        $sp_lienquan = Sanpham::where('ma_danh_muc',$product->ma_danh_muc)->take(3)->get();
        // dd($avgScore);

        return view('customer.pages.product-detail', compact('product', 'merchant', 'numRating', 'avgScore','sp_lienquan'));
    }

    public function searchBox(Request $request) {
        $keyword = $request->input('keyword');
        // $pro = Sanpham::where('ten_san_pham', $keyword);
        if ($keyword == '') {
            return back();
        } else {
            $pro = Sanpham::where('ten_san_pham', 'like', '%' . $keyword . '%')->get();
            return view('customer.pages.search-result', ['msg' => 'Kết quả tìm kiếm: ' . $keyword], compact('pro', 'keyword'));
        }
    }

    public function showProCate(Request $req){
        $product = Sanpham::where('ma_danh_muc', $req->id)->paginate(9);
        $cateName = Danhmuc::where('id', $req->id)->first();
        // dd($product);
        return view('customer.pages.products-cate', compact('product', 'cateName'));
    }


    public function showProMer(Request $req){
        // dd($req->id);
        $merName = Merchant::where('id_m', $req->id)->first();
        $product = Sanpham::where('id_m', $req->id)->paginate(9);
        $rating = Danhgia::where('id_m', $req->id)->get();
        $avgScore = number_format($rating->avg('diem_so'), 1, '.', '');
        $numRating = $rating->count();
        return view('customer.pages.products-merchant', compact('product', 'merName', 'avgScore', 'numRating'));
    }

    public function search(Request $request) {

        $start = $request->start; // min price value
        $end = $request->end; // max price value
        $nameMer =$request->merchant;
        if(isset($request->merchant)) {
            $mer = DB::table('merchant')->where('ten_dang_nhap' , 'LIKE', '%'.$request->merchant.'%')->select('id_m')->get()->toArray();
            $mer_id_lst = array();
            foreach($mer as $m)
            {
              array_push($mer_id_lst, $m->id_m);
            }
           
            if (count($mer) > 0) {
                
                $product = Sanpham::whereBetween('don_gia',[$start, $end])->whereIn('id_m',$mer_id_lst)->orderBy('don_gia', 'ASC')->paginate(9);
                 if(count($product) == 0) {
                     $msg = "Không có kết quả nào phù hợp";
                    return view('customer.pages.search-price', compact('msg'));
                } else {
                    return view('customer.pages.search-price', compact('product','kqheader', 'nameMer', 'start', 'end'));
                }
            } else {
                 $msg = "Không có kết quả nào phù hợp";
                    return view('customer.pages.search-price', compact('msg'));
            }
        } else {
            $product = Sanpham::whereBetween('don_gia',[$start, $end])->orderBy('don_gia', 'ASC')->paginate(9);
                if(count($product) == 0) {
                $msg = "Không có kết quả nào phù hợp";
                return view('customer.pages.search-price', compact('msg'));
            } else {
                return view('customer.pages.search-price', compact('product', 'start', 'end'));
            }
        }
    }


}
