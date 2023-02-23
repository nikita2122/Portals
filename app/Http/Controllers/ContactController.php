<?php
/**
 * Created by PhpStorm.
 * User: R
 * Date: 4/2/2022
 * Time: 5:03 AM
 */

namespace App\Http\Controllers;

use App\Models\Diocese;
use App\Models\Hostel;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Contact;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use PHPMailer\PHPMailer\PHPMailer;
use function PHPUnit\Framework\isEmpty;

class ContactController extends Controller
{
    public function __construct()
    {}

    public function index () {
        return view('contacts')->with(
            'hostels', Hostel::all()
        );
    }
    public function findContact (Request $request) {
        $uniqueid = $request['uniqueId'];
        $contact = [];
        if (!is_numeric($uniqueid))
            $contact = Contact::where('unique_idn', '=', $uniqueid)->get();
        else
            $contact = Contact::where('unique_id', '=', $uniqueid)
                            ->orWhere('unique_idn', '=', $uniqueid)
                            ->get();
        return $contact;
    }

    public function verifyPhone (Request $request) {
        $contact = Contact::where('phone', '=', $request['phone'])->get();
        return $contact;
    }

    public function hostel (Request $request) {
        Contact::where('id', $request['id'])->update([
            'hostel' => $request['hostel']
        ]);
        return true;
    }

    public function sendEmailDev ($to, $subject, $body)
    {
        $mail = new PHPMailer();
        $mail->Encoding = "base64";
        $mail->Host = "localhost";
        $mail->Port = 1025;
        $mail->isSMTP();
        $mail->isHTML(true);
        $mail->CharSet = "UTF-8";
        $mail->From = "noreply@congeneralsynod2023.com";
        $mail->addAddress($to);
        $mail->Body=$body;
        $mail->Subject=$subject;
        $mail->Send();
    }

    public function sendEmail ($to, $subject, $body) {
        $mail = new PHPMailer();
        $mail->Encoding = "base64";
        $mail->SMTPAuth = true;
        $mail->Host = "smtp.zeptomail.com";
        $mail->Port = 587;
        $mail->Username = "emailapikey";
        $mail->Password = 'wSsVR60lqxHwWqx0lTX+c+kwnltUUwigF0R00VOovXH/GfDEp8c9wUDHBlSjSPMZGGY7HTVAo+gqkR8A1GUO2t0kyg5WCyiF9mqRe1U4J3x17qnvhDzKWGRbkRGPJYIBzwRjk2RjGs0g+g==';
        $mail->SMTPSecure = 'TLS';
        $mail->isSMTP();
        $mail->isHTML(true);
        $mail->CharSet = "UTF-8";
        $mail->From = "noreply@congeneralsynod2023.com";
        $mail->addAddress($to);
        $mail->Body=$body;
        $mail->Subject=$subject;
        //$mail->SMTPDebug = 1;
        //$mail->Debugoutput = function($str, $level) {echo "debug level $level; message: $str"; echo "<br>";};
        if(!$mail->Send()) {
            // echo "Mail sending failed";
        } else {
            // echo "Successfully sent";
        }
    }

    public function addNewContact (Request $request) {
        $email = $request['email'];
        $data = [
            'title' => $request['title'],
            'first_name' => $request['firstName'],
            'last_name' => $request['lastName'],
            'email' => $request['email'],
            'phone' => $request['phoneNo'],
            'gender' => $request['sex'],
            'age_range' => $request['age'],
            'denomination' => $request['denomination'],
            'diocese' => $request['diocese'],
            'province' => $request['province'],
            'church' => $request['church'],
            'home' => $request['home'],
            'state' => $request['state'],
            'country' => $request['country'],
            'education' => $request['education'],
            'occupation' => $request['occupation'],
            'talent_category' => $request['talent'],
            'physical' => $request['physical'],
            'preferred_accommodation' => $request['accommodation'],
            'transport_mode' => $request['transport'],
            'is_printed' => false,
            'join_workforce'=>$request['join_workforce'],
            'workforce'=>$request['workforce'],
            'join_prayer'=>$request['join_prayer'],
            'prayer_day'=>$request['prayer_day'],
            'prayer_time'=>$request['prayer_time'],
        ];

        // passport photo
        $file = $request->file('photo');
        if ($file != null) {
            $dir = 'assets/images/contacts/';
            $localDir = public_path() . '/' . $dir;

            $ext = $file->getClientOriginalExtension();

            $filename = uniqid(rand(), true) . '.' . $ext;
            $data['passport_photo'] = $dir . $filename;

            $file->move($localDir, $filename);
        }

        $exist = Contact::where('email', '=', $email)->get();
        // email check
        if (count($exist) > 0) {
            if ($request['id'] == "")
                return redirect('/register')->with('message', 'Same email exists')->withInput();
            else if ($exist[0]['id'] != $request['id'])
                return redirect('/register')->with('message', 'Same email exists')->withInput();
        }

        // unique id
        $unique_id = '';
        $contact = Contact::where('id', '=', $request['id'])->first();
        if ($request['id'] == "" || $contact['unique_idn'] == null) {
            $no = Contact::whereNotNull('unique_idn')->count() + 1;
            $data['unique_idn'] = '23/' . str_pad($no, 3, "0", STR_PAD_LEFT);

            $groups = ['JO', 'GE', 'YO', 'CO'];
            $data['group'] = $groups[$no / 10000];
            $data['subgroup'] = ($no % 10000 / 250) + 1;
            $data['microgroup'] = ($no % 200 / 50) + 1;
            $unique_id = $data['unique_idn'];
        } else {
            $unique_id = $contact['unique_idn'];
        }

        $diocese = Diocese::where('diocese', '=', $request['diocese'])->first();
        if ($diocese != null) {
            if ($request['sex'] == 'Male')
                $data['hostel'] = $diocese['male_hostel'];
            else
                $data['hostel'] = $diocese['female_hostel'];
        }
        //
        if ($request['id'] == "") {
            Contact::create($data);
        } else {
            Contact::where('id', $request['id'])->update($data);
        }

        $name = $data['title'].' '.$data['first_name'].' '.$data['last_name'];
        $body = 'Hello , '.$name.' you have successfully registered for the Joshua Generation International Youth Conference Abuja 2023.<br/>';
        $body = $body.'Your <strong>UNIQUE ID is '.$unique_id.'</strong>. <br/> Please take note of this unique ID, this is what you will require to get your conference materials.<br/><br/>';
        $body = $body.'For more updates, visit www.jgiyc.com or download JGIYC app on Apple or Playstore.<br/>';
        $body = $body.'Thank you.';

        $this->sendEmail($data['email'], 'JGYIC Register', $body);

        return redirect('/register')->with([
            'unique_id' => $unique_id,
            'name' => $data['title'].' '.$data['first_name'].' '.$data['last_name'],
        ]);
    }

    public function getContactsQuery ($request) {

        $query = DB::table('contacts');
        $query->whereNotNull('unique_idn');

        $filter = $request['filter'];
        if (empty($filter))
            return $query;
        $filter = json_decode($filter, TRUE);

        $unique_id = $filter['unique_idn'];
        $name = $filter['name'];
        $gender = $filter['gender'];
        $group = $filter['group'];
        $email = $filter['email'];
        $phone = $filter['phone'];
        $province = $filter['province'];
        $diocese = $filter['diocese'];
        $hostel = $filter['hostel'];
        $is_printed = $filter['is_printed'];


        if (!empty($unique_id))
            $query->where('unique_idn', 'like', '%' . $unique_id . '%');
        if (!empty($name))
            $query->where(\DB::raw("CONCAT_WS(IFNULL(title, ''),first_name,last_name)"), 'like', '%' . $name . '%');
        if (!empty($gender))
            $query->where('gender', 'like', '%' . $gender . '%');
        if (!empty($group))
            $query->where(\DB::raw("CONCAT(`group`,subgroup,'-',microgroup)"), 'like', '%' . $group . '%');
        if (!empty($email))
            $query->where('email', 'like', '%' . $email . '%');
        if (!empty($phone))
            $query->where('phone', 'like', '%' . $phone . '%');
        if (!empty($province))
            $query->where('province', 'like', '%' . $province . '%');
        if (!empty($diocese))
            $query->where('diocese', 'like', '%' . $diocese . '%');
        if (!empty($hostel))
            $query->where('hostel', 'like', '%' . $hostel . '%');
        if (!empty($is_printed))
            $query->where(\DB::raw('(CASE is_printed WHEN 1 THEN \'Yes\' ELSE \'No\' END)'), 'like', '%' . $is_printed . '%');
        return $query;
    }
    public function contactList(Request $request)
    {
        $limit = $request->input('length');
        $start = $request->input('start');

        $query = $this->getContactsQuery($request);

        $dataQuery = clone $query;
        $contacts = $dataQuery
            ->orderBy('unique_idn')
            ->offset($start)
            ->limit($limit)
            ->get();

        $count = $query->count();

        $totalData = $count;
        $totalFiltered = $totalData;

        $json_data = array(
            "draw" => intval($request->input('draw')),
            "recordsTotal" => intval($totalData),
            "recordsFiltered" => intval($totalFiltered),
            "data" => $contacts
        );

        echo json_encode($json_data);
    }

    public function saveContact(Request $request)
    {
        return view('new', ['message'=>'Saved Successifully']);
    }

    public function printContacts (Request $request) {
        $male = [];
        $female = [];
        $hostels = Diocese::all();
        foreach ($hostels as $hostel) {
            $male[$hostel->diocese] = $hostel->male_hostel;
            $female[$hostel->diocese] = $hostel->female_hostel;
        }

        if ($request->unprinted) {
            $contacts = Contact::where('is_printed',false)->limit(1000)->get();
            Contact::where('is_printed',false)->limit(1000)->update(['is_printed' => true]);
        } else {
            $contacts = $this->getContactsQuery($request)
                ->orderBy('unique_idn')
                ->get();
            $this->getContactsQuery($request)->update(['is_printed' => true]);
        }

        /*
        foreach($contacts as $contact) {
            if ($contact->occupation == 'Clergy') {
                $contact['hostel'] = 'Science&Tech Utako';
            } else if ($contact->physical == 'Yes') {
                $contact['hostel'] = 'AGGS';
            } else {
                if ($contact->gender == 'Male') {
                    $contact['hostel'] = array_key_exists($contact->diocese, $male) ? $male[$contact->diocese] : "";
                } else {
                    $contact['hostel'] = array_key_exists($contact->diocese, $female) ? $female[$contact->diocese] : "";
                }
            }
        }
        */
        $pdf = PDF::loadView('print', ['contacts' => $contacts]);
        $pdf->getDomPDF()->setHttpContext(
            stream_context_create([
                'ssl' => [
                    'allow_self_signed'=> TRUE,
                    'verify_peer' => FALSE,
                    'verify_peer_name' => FALSE,
                ]
            ])
        );
        $pdf->setPaper('A4', 'envelope');
        return $pdf->stream("tags.pdf");
    }

    public function reportListContacts (Request $request) {
        $contacts = $this->getContactsQuery($request)
            ->orderBy('unique_idn')
            ->get();
        $pdf = PDF::loadView('report', ['contacts'=>$contacts]);
        return $pdf->stream("contacts.pdf");
    }

    public function report (Request $request) {
        $contacts = Contact::whereNotNull('unique_idn')
            ->where('group', $request->group)
            ->orderBy('subgroup')
            ->orderBy('microgroup')
            ->orderBy('unique_idn')
            ->get();
        $pdf = PDF::loadView('report', ['contacts'=>$contacts]);
        return $pdf->stream($request->group.".pdf");
    }

    public function downloadCsv (Request $request) {
        $headers = array
        (
            'Content-Encoding: UTF-8',
            'Content-Type' => 'text/csv',
        );

        $contacts = $this->getContactsQuery($request)
            ->orderBy('unique_idn')
            ->get();
        return response()->streamDownload(function () use ($contacts) {
            $file = fopen('php://output', 'w');


            $columns = array('UNIQUE ID','Title','Firstname','Lastname','Email','Phone No','Sex','Age Range','Denomination','Province','Diocese',
                'Church Name','Home Address','State','Country','Level of Education','Occupation','Talent Category','Are you Physically challenged?',
                'Preferred Accommodation','Mode of Transportation to JGIYC Abuja 2023');
            fputcsv($file, $columns);
            foreach ($contacts as $contact) {
                $row = array();
                $row[] = $contact->unique_idn;
                $row[] = $contact->title;
                $row[] = $contact->first_name;
                $row[] = $contact->last_name;
                $row[] = $contact->email;
                $row[] = $contact->phone;
                $row[] = $contact->gender;
                $row[] = $contact->age_range;
                $row[] = $contact->denomination;
                $row[] = $contact->province;
                $row[] = $contact->diocese;
                $row[] = $contact->church;
                $row[] = $contact->home;
                $row[] = $contact->state;
                $row[] = $contact->country;
                $row[] = $contact->education;
                $row[] = $contact->occupation;
                $row[] = $contact->talent_category;
                $row[] = $contact->physical;
                $row[] = $contact->preferred_accommodation;
                $row[] = $contact->transport_mode;
                fputcsv($file, $row);
            }

            fclose($file);
        }, 'contacts.csv', $headers);
    }
}