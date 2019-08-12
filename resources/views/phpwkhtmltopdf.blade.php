@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <h1>phpwkhtmltopdf</h1>

        <iframe src="{{ route('phpwkhtmltopdf.download') }}" width="100%" height="100%">
        </iframe>
      </div>
    </div>
  </div>
@endsection
