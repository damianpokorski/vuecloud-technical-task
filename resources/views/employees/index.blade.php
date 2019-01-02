@extends('layouts.card')

@section('card_header')
  <div class="row">
    <div class="col-sm pt-1">
      <h3>Employees of {{$company->name}}</h3>
    </div>
    <div class="col-sm">
      {{$employees->links()}}
    </div>
    <div class="col-sm">
      <a class="btn btn-secondary float-right" href="{{route('employees.create', ['company' => $company->id])}}" role="button">Create</a>
    </div>
  </div>
@endsection

@section('card_body')
  <table class="table">
    <thead>
      <tr>
        <th scope="col">First Name</th>
        <th scope="col">Last Name</th>
        <th scope="col">E-mail</th>
        <th scope="col">Phone</th>
        <th scope="col"></th>
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody>
      @foreach($employees as $employee)
      <tr>
        <td>{{$employee->first_name}}</td>
        <td>{{$employee->last_name}}</td>
        <td>{{$employee->email}}</td>
        <td>{{$employee->phone}}</td>
        <td>
          {{ Form::open(['route' => ['employees.show', $employee], 'method' => 'delete']) }}
          {{ Form::submit('&times;', ['class' => 'btn  btn-sm btn-danger']) }}
          {{ Form::close() }}
        </td>
        <td>
          <a class="btn btn-sm btn-primary" href="{{route('employees.show', ['employee' => $employee])}}" role="button">Edit</a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
@endsection
