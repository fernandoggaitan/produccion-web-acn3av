<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LanguageController extends Controller
{
    
    public function switchLang(Request $request, string $lang)
    {

        //Validamos el idioma.
        if (! in_array($lang, ['en', 'es'])) {
            abort(400);
        }

        //Setear en la sesión el idioma que haya elegido el usuario.
        $request->session()->put('lang', $lang);

        return redirect()->back();

    }

}
