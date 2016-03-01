<?php

namespace App\Http\Composers;

use Auth;
use Illuminate\Contracts\View\View;

class NavbarComposer {

    public function compose(View $view)
    {
        $logged = Auth::check();

        $view->with('userLoggedIn', $logged);

        if ($logged) {
            $view->with('user', Auth::user());
        }
    }

}
