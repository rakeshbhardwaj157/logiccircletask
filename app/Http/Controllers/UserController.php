<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use App\Models\Emails;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Mail;
use Dompdf\Dompdf; 
use PDF;
use Storage;
use Response;

class UserController extends Controller
{
    public function UserRegister($product){
        
        return view('signup',['product' => $product]);
    }

    public function createUser(Request $request){


        $product_data = Product::where('id', $request->product)->first();

        $this->validate(request(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        
        $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
        
        
        view()->share(['product'=>$product_data->title,'name'=>$request->name]);  
        $path = storage_path();
        $file_name = "product".time().".pdf";
        PDF::loadView('emails/pdf_template')->setPaper('a4', 'landscape')->setWarnings(false)->save($path."/".$file_name);

        $to_name = $request->name;
        $to_email = $request->email;
        $data = array("name"=>$request->name, 'product'=>$product_data->title, 'donload_link'=>env('APP_URL').'/download/'.$file_name);
        $emails = new Emails();
        $emails->download_file = $file_name;
        $emails->email_status = 1;
        $emails->save();

        Mail::send('emails.signup_mail_template', $data, function($message) use ($to_name, $to_email) {
        $message->to($to_email, $to_name)->subject("Product Subscription");
        $message->from("rakesh4503305@gmail.com","Product Subscription");
        });

        
        
        return redirect()->to('/login');


       

    }

    public function fileDownload($file){
            
        $file= storage_path().'/'. $file;
        $headers = array(
              'Content-Type: application/octet-stream',
            );
        return Response::download($file, 'product-subscription.pdf', $headers);
    }

    public function Login(){
        return view('login'); 
        
    }
}
