<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\workers;
use App\Models\orders;
use App\Models\User;
use Illuminate\Queue\Worker;

class frontendController extends Controller
{
    //
    public function  mainpageview()
    {
        $latest_workers = workers::where('workerstatus', 'active')->orderBy('created_at', 'desc')->take(5)->get();

        $workers_list = workers::where('workerstatus', 'active')->inRandomOrder()->paginate(20); // Adjust the number per page as needed

        $customerId = Session::get('customer_id');
        $order_table = orders::where('customer_id', $customerId)->where('orderstatus', "not_reqested_yet")->get();
        $order_counter = orders::where('customer_id', $customerId)->where('orderstatus', "not_reqested_yet")->count();
        return view('frontusers.index', [
            'latest_worker' => $latest_workers,
            'workers_list' => $workers_list,
            'order_table' => $order_table,
            'order_counter' => $order_counter
        ]);
    }

    //   $customerId = Session::get('customer_id');
    // $worker_data = workers::where('id', $customerId)->first();
    public function orderplacer($worker_id)
    {
        $customerId = Session::get('customer_id');
        $customer_data = User::where('id', $customerId)->first();
        $worker_data = workers::where('id', $worker_id)->first();
        $order_table = new orders();
        $order_table->customer_id = $customer_data->id;
        $order_table->customer_username = $customer_data->username;
        $order_table->customer_phone = $customer_data->phonenumber;
        $order_table->orderd_worker_name = $worker_data->workername;
        $order_table->orderd_worker_phone = $worker_data->workerphone;
        $order_table->orderstatus = "not_reqested_yet";

        if ($order_table->save()) {
            return redirect()->back()->with('success', 'Order placed successfully');
        } else {
            return redirect()->back()->with('danger', 'Failed to Place order , please try again');
        }
    }

    public function deleteOrder($order_id)
    {
        $order = orders::find($order_id);

        if (!$order) {
            return redirect()->back()->with('danger', 'Order not found');
        }

        // You may want to add additional checks here, such as ensuring the logged-in user owns the order.

        if ($order->delete()) {
            return redirect()->back()->with('success', 'Order deleted successfully');
        } else {
            return redirect()->back()->with('danger', 'Failed to delete order, please try again');
        }
    }

    public function updateOrderStatus()
    {
        $customerId = Session::get('customer_id');

        $order_table = orders::where('customer_id', $customerId)
            ->where('orderstatus', "not_reqested_yet")
            ->get();

        if ($order_table->isEmpty()) {
            return redirect()->back()->with('danger', 'Orders not found');
        }

        foreach ($order_table as $order) {
            $order->orderstatus = "requested";
            $order->save();
        }

        return redirect()->back()->with('success', 'Order statuses updated to "requested"');
    }

    public function filltercol($col)
    {
        // Define color options based on the provided color parameter
        $colorOptions = [
            'tekure' => 'tekure',
            'teyeme' => 'teyeme',
            'keye' => 'keye',
            'white' => 'white',
            // Add more color options if needed
        ];

        // Check if the provided color is a valid option
        if (!array_key_exists($col, $colorOptions)) {
            return redirect()->back()->with('danger', 'Invalid color option');
        }

        // Use the selected color to filter workers
        $workers_list = workers::where('workerstatus', 'active')
            ->where('workercolor', $col)
            ->inRandomOrder()
            ->paginate(20);

        // Rest of your code (returning the view with the workers_list, for example)
        $customerId = Session::get('customer_id');
        $order_table = orders::where('customer_id', $customerId)->where('orderstatus', "not_reqested_yet")->get();
        $order_counter = orders::where('customer_id', $customerId)->where('orderstatus', "not_reqested_yet")->count();

        return view('frontusers.searchpage', [
            'workers_list' => $workers_list,
            'order_table' => $order_table,
            'order_counter' => $order_counter
        ]);
    }


    public function fillterkg($kg)
    {
        // Define weight ranges based on the provided number
        switch ($kg) {
            case 1:
                $minWeight = 45;
                $maxWeight = 50;
                break;
            case 2:
                $minWeight = 51;
                $maxWeight = 55;
                break;
            case 3:
                $minWeight = 56;
                $maxWeight = 60;
                break;
            case 4:
                $minWeight = 61;
                $maxWeight = 65;
                break;
            case 5:
                $minWeight = 66;
                $maxWeight = 70;
                break;
            case 6:
                $minWeight = 71;
                $maxWeight = 76;
                break;
            case 7:
                $minWeight = 77;
                $maxWeight = 80;
                break;
            case 8:
                $minWeight = 81;
                $maxWeight = 86;
                break;
            case 9:
                $minWeight = 87;
                $maxWeight = 90;
                break;
            case 10:
                $minWeight = 91;
                $maxWeight = 100;
                break;
                // Add more cases if needed
            default:
                $minWeight = 45;
                $maxWeight = 50;
        }

        $workers_list = workers::where('workerstatus', 'active')
            ->whereBetween('workerweight', [$minWeight, $maxWeight])
            ->inRandomOrder()
            ->paginate(20);

        // Rest of your code (returning the view with the workers_list, for example)
        $customerId = Session::get('customer_id');
        $order_table = orders::where('customer_id', $customerId)->where('orderstatus', "not_reqested_yet")->get();
        $order_counter = orders::where('customer_id', $customerId)->where('orderstatus', "not_reqested_yet")->count();

        return view('frontusers.searchpage', [
            'workers_list' => $workers_list,
            'order_table' => $order_table,
            'order_counter' => $order_counter
        ]);
    }

    public function fillterheight($m)
    {
        // Define height ranges based on the provided number
        switch ($m) {
            case 1:
                $minHeight = 1.0;
                $maxHeight = 1.2;
                break;
            case 2:
                $minHeight = 1.3;
                $maxHeight = 1.5;
                break;
            case 3:
                $minHeight = 1.6;
                $maxHeight = 1.9;
                break;
                // Add more cases if needed
            default:
                $minHeight = 1.0;
                $maxHeight = 1.2;
        }

        $workers_list = workers::where('workerstatus', 'active')
            ->whereBetween('workerheight', [$minHeight, $maxHeight])
            ->inRandomOrder()
            ->paginate(20);

        // Rest of your code (returning the view with the workers_list, for example)
        $customerId = Session::get('customer_id');
        $order_table = orders::where('customer_id', $customerId)->where('orderstatus', "not_reqested_yet")->get();
        $order_counter = orders::where('customer_id', $customerId)->where('orderstatus', "not_reqested_yet")->count();

        return view('frontusers.searchpage', [
            'workers_list' => $workers_list,
            'order_table' => $order_table,
            'order_counter' => $order_counter
        ]);
    }

    public function filtterage($num)
    {
        // Define age ranges based on the provided number
        switch ($num) {
            case 1:
                $minAge = 18;
                $maxAge = 21;
                break;
            case 2:
                $minAge = 22;
                $maxAge = 26;
                break;
            case 3:
                $minAge = 27;
                $maxAge = 31;
                break;
            case 4:
                $minAge = 31;
                $maxAge = 35;
                break;
                // Add more cases if needed
            default:
                $minAge = 18;
                $maxAge = 21;
        }

        $workers_list = workers::where('workerstatus', 'active')
            ->whereBetween('workerage', [$minAge, $maxAge])
            ->inRandomOrder()
            ->paginate(20);

        // Rest of your code (returning the view with the workers_list, for example)
        $customerId = Session::get('customer_id');
        $order_table = orders::where('customer_id', $customerId)->where('orderstatus', "not_reqested_yet")->get();
        $order_counter = orders::where('customer_id', $customerId)->where('orderstatus', "not_reqested_yet")->count();

        return view('frontusers.searchpage', [
            'workers_list' => $workers_list,
            'order_table' => $order_table,
            'order_counter' => $order_counter
        ]);
    }

    public function filltername(Request $request)
    {
        $validatedData = $request->validate([
            'username' => 'required|string',
        ]);

        $usernameToSearch = $validatedData['username'];

        $workers_list = workers::where('workerstatus', 'active')
            ->where('workername', 'like', "%$usernameToSearch%")
            ->inRandomOrder()
            ->paginate(20);

        // Rest of your code (returning the view with the workers_list, for example)
        $customerId = Session::get('customer_id');
        $order_table = orders::where('customer_id', $customerId)->where('orderstatus', "not_reqested_yet")->get();
        $order_counter = orders::where('customer_id', $customerId)->where('orderstatus', "not_reqested_yet")->count();

        return view('frontusers.searchpage', [
            'workers_list' => $workers_list,
            'order_table' => $order_table,
            'order_counter' => $order_counter
        ]);
    }
}
