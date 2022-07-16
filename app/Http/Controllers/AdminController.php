<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Donor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.samples.adminLogin');
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

    public function login(Request $request)
    {
        $logAdmin = Admin::where('email', '=', $request->email)->first();

        if ($logAdmin) {
            if ($request->password ==  $logAdmin->password) {
                $request->session()->put('id', $logAdmin->AdminID);
                $request->session()->put('firstname', $logAdmin->firstname);
                $request->session()->put('lastname', $logAdmin->lastname);
                $request->session()->put('email', $logAdmin->email);
                $request->session()->put('email', $logAdmin->phonenumber);
                return redirect('AdminDashboard');
            }
        }
    }

    public function dashboard(Request $request)
    {
        return view('pages.AdminDashboard');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $NewAdmin = new Admin();

        $NewAdmin->firstname = $request->firstname;
        $NewAdmin->lastname = $request->lastname;
        $NewAdmin->email = $request->email;
        $NewAdmin->phonenumber = $request->phonenumber;
        $NewAdmin->password = $request->password;
        $NewAdmin->save();
        return redirect('adminsdata')->with('status', 'New Admin Successfully Added');
    }

    public function viewAdminsData()
    {
        $adminsData = new Admin();
        $adminsData = DB::table('admins')->get();
        return view('pages.tables.adminsdata', ['data' => $adminsData]);
    }

    public function addAdmins()
    {
        return view('pages.forms.newadminsform');
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
        $isDeleteSuccess = Admin::where('AdminID', $id)->delete();

        if ($isDeleteSuccess) {
            return redirect('adminsdata')->with('status', 'Admin Succefully Deleted');
        } else {
            return redirect('adminsdata')->with('status', 'Failed To Delete, Try Later.');
        }
    }

    public function donorsData()
    {
        $DonorsData = new Admin();
        $DonorsData = DB::table('donors')->get();
        return view('pages.tables.donorsdata', ['data' => $DonorsData]);
    }
    public function deleteApplication($id)
    {
        $isDeleteSuccess = Donor::where('DonorDId', $id)->delete();

        if ($isDeleteSuccess) {
            return redirect('donorsApplications')->with('status', 'Application successfully Deleted');
        } else {
            return redirect('donorsApplications')->with('status', 'Failed To Delete, Try Later.');
        }
    }

    public function usersdata()
    {
        $UsersData = new User();
        $UsersData = DB::table('users')->get();
        return view('pages.tables.usersdata', ['data' => $UsersData]);
    }
}
