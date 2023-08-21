@extends('back.layout.app')

@section('title','لوحة التحكم')

@section('style')

@endsection

@section('content')
@include('flash::message')

@component('componnent.dashboard')
    Dashboard
@endcomponent
<p>
    this home page dashboard
</p>
<br>
<h4>
    Designed with love <i class="fa-solid fa-heart fa-beat" style="color: #af189b;"></i> By : Houssine agha
</h4>
@section('script')

@endsection
@endsection
