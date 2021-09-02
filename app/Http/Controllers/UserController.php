<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use App\Models\Emails;
use App\Models\UserProductSubscription;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Mail;
use Dompdf\Dompdf; 
use PDF;
use Storage;
use Response;

class UserController extends Controller
{
    public function UserRegister(Request $request, $product)
    {
        $user_session_data = $request->session()->get('user');
        
        return view('signup',['product' => $product, 'user_session_data'=>$user_session_data]);
    }

    public function createUser(Request $request)
    {
        $product_data = Product::where('id', $request->product)->first();

        $user = User::where('email', $request->email)->first();
        if($user){
            session(['user' => $user]);
                  // check prduct is already subscribed or not
                 $is_subscribed = UserProductSubscription::where('user_id', $user->id)->where('product_id', $product_data->id)->count();

                 if($is_subscribed >0){
                     
                     return redirect()->back()->with('subscription_error', "You have already subscribed this product. Please click on Home Menu.");   
                     
                 }


        }else{

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
            // put the user values in session for subscribe another product
             session(['user' => $user]);

        }
        
    

         

        UserProductSubscription::addSubscription($user->id, $product_data->id);
        
        view()->share(['product'=>$product_data->title,'name'=>$request->name]);  
        $path = storage_path();
        $file_name = "product".time().".pdf";
        PDF::loadView('emails/pdf_template')->setPaper('a4', 'landscape')->setWarnings(false)->save($path."/".$file_name);

        $to_name = $request->name;
        $to_email = $request->email;
        $data = array(
            "name" => $request->name,
            'product' => $product_data->title,
            'donload_link' => env('APP_URL').'/download/'.$file_name
        );

        
        

        Mail::send('emails.signup_mail_template', $data, function($message) use ($to_name, $to_email) {
            $message->to($to_email, $to_name)->subject("Product Subscription");
            $message->from("rakesh4503305@gmail.com", "Product Subscription");
        });

        return redirect()->to('/login');
    }

    public function fileDownload($file)
    {
        // Check file is already download or not if download then count how many time downloaded it
        $download_count = Emails:: where('download_file', $file)->count();

        if($download_count > 0){
            $get_download_permission = Emails:: where('download_file', $file)->first();
            if($get_download_permission->download_permission <= $get_download_permission->download_count){
                echo "Sorry! you can't download. you have exceed your limit.";
                die;
            }else{
                $email_download = Emails:: where('download_file', $file)->first();
                $email_download->download_count = $email_download->download_count+1;
                $email_download->save();
                $headers = array(
                    'Content-Type: application/octet-stream',
                );
                return Response::download($file, 'product-subscription.pdf', $headers);
                

            }
            
        }else{
            $emails = new Emails();
            $emails->download_file = $file;
            $emails->download_count = 1;
            $emails->email_status = 1;
            $emails->save();

            $file= storage_path().'/'. $file;
            $headers = array(
                'Content-Type: application/octet-stream',
            );

            return Response::download($file, 'product-subscription.pdf', $headers);

            
        }
        
    }

    public function Login(){
        return view('login');
    }
}
