<?php
namespace App\Http\Controllers\BackEnd;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Product as AppProduct;
use Image;

class ProductController extends BackEndController
{
    public function __construct(Product $model)
    {
        parent::__construct($model);
    }
    public function setTotal() {
        $this->total_price = $this->purchasing_price * $this->quantity;
    }
    public function store(Request $request){
    //    return $request->all();

        $requestArray = $request->all();
        $total =$request->purchasing_price * $request->quantity;
        $requestArray['total_price'] =$total;
       /* if(isset($requestArray['password']) )
        $requestArray['password'] =  Hash::make($requestArray['password']);*/
        // if(isset($requestArray['image']) )
        // {
        //     $fileName = $this->uploadImage($request );
        //     $requestArray['image'] =  $fileName;
        // }

       // $requestArray['user_id'] = Auth::user()->id;
        $this->model->create($requestArray);
        session()->flash('action', 'تم الاضافه بنجاح');

        return redirect()->route($this->getClassNameFromModel().'.index');
    }

    public function update($id , Request $request){



        $row = $this->model->FindOrFail($id);
        $requestArray = $request->all();
        $total =$request->purchasing_price * $request->quantity;
        $requestArray['total_price'] =$total;
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

     //   $requestArray['user_id'] = Auth::user()->id;
        $row->update($requestArray);


        session()->flash('action', 'تم التحديث بنجاح');
        return redirect()->route($this->getClassNameFromModel().'.index');
    }
}
