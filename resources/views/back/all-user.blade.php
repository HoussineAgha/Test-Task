@extends('back.layout.app')

@section('title','لوحة التحكم')

@section('style')

@endsection

@section('content')
@include('flash::message')

@component('componnent.dashboard')
    All User
@endcomponent
<table class="table">
    <thead>
      <tr>
        <th scope="col">#ID</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Device type</th>
      </tr>
    </thead>
    <tbody>
        @forelse ($allUser as $item)
        <tr>
            <th scope="row">{{$item->id}}</th>
            <td>{{$item->name}}</td>
            <td>{{$item->email}}</td>
            <td>{{$item->deviceType}}</td>
        </tr>
        @empty
            <div class="empty text-center" style="background-color: aqua">
                No data yet
            </div>
        @endforelse
    </tbody>
    {{ $allUser->links() }}
  </table>
@section('script')

@endsection
@endsection
