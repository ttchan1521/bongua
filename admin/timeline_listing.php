<style>
    #timeline-search {
       margin-bottom: 8px;
    }
    
    #timeline-search input {
        height: 30px;
        width: 220px;
        margin-top: 35px;
        text-indent: 8px;
    }
    #timeline-search button {
        height: 30px;
        width: 30px;
        
    }
    .header-form {
        display: inline-block;
        width: 100%;
    }
    .buttons{
        text-align: right;
        font-weight: bold;
        font-size: 16px;
        margin-bottom: 15px;
        line-height: 38px;
        float: right;
        margin-top: 10px;
    }
    .buttons a{
        color: #FFF;
        padding: 10px;
        background: #000;
    }
</style>

<?php
include 'header.php';
if (!empty($_SESSION['current_user'])) {
    if(!empty($_GET['action']) && $_GET['action'] == 'search' && !empty($_POST)){
        $_SESSION['timeline_filter'] = $_POST;
        header('Location: timeline_listing.php');exit;
    }
    if(!empty($_SESSION['timeline_filter'])){
        $where = "";
        foreach ($_SESSION['timeline_filter'] as $field => $value) {
            if(!empty($value) &&  $field = 'universesName'){
                $where .= (!empty($where))? " AND "."`".$field."` LIKE '%".$value."%'" : "`".$field."` LIKE '%".$value."%'";                  
            }
        }
        extract($_SESSION['timeline_filter']);
    }
    $item_per_page = (!empty($_GET['per_page'])) ? $_GET['per_page'] : 10;
    $current_page = (!empty($_GET['page'])) ? $_GET['page'] : 1;
    $offset = ($current_page - 1) * $item_per_page;
    $totalRecords = mysqli_query($con, "SELECT * FROM `timelines`");
    $totalRecords = $totalRecords->num_rows;
    $totalPages = ceil($totalRecords / $item_per_page);
    // $timelines = mysqli_query($con, "SELECT * FROM `timelines` ORDER BY `universeID` DESC LIMIT " . $item_per_page . " OFFSET " . $offset);
    if(!empty($where)){
        $timelines = mysqli_query($con, "SELECT * FROM `timelines` where (".$where.") ORDER BY `universeID` DESC LIMIT " . $item_per_page . " OFFSET " . $offset);
    }else{
        $timelines = mysqli_query($con, "SELECT * FROM `timelines` ORDER BY `universeID` DESC LIMIT " . $item_per_page . " OFFSET " . $offset);
    }
    mysqli_close($con);
    ?>
    <div class="main-content">
        <h1>Timelines</h1>
        <div class="timeline-items">
            <div class="header-form">
            <div class="buttons">
                <a href="./timeline_editing.php">Add new timeline</a>
            </div>
            
                <form id="timeline-search" action="timeline_listing.php?action=search" method="POST">  
                    <input type="text" name="universesName" placeholder="Search" value="<?=!empty($universesName)?$universesName:""?>" />
                    <button type="submit"><i class="fas fa-search"></i></button>
                </form>
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
                while ($row = mysqli_fetch_array($timelines)) {
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