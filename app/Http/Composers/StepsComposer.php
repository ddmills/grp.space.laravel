<?php

namespace App\Http\Composers;

use Auth;
use Route;
use Illuminate\Contracts\View\View;

class StepsComposer {

    public function compose(View $view)
    {
        if (!Auth::check()) {
            $view->with('stepThreeRoom', '');
            $view->with('showSteps', true);
            $view->with('activeStep', 1);

            return;
        }

        $user = Auth::user();

        if ($user->accessibleRooms()->count() == 0) {
            $view->with('stepThreeRoom', '');
            $view->with('showSteps', true);
            $view->with('activeStep', 2);

            return;
        }

        if (Route::current()->getName() == 'room.create') {
            $view->with('stepThreeRoom', '');
            $view->with('showSteps', false);
            $view->with('activeStep', 0);

            return;
        }

        if ($user->rooms->count() == 1) {
            $room = $user->rooms->first();

            if ($room->members->count() == 0) {
                $view->with('showSteps', true);
                $view->with('stepThreeRoom', $room->name);
                $view->with('activeStep', 3);

                return;
            }
        }

        $view->with('stepThreeRoom', '');
        $view->with('showSteps', false);
        $view->with('activeStep', 0);
    }

}
