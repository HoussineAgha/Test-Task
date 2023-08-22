@extends('back.layout.app')

@section('title','All-Note')

@section('style')

@endsection

@section('content')
@include('flash::message')

@component('componnent.dashboard')
    edite Note
@endcomponent
    <form action="{{route('update.note',$note->id)}}" method="POST">
        @method('PUT')
        @csrf
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" class="form-control" id="description" rows="3">{{$note->description}}</textarea>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input value="{{$note->image}}" name="image" class="form-control" type="file" id="image">
        </div>

        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">send</button>
        </div>
    </form>
@section('script')

@endsection
@endsection
