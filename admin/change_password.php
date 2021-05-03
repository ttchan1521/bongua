<?php 
    include('header.php');  
    if (isset($_SESSION['current_user'])) {
?>
    <div class = 'main-content'>
        <h1>Đổi mật khẩu</h1>
        <div id="content-box">
            <?php
            if (isset($_GET['action']) && $_GET['action'] == 'add') {
                if (empty($_POST['currentPassword']) || empty($_POST['newPassword']) || empty($_POST['confirmPassword']))
                {
                    $error = "Bạn chưa nhập đủ thông tin.";
                }
                else 
                {
                    $pass = $_SESSION['current_user']['password'];
                    $currentPass = md5($_POST['currentPassword']);
                    $newPass = md5($_POST['newPassword']);
                    $confirmPass = md5($_POST['confirmPassword']);

                    if ($pass == $currentPass) {

                        if ($newPass == $confirmPass) {
                            $id = $_SESSION['current_user']['adminID'];

                            $sql = "UPDATE admin SET password = '$newPass' WHERE adminID = $id";

                            $res = mysqli_query($con, $sql);

                            if (!$res) {
                                $error = "Có lỗi xảy ra trong quá trình thực hiện";
                            }
                        }
                        else 
                        {
                            $error = "Mật khẩu mới không giống";
                        }
                    }
                    else 
                    {
                        $error = "Mật khẩu không chính xác";
                    }
                }
                ?>
                <div class = "container">
                    <div class = "error"><?= isset($error) ? $error : "Đổi mật khẩu thành công" ?></div>
                    <a href = "timeline_listing.php">Return</a>
                </div>
            <?php } else { ?>
                <form id="timeline-form" method="POST" action="?action=add"  enctype="multipart/form-data">
                    <input type="submit" title="Lưu sản phẩm" value="" />
                    <div class="clear-both"></div>
                    <div class="wrap-field">
                        <label>Current password: </label>
                        <input type="password" name="currentPassword" value="" style="width: 250px"/>
                        <div class="clear-both"></div>
                    </div>   

                    <div class="wrap-field">
                        <label>New password: </label>
                        <input type="password" name="newPassword" value="" style="width: 250px"/>
                        <div class="clear-both"></div>
                    </div> 

                    <div class="wrap-field">
                        <label>Confirm password: </label>
                        <input type="password" name="confirmPassword" style="width: 250px" >
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



