<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\workers;

class WorkerController extends Controller
{
    //
    public function addWorker()
    {
        return view('adminusers.workers_management.insert_worker');
    }
    public function worker_add_p(Request $request)
    {
        $validate_admin = $request->validate([
            'workername' => 'required|string|max:50',
            'workerphone' => 'required|string|max:225|unique:workers',
            'workerphoto' => 'required|image',
            'workerage' => 'required|integer|max:225',
            'workerhight' => 'required|numeric|max:225',
            'workercolor' => 'required|string|max:225',
            'workerkg' => 'required|integer|max:225',
        ]);

        $path = null;
        if ($request->hasFile('workerphoto')) {
            // Get the uploaded file
            $image = $request->file('workerphoto');
            $realimagesname = $image->getClientOriginalName();
            $path = $image->storeAs('public/images/worker_profile', $realimagesname);
        }

        $worker = new workers($validate_admin);
        $worker->workerphoto = $realimagesname; // Save the file path instead of the image instance
        $worker->workerstatus = "active";
        if ($worker->save()) {
            return redirect()->back()->with('success', 'Worker added successfully');
        } else {
            return redirect()->back()->with('error', 'Failed to add worker. Please try again.');
        }
    }

    public function view_workers()
    {
        $workers_list = workers::all();
        return view('adminusers.workers_management.view_workers', ['workers_list' => $workers_list]);
    }

    public function activeworker($id)
    {
        $admin = workers::findOrFail($id);
        $admin->workerstatus = 'active';
        $admin->save();
        return redirect()->back()->with('success', 'Worker activated successfully');
    }

    public function deactiveworker($id)
    {
        $admin = workers::findOrFail($id);
        $admin->workerstatus = 'inactive';
        $admin->save();

        return redirect()->back()->with('danger', 'Worker deactivated successfully');
    }

    public function editworker($id)
    {
        $worker_edit = workers::where('id', $id)->first();

        return view('adminusers.workers_management.edit_workers', ['worker_edit' => $worker_edit]);
    }

    public function updateworkerProcess(Request $request, $id)
    {
        $validate_worker = $request->validate([
            'workername' => 'required|string|max:50',
            'workerphone' => 'required|string|max:225',
            'workerphoto' => 'image',
            'workerage' => 'required|integer|max:225',
            'workerhight' => 'required|numeric|max:225',
            'workercolor' => 'required|string|max:225',
            'workerkg' => 'required|integer|max:225',
        ]);
        $worker_find = workers::findOrFail($id);
        $path = null;
        if ($request->hasFile('workerphoto')) {
            // Get the uploaded file
            $image = $request->file('workerphoto');
            $realimagesname = $image->getClientOriginalName();
            $path = $image->storeAs('public/images/worker_profile', $realimagesname);
        }
        $worker_find->workername = $validate_worker['workername'];
        $worker_find->workerphone = $validate_worker['workerphone'];
        $worker_find->workerage = $validate_worker['workerage'];
        $worker_find->workerhight = $validate_worker['workerhight'];
        $worker_find->workercolor = $validate_worker['workercolor'];
        $worker_find->workerkg = $validate_worker['workerkg'];
        if ($request->filled('workerphoto')) {
            $worker_find->workerphoto = $realimagesname; // Save the file path instead of the image instance
        }


        if ($worker_find->save()) {
            return redirect()->back()->with('success', 'Worker added successfully');
        } else {
            return redirect()->back()->with('error', 'Failed to add worker. Please try again.');
        }
    }
}
