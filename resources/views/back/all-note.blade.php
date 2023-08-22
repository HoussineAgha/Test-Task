@extends('back.layout.app')

@section('title','All-Note')

@section('style')

@endsection

@section('content')
@include('flash::message')

@component('componnent.dashboard')
    All Note
@endcomponent

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop" style="margin-bottom:25px;">
    Create New
  </button>
  @include('back.modules.create-note')


<table class="table">
    <thead>
      <tr>
        <th scope="col">#ID</th>
        <th scope="col">Description</th>
        <th scope="col">Image</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
        @forelse ($allNote as $item)
        <tr>
            <th scope="row">{{$item->id}}</th>
            <td>{!!Str::limit($item->description , 10)!!}</td>
            <td>
                @isset($item->image)
                <img src="{{asset($item->image)}}" alt="" height="50px" width="50px">
                @endisset
            </td>
            <td>
                <a href="{{route('destory.note',$item->id)}}"><i class="fa-regular fa-trash-can" style="font-size: 18px;"></i></a>
                <a href="{{route('edit.note',$item->id)}}"><i class="fa-regular fa-pen-to-square" style="font-size: 18px;"></i></a>
            </td>
        </tr>

        @empty
            <div class="empty text-center" style="background-color: aqua">
                No data yet
            </div>
        @endforelse
    </tbody>
    {{ $allNote->links() }}
  </table>
@section('script')

@endsection
@endsection
