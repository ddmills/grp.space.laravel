<?php

namespace App\Http\Composers;

use Auth;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class RoomSubnavComposer {

    /**
     * @var \Illuminate\Http\Request
     */
    protected $request;

    /**
     * @param \Illuminate\Http\Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function compose(View $view)
    {
        $routeName = $this->request->route()->getName();

        $view->with('routeName', $routeName);
    }

}
