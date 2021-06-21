@extends('layouts.app')

@section('content')

<div class="container mt-5" style="">

    <div class="row">

        @foreach($postItems as $postItem)
        <div class="col-md-3">
        
            <div class="card" style="width: 15rem;position:relative;">
                <a href="">
                 <img src="{{ asset($postItem->img_url) }}" width="100%" height="100%" alt="">
                </a>
                <div class="card-body border-top">
                    <p class="">{{$postItem->category->major_name}} / {{$postItem->category->name}}</p>
                    <h5 class="card-text">{{$postItem->name}}</h5>
                </div>
                <div class="bg-dark w-50" style="opacity:0.5;position:absolute;bottom:115px;">
                    <p class="align-bottom text-light ml-2 pt-2">￥{{$postItem->price}}</p>
                </div>
            </div>

        </div>
        @endforeach

        

   

    </div>

    <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center position-fixed" style="right:50px;bottom:20px;width:120px;height:120px;">
        <h5 class=""><a href="{{route('postItem.index')}}" class="text-white">出品</a></h5>
    </div>

</div>


@endsection
