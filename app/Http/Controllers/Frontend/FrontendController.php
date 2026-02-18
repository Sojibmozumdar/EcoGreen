<?php
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\VerificationEmail;
use App\Models\Backend\Category;
use App\Models\Backend\Product;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class FrontendController extends Controller
{
    public function index()
    {

        $categories = Category::with(['subCategories' => function ($q) {$q->where('status', 1);}])->where('status', 1)->get();

        $products = Product::with('uploads')->where('status', 1)->latest()->get();

        return view('home', compact('categories', 'products'));

    }

    public function productDetails($id)
    {

        $product = Product::find($id);
        return view('frontend.product_details', compact('product'));
    }

    public function addToCart(Request $request)
    {

        if (! Auth::check()) {
            return redirect("user-login");
        }

    }

    public function userlogin()
    {

        return view('frontend.auth.login');

    }

    public function userRegister()
    {
        return view('frontend.auth.register');
    }

    public function registerStore(Request $request)
    {

        $user           = new User();
        $user->name     = $request->name;
        $user->email    = $request->email;
        $user->mobile   = $request->mobile;
        $user->otp      = rand(100000000, 8000000000);
        $user->password = Hash::make($request->password);
        $user->save();

        Mail::to($request->email)->send(new VerificationEmail($user->otp));

        return back()->with('success', 'Registration Successful');

    }

    public function otpVarification($otp)
    {
        $user = User::where('otp', $otp)->first();

        if ($user) {

            $user->email_verified_at = now();
            $user->otp               = null;
            $user->save();

            return redirect('user-login')->with('success', 'Verification Successful');
        }

        return redirect('user-login')->with('danger', 'Verification Unsuccessful');
    }

    public function userloginPost(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        if ($user->email_verified_at == "") {
            return back()->with('danger', 'Not Varify Yet ');
        }

        $credentials = $request->validate([
            'email'    => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect('/')->with('success', 'Login Successful');
        }

        return back()->withInput()->with('danger', 'Email or Password invalid');

    }

    public function buyNow($id)
    {

        return view('frontend.product_details', compact('product'));
    }

}
