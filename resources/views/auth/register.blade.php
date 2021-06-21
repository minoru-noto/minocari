@extends('layouts.index')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 bg-white">

        <div class="text-center mt-5 border-bottom pb-4">
            <h4>新規会員登録</h4>
        </div>

        <div>

        <div class="mb-2 mt-3">
            <div class="form-group row">
                <label for="" class="col-md-3 col-form-label text-md-right"></label>

                <div class=" col-md-6 border-bottom  pb-4">
                    <a href="/login/google" class="btn btn-outline-dark w-100 " role="button">
                    <i class="fab fa-google mr-2 text-success"></i>  Googleで続行
                    </a>
                </div>
            </div>
        </div>
        
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="form-group ">

                <div class="w-50 mx-auto">
                    <label for="name" class="text-md-right text-monospace ">ニックネーム</label>
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="例）メルカリ太郎">

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group ">

                <div class="w-50 mx-auto">
                <label for="email" class=" text-md-right text-monospace">メールアドレス</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="PC・携帯どちらでも可">

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group ">

                <div class="w-50 mx-auto">
                    <label for="password" class="text-md-right text-monospace">パスワード</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="８文字以上の半角英数字">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row mb-2">
                <div class=" col-md-6 offset-md-3">
                    <button type="submit" class="btn bg-danger text-white w-100 text-monospace border-dark">
                            次へ進む
                    </button>
                </div>
            </div>
        </form>

        </div>

        <div class="w-50 mx-auto mb-4">
            <p class="text-muted small">
            アカウントを作成すると、<a href="#" class="">サービス利用規約</a>および<a href="#" class="">プライバシーポリシー</a>に同意したとみなされます。
            </p>
        </div>

        <div class="w-50 mx-auto mb-5">
            <p class="text-muted text-center">既にアカウントをお持ちですか？</p>
            <p class="text-center"><a href="{{ route('login') }}" class="">ログイン</a></p>
        </div>
        
        
        </div>
    </div>
</div>



@endsection