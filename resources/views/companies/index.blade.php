@extends('layouts.card')

@section('card_header')
  <div class="row">
    <div class="col-sm pt-1">
      <h3>Companies</h3>
    </div>
    <div class="col-sm">
      {{$companies->links()}}
    </div>
    <div class="col-sm">
      <a class="btn btn-secondary float-right" href="{{route('companies.create')}}" role="button">Create</a>
    </div>
  </div>
@endsection

@section('card_body')
  <table class="table">
    <thead>
      <tr>
        <th scope="col"></th>
        <th scope="col">Name</th>
        <th scope="col">E-mail</th>
        <th scope="col">Website</th>
        <th scope="col"></th>
        <th scope="col"></th>
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody>
      @foreach($companies as $company)
      <tr>
        <td class="p-1">
          <div style="width:48px;height:48px; background-size:contain;
          background-repeat: no-repeat;
          background-position-x: center;
          background-image:url('{{$company->logo_as_base_64_css()}}'
          )"></div>
        </td>
        <td>{{$company->name}}</td>
        <td>{{$company->email}}</td>
        <td>{{$company->website}}</td>
        <td>
          <a class="btn btn-sm btn-primary" href="{{route('employees.index',  ['company' => $company->id])}}" role="button">Employees</a>
        </td>
        <td>
          {{ Form::open(['route' => ['companies.show', $company], 'method' => 'delete']) }}
          {{ Form::submit('&times;', ['class' => 'btn  btn-sm btn-danger']) }}
          {{ Form::close() }}
        </td>
        <td>
          <a class="btn btn-sm btn-primary" href="{{route('companies.show', ['companies' => $company])}}" role="button">Edit</a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
@endsection
