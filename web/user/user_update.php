<?php include $_SERVER["DOCUMENT_ROOT"] . "/include/top.php" ?>
<?php include $_SERVER["DOCUMENT_ROOT"] . "/include/dbconn.php" ?>

<?
$user_no = isset($_REQUEST['user_no']) ? $_REQUEST['user_no'] : "";
$user_pw = isset($_REQUEST['user_pw']) ? $_REQUEST['user_pw'] : "";
$user_name = isset($_REQUEST['user_name']) ? $_REQUEST['user_name'] : "";
$user_img = isset($_FILES['user_img']) ? $_FILES['user_img']['name'] : "";
$user_tmp = isset($_FILES['user_img']) ? $_FILES['user_img']['tmp_name'] : "";
// echo "!!!!!!!!!!!!!!!".$user_img;

$sql = "SELECT * from user_list where user_no = '$user_no'";

$result = $conn->query($sql);
$row = $result->fetch_assoc();

if ($row !== null) {
  $delFile = $row['user_img'];
} else {
  // $row가 null인 경우에 대한 기본 값 처리
  $delFile = 'default_image.png';
}

if ($user_img == '') {
  $update_sql = "UPDATE user_list set user_pw = '$user_pw', user_name = '$user_name' 
    where user_no = '$user_no'";
} else {
  if ($delFile != 'space.png') {
    unlink("./user_files/$delFile");
  }

  if (file_exists("./user_files/$user_img")) {
    $fname = basename($user_img, strrchr($user_img, '.'));
    $time = date("His", time());
    $ext = strrchr($user_img, '.');
    $user_img = $fname . "." . $time . $ext;
  }
  move_uploaded_file($user_tmp, "./user_files/$user_img");
  $update_sql = "UPDATE user_list set user_pw = '$user_pw', user_name = '$user_name', user_img = '$user_img' 
    where user_no = '$user_no'";
}
$conn->query($update_sql);
// echo $update_sql;
if ($conn->error) {
  die("SQL 오류: " . $conn->error);
}
?>

<section>
  수정완료!!
  <br>
  <a href="./user_list.php">유저리스트로</a>
  <br>
</section>


<?php include $_SERVER["DOCUMENT_ROOT"] . "/include/bottom.php" ?>