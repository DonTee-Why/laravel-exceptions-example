<?php

namespace App\Http\Controllers;

use App\Exceptions\ExceptionOne;
use App\Exceptions\ExceptionThree;
use App\Exceptions\ExceptionTwo;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the index page.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        return view('index');
    }

    /**
     * 
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function store(Request $request)
    {
        $validated = $this->validate($request, [
            'task' => 'required|string'
        ]);

        $task = $validated["task"];

        return rescue(function () use ($task) {
            $this->performTask($task);
        }, function ($ex) {
            return redirect('/')->with('status', $ex->getMessage());
        }, true);
    }

    public function performTask($task)
    {
        switch ($task) {
            case 'Task 1':
                throw new ExceptionOne("Exception One was thrown.");
                break;
            case 'Task 2':
                throw new ExceptionTwo("Exception Two was thrown.");
                break;
            case 'Task 3':
                throw new ExceptionThree("Exception Three was thrown.");
                break;
            case 'Task 4':
                throw new ExceptionThree("Exception Four was thrown.");
                break;
            case 'Task 5':
                throw new ExceptionThree("Exception Five was thrown.");
                break;
            default:
                throw new \Exception("Error Processing Request");
                break;
        }
    }
}
