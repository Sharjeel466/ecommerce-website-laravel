@extends('front.layouts.master')
@section('container')

<div class="thank-you-section">
    <h1>Thank you for <br> Your Order!</h1>
    <div class="spacer"></div>
    <div>
        <a href="{{ url('/') }}" class="btn btn-info">Home Page</a>
    </div>
</div>

@endsection
