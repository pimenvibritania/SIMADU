@extends('errors.layout')

@php
  $error_number = 403;
@endphp

@section('title')
  Forbidden.
@endsection

@section('description')
  @php
    $default_error_message = "Please <a href='javascript:history.back()''>go back</a> or return to <a href='".url('')."'>our homepage</a>.";
    $login = "Please <a href='".url('login')."'>login</a> or return to <a href='".url('')."'>our homepage</a>."
  @endphp
  {!! isset($exception)? ($exception->getMessage()?$exception->getMessage():$default_error_message): $default_error_message !!}
    <br>
    {!! $login !!}
@endsection
