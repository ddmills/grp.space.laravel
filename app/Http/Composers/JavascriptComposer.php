<?php

namespace App\Http\Composers;

use Auth;
use App\Facades\JSGlobals;
use Illuminate\Contracts\View\View;

class JavascriptComposer {

    public function compose(View $view)
    {
        $view->with('jsglobals', JSGlobals::all());
    }

}
