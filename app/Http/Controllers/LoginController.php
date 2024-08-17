<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    protected $request;

    /**
     * Constructeur pour initialiser la requête.
     *
     * @param \Illuminate\Http\Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * Déconnecte l'utilisateur de l'application.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout()
    {
        // Déconnecte l'utilisateur de l'application
        Auth::logout();

        // Redirige vers la page de connexion
        return redirect()->route('login');
    }

    /**
     * Vérifie si un email existe dans la base de données.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function existEmail()
    {
        $email = $this->request->input('email');
        $user = User::where('email', $email)->first(); // Notez la casse correcte pour le champ 'email'

        $response = $user ? 'exist' : 'not exist';

        return response()->json([
            'response' => $response,
        ]);
    }

    public function activationCode($token)
    {
        return view('auth.activation_code', [
            'token' =>$token,
        ]);

    }
    // verifier si l utilisateur a deja activé son compte ou pas  avant d etre authentifier

    public function userChecker()
    {
        $user = Auth::user(); // Récupérer l'utilisateur authentifié
    
        $activation_token = $user->activation_token;
        $is_verified = $user->is_verified;
    
        if ($is_verified !== 1) {
            
              Auth::Logout();

            return redirect()->route('app_activation_code', ['token' => $activation_token])
                ->with('warning', 'Your account is not activated yet. Please check your mailbox and activate your account or resend the confirmation message.');
        } else {
            return redirect()->route('app_dashboard');
        }
    
    

    }
}
