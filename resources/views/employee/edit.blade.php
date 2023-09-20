@extends('layouts/app')

@section('content')
<div id="app">
    <employee-edit  
        employee = "{{$employee}}"
        updateurl = "{{route('employee.employee.update')}}"
    >
    </employee-edit>
</div>

@endsection