<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class RevisorController extends Controller
{
    public function dashboard()
    {
        $unrevisionedArticles = Article::where('is_accepted', NULL)->get();
        $acceptedArticles = Article::where('is_accepted', true)->get();
        $rejectedArticles = Article::where('is_accepted', false)->get();

        return view('revisor.dashboard', compact('unrevisionedArticles', 'acceptedArticles', 'rejectedArticles'));
    }

    public function acceptArticle(Article $article)
    {
        $article->update(['is_accepted' => true]);
        return redirect()->route('revisor.dashboard')->with('message', 'Articolo accettato con successo.');
    }

    public function rejectArticle(Article $article)
    {
        $article->update(['is_accepted' => false]);
        return redirect()->route('revisor.dashboard')->with('message', 'Articolo rifiutato con successo.');
    }

    public function undoArticle(Article $article)
    {
        $article->update(['is_accepted' => null]);
        return redirect()->route('revisor.dashboard')->with('message', 'Revisione annullata con successo.');
    }
}
