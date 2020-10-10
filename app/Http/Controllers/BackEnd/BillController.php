<?php

namespace App\Http\Controllers\BackEnd;


use Illuminate\Http\Request;
use App\Models\{Product,Bill,Order};
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class BillController extends BackEndController
{
    public function __construct(Bill $model)
    {
        parent::__construct($model);
    }

    public function store(Request $request){
        $requestArray = $request->all();
        $requestArray['user_id'] = Auth::user()->id;

        
        if(is_array($request->products)){
            $bill = $this->model->create($requestArray);
            for($i=0; $i<count($request->products) ; $i++){
                if($request->products[$i] == null){
                    break;
                }
                $product = Product::where('code',$request->products[$i])->first();
                if(!isset($product)){

                    $this->destroy($bill->id);
                    return response(['error'=>"كود هذا المنتج غير صالح "] , 400);
                    return json_encode(['id' => $bill->id] , 400);
                    return redirect()->back()->withErrors(['errorProduct' => "كود هذا المنتج غير صالح " .$request->products[$i] ])->withInput();
                }
                $price = $request->costs[$i] ?? $product->selling_price  ;
                $quantity = $request->quantity[$i] ?? 1 ;
                if($product->quantity < $quantity){
                    $this->destroy($bill->id);
                    return response(['error'=> "هذا المنتج($product->name) اقل من الكمية المطلوبة او ناقص"] , 400);
                    return json_encode(['id' => $bill->id],400);
                    return redirect()->back()->withErrors(['errorProduct' => "هذا المنتج اقل من الكمية المطلوبة او ناقص" .$product->name ])->withInput();
                }
                else
                {
                    $product->quantity -= $quantity ;
                    $product->save(); 
                }
               
                Order::create([
                    'product_price'=> $product->selling_price,
                    'price'=> $price,
                    'product_name'=>  $product->name,
                    'quantity'=>$quantity,
                    'date'=>date('Y-m-d'),
                    'discount'=>$request->discounts[$i]?? 0,
                    'user_id'=>Auth::user()->id,
                    'product_id'=>$product->id,
                    'bill_id'=>$bill->id,
                ]);
                // Bills_Product::create([
                //     'product_price'=> $product->selling_price,
                //     'selling_price',
                //     'discount',
                //     'quantity',
                //     'bill_id',
                //     'product_id'
                // ]);
            }
        }
        // session()->flash('action', 'تم الاضافه بنجاح');
        return response(['id' => $bill->id], 200);
        return json_encode(['id' => $bill->id]);
        return redirect()->back()->withInput();
        return redirect()->route($this->getClassNameFromModel().'.index');
    }

    public function update($id , Request $request){



        $row = $this->model->FindOrFail($id);
        $requestArray = $request->all();
        $requestArray['user_id'] = Auth::user()->id;
        $row->update($requestArray);


        session()->flash('action', 'تم التحديث بنجاح');
        return redirect()->route($this->getClassNameFromModel().'.index');
    }

    public function destroy($id)
    {
        $this->model->FindOrFail($id)->delete();
        $orders = Order::where('bill_id' , $id)->get();
        foreach($orders as $order){
            $product = Product::find($order->product_id);
            if(isset($product)){
                $product->quantity += $order->quantity;
                $product->save();
            }
            $order->delete();
        }
      
        return redirect()->route($this->getClassNameFromModel() . '.index');
    }
    public function bill()
    {
        $data['rows']=Bill::all();
        return view('back-end.bills.bill');
    }

    public function printBill($id)
    {
        // return $id;
        // return "<td>test</td>";
        $bill=Bill::with('orders')->where('id',$id)->first();
       
        return view('back-end.bills.bill' , compact('bill'));
        // $data['rows']=Bill::with('billedProducts')->where('id',$id)->get();

        // return view('back-end.bills.bill')->with($data);
    }

}
