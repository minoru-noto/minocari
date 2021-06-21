@extends('layouts.app')

@section('content')

<div class="container d-flex justify-content-center">

            
            

    <div class="card w-50">

    

        <div class="card-body">

            @if (session('delete_success'))
                <div class="p-3 mb-5 bg-success text-white w-50 mx-auto  rounded">
                    <div class="text-center">
                    <i class="fas fa-shopping-cart"></i>  {{ session('delete_success') }}
                    </div>
                </div>
            @endif

            <div class="border-bottom mb-3 pb-3">
                <h4 class="text-center">{{Auth::user()->name}}さんの購入履歴  <i class="fas fa-shopping-cart"></i></h4>
            </div>

            @foreach($buyItems as $buyItem)
            <div class="row border-bottom pb-3 pt-3">
                <div class="col-md-4">
                        <img src="{{ asset($buyItem->postItem->img_url) }}" width="150px" height="150px" alt="">
                </div>
                <div class="offset-md-2 col-md-6">
                    <div class="mt-3">
                        <p>商品名 &nbsp;&nbsp;{{$buyItem->postItem->name}}</p>
                    </div>
                    <div>
                        <p>購入日 &nbsp;&nbsp;{{$buyItem->created_at->format('Y年m月d日')}}</p>
                    </div>
                    <div class="">
                        <form action="{{route('buyItem.destroy',$buyItem->id)}}" method="POST">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="text-right mr-5">
                                <button type="submit" class="btn bg-danger text-white">削除</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</div>


@endsection