<?php
require_once('connection.php');

//เช็คว่ากดปุ่มไหม
if (isset($_REQUEST['delete_id'])) {
    $id = $_REQUEST['delete_id'];
    //เตรียมข้อมูล
    $select_stmt = $dbcon->prepare("SELECT * FROM tbl_person WHERE id = :id");
    $select_stmt->bindParam(':id', $id);
    //ส่งข้อมูล
    $select_stmt->execute();
    //อ่านข้อมูล
    $row = $select_stmt->fetch(PDO::FETCH_ASSOC);

    // เตรียมลบข้อมูล
    $delete_stmt = $dbcon->prepare('DELETE FROM tbl_person WHERE id = :id');
    $delete_stmt->bindParam(':id', $id);
    //ลบข้อมูล
    $delete_stmt->execute();
    //กลับมาหน้า index
    header('Location:index.php');
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
        <div class="display-3 text-center">Information</div>
        <a href="add.php" class="btn btn-success mb-3">Add+</a>
        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Edit Name</th>
                    <th>Delete</th>
                </tr>
            </thead>

            <tbody>
                <?php
                $select_stmt = $dbcon->prepare("SELECT * FROM tbl_person");
                $select_stmt->execute();

                while ($row = $select_stmt->fetch(PDO::FETCH_ASSOC)) {
                ?>

                    <tr>
                        <td><?php echo $row["firstname"]; ?></td>
                        <td><?php echo $row["lastname"]; ?></td>
                        <td><a href="edit.php?update_id=<?php echo $row["id"]; ?>" class="btn btn-warning">Edit</a></td>
                        <td><a href="?delete_id=<?php echo $row["id"]; ?>" class="btn btn-danger">Delete</a></td>
                    </tr>

                <?php } ?>
            </tbody>
        </table>
    </div>

    <script>
        src = "js/slim.js"
    </script>
    <script>
        src = "js/popper.js"
    </script>
    <script>
        src = "js/bootstrap.js"
    </script>

</body>

</html>