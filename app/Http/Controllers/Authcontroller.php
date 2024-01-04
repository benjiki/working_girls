<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class Authcontroller extends Controller
{
    //
    public function view_loginpage()
    {
        return view('frontusers.auth.login');
    }
    public function view_regpage()
    {
        return view('frontusers.auth.reguser');
    }

    public function insertadmin()
    {
        return view('adminusers.admin_management.insert_admins');
    }
    public function insertadminprocess(Request $request)
    {
        $validate_admin = $request->validate([
            'username' => 'required|string|max:50|unique:users',
            'phonenumber' => 'required|string|max:10|unique:users',
            'password' => 'required|min:8',
            'cpassword' => 'required|min:8|same:password',
        ]);

        $admin = new User($validate_admin);
        $admin->user_type = 3; //admin number
        $admin->status = "active";
        $admin->password = bcrypt($request->password);

        if ($admin->save()) {
            return redirect()->back()->with('success', ' inserted correctly');
        } else {
            return redirect()->back()->with('danger', 'Please insert correctly again');
        }
    }

    public function updateCustomerProcess(Request $request, $id)
    {
        $validatedData = $request->validate([
            'username' => 'required|string|max:50|unique:users',
            'phonenumber' => 'required|string|max:10',
            'password' => 'nullable|min:8',
            'cpassword' => 'nullable|min:8|same:password',
        ]);

        $user = User::findOrFail($id);

        // Update the fields
        $user->username = $validatedData['username'];
        $user->phonenumber = $validatedData['phonenumber'];
        $user->password = bcrypt($request->password);
        $user->status = "active";
        if ($user->save()) {
            return redirect()->back()->with('success', 'Updated successfully');
        } else {
            return redirect()->back()->with('danger', 'Failed to update, please try again');
        }
    }

    public function updateadminProcess(Request $request, $id)
    {
        $validatedData = $request->validate([
            'username' => 'required|string|max:50|unique:users,username,' . $id,
            'phonenumber' => 'required|string|max:10',
            'password' => 'nullable|min:8',
            'cpassword' => 'nullable|min:8|same:password',
        ]);

        $user = User::findOrFail($id);

        // Update the fields
        $user->username = $validatedData['username'];
        $user->phonenumber = $validatedData['phonenumber'];

        // Update password only if it's provided
        if ($request->filled('password')) {
            $user->password = bcrypt($request->password);
        }

        if ($user->save()) {
            return redirect()->back()->with('success', 'Updated successfully');
        } else {
            return redirect()->back()->with('danger', 'Failed to update, please try again');
        }
    }


    public function editcustomertable(Request $request, $id)
    {
        $validatedData = $request->validate([
            'username' => 'required|string|max:50|unique:users,username,' . $id,
            'phonenumber' => 'required|string|max:10',
            'password' => 'nullable|min:8',
            'cpassword' => 'nullable|min:8|same:password',
        ]);

        $user = User::findOrFail($id);

        // Update the fields
        $user->username = $validatedData['username'];
        $user->phonenumber = $validatedData['phonenumber'];

        // Update password only if it's provided
        if ($request->filled('password')) {
            $user->password = bcrypt($request->password);
        }

        if ($user->save()) {
            return redirect()->back()->with('success', 'Updated successfully');
        } else {
            return redirect()->back()->with('danger', 'Failed to update, please try again');
        }
    }


    public function loginProcess(Request $request)
    {
        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            $userType = Auth::user()->user_type;
            $userstatus = Auth::user()->status;
            $userid =  Auth::user()->id;
            if ($userType == 3 && $userstatus === "active") {
                return redirect()->route('indexs');
            } elseif ($userType == 1) {
                return redirect()->route('indexs');
            } elseif ($userType == 2 && $userstatus === "active") {
                Session::put('customer_id', $userid);
                return redirect()->route('m_v');
            } else {
                return redirect()->back()->withInput()->withErrors(['username' => 'Invalid credentials try again.']);
            }
        } else {
            return redirect()->back()->withInput()->withErrors(['username' => 'Invalid credentials.']);
        }
    }

    public function logout()
    {
        Auth::logout();

        return redirect('/');
    }
    public function customer_req(Request $request)
    {
        $validate_customer = $request->validate([
            'phonenumber' => 'required|string|max:10|unique:users',
        ]);

        $customer = new User($validate_customer);
        $customer->user_type = 2; //customer number
        $customer->status = "watting_for_approval";

        if ($customer->save()) {
            return redirect()->back()->with('success', 'Nice we will send an sms message with your user name and password');
        } else {
            return redirect()->back()->with('danger', 'Please insert the number in this format 09112345678');
        }
    }
}
