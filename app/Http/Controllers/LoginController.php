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
}
