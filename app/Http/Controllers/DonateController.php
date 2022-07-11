<?php

namespace App\Http\Controllers;

use App\Models\Donor;
use App\Models\DonorModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
        return redirect('donateform')->with('status', 'Submitted Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
