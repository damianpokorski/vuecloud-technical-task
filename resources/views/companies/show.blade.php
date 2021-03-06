@extends('layouts.card')

@section('card_header')
  <div class="row">
    <div class="col-sm pt-1">
      <h3>Company details</h3>
    </div>
    <div class="col-sm">
    </div>
    <div class="col-sm">
      <a class="btn btn-secondary float-right" href="{{route('companies.index')}}" role="button">Back</a> 
    </div>
  </div>
  @endsection

@section('card_body')

  {{ Form::model($model) }}

  <div class="form-group">
    {{ Form::label('name', 'Company Name') }} 
    {{ Form::text('name', null, ['class' => 'form-control', 'disabled' => true]) }}
  </div>
  <div class="form-group">
    {{ Form::label('email', 'Email') }} 
    {{ Form::email('email', null, ['class' => 'form-control', 'disabled' => true]) }}
  </div>
  <div class="form-group">
    {{ Form::label('website', 'Website') }} 
    {{ Form::text('website', null, ['class' => 'form-control', 'disabled' => true]) }}
  </div>
  <div class="form-group">
    <div style="height:100px; background-size:contain;
    background-repeat: no-repeat;
    background-position-x: center;
    background-image:url('{{$model->logo_as_base_64_css()}}'
    )"></div>
  </div>
    
  <a class="btn btn-block btn-primary" href="{{route('companies.edit', ['companies' => $model])}}" role="button">Edit</a>
  {{ Form::close() }}
@endsection

