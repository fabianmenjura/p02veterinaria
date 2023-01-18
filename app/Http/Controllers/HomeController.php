<?php

namespace App\Http\Controllers;
use App\Models\Cita;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $events = array();
        $citas = Cita::all();
       
        foreach($citas as $cita) {
            $color = null;
                $events[] = [
                    'id'   => $cita->id,
                    'title' => $cita->name_owner,                    
                    'start' => $cita->appointment_date,
                    'end' => $cita->name_owner,
                    'color' => $color
             
            ];
        }
    //   return $cita;
        return view('home', ['events' => $events]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string'
        ]);

        $cita = Cita::create([
            'title' => $request->title,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ]);

        $color = null;

        if($cita->title == 'Test') {
            $color = '#924ACE';
        }

        return response()->json([
            'id' => $cita->id,
            'start' => $cita->start_date,
            'end' => $cita->end_date,
            'title' => $cita->title,
            'color' => $color ? $color: '',

        ]);
    }
    

    
}
