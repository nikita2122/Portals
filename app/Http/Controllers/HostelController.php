<?php

namespace App\Http\Controllers;

use App\Models\Hostel;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;

class HostelController extends Controller
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
        return view('hostel')->with(
            ['hostels' => Hostel::all()]
        );
    }

    public function edit(Request $request)
    {
        $id = $request['id'];
        $data = [
            'name' => $request['name'],
            'male_room' => $request['male_room'],
            'female_room' => $request['female_room'],
        ];

        if ($id == "") {
            Hostel::create($data);
        } else {
            Hostel::where('id', $id)->update($data);
        }

        return redirect('/hostel');
    }


    public function delete(Request $request)
    {
        $id = $request['id'];
        Hostel::where('id', $id)->delete();
    }
}
