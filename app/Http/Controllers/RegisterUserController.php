<?php
    
    namespace App\Http\Controllers;
    
    use App\Models\User;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\Hash;
    
    class RegisterUserController extends Controller
    {
        
        public function store(Request $request)
        {
            $data = $request->validate([
                'first_name' => 'required|string', 'last_name' => 'required|string',
                'email'      => 'required|email|unique:users,email', 'password' => 'required|string|confirmed'
            ]);
            $data['password'] = Hash::make($request->password);
            $user = User::create($data);
            
            Auth::login($user);
            
            return to_route('posts.index');
        }
        
        public function create()
        {
            return view('auth.register');
        }
        
    }