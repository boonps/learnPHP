<?php
require_once('connection.php');
/* เช็คว่ามีการกดปุ่มจากหน้า index ไหม */
if (isset($_REQUEST['update_id'])) {
    try {
        //รับค่า และเก็บค่า
        $id = $_REQUEST['update_id'];
        //เตรียมส่งข้อมูล
        $select_stmt = $dbcon->prepare("SELECT * FROM tbl_person WHERE id = :id");
        $select_stmt->bindParam(':id', $id);
        //ส่งข้อมูล
        $select_stmt->execute();
        //ดูข้อมูลเอาออกมาเป็นออปเจ็ค
        $row = $select_stmt->fetch(PDO::FETCH_ASSOC);
        //เข้าถึงข้อมูลโดยไม่ต้องประกาศ $row['firstname'] แบบนี้ 
        //โดยสามารถทำแบบนี้ได้เลย echo $firstname; ได้เลย
        extract($row);
    } catch (PDOException $e) {
        $e->getMessage();
    }
}

//เช็คว่ามีการกดปุ่มไหม
if (isset($_REQUEST['btn_update'])) {
    //รับค่า และเก็บค่า
    $firstname_up = $_REQUEST['txt_firstname'];
    $lastname_up = $_REQUEST['txt_lastname'];

    //เช็คว่ามีค่าไหม
    if (empty($firstname_up)) {
        $errorMsg = "Please Enter Fisrtname";
    } else if (empty($lastname_up)) {
        $errorMsg = "Please Enter Lastname";
    } else {
        try {
            if (!isset($errorMsg)) {
                //เตรียมส่งข้อมูล
                $update_stmt = $dbcon->prepare("UPDATE tbl_person SET firstname = :fname_up, lastname = :lname_up WHERE id = :id");
                $update_stmt->bindParam(':fname_up', $firstname_up);
                $update_stmt->bindParam(':lname_up', $lastname_up);
                $update_stmt->bindParam(':id', $id);

                //ส่งข้อมูล
                if ($update_stmt->execute()) {
                    $updateMsg = "Record update successfully...";
                    //รอ 2 วิ และกลับไปหน้า index
                    header("refresh:2;index.php");
                }
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="bootstrap/bootstrap.css">
</head>

<body>

    <div class="container">
        <div class="display-3 text-center">Edit Page</div>
        <!-- สร้างอะเลิท -->
        <?php
        if (isset($errorMsg)) {
        ?>
            <div class="alert alert-danger">
                <strong>Wrong! <?php echo $errorMsg; ?></strong>
            </div>
        <?php } ?>


        <?php
        if (isset($updateMsg)) {
        ?>
            <div class="alert alert-success">
                <strong>Success! <?php echo $updateMsg; ?></strong>
            </div>
        <?php } ?>
        <!-- สร้างแบบฟอร์ม -->
        <form method="post" class="form-horizontal mt-5">

            <div class="form-group text-center">
                <div class="row">
                    <label for="firstname" class="col-sm-3 control-label">Fisrtname</label>
                    <div class="col-sm-9">
                        <input type="text" name="txt_firstname" class="form-control" value="<?php echo $firstname; ?>">
                    </div>
                </div>
            </div>
            <div class="form-group text-center">
                <div class="row">
                    <label for="lastname" class="col-sm-3 control-label">lastname</label>
                    <div class="col-sm-9">
                        <input type="text" name="txt_lastname" class="form-control" value="<?php echo $lastname; ?>">
                    </div>
                </div>
            </div>
            <div class="form-group text-center">
                <div class="col-md-12 mt-3">
                    <input type="submit" name="btn_update" class="btn btn-success" value="Update">
                    <a href="index.php" class="btn btn-danger">Cancel</a>
                </div>
            </div>


        </form>

        <script>
            src = " js/slim.js"
        </script>
        <script>
            src = "js/popper.js"
        </script>
        <script>
            src = "js/bootstrap.js"
        </script>

</body>

</html>