@extends('layout.app')

@section('title','الرئيسية')

@section('style')
<style>

</style>
@endsection

@section('content')

<main class="backround" >
    <div class="container">
        <div class="row" style="margin-top: 50px;margin-bottom:50px;">
    @foreach ($note as $item)
        <div class="col-4" style="margin-bottom:15px; ">
            <div class="card" style="width: 18rem;">
                @isset($item->image)
                <img src="{{asset($item->image)}}" class="card-img-top" alt="..." height="150px" width="150px;">
                @endisset
                @empty($item->image)
                <img src="{{asset('image/defult.jpg')}}" class="card-img-top" alt="..." height="150px" width="150px;">
                @endempty
                <div class="card-body">
                    <p class="card-text">{{$item->description}}</p>
                </div>
            </div>
        </div>
    @endforeach
    <div class="paginate" style="margin-top: 15px; padding-left:40%;">
        {{$note->links()}}
    </div>
        </div>
    </div>
</main>

@section('script')

@endsection
@endsection
