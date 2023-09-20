@extends('layouts/app')

@section('content')
<div id="app">
    <employee-list  
        employees = "{{$employees}}"
        createemployeeurl = "{{route('employee.employee.create')}}"
        editemployeeurl =  "{{url('employee-edit')}}"
        deleteemployeeurl =  "{{url('employee-delete')}}"
    >
    </employee-list>
</div>

@endsection
