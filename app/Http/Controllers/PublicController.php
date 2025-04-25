<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\CareerRequestMail; // Importa la classe CareerRequestMail
use App\Models\User; // Importa il modello User
use App\Models\Article; // Importa il modello Article
use Illuminate\Routing\Controllers\Middleware; // Import Middleware
use Illuminate\Routing\Controllers\HasMiddleware; // Import HasMiddleware
use App\Http\Controllers\AdminController;

class PublicController extends Controller implements HasMiddleware
{
    /**
     * Metodo per definire il middleware.
     */
    public static function middleware()
    {
        return [
            new Middleware('auth', except: ['homepage', 'careers']),
        ];
    }

    public function homepage()
    {
        $articles = Article::where('is_accepted', true)
            ->orderBy('created_at', 'desc')
            ->take(4)
            ->get();

        return view('homepage', compact('articles'));
    }

    public function careers()
    {
        return view('careers');
    }

    public function careersSubmit(Request $request)
    {
        $request->validate([
            'role' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        $user = Auth::user();
        $role = $request->role;
        $email = $request->email;
        $message = $request->message;
        $info = compact('role', 'email', 'message');

        // Invia l'email
        Mail::to('admin@theaulabpost.it')->send(new CareerRequestMail($info));

        // Aggiorna il ruolo dell'utente in base alla candidatura
        switch ($role) {
            case 'admin':
                $user->is_admin = NULL;
                break;
            case 'revisor':
                $user->is_revisor = NULL;
                break;
            case 'writer':
                $user->is_writer = NULL;
                break;
        }

        $user->update();

        return redirect(route('homepage'))->with('message', 'Mail inviata con successo!');
    }
}


