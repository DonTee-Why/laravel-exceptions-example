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

        try {
            $this->performTask($task);
            return redirect('/');
        } catch (ExceptionOne $ex1) {
            return redirect('/')->with('status', $ex1->getMessage());
        } catch (ExceptionTwo $ex2) {
            return redirect('/')->with('status', $ex2->getMessage());
        } catch (ExceptionThree $ex3) {
            return redirect('/')->with('status', $ex3->getMessage());
        }
    }

    public function performTask($task){
        switch ($task) {
            case 'Task 1':
                throw new ExceptionOne("Exception One was thrown");
                break;
            case 'Task 2':
                throw new ExceptionTwo("Exception Two was thrown");
                break;
            case 'Task 3':
                throw new ExceptionThree("Exception Three was thrown");
                break;
            
            default:
                throw new \Exception("Error Processing Request", 1);
                break;
        }
        
    }
}
