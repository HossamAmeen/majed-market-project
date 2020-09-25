<?php

namespace App\Http\Controllers\BackEnd;
use App\Models\User;
use App\Models\Configration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;
use App\Models\Order;
use Illuminate\Support\Facades\Response;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
class ConfigrationController extends BackEndController
{
    public function __construct(Configration $model)
    {
        parent::__construct($model);
    }

    public function index()
    {
           
        return redirect()->route("configrations.edit", ['id' => 1]);
    }
    public function update(Request $request, $id)
    {

        $pref = Configration::find($id);
        if (!empty($pref)) {
            $pref->fill($request->all());
            $pref->save();
        }

        session()->flash('action', 'تم التحديث بنجاح');
        return back()->withInput();
    }

    public function sendToken(Request $request)
    {

        if ($request->isMethod('post')) {

            $user = User::where('email', $request->email)->first();

            if (!empty($user)) {

                $user->remember_token = md5(rand(1, 10) . microtime());
                $user->save();

                $data = [
                    'email' => $request->email,
                    'token' => $user->remember_token,
                    'id' => $user->id,

                ];
                Mail::send('back-end.mail_send_token', $data, function ($message) use ($data) {

                    $message->from('info@tibaroyal.com');
                    $message->to($data['email']);
                    $message->subject('reset password');
                });
                $request->session()->flash('error-email', 'check your email to reset password , please!');
                return redirect()->route('login');
            }
            $request->session()->flash('error-email', "this email $request->email not found");
            return redirect()->route('login');
        }

    }
    public function paswordreset(Request $request, $id, $token)
    {
        if ($request->isMethod('post')) {
            $user = User::find($id);
            if ($user->remember_token == $token) {

                $user->password = Hash::make($request->password);
                $user->save();
                return redirect()->route('login');
            }
        }
        $user = User::find($id);
        if ($user->remember_token == $token) {
            return view('back-end.resetpassword', compact('id', 'token'));
        }
        return redirect()->route('login');
    }


    public function getOrder()
    {
         $x= Order::whereDay('created_at', now()->day)->get();
         return ($x);

    }

   public function allOrder()
   {
        $results=count(Order::orderBy('id', 'DESC')->get());
        return $results;
    }
    public function monthOrder()
    {
        $data= Order::select('id', 'price','quantity', 'created_at')
        ->get()
        ->groupBy(function($val) {
        return Carbon::parse($val->created_at)->format('m');
           });
           return $data;

 /*$user_list = DB::table('orders')
            ->select('id', 'price','quantity', 'created_at')
            ->orderBy('created_at')
            ->groupBy(DB::raw(MONTH('created_at')))
            ->get();*/
     }

     public function yearOrder()
     {
         $data= Order::select('id', 'price','quantity', 'created_at')
         ->get()
         ->groupBy(function($val) {
         return Carbon::parse($val->created_at)->format('y');
            });
            return $data;

  /*$user_list = DB::table('orders')
             ->select('id', 'price','quantity', 'created_at')
             ->orderBy('created_at')
             ->groupBy(DB::raw(MONTH('created_at')))
             ->get();*/
      }
}
