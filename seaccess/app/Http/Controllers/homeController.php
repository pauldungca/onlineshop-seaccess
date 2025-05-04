<?php 

    namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Auth;

    use app\Models\User;

    class homeController extends Controller {

        public function index() {
            return view('home.homepage');
            //return view('welcome');
        }

        public function redirect() {
            $usertype = Auth::user()->usertype;


            if ($usertype == 0) {
                return view('admin.home');
            } else {
                return view('dashboard');
            }
        }


    }


?>