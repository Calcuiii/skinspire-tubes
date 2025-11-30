<?php
namespace App\Http\Controllers;
use App\Models\Anggota;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function loginAnggota(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors()->first(),
            ], 400);
        }

        $user = Anggota::where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            // Login user ke sistem
            Auth::login($user, true); // true = remember me
            
            // Cek apakah user benar-benar sudah login
            $isLoggedIn = Auth::check();
            $loggedInUser = Auth::user();
            
            Log::info('User login attempt', [
                'email' => $user->email,
                'role' => $user->role,
                'is_logged_in' => $isLoggedIn,
                'logged_in_user_email' => $loggedInUser?->email ?? 'null',
                'logged_in_user_role' => $loggedInUser?->role ?? 'null'
            ]);
            
            // Generate redirect URL berdasarkan role (gunakan path relatif)
            if ($user->role === 'admin') {
                $redirectUrl = '/dashboard';
            } else {
                $redirectUrl = '/user';
            }

            Log::info('User login berhasil', [
                'email' => $user->email,
                'role' => $user->role,
                'redirect_url' => $redirectUrl
            ]);

            return response()->json([
                'status' => 'success',
                'message' => 'Login berhasil!',
                'redirect_url' => $redirectUrl,
                'user' => [
                    'id' => $user->id,
                    'name' => $user->name,
                    'email' => $user->email,
                    'role' => $user->role
                ]
            ], 200);
        }

        return response()->json([
            'status' => 'error',
            'message' => 'Email atau password salah!',
        ], 401);
    }

    public function showLoginForm()
    {
        return view('login');
    }

    public function showRegisterFormAnggota()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:anggota,email',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|string|in:admin,user',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors()->first(),
            ], 400);
        }

        $user = Anggota::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        return response()->json([
            'status' => 'success',
            'user' => $user,
            'message' => 'Registrasi berhasil! Silakan login.',
        ], 201);
    }
}