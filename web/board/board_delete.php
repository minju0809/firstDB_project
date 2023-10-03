<?php include $_SERVER["DOCUMENT_ROOT"] . "/include/top.php" ?>
<?php include $_SERVER["DOCUMENT_ROOT"] . "/include/dbconn.php" ?>

<?
$board_no = isset($_REQUEST["board_no"]) ? $_REQUEST['board_no'] : "";
// echo "board_no : " .$board_no;

$sql = "SELECT board_img from board_list where board_no = '$board_no'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

$delFile = $row['board_img'];

if ($delFile !== 'space.png') {
  unlink("./board_files/$delFile");
}

$sql = "DELETE from board_list where board_no = '$board_no'";
$conn->query($sql);
$conn->close();
?>

<div>
  삭제 완료
</div>
<a href="board_list.php">게시판으로</a>


<?php include $_SERVER["DOCUMENT_ROOT"] . "/include/bottom.php" ?>