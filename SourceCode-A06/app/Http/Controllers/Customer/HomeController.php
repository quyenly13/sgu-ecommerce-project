<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use App\Models\Danhmuc;
use App\Models\Sanpham;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Query\Builder;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $categories = Danhmuc::orderBy('id', 'desc')->take(6)->get();
        // $latestProducts = Sanpham::latest()->take(20)->get()->paginate(9);
        $latestProducts = Sanpham::orderBy('created_at', 'desc')
        ->where('trang_thai',1)->paginate(9);
        //  $users[] = Auth::guard('customer')->user();
        //   dd($users);

        return view('customer.pages.index', compact('latestProducts'));
    }

    // public function search(Request)
}
 