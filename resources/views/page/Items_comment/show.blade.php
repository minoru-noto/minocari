@extends('layouts.app')

@section('content')

<div class="container d-flex justify-content-center">

            

    <div class="card w-75">
    
            
        <div class="card-body">
            <div class="border-bottom mb-3 pb-3">
                <h4 class="text-center">商品に関するコメント</h4>
            </div>

            @foreach($comments as $comment)

                @if($comment->user_id == Auth::user()->id)
                <div class="mb-4">
                    <div class="">
                        <p>{{Auth::user()->name}}</p> 
                    </div>
                    <div class="p-3 mb-2 bg-success text-white rounded w-50">
                        <p>{{$comment->content}}</p>
                    </div>
                </div>
                @else
                <div class="row mb-4">
                    <div class="offset-md-5 col-md-7">
                        <div class="text-right">
                            <p>{{$comment->user->name}}</p> 
                        </div>
                        <div class="p-3 mb-2 bg-success text-white rounded">
                            <p>{{$comment->content}}</p>
                        </div>
                    </div>
                </div>
                @endif

            @endforeach

<!--             
            <div class="row mb-4">
                <div class="offset-md-5 col-md-7">
                    <div class="text-right">
                        <p>名前</p> 
                    </div>
                    <div class="p-3 mb-2 bg-success text-white rounded">
                        <p></p>
                    </div>
                </div>
            </div>

             -->


            <div　class="w-100 ">
                <form action="{{route('comment.store')}}" method="POST">
                @csrf
                <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                <input type="hidden" name="post_item_id" value="{{$id}}">
                    <div class="d-flex">

                        <div>
                            <textarea name="content" id="" cols="90" rows="2"></textarea>
                        </div>
                        <div class="ml-3">
                            <button type="submit" class="p-3 btn btn-info">送信</button>
                        </div>

                    </div>
                    
                </form>
            </div>


            
        </div>
    </div>
</div>


@endsection