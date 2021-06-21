@extends('layouts.app')

@section('content')

<div class="container d-flex justify-content-center">

            

    <div class="card w-75">
    
            
        <div class="card-body">
            <div class="border-bottom mb-3 pb-3">
                <h4 class="text-center">商品を情報</h4>
            </div>

            <div class="row w-100">

                <div class="col-md-5">
                    <img src="{{ asset($postItem->img_url) }}" class="border" width="250px" height="250px" alt="">
                </div>
                <div class="col-md-7 mt-1">

                    <!-- <div class="row">

                    

                        <div class="col-md-4">
                            <p>商品名</p>
                        </div>
                        <div class="col-md-7">
                            <p>{{$postItem->name}}</p>
                        </div>

                    </div> -->

                    <table class="table table-bordered">
                        <!-- <thead>
                            <tr>
                            <th scope="col">商品情報</th>
                            <th scope="col"></th>
                            </tr>
                        </thead> -->
                        <tbody>
                            <tr>
                            <th scope="row">商品名</th>
                            <td>{{$postItem->name}}</td>
                            </tr>
                            <tr>
                            <th scope="row">カテゴリー</th>
                            <td>{{$postItem->category->major_name}} / {{$postItem->category->name}}</td>
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
                        </tbody>
                    </table>

                </div>

            </div>
            
        </div>
    </div>
</div>



@endsection