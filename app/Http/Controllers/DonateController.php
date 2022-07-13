<?php

namespace App\Http\Controllers;

use App\Models\Donor;
use App\Models\DonorModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class DonateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('donate');
    }

    public function index2()
    {
        return view('pages.forms.donateform');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function login(Request $req)
    {
        $user = User::where('email', '=', $req->email)->first();
        if ($user) {
            if (Hash::check($req->password, $user->password)) {
                $req->session()->put('id', $user->UserId);
                $req->session()->put('firstname', $user->firstname);
                $req->session()->put('lastname', $user->lastname);
                $req->session()->put('email', $user->email);
                return redirect('profile');
            } else {
                return back()->with('status', 'Passwords do not match');
            }
        } else {
            return view('donate');
        }
    }

    public function logout()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $Donor = new Donor();
        $Donor->firstname = $request->fname;
        $Donor->lastname = $request->lname;
        $Donor->email = $request->email;
        $Donor->gender = $request->gender;
        $Donor->dob = $request->dob;
        $Donor->bloodtype = $request->bloodtype;
        $Donor->infectiousDiseases = $request->choice;
        $Donor->donationtype = $request->donationtype;
        $Donor->height = $request->height;
        $Donor->organtype = $request->organtype;
        $Donor->address1 = $request->address1;
        $Donor->address2 = $request->address2;
        $Donor->state = $request->state;
        $Donor->phonenumber = $request->phonenumber;
        $Donor->postalcode = $request->postalcode;
        $Donor->city = $request->city;
        $Donor->country = $request->country;
        $Donor->save();
        return redirect('showSubmitted')->with('status', 'Application Submitted Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $applications = new Donor();

        $em = session('email');
        // $emm = Donor::find($em);
        // $applications = DB::table('donors')->get();
        $applications = Donor::where('email', $em)->get();
        return view('pages.tables.submittedappli', ['data' => $applications]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $id = $request->id;

        $fname = $request->input('fname');
        $lname = $request->input('lname');
        $email = $request->input('email');
        $gender = $request->input('gender');
        $dob = $request->input('dob');
        $bloodtype = $request->input('bloodtype');
        $infectiousDiseases = $request->input('choice');
        $donationtype = $request->input('donationtype');
        $height = $request->input('height');
        $organtype = $request->input('organtype');
        $address1 = $request->input('address1');
        $state = $request->input('state');
        $address2 = $request->input('address2');
        $phonenumber = $request->input('phonenumber');
        $postalcode = $request->input('postalcode');
        $city = $request->input('city');
        $country = $request->input('country');

        $isUpdateSuccess = Donor::where('DonorDId', $id)->update([
            'firstname' => $fname, 'lastname' => $lname, 'email' => $email,
            'gender' => $gender, 'dob' => $dob, 'bloodtype' => $bloodtype, 'infectiousDiseases' => $infectiousDiseases, 'donationtype' => $donationtype,
            'height' => $height, 'organtype' => $organtype, 'address1' => $address1, 'state' => $state, 'address2' => $address2, 'phonenumber' => $phonenumber,
            'postalcode' => $postalcode, 'city' => $city, 'country' => $country
        ]);

        if ($isUpdateSuccess) {
            return redirect('showSubmitted')->with('status', 'Data Successfully Updated! ');
        } else {
            return redirect('showSubmitted')->with('status', 'Failed To update! ');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // return $id;
        $updateData = Donor::where('DonorDId', $id)->get();
        // return $updateData;

        return view('pages.forms.editdonateform', ['editdata' => $updateData]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // return $id;
        $isDeleteSuccess = Donor::where('DonorDId', $id)->delete();

        if ($isDeleteSuccess) {
            return redirect('showSubmitted')->with('status', 'Application Withdrawn Successfully');
        } else {
            return redirect('showSubmitted')->with('status', 'Failed To Withdraw the Application, Try Later.');
        }
    }
}
