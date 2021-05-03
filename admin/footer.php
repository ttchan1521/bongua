<?php if (!empty($_SESSION['current_user'])) { ?>
    <div class="clear-both"></div>
    </div>
    </div>
    <div id="admin-footer">
        <div class="container">
            <div class="left-panel">
                © TimeLine 2021 - by BoNgua
            </div>
            <div class="right-panel">
                <a target="_blank" href="https://www.facebook.com/GrapePanta" title="Facebook Thao Tran"><img height="48" src="../images/facebook.png" /></a>
                <a target="_blank" href="https://www.youtube.com/c/CheriHyeri%EC%B2%B4%EB%A6%AC%ED%98%9C%EB%A6%AC/featured" title="Youtube Channel"><img height="48" src="../images/youtube.png" /></a>
            </div>
            <div class="clear-both"></div>
        </div>
    </div>
<?php } else { ?>
    <div class="container">
        <div class="box-content">
            Bạn chưa đăng nhập. Mời bạn quay lại đăng nhập quản trị <a href="index.php">tại đây</a>
        </div>
    </div>
<?php } ?>
</body>
</html>