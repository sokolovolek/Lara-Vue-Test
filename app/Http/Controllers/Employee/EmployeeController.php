<?php

namespace App\Http\Controllers\Employee;

use App\Employee;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function __construct(){
    }

    public function listEmployee()
    {

        $employees = Employee::get();
        return view('employee.list')->with([
            'employees' => $employees
        ]);
    }

    public function createEmployee()
    {

        return view('employee.create');
    }

    public function storeEmployee(Request $request)
    {
        if (Employee::where('name', $request->name)->exists()) {
            return response()->json([
                'msg' => 'This employee is already exist',
            ]);
        }

        Employee::create([
            'name' => $request->name,
            'job_title' => $request->job_title,
            'salary' => $request->salary,
        ]);

        return response()->json([
            'msg' => 'success',
        ]);
    }

    public function editEmployee($id)
    {
        $employee = Employee :: find($id);
        return view('employee.edit')->with([
            'employee' => $employee,
        ]);
    }

    public function updateEmployee(Request $request)
    {
        if (Employee::where('name', $request->name)->where('id', '<>', $request->id)->exists()) {
            return response()->json([
                'msg' => 'This employee is already exist',
            ]);
        }

        $update = Employee::findOrFail($request->id)->update([
            'name' => $request->name,
            'job_title' => $request->job_title,
            'salary' => $request->salary
        ]);

        if ($update) {
           return response()->json([
                'msg' => 'success',
            ]);
        }else {
            return response()->json([
                'msg' => "Employee can't be updated."
            ]);
        }

    }

    public function deleteEmployee($id)
    {
        Employee:: where('id',$id)->delete();
        return redirect()->route('employee.employee.list')->with([
            'msg' => 'company deleted',
        ]);
    }


}
