@extends('layouts.card')

@section('card_header')
  <div class="row">
    <div class="col-sm pt-1">
      <h3>Create a company</h3>
    </div>
    <div class="col-sm">
    </div>
    <div class="col-sm">
      <a class="btn btn-primary float-right" href="{{route('companies.index')}}" role="button">Back</a>
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

  {{ Form::open(['url' => '/companies', 'method' => 'post', 'files' => true]) }}

  <div class="form-group">
    {{ Form::label('name', 'Company Name') }} 
    {{ Form::text('name', null, ['class' => 'form-control']) }}
  </div>
  <div class="form-group">
    {{ Form::label('email', 'Email') }} 
    {{ Form::email('email', null, ['class' => 'form-control']) }}
  </div>
  <div class="form-group">
    {{ Form::label('website', 'Website') }} 
    {{ Form::text('website', null, ['class' => 'form-control']) }}
  </div>
  <div class="form-group">
    {{ Form::label('logo', 'Logo') }} 
    {{ Form::file('logo', ['class' => 'form-control-file']) }}
  </div>

  {{ Form::submit('Create a company', ['class' => 'btn btn-block btn-primary']) }}
  {{ Form::close() }}
@endsection

