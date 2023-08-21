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
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
    Launch demo modal
  </button>

  <!-- Modal -->
  <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          ...
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>


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
                <img src="{{asset($item->image)}}" alt="" height="50px" width="50px">
            </td>
            <td>
                <a href=""><i class="fa-regular fa-trash-can" style="font-size: 18px;"></i></a>
                <a href=""><i class="fa-regular fa-pen-to-square" style="font-size: 18px;"></i></a>
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
