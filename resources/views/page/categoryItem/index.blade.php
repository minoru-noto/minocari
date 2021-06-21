@extends('layouts.app')

@section('content')

<div class="container mt-5" style="">

            @if (session('buy_success'))
                <div class="p-3 mb-5 bg-success text-white w-50 mx-auto  rounded">
                    <div class="text-center">
                    <i class="fas fa-shopping-cart"></i>  {{ session('buy_success') }}
                    </div>
                </div>
            @endif

    <div class="row">


        @foreach($postItems as $postItem)
        <div class="col-md-3 mb-5">
        
            <div class="card" width="250px" height="250px" style="position:relative;">
                <a href="{{route('item.show',$postItem->id)}}">
                 <img src="{{ asset($postItem->img_url) }}" width="100%" height="250px" alt="">
                </a>
                <div class="card-body border-top">
                    <p class="">{{$postItem->category->name}} / {{$postItem->category->major_name}}</p>
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