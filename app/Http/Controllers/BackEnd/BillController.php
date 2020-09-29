<?php

namespace App\Http\Controllers\BackEnd;

use App\Bill as AppBill;
use Illuminate\Http\Request;
use App\Models\Bill;
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
    //    return $request->all();

        $requestArray = $request->all();

       /* if(isset($requestArray['password']) )
        $requestArray['password'] =  Hash::make($requestArray['password']);*/
        // if(isset($requestArray['image']) )
        // {
        //     $fileName = $this->uploadImage($request );
        //     $requestArray['image'] =  $fileName;
        // }

        $requestArray['user_id'] = Auth::user()->id;
        $this->model->create($requestArray);
        session()->flash('action', 'تم الاضافه بنجاح');

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
