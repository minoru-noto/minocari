@extends('layouts.app')

@section('content')

<div class="container d-flex justify-content-center">

            

    <div class="card w-75">
    
            
        <div class="card-body">
            <div class="border-bottom mb-3 pb-3">
                <h4 class="text-center">商品の情報</h4>
            </div>

            <div class="row w-100">

                <div class="col-md-5">
                    <img src="{{ asset($postItem->img_url) }}" class="border" width="250px" height="250px" alt="">
                    <div class="mt-3 text-center mr-5">
                        <a href="{{route('comment.show',$postItem->id)}}" class="btn bg-success text-white w-50">コメントする</a>
                    </div>
                </div>
                <div class="col-md-7 mt-1">

                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                            <th scope="row">商品名</th>
                            <td>{{$postItem->name}}</td>
                            </tr>
                            <tr>
                            <th scope="row">カテゴリー</th>
                            <td>{{$postItem->category->name}} / {{$postItem->category->major_name}}</td>
                            </tr>
                            <tr>
                            <th scope="row">商品説明</th>
                            <td>{{$postItem->description}}</td>
                            </tr>
                            <tr>
                            <th scope="row">商品の状態</th>
                            <td>{{$postItem->status}}</td>
                            </tr>
                            <tr>
                            <th scope="row">価格</th>
                            <td>￥{{$postItem->price}}</td>
                            </tr>
                            <tr>
                            <th scope="row">出品者名</th>
                            <td>{{$postItem->user->name}}さん</td>
                            </tr>
                        </tbody>
                    </table>

                    <!-----------出品者は購入不可--------------->
                    
                    @if($postItem->user->id != Auth::user()->id)
                    <form action="{{route('buyItem.store',$postItem->id)}}" method="POST">
                    @csrf
                    <input type="hidden" name="postItem_id" value="{{$postItem->id}}">
                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary"><i class="fas fa-shopping-cart"></i>   商品購入</button>
                    </div>
                    </form>
                    @endif


                </div>

            </div>
            
        </div>
    </div>
</div>



@endsection