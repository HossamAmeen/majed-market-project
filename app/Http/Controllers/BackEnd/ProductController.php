<?php
namespace App\Http\Controllers\BackEnd;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use Image ,DB;

class ProductController extends BackEndController
{
    public function __construct(Product $model)
    {
        parent::__construct($model);
    }
    public function store(Request $request){

        $requestArray = $request->all();
        $total =$request->purchasing_price * $request->quantity;
        $requestArray['total_price'] =$total;
        $requestArray['user_id'] = Auth::user()->id;
        $requestArray['code'] =  $this->generateRandomNumber(5);
        while( $this->checkNumber( $requestArray['code'] )  ) {
            $requestArray['code'] =  $this->generateRandomNumber(5);
        }
        $this->model->create($requestArray);
        session()->flash('action', 'تم الاضافه بنجاح');

        return redirect()->route($this->getClassNameFromModel().'.index');
    }

    public function update($id , Request $request){



        $row = $this->model->FindOrFail($id);
        $requestArray = $request->all();
        $total =$request->purchasing_price * $request->quantity;
        $requestArray['total_price'] =$total;
      
        $requestArray['user_id'] = Auth::user()->id;
        $row->update($requestArray);


        session()->flash('action', 'تم التحديث بنجاح');
        return redirect()->route($this->getClassNameFromModel().'.index');
    }
    function generateRandomNumber($length)
    {
        $str = rand(0, 9); // first number (0 not allowed)
        for ($i = 1; $i < $length; $i++)
            $str .= rand(0, 9);

        return $str;
    }
    public function appendIndex($rows)
    {
        // $products = $this->model->get();  
        $data['productsCount'] =   count($rows);
        $data['totalQuantity'] =   $rows->sum('quantity');
        $data['totalBuyCost'] =   Product::value(DB::raw("SUM(quantity * purchasing_price )"));
        $data['totalSellCost'] =   Product::value(DB::raw("SUM(quantity * selling_price )")) ; 
        return $data;
    }
    public function checkNumber($code)
    {
        $shippingCard = $this->model->where('code' , $code)->first();
        if($shippingCard){
            return true;
        }
        else
        return false;
    }
    public function filter($rows)
    {
        if(request('quantity'))
        $rows = $rows->where('quantity' ,'<', request('quantity'));
        return  $rows;
    }
}
