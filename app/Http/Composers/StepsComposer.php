<?php

namespace App\Http\Composers;

use Auth;
use Illuminate\Contracts\View\View;

class StepsComposer {

    public function compose(View $view)
    {
        $logged = Auth::check();

        $showSteps = true;
        $activeStep = 1;

        if ($logged) {
            $user = Auth::user();

            if ($user->rooms->count() == 0) {
                $activeStep = 2;
            } else {
                foreach ($user->rooms as $room) {
                    // TODO
                    // if ($room->members->count() > 1) {
                    //     $showSteps = false;
                    //     break;
                    // }
                }
                $activeStep = 3;
            }

        }

        $view->with('showSteps', $showSteps);
        $view->with('activeStep', $activeStep);
    }

}
