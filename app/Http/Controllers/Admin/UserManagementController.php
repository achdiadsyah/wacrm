<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use DataTables;

class UserManagementController extends Controller
{
    public function index(Request $request)
    {
        
        if ($request->ajax()) {
            return Datatables::of(User::all())->addIndexColumn()
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        } else {
            $data = [
                'title' => 'User Management',
            ];
            return view('admin.user-management', $data);
        }

    }

    public function detailsUser($id)
    {
        $user = User::findOrFail($id);
        $data = [
            'title'     => 'User Management',
            'details'   => $user
        ];
        return view('admin.user-management-details', $data);
    }

    public function updateData(Request $request)
    {
        $update = User::where('id', $request->id)->update([
            'name'              => $request->name,           
            'honda_id'          => $request->honda_id,
            'password'          => bcrypt($request->password),
            'personal_token'    => $request->personal_token,
            'device_limit'      => $request->device_limit,
            'is_admin'          => $request->is_admin,
            'is_active'         => $request->is_active,
        ]);

        if($update){
            return redirect()->route('admin.user-management')->with([
                'text' => 'Successfully update users',
                'icon' => 'success',
            ]);
        } else {
            return redirect()->back()->with([
                'text' => 'Something was wrong where updating users',
                'icon' => 'warning',
            ]);
        }
    }

    public function deleteData(Request $request)
    {
        $delete = User::findOrFail($request->user_id)->delete();

        if($delete){
            return redirect()->route('admin.user-management')->with([
                'text' => 'Successfully delete users',
                'icon' => 'success',
            ]);
        } else {
            return redirect()->back()->with([
                'text' => 'Something was wrong where deleting users',
                'icon' => 'warning',
            ]);
        }
    }
}
