<?php

namespace App\Http\Controllers;

use App\Contracts\OrderContract;
use App\Service\PayPalService;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    //
    protected $orderRepository;
    protected $payPal;
    public function __construct(OrderContract $orderRepository, PayPalService $payPalService)
    {
        $this->orderRepository = $orderRepository;
        $this->payPal = $payPalService;
    }

    public function getCheckout()
    {
        return view('site.pages.checkout');
    }
    public function placeOrder(Request $request)
    {
        $order = $this->orderRepository->storeOrderDetails($request->all());

        if($order){
            $this->payPal->processPayment($order);
        }

        return redirect()->back()->with('message', 'Order not Placed');
    }
}
