<?php
    
    namespace App\Http\Controllers;
    
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Auth;
    
    class AuthSessionController extends Controller
    {
        
        public function create()
        {
            return view('auth.login');
        }
        
        public function store(Request $request)
        {
            $credentials = $request->only('email', 'password');
            
            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();
                
                return to_route('posts.index');
            }
            
            return back()->withErrors(['email' => 'The provided credentials do not match our records']);
        }
        
        public function destroy(Request $request)
        {
            Auth::logout();
            
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            
            return to_route('login');
        }
        
    }