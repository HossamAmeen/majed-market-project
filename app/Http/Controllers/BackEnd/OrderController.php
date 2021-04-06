<?php

namespace App\Http\Controllers\BackEnd;
use App\Models\{Order,Product};
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends BackEndController
{
    public function __construct(Order $model)
    {
        parent::__construct($model);
    }

    public function store(Request $request){
        $requestArray = $request->all();
        $requestArray['user_id'] = Auth::user()->id;
       
        $this->model->create($requestArray);

        session()->flash('action', 'تم الاضافه بنجاح');

        return redirect()->route($this->getClassNameFromModel().'.index');
    }

    public function update($id , Request $request){



        $row = $this->model->FindOrFail($id);
        $requestArray = $request->all();

       /* if(isset($requestArray['password']) && $requestArray['password'] != ""){
            $requestArray['password'] =  Hash::make($requestArray['password']);
        }else{
            unset($requestArray['password']);
        }*/
        // if(isset($requestArray['image']) )
        // {
        //     $fileName = $this->uploadImage($request );
        //     $requestArray['image'] =  $fileName;
        // }

      $requestArray['user_id'] = Auth::user()->id;
        $row->update($requestArray);


        session()->flash('action', 'تم التحديث بنجاح');
        return redirect()->route($this->getClassNameFromModel().'.index');
    }
    public function destroy($id)
    {
       $order = $this->model->FindOrFail($id);
            $product = Product::find($order->product_id);
            if(isset($product)){
                $product->quantity += $order->quantity;
                $product->save();
            }
            else
            {
                $requestArray['code'] =  $this->generateRandomNumber(5);
                while( $this->checkNumber( $requestArray['code'] )  ) {
                    $requestArray['code'] =  $this->generateRandomNumber(5);
                }
            
                Product::create([
                    'name'=>$order->product_name,
                    'code'=> $requestArray['code']
                ]);
            }
            $bill = $order->bill;
            if(isset($bill->orders) )
            if($bill->orders->count() == 1)
                $bill->delete();
            $order->delete();
            // return $order;
        return redirect()->route($this->getClassNameFromModel() . '.index');
    }
    public function filter($rows)
    {
        if(request('day') != null)
        $rows = $rows->whereYear('date' , date('Y'))->whereMonth('date' , date('m'))->whereDate('date' , request('day'));
        if(request('month') != null)
        $rows = $rows->whereYear('date' , date('Y'))->whereMonth('date' ,  request('month'));
        if(request('year') != null)
        $rows = $rows->whereYear('date' , request('year'));

        if(request('dateSearch') != null)
        {
            // session('dateSearch' ,request('dateSearch') );
            session(['dateSearch' => request('dateSearch')]);
            $rows = $rows->whereDate('date' ,'>=', request('dateSearch'));
        }
        return $rows;
    }
    function generateRandomNumber($length)
    {
        $str = rand(0, 9); // first number (0 not allowed)
        for ($i = 1; $i < $length; $i++)
            $str .= rand(0, 9);

        return $str;
    }

    public function checkNumber($code)
    {
        $shippingCard = Product::where('code' , $code)->first();
        if($shippingCard){
            return true;
        }
        else
        return false;
    }
    
}
