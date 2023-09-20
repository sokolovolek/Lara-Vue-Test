@extends('layouts/app')

@section('content')
<div id="app">
    <employee-create
       createurl = "{{route('employee.employee.store')}}"
    >
    </employee-create>
</div>

@endsection