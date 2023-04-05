<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Staff;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Staff::all();
        return view('admin.staff.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $department = Department::all();
        return view('admin.staff.create',compact('department'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->hasFile('photo')) {
            $imageName = time().'.'.$request->photo->extension();

            $request->photo->move(public_path('images'), $imageName);  
            
            Staff::create([
                'full_name' => $request->full_name,
                'department_id' => $request->department_id,
                'bio' => $request->bio,
                'salary_type' => $request->salary_type,
                'salary_amt' => $request->salary_amt,
                'photo' => $imageName
            ]);
        }

        return redirect('admin/staff/create')->with('success', 'Data has been added.');
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
        $edit = Staff::find($id);
        $department = Department::all();
        return view('admin.staff.edit', compact('edit','department'));
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
        $updateCustomer = Staff::find($id);

        if($request->hasFile('photo')) {
            $imageName = time().'.'.$request->photo->extension();
            $request->photo->move(public_path('images'), $imageName);    
        } else {
            $imageName = $updateCustomer->photo;
        }
       
        $updateCustomer->update([
            'full_name' => $request->full_name,
            'department_id' => $request->department_id,
            'bio' => $request->bio,
            'salary_type' => $request->salary_type,
            'salary_amt' => $request->salary_amt,
            'photo' => $imageName
        ]);

        return redirect('admin/staff')->with('success', 'Data has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Staff::where('id', $id)->delete();
        return redirect('admin/staff')->with('success', 'Data has been deleted.');
    }
}
