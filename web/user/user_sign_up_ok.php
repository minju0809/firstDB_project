<!DOCTYPE html>
<html lang="en">
<?
$user_pw = "9999";
$user_name = "d";
$user_img = 'space.png';
$user_tmp_name = "12";
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php include $_SERVER["DOCUMENT_ROOT"] . "/include/dbconn.php";


    $user_no = $_REQUEST['user_no'];
    $user_pw = $_REQUEST['user_pw'];
    $user_name = $_REQUEST['user_name'];
    $user_img = $_FILES['user_img'];
    $user_tmp = $_FILES['user_tmp_name'];

    if ($user_img == '') {
        $user_img = 'space.png';
    } else {
        if (file_exists("./image/$user_img")) {
            echo "동일 파일 존재";
            $fname = basename($user_img, strrchr($user_img, '.'));
            $time = date("His", time());
            $ext = strrchr($user_img, '.');
            $user_img = $fname . "_" . $time . $ext;
        }
        move_uploaded_file($user_tmp, "./image/'$user_img'");
    }

    $sql = "INSERT into user_list (user_no, user_pw, user_name, user_img)
  values ('$user_no', '$user_pw', '$user_name', '$user_img')";

    $conn->query($sql);
    ?>

    <div>
        <h2>저장완료</h2>
    </div>
</body>

</html>