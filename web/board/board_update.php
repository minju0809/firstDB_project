<?php include $_SERVER["DOCUMENT_ROOT"] . "/include/top.php"; ?>
<?php include $_SERVER["DOCUMENT_ROOT"] . "/include/dbconn.php"; ?>

<?
$board_no = isset($_REQUEST["board_no"]) ? $_REQUEST['board_no'] : "";
$board_title = isset($_REQUEST["board_title"]) ? $_REQUEST['board_title'] : "";
$board_content = isset($_REQUEST["board_content"]) ? $_REQUEST['board_content'] : "";
$board_img = isset($_FILES["board_img"]) ? $_FILES['board_img']['name'] : "";
$board_tmp = isset($_FILES["board_img"]) ? $_FILES['board_img']['tmp_name'] : "";
$board_name = isset($_REQUEST["board_name"]) ? $_REQUEST['board_name'] : "";

$sql = "SELECT * from board_list where board_no = '$board_no'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

if ($row !== null) {
  $delFile = $row['board_img'];
} else {
  $delFile = 'default_image.png';
}

if ($board_img == '') {
  $update_sql = "UPDATE board_list set board_title = '$board_title', 
  board_content = '$board_content', booard_name = '$board_name' where board_no = '$board_no'";
} else {
  if ($delFile != 'space.png') {
    unlink("./board_files/$delFile");
  }

  if (file_exists("./board_files/$board_img")) {
    $fname = basename($board_img, strrchr($board_img, "."));
    $time = date("His", time());
    $ext = strrchr($board_img, ".");
    $board_img = $fname . "_" . $time . $ext;
  } 
  move_uploaded_file($board_tmp, "./board_files/$board_img");
  $update_sql =  "UPDATE board_list set board_title = '$board_title', 
  board_content = '$board_content', board_img = '$board_img', board_name = '$board_name' where board_no = '$board_no'";
}

$conn->query($update_sql);
?>

<div>
  수정완료
</div>
<a href="board_list.php">게시판으로</a>

<?php include $_SERVER["DOCUMENT_ROOT"] . "/include/bottom.php"; ?>