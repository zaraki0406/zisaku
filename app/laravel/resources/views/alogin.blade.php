<form action="">
    <div class = "">
        <input type='text' class='form-control' placeholder = 'ユーザー名（メールアドレス）' name='email'/>
    </div>

    <div class>
        <input type='text' class='form-control' placeholder = 'パスワード' name='password'/>
    </div>

    <div class>
        <a href="">パスワードをお忘れの方</a>
    </div>

    <div class>
        <a href="">
            <button type='button' class='btn btn-primary'>ログイン</button>
        </a>
    </div>

    <div class>
        <a href="{{ route('register') }}">
            <button type='button' class='btn btn-secondary'>新規登録</button>
        </a>
    </div>
</form>