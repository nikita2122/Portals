<?php

namespace App\Http\Controllers;

use App\Models\Diocese;
use App\Models\Hostel;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;

class DioceseController extends Controller
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
    public function index(Request $request)
    {
        return view('diocese')->with(
            [
                'dioceses' => Diocese::all(),
                'hostels' => Hostel::all()
            ]
        );
    }

    public function edit(Request $request)
    {
        $id = $request['id'];
        $data = [
            'diocese' => $request['diocese'],
            'male_hostel' => $request['male_hostel'],
            'female_hostel' => $request['female_hostel'],
        ];

        if ($id == "") {
            Diocese::create($data);
        } else {
            Diocese::where('id', $id)->update($data);
        }

        return redirect('/diocese');
    }


    public function delete(Request $request)
    {
        $id = $request['id'];
        Hostel::where('id', $id)->delete();
    }
}
