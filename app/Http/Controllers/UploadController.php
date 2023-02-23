<?php
/**
 * Created by PhpStorm.
 * User: R
 * Date: 4/3/2022
 * Time: 8:04 AM
 */

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Maatwebsite\Excel\Facades\Excel;
use PHPUnit\Util\Exception;

class UploadController extends Controller
{
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
        return view('upload');
    }

    public function upload (Request $request)
    {

        try {
            $file = $request->file('excel');
            $ext = $file->getClientOriginalExtension();
            if ($ext != 'xlsx' && $ext != 'xls') {
                return redirect('upload')->with('error', 'Please upload \'.xlsx\' or \'.xls\' files');
            }
            $array = Excel::toArray([], $file);

            $headerflag = 0;

            $new_contacts = [];

            $map = [];
            $count = 0;

            $group = 'JO';
            $subgroup = 1;
            $microgroup = 0;

            $existing_contacts = Contact::all();

            foreach($existing_contacts as $key => $exist) {
                $map[$exist->unique_id] = $key;
                $group = $exist->group;
                $subgroup = $exist->subgroup;
                $microgroup = $exist->microgroup;
            }

            foreach ($array[0] as $row) {
                if (!$headerflag) {
                    $headerflag = 1;
                    continue;
                }

                $contact = [
                    'unique_id' => $row[0],
                    'attend_last' => $row[1],
                    'title' => $row[2] ? $row[2] : "",
                    'first_name' => $row[3],
                    'last_name' => $row[4],
                    'email' => $row[5],
                    'phone' => $row[6],
                    'gender' => $row[7],
                    'age_range' => $row[8],
                    'denomination' => $row[9],
                    'diocese' => $row[10],
                    'church' => $row[11] ? $row[11] : "",
                    'home' => $row[12],
                    'state' => $row[13],
                    'country' => $row[14],
                    'education' => $row[15] ? $row[15] : "",
                    'occupation' => $row[16] ? $row[16] : "",
                    'enter_education' => $row[17] ? $row[17] : "",
                    'talent_category' => $row[18],
                    'physical' => $row[19],
                    'preferred_accommodation' => $row[20],
                    'transport_mode' => $row[21],
                    'passport_photo' => $row[22] ? $row[22] : "",
                    'is_printed' => false,
                ];

                $all_contacts[] = $contact;

                if (array_key_exists($row[0], $map)) {
                    $key = $map[$row[0]];
                    $exist = $existing_contacts[$key];
                    $doUpdate = false;
                    foreach ($contact as $col=>$val) {
                        if ($val != $exist->{$col})
                            $doUpdate = true;
                    }
                    if ($doUpdate)
                        Contact::where('unique_id', $row[0])->update($contact);
                } else {

                    $microgroup ++;
                    if ($microgroup == 6) {
                        $microgroup = 1;
                        $subgroup ++;
                        if ($subgroup == 51) {
                            $subgroup = 1;
                            if ($group == 'JO')
                                $group = 'GE';
                            else if ($group == 'GE')
                                $group = 'YO';
                            else if ($group == 'YO')
                                $group = 'CO';
                            else if ($group == 'CO')
                                $group = 'JO';
                        }
                    }

                    $contact['group'] = $group;
                    $contact['subgroup'] = $subgroup;
                    $contact['microgroup'] = $microgroup;
                    $new_contacts[] = $contact;
                    $count ++;
                    if ($count > 1000) {
                        Contact::insert($new_contacts);
                        $new_contacts = [];
                        $count = 0;
                    }
                }
            }
            if ($count > 0) {
                Contact::insert($new_contacts);
            }
            return redirect('contacts');
        } catch (Exception $e) {
            return redirect('home');
        }
    }
}