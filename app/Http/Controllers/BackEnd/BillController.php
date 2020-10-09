<?php

namespace App\Http\Controllers\BackEnd;

use App\Bill as AppBill;
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
            for($i=0; $i<count($request->products) ; $i++){
                if($request->products[$i] == null){
                    continue;
                }
                $product = Product::where('code',$request->products[$i])->first();
                if(!isset($product)){
                    return redirect()->back()->withErrors(['errorProduct' => "كود هذا المنتج غير صالح " .$request->products[$i] ])->withInput();
                }
                $price = $request->costs[$i] ?? $product->selling_price  ;
                $quantity = $request->quantity[$i] ?? 1 ;
                if($product->quantity < $quantity){
                    return redirect()->back()->withErrors(['errorProduct' => "هذا المنتج اقل من الكمية المطلوبة او ناقص" .$product->name ])->withInput();
                }
                $bill = $this->model->create($requestArray);
                Order::create([
                    'product_price'=> $product->selling_price,
                    'price'=> $price,
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
        session()->flash('action', 'تم الاضافه بنجاح');
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

    public function bill()
    {
        $data['rows']=Bill::all();
        return view('back-end.bills.bill');
    }

    public function printBill($id)
    {
        // return $id;
        // return "<td>test</td>";
        $data['rows']=Bill::with('billedProducts')->where('id',$id)->get();

        return view('back-end.bills.bill')->with($data);
    }

}
