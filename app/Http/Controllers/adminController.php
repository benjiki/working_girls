<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\orders;
use App\Models\workers;



class adminController extends Controller
{
    //
    public function mainpageadmin()
    {
        $total_orders = orders::all()->count();
        $total_customers = User::where('user_type', 2)->where('status', 'active')->count();
        $total_workers = workers::all()->count();
        $total_req = User::where('user_type', 2)->where('status', 'watting_for_approval')->count();

        return view('adminusers.index', [
            'total_req' => $total_req,
            'total_workers' => $total_workers,
            'total_customers' => $total_customers,
            'total_orders' => $total_orders
        ]);
    }

    public function viewaccountreq()
    {
        $customer_req_list = User::where('user_type', 2)->where('status', 'watting_for_approval')
            ->get();
        // return json_encode($customer_req_list);
        return view('adminusers.customer_management.view_acc_request', ['customer_req_list' => $customer_req_list]);
    }

    public function editcustomer($id)
    {
        $customer_req_approve = User::where('id', $id)->first();
        //return json_encode($customer_req_approve->phonenumber);
        return view('adminusers.customer_management.accept_customer', ['customer_req_approve' => $customer_req_approve]);
    }
    public function editcustomertablepage($id)
    {
        $customer_edit = User::where('id', $id)->first();
        //return json_encode($customer_req_approve->phonenumber);
        return view('adminusers.customer_management.edit_customer', ['customer_edit' => $customer_edit]);
    }

    public function viewcustomers()
    {
        $customer_list = User::where('user_type', 2)->get();

        return view('adminusers.customer_management.view_customers', ['customer_list' => $customer_list]);
    }

    public function viewworkers()
    {
        return view('adminusers.customer_management.wokers_view');
    }
    public function viewadmin()
    {
        $admins_list = User::where('user_type', 3)->get();
        //   return json_encode($admins_list);
        return view('adminusers.admin_management.view_admins', ['admins_list' => $admins_list]); //admins list view.
    }
    public function editadmin($id)
    {
        $admin_edit = User::where('id', $id)->first();
        //return json_encode($customer_req_approve->phonenumber);
        return view('adminusers.admin_management.edit_admins', ['admin_edit' => $admin_edit]);
    }

    public function activeadmin($id)
    {
        $admin = User::findOrFail($id);
        $admin->status = 'active';
        $admin->save();
        return redirect()->back()->with('success', 'Admin activated successfully');
    }

    public function deactiveadmin($id)
    {
        $admin = User::findOrFail($id);
        $admin->status = 'inactive';
        $admin->save();

        return redirect()->back()->with('danger', 'Admin deactivated successfully');
    }

    public function customer_orders()
    {
        $order_list = orders::where('orderstatus', 'requested')->get();

        return view('adminusers.workers_management.order_view', ['order_list' => $order_list]);
    }

    public function acceptorders($id)
    {
        $order = orders::findOrFail($id); // Change User to the correct model, if it's not User
        $order->orderstatus = 'accepted';

        if ($order->save()) {
            return redirect()->back()->with('success', 'Order accepted successfully');
        } else {
            return redirect()->back()->with('error', 'Failed to accept order. Please try again.');
        }
    }

    public function rejectorders($id)
    {
        $order = orders::findOrFail($id); // Change User to the correct model, if it's not User
        $order->orderstatus = 'rejected';

        if ($order->save()) {
            return redirect()->back()->with('danger', 'Order rejected successfully');
        } else {
            return redirect()->back()->with('error', 'Failed to reject order. Please try again.');
        }
    }
    public function customer_orders_rejected()
    {
        $order_list = orders::where('orderstatus', 'rejected')->get();

        return view('adminusers.workers_management.rejected_order_view', ['order_list' => $order_list]);
    }
    public function customer_orders_accepted()
    {
        $order_list = orders::where('orderstatus', 'accepted')->get();

        return view('adminusers.workers_management.accepted_order_view', ['order_list' => $order_list]);
    }
}
