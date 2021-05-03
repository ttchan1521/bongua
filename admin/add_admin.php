<?php 
    include('header.php');
    if (isset($_SESSION['current_user'])) {
?>
    <div class = 'main-content'>
        <h1>Thêm Admin</h1>
        <div id="content-box">
            <?php
            if (isset($_GET['action']) && $_GET['action'] == 'add') {
                if (!empty($_POST['adminName']) && !empty($_POST['password']) && !empty($_POST['confirmPass'])) {

                    if ($_POST['password'] == $_POST['confirmPass']) {
                
                    
                        $result = mysqli_query($con, "INSERT INTO `admin` (`adminName`, `password`) VALUES ('" . $_POST['adminName'] . "', md5('" . $_POST['password']."'))");
                        if (!$result) {
                            $error = "Có lỗi xảy ra trong quá trình thực hiện.";
                        }
                    }
                    else 
                    {
                        $error = "Mật khẩu không giống.";
                    }
                } else {
                    $error = "Bạn chưa nhập đủ thông tin.";
                }
                ?>
                <div class = "container">
                    <div class = "error"><?= isset($error) ? $error : "Thêm Admin thành công" ?></div>
                    <a href = "timeline_listing.php">Return</a>
                </div>
            <?php } else { ?>
                <form id="timeline-form" method="POST" action="?action=add"  enctype="multipart/form-data">
                    <input type="submit" title="Lưu sản phẩm" value="" />
                    <div class="clear-both"></div>
                    <div class="wrap-field">
                        <label>Account name: </label>
                        <input type="text" name="adminName" value="" style="width: 250px"/>
                        <div class="clear-both"></div>
                    </div>   

                    <div class="wrap-field">
                        <label>Account password: </label>
                        <input type="password" name="password" value="" style="width: 250px"/>
                        <div class="clear-both"></div>
                    </div> 

                    <div class="wrap-field">
                        <label>Confirm password: </label>
                        <input type="password" name="confirmPass" style="width: 250px">
                        <div class="clear-both"></div>
                    </div>

                </form>
                <div class="clear-both"></div>
                <script>
                    // Replace the <textarea id="editor1"> with a CKEditor
                    // instance, using default configuration.
                    CKEDITOR.replace('timeline-content');
                </script>
            <?php } ?>
        </div>
    </div>

<?php
    }
    include('footer.php');

?>