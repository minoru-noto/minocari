@extends('layouts.app')

@section('content')

<div class="container d-flex justify-content-center">
            

    <div class="card w-50">

    

        <div class="card-body">

            <div class="border-bottom mb-3 pb-3">
                <h4 class="text-center">{{Auth::user()->name}}さんの出品履歴   <i class="fas fa-camera"></i></h4>
            </div>

            @foreach($postItems as $postItem)
            <div class="row border-bottom pb-3 pt-3">
                <div class="col-md-4">
                        <img src="{{ asset($postItem->img_url) }}" width="150px" height="150px" alt="">
                </div>
                <div class="offset-md-2 col-md-6">
                    <div class="mt-3">
                        <p>商品名 &nbsp;&nbsp;{{$postItem->name}}</p>
                    </div>
                    <div>
                        <p>購入日 &nbsp;&nbsp;{{$postItem->created_at->format('Y年m月d日')}}</p>
                    </div>


                </div>
            </div>
            @endforeach

        </div>
    </div>
</div>


@endsection