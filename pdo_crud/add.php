<?php
require_once('connection.php');
/* <!-- create 2 --> */
//เช็คว่ากดปุ่มไหม
if (isset($_REQUEST['btn_insert'])) {
    //รับค่า และ เก็บค่า
    $firstname = $_REQUEST['txt_firstname'];
    $lastname = $_REQUEST['txt_lastname'];

    //เช็คว่ากรอกมาไหม
    if (empty($firstname)) {
        $errorMsg = "Please enter Firstname";
    } else if (empty($lastname)) {
        $errorMsg = "please Enter Lastname";
    } else {
        //เช็คว่ามีเออเร่อไหม
        try {
            if (!isset($errorMsg)) {
                //เตรียมส่งข้อมูล
                $insert_stmt = $dbcon->prepare("INSERT INTO tbl_person(firstname, lastname) VALUES (:fname, :lname)");
                $insert_stmt->bindParam(':fname', $firstname);
                $insert_stmt->bindParam(':lname', $lastname);
                //ส่งข้อมูล
                if ($insert_stmt->execute()) {
                    $insertMsg = "Insert Successfully...";
                    //รอ 2 วิ และกลับไปหน้า index
                    header("refresh:2;index.php");
                }
            }
            //ถ้ามีเออเร่อให้แจ้ง
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}

?>


<!-- create 1 -->
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
        <div class="display-3 text-center">ADD+</div>

        <?php
        if (isset($errorMsg)) {
        ?>
            <div class="alert alert-danger">
                <strong>Wrong! <?php echo $errorMsg; ?></strong>
            </div>
        <?php } ?>


        <?php
        if (isset($insertMsg)) {
        ?>
            <div class="alert alert-success">
                <strong>Success! <?php echo $insertMsg; ?></strong>
            </div>
        <?php } ?>

        <form method="post" class="form-horizontal mt-5">

            <div class="form-group text-center">
                <div class="row">
                    <label for="firstname" class="col-sm-3 control-label">Fisrtname</label>
                    <div class="col-sm-9">
                        <input type="text" name="txt_firstname" class="form-control" placeholder="Enter Firstname...">
                    </div>
                </div>
            </div>
            <div class="form-group text-center">
                <div class="row">
                    <label for="lastname" class="col-sm-3 control-label">lastname</label>
                    <div class="col-sm-9">
                        <input type="text" name="txt_lastname" class="form-control" placeholder="Enter Lastname...">
                    </div>
                </div>
            </div>
            <div class="form-group text-center">
                <div class="col-md-12 mt-3">
                    <input type="submit" name="btn_insert" class="btn btn-success" value="Insert">
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