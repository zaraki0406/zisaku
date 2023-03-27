<form action="">
    新規登録
    <div class = "">
        <input type='text' class='form-control' placeholder = 'ユーザー名入力' name='name'/>
    </div>

    <div class>
        <input type='text' class='form-control' placeholder = 'メールアドレス入力' name='email'/>
    </div>

    <div class>
        <input type='text' class='form-control' placeholder = 'パスワード入力' name='password'/>
    </div>

    <div class>
        <input type='text' class='form-control' placeholder = 'パスワード確認入力'/>
    </div>

    <div class>
        <a href="{{ route('Register.confirmation') }}">
            <button type='button' class='btn btn-secondary'>新規登録</button>
        </a>
    </div>
</form>