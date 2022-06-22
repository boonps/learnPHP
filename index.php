<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <?php

    session_start();

    $_SESSION["name"] = "Pasura";
    $_SESSION["car"] = "Honda"

    ?>


    <!-- ------------------------  include  ------------------------

    <?php include("header.php"); ?>
    <section>
        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Inventore ducimus consectetur temporibus optio ab corporis ipsa, provident pariatur, repellendus beatae et harum ut distinctio qui sequi vel reiciendis non eveniet!
    </section>
    <?php include("footer.php"); ?> -->

    <!-- ------------------------  Meyhod GET / POST  ------------------------
    <form action=" test_post.php" method="post">
        Name : <input type="text" name="fname">
        <br>
        Email : <input type="text" name="email">
        <br>
        <input type="submit">
        </form> -->




    <!-- ------------------------  Meyhod REQUEST  ------------------------

    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
        Name : <input type="text" name="fname">
        <input type="submit">


    </form> -->


    <?php


    /* 
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_REQUEST['fname'];
        if (empty($name)) {
            echo "Empty Name";
        } else {
            echo $name;
        }
    }
 */




    //---------------------------------------LEARN------------------------------------------//
    /*
    // .  means concatinate // 
    $color = "red";
    echo "my car is " . $color . "<br>";
    echo "new form $color im  opp $color <br>";
    echo "hello boon !";
    */

    /* 
    // variable global / local //
    $x = 334;

    ///https://youtu.be/VFfqIGnhc7Y?t=6439
    $arr = array("key", "name", "done");
    function myfunc()
    {
        $x = 00;
        var_dump($x); // echo is type variable
        echo "Local is $x <br>";
    }
    myfunc();

    echo "Global is $x <br>";
    var_dump($arr); // echo is type variable
 */

    /* 
    // variable -- name , value
    define("Boon", "my name is Pasura");
    echo Boon . "<br>";

    define("car", [
        "name",
        "year",
        "day"
    ]);
    echo car[1];
 */
    /* 
    //https://youtu.be/VFfqIGnhc7Y?t=3276
    $x = 10;
    $y = 10;
    echo $x += 10;
    echo $x === $y;
 */
    /* 
    // switch case ==> n = label1  แล้วหยุด / หรือ ตรงกับอื่นๆ 
    // switch case ==> ไม่ตรงกันเลยไปทำใน defult
    $n = "one";
    switch ($n) {
        case 'four':
            echo "4";
            break;

        case 'two':
            echo "2";
            break;

        case 'one':
            echo "1";
            break;

        default:
            echo "OK!!!";
            break;
    };
 */
    /* 
    // for loop / forech loop => with array()

    for ($i = 1; $i <= 10; $i++) {
        echo "My value $i <br>";
    }

    //----------------------------------------//
    $names = array("boon" => "30", "noon" => "90", "poop" => "88");

    foreach ($names as $key => $value) {
        echo "my name $key $value <br>";
    }
 */
    /* 
    //////funtion

    function senddb($lat, $lng)
    {
        echo "sucess $lat : $lng <br>";
    }

    senddb(12.4444, 13.5555);
    senddb(14.4444, 13.5555);
    senddb(15.4444, 13.5555);
    senddb(16.4444, 13.5555); 
    */
    /* 
    ///// super คำสั่ง 
    เช่นดู path file .php
    echo $_SERVER['PHP_SELF']
    // https://youtu.be/VFfqIGnhc7Y?t=7203

 */

    ?>
</body>

</html>