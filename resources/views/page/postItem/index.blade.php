@extends('layouts.app')

@section('content')

<div class="container d-flex justify-content-center">

            

    <div class="card w-50">
    
            @if (session('success_message'))
                <div class="p-3 mb-3 mt-5 bg-success text-white w-50 mx-auto  rounded">
                    <div class="text-center">
                    {{ session('success_message') }}
                    </div>
                </div>
            @endif

        <div class="card-body">
            <div class="border-bottom mb-3 pb-3">
                <h4 class="text-center">商品を出品する</h4>
            </div>
            <form action="{{route('postItem.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="form-group" style="">
                <label for="exampleFormControlFile1">
                画像を指定してください
                </label>
                <input style="" name="img_url" type="file" class="form-control-file" id="file-sample" accept="image/png, image/jpeg">
                <img id="file-preview" class="mt-3" style="width:200px;height:200px;">
            </div>

            <div class="form-group" >
                <label for="">商品名</label>
                <input name="name" type="text" class="form-control" >
            </div>

            <div class="form-group">
                <label for="">商品説明</label>
                <textarea name="description" type="text" class="form-control"></textarea>
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1">商品カテゴリー</label>
                <select class="form-control" name="category_id">
                <option selected="selected">カテゴリーを選択</option>

                    @foreach($categories as  $category)

                        @if($category->major_name == 'メンズ')
                            <option value="{{$category->id}}">{{$category->name}}(メンズ)</option>
                        @endif

                        @if($category->major_name == 'レディース')
                            <option value="{{$category->id}}">{{$category->name}}(レディース)</option>
                        @endif

                        @if($category->major_name == 'ベビー・キッズ')
                            <option value="{{$category->id}}">{{$category->name}}(ベビー・キッズ)</option>
                        @endif

                        @if($category->major_name == 'その他')
                            <option value="{{$category->id}}">{{$category->name}}(その他)</option>
                        @endif

                    @endforeach

                </select>
            </div>

            <div class="form-group">
                <label for="">商品価格</label>
                <input name="price" type="number" class="form-control">
            </div>

           
            <div class="form-group">
                <label for="exampleInputPassword1">商品の状態</label>
                <select class="form-control" name="status">
                    <option value=""　selected="selected">選択して下さい</option>
                    @foreach($statuses as $status)
                    <option value="{{$status}}">{{$status}}</option>
                    @endforeach
                </select>
            </div>
            
            <div class="text-center mt-5">
                <button type="submit" class="btn btn-primary w-25">出品</button>
            </div>

            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
            
            </form>
        </div>
    </div>
</div>

<script>
    document.getElementById('file-sample').addEventListener('change', function (e) {
    // 1枚だけ表示する
    var file = e.target.files[0];

    // ファイルリーダー作成
    var fileReader = new FileReader();
    fileReader.onload = function() {
        // Data URIを取得
        var dataUri = this.result;

        // img要素に表示
        var img = document.getElementById('file-preview');
        img.src = dataUri;
    }

    // ファイルをData URIとして読み込む
    fileReader.readAsDataURL(file);
});
</script>


@endsection