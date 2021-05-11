<?php
include 'header.php';
if (!empty($_SESSION['current_user'])) {
    $item_per_page = (!empty($_GET['per_page'])) ? $_GET['per_page'] : 10;
    $current_page = (!empty($_GET['page'])) ? $_GET['page'] : 1;
    $offset = ($current_page - 1) * $item_per_page;
    $totalRecords = mysqli_query($con, "SELECT * FROM `timelines`");
    $totalRecords = $totalRecords->num_rows;
    $totalPages = ceil($totalRecords / $item_per_page);
    $products = mysqli_query($con, "SELECT * FROM `timelines` ORDER BY `universeID` DESC LIMIT " . $item_per_page . " OFFSET " . $offset);
    mysqli_close($con);
    ?>
    <div class="main-content">
        <h1>Timelines</h1>
        <div class="timeline-items">
            <div class="buttons">
                <a href="./timeline_editing.php">Add new timeline</a>
            </div>
            <ul>
                <li class="timeline-item-heading">
                    <div class="timeline-prop timeline-name">TimelineName</div>
                    <div class="timeline-prop timeline-button">
                        Xóa
                    </div>
                    <div class="timeline-prop timeline-button">
                        Sửa
                    </div>
                    <div class="timeline-prop timeline-time">Ngày tạo</div>
                    <div class="timeline-prop timeline-time">Ngày cập nhật</div>
                    <div class="clear-both"></div>
                </li>
                <?php
                while ($row = mysqli_fetch_array($products)) {
                    ?>
                    <li>
                        <div class="timeline-prop timeline-name"><?= $row['universesName'] ?></div>
                        <div class="timeline-prop timeline-button">
                            <a href="./timeline_delete.php?universeID=<?= $row['universeID'] ?>">Xóa</a>
                        </div>
                        <div class="timeline-prop timeline-button">
                            <a href="./timeline_editing.php?universeID=<?= $row['universeID'] ?>">Sửa</a>
                        </div>
                    
                        <div class="timeline-prop timeline-time"><?= date('d/m/Y H:i', $row['created_time']) ?></div>
                        <div class="timeline-prop timeline-time"><?= date('d/m/Y H:i', $row['last_updated']) ?></div>
                        <div class="clear-both"></div>
                    </li>
                <?php } ?>
            </ul>
            <?php
            
            ?>
            <div class="clear-both"></div>
        </div>
    </div>
    <?php
}
include './footer.php';
?>