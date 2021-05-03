<?php
include 'header.php';
if (!empty($_SESSION['current_user'])) {
    ?>
    <div class="main-content">
        <h1>Thêm sản phẩm</h1>
        <div id="content-box">
            <?php
            if (isset($_GET['action']) && $_GET['action'] == 'add') {
                if (isset($_POST['universesName']) && !empty($_POST['universesName'])) {
                    if (empty($_POST['universesName'])) {
                        $error = "Bạn phải nhập tên sản phẩm";
                    } 
                    if (!isset($error)) {
                        $result = mysqli_query($con, "INSERT INTO `timelines` (`universeID`, `universesName`, `created_time`, `last_updated`) VALUES (NULL, '" . $_POST['universesName'] . "', " . time() . ", " . time() . ");");
                        if (!$result) {
                            $error = "Có lỗi xảy ra trong quá trình thực hiện.";
                        }
                    }
                } else {
                    $error = "Bạn chưa nhập thông tin sản phẩm.";
                }
                ?>
                <div class = "container">
                    <div class = "error"><?= isset($error) ? $error : "Cập nhật thành công" ?></div>
                    <a href = "timeline_listing.php">Return</a>
                </div>
            <?php } else { ?>
                <form id="timeline-form" method="POST" action="?action=add"  enctype="multipart/form-data">
                    <input type="submit" title="Lưu sản phẩm" value="" />
                    <div class="clear-both"></div>
                    <div class="wrap-field">
                        <label>Tên sản phẩm: </label>
                        <input type="text" name="universesName" value="" />
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
include './footer.php';
?>