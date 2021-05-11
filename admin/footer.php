<style>
    .right-panel2 i{
        font-size: 30px;
        margin-right: 60px;
    }
    .right-panel2{
        float: right;
        margin-top: 15px;
    }
</style>

<?php if (!empty($_SESSION['current_user'])) { ?>
    <div class="clear-both"></div>
    </div>
    </div>
    <div id="admin-footer">
        <div class="container">
            <div class="left-panel">
                © TimeLine 2021 - by BoNgua
            </div>
            <div class="right-panel2">
                <a href="https://www.facebook.com/GrapePanta"><i class="fab fa-facebook"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
			    <a href="#"><i class="fab fa-instagram"></i></a>
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