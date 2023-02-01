<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ProductController extends Controller
{
    //
    public function index (Request $request){
       
        $products = Product::all();
        return view ('product.index' , compact('products'));
        
        
    }

    public function checkout(Request $request){
        
        $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET_KEY'));
              
        $products = Product::all();
        $lineItem = [];
        $totalPrice = 0;
        foreach ($products as $product){
            $totalPrice+= $product->price;
            $lineItem[] = [
                
                    'price_data' => [
                      'currency' => 'usd',
                      'product_data' => [
                        'name' => $product->name,
                      ],
                      'unit_amount' => $product->price * 100,
                    ],
                    'quantity' => 1,
                  
            ];

        }


        $checkout_session = $stripe->checkout->sessions->create([
            'line_items' => $lineItem,
            'mode' => 'payment',
            'success_url' => route('checkout.success', [], true)."?session_id={CHECKOUT_SESSION_ID}" ,
            'cancel_url' => route('checkout.cancel',[],true),
          ]);

          $order = new Order();
          $order->status = 'unpaid';
          $order-> total_price = $totalPrice;
          $order->session_id = $checkout_session->id;
          $order->save();
          

          
          return redirect($checkout_session->url);
    }

    public function success (Request $request){
        $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET_KEY'));
        $newUser = User::find(auth()->user()->id);
        $newUser->name= auth()->user()->name;
        $newUser->is_subed = true;
      //   auth()->user()->is_subed = true;
      $newUser->update();


        $sessionId = $request->get('session_id');
        $customer = null;
       try {
        $session = $stripe->checkout->sessions->retrieve($sessionId);
        if (!$session){
            throw new NotFoundHttpException;
        }
        $customer = $stripe->customers->retrieve($session->customer);
        $order = Order::where('session_id' , $session->id)->where('status', 'unpaid')->first();
        if(!$order){
            throw new NotFoundHttpException();
        }
        $order->status= 'paid';
        $order->save();

       } catch (\Throwable $th) {
        throw new NotFoundHttpException;
       }
        return view ('product.checkout-success' , compact('customer'));

    }
    public function cancel(){

    }
}
