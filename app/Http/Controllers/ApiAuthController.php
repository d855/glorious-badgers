<?php
    
    namespace App\Http\Controllers;
    
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Auth;
    
    class ApiAuthController extends Controller
    {
        
        public function store(Request $request)
        {
            $credentials = request(['email', 'password']);
            
            if (! Auth::attempt($credentials)) {
                return response()->json([
                    'message' => 'Unauthorized'
                ], 401);
            }
            
            $user = Auth::user();
            $token = $user->createToken('Personal Access Token');
            
            return response()->json($token->plainTextToken);
        }
        
    }