<?php
namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Validator;
use URL;
use Session;
use Redirect;
use Illuminate\Support\Facades\Input;
use DB;
use Auth;
use App\Models\Phieuthu;
/** All Paypal Details class **/
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\ExecutePayment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\Transaction;

class PaypalController extends Controller
{
    private $_api_context;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
   // private $data= array();
    public function __construct()
    {

        /** setup PayPal api context **/

        $paypal_conf = \Config::get('paypal');
        $this->_api_context = new ApiContext(
            new OAuthTokenCredential($paypal_conf['client_id'], $paypal_conf['secret']));
        $this->_api_context->setConfig($paypal_conf['settings']);
    }

    /**
     * Show the application paywith paypalpage.
     *
     * @return \Illuminate\Http\Response
     */
   public function buy_post_form()
   {
       $list_goitin = DB::table('goi_tin')->get();
      // return $list_goitin;
       return view('merchants.formbuypost',['list_goitin' => $list_goitin]);
   }
    /**
     * Store a details of payment with paypal.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postPaymentWithpaypal(Request $request)
    {

      //  $this->data = $request->all();
        Session::put('invoice', $request->all());

        $payer = new Payer();
        $payer->setPaymentMethod('paypal');

    	$item_1 = new Item();

        $item_1
        ->setName($request->get('id_goitin').'-'.$request->get('ten_goi_tin')) /** item name **/
            ->setCurrency('USD')
            ->setQuantity($request->get('so_luong'))
            ->setPrice($request->get('tong_tien')); /** unit price **/

        $item_list = new ItemList();
        $item_list->setItems(array($item_1));

        $amount = new Amount();
        $amount->setCurrency('USD')
            ->setTotal($request->get('tong_tien'));

        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($item_list)
            ->setDescription('Chi tiết giao dịch');

        $redirect_urls = new RedirectUrls();
        $redirect_urls->setReturnUrl(URL::route('status')) /** Specify return URL **/
            ->setCancelUrl(URL::route('status'));

        $payment = new Payment();
        $payment->setIntent('Sale')
            ->setPayer($payer)
            ->setRedirectUrls($redirect_urls)
            ->setTransactions(array($transaction));
            /** dd($payment->create($this->_api_context));exit; **/

        try {
            $payment->create($this->_api_context);
        } catch (\PayPal\Exception\PPConnectionException $ex) {
            if (\Config::get('app.debug')) {
                \Session::put('error','Hết thời gian giao dịch');
                return Redirect::route('merchant.create_bill');
                /** echo "Exception: " . $ex->getMessage() . PHP_EOL; **/
                /** $err_data = json_decode($ex->getData(), true); **/
                /** exit; **/
            } else {
                \Session::put('error','Có lỗi xảy ra. Xin lỗi về sự bất tiện này');
                return Redirect::route('merchant.create_bill');
                /** die('Some error occur, sorry for inconvenient'); **/
            }
        }

        foreach($payment->getLinks() as $link) {
            if($link->getRel() == 'approval_url') {
                $redirect_url = $link->getHref();
                break;
            }
        }

        /** add payment ID to session **/
        Session::put('paypal_payment_id', $payment->getId());

        if(isset($redirect_url)) {
            /** redirect to paypal **/
            return Redirect::away($redirect_url);
        }

        \Session::put('error','Phát hiện lỗi trong quá trình giao dịch');
    	return Redirect::route('merchant.create_bill');
    }

    public function getPaymentStatus()
    {
        /** Get the payment ID before session clear **/
        $payment_id = Session::get('paypal_payment_id');
        /** clear the session payment ID **/
        Session::forget('paypal_payment_id');
        if (empty(Input::get('PayerID')) || empty(Input::get('token'))) {

            return Redirect::route('merchant.create_bill')->with('error', 'Giao dịch không thành công');
        }
        $payment = Payment::get($payment_id, $this->_api_context);
        /** PaymentExecution object includes information necessary **/
        /** to execute a PayPal account payment. **/
        /** The payer_id is added to the request query parameters **/
        /** when the user is redirected from paypal back to your site **/
        $execution = new PaymentExecution();
        $execution->setPayerId(Input::get('PayerID'));
        /**Execute the payment **/
        $result = $payment->execute($execution, $this->_api_context);
        /** dd($result);exit; /** DEBUG RESULT, remove it later **/
        if ($result->getState() == 'approved') {
         $list_invoice_detail = Session::get('invoice');

//              DB::table('phieu_thu')->insert(
//                   [
//                       'id_goitin' => $list_invoice_detail['id_goitin'],
//                       'id_m'=>Auth::guard('merchant')->user()->id_m,
//                       'so_luong' =>  $list_invoice_detail['so_luong'],
//                       'tong_tien' =>  $list_invoice_detail['tong_tien'],
//                       'created_at'=>date("Y/m/d")
//                   ]
//               );

     $pt = new Phieuthu;
         $pt->id_goitin = $list_invoice_detail['id_goitin'];
         $pt->id_m = Auth::guard('merchant')->user()->id_m;
         $pt->so_luong = $list_invoice_detail['so_luong'];
         $pt->tong_tien = $list_invoice_detail['thanh_tien'];
         $pt->save();
             $merchant = \App\Models\Merchant::find(Auth::guard('merchant')->user()->id_m);
                   $merchant->so_luong_tin += $list_invoice_detail['so_luong_tin_dang'];
                   $merchant->save();
            Session::forget('invoice');
            return Redirect::route('merchant.create_bill')->with('success', 'Giao dịch thành công');
        }

		return Redirect::route('merchant.create_bill')->with('error', 'Giao dịch không thành công');
    }
}
