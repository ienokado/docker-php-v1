<header class="container">
    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom box-shadow">
        <h5 class="my-0 mr-md-auto font-weight-normal"><a class="text-dark" href="/">Chat App</a></h5>
        <nav class="my-2 my-md-0 mr-md-3">
                <a class="btn btn-outline-warning p-2" href="/">コメント一覧</a>
            <?php if (isset($_SESSION['USERID']) && isset($_SESSION['SESSIONID']) && $_SESSION['SESSIONID'] === session_id()) { ?>
                <a class="btn btn-outline-warning p-2" href="/user">ユーザ情報変更</a>
            <?php } else { ?>
                <a class="btn btn-outline-warning p-2" href="/user">ユーザ登録</a>
            <?php } ?>
        </nav>
        <?php if (isset($_SESSION['USERID']) && isset($_SESSION['SESSIONID']) && $_SESSION['SESSIONID'] === session_id()) { ?>
            <a class="btn btn-outline-primary" href="/logout">ログアウト</a>
        <?php } else { ?>
            <a class="btn btn-outline-primary" href="/login">ログイン</a>
        <?php } ?>
    </div>
</header>