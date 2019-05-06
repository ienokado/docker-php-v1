<footer class="fixed-bottom p-5">
    <div class="container">
        <form id="form-comment" class="bg-light" action="/comment" method="post">
            <div class="form-row">
                <div class="col-auto">
                </div>
                <div class="col">
                    <input type="text" name="message" class="form-control" required="required" placeholder="メッセージを入力"
                        <?php if (!isset($_SESSION['USERID']) || !isset($_SESSION['SESSIONID']) || $_SESSION['SESSIONID'] !== session_id()) { ?>
                            disabled
                        <?php } ?>
                    >
                </div>
                <div class="col-auto">
                    <input class="btn btn-primary" type="submit" name="submit" value="送信"
                        <?php if (!isset($_SESSION['USERID']) || !isset($_SESSION['SESSIONID']) || $_SESSION['SESSIONID'] !== session_id()) { ?>
                            disabled
                        <?php } ?>
                    />
                </div>
            </div>
        </form>
    </div>
</footer>