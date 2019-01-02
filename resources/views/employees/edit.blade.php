@extends('layouts.card')

@section('card_header')
  <div class="row">
    <div class="col-sm pt-1">
      <h3>Employee details</h3>
    </div>
    <div class="col-sm">
    </div>
    <div class="col-sm">
      <a class="btn btn-secondary float-right" href="{{route('employees.index', ['company' => $employee->company_id])}}" role="button">Back</a> 
    </div>
  </div>
  @endsection

@section('card_body')
  @if ($errors->any())
      @foreach ($errors->all() as $error)
        <div class="alert alert-danger p-0">
            <ul class="m-0">
                    <li>{{ $error }}</li>
            </ul>
        </div>
      @endforeach
  @endif

  {{ Form::model($employee, ['url' => [route('employees.update', $employee)], 'method' => 'put']) }}
  <div class="form-group">
    {{ Form::label('first_name', 'First Name') }} 
    {{ Form::text('first_name', null, ['class' => 'form-control']) }}
  </div>

  <div class="form-group">
    {{ Form::label('last_name', 'First Name') }} 
    {{ Form::text('last_name', null, ['class' => 'form-control']) }}
  </div>

  <div class="form-group">
    {{ Form::label('email', 'Email') }} 
    {{ Form::text('email', null, ['class' => 'form-control']) }}
  </div>

  <div class="form-group">
    {{ Form::label('phone', 'Phone') }} 
    {{ Form::text('phone', null, ['class' => 'form-control']) }}
  </div>

  {{ Form::submit('Save', ['class' => 'btn btn-block btn-primary']) }}
  {{ Form::close() }}
@endsection

