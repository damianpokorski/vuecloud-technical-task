@extends('layouts.card')

@section('card_header')
  {{$employees->links()}}
@endsection

@section('card_body')
  <pre>
    <?php// print_r($employees); ?>
  </pre>
  <table class="table">
    <thead>
      <tr>
        <th scope="col"></th>
        <th scope="col">Name</th>
        <th scope="col">E-mail</th>
        <th scope="col">Website</th>
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody>
      @foreach($emmployees as $employee)
      <tr>
        <th></th>
        <td>{{$employee->name}}</td>
        <td>{{$employee->email}}</td>
        <td>{{$employee->website}}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
@endsection
