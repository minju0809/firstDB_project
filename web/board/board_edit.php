<?php include $_SERVER["DOCUMENT_ROOT"] . "/include/top.php" ?>
<?php include $_SERVER["DOCUMENT_ROOT"] . "/include/dbconn.php" ?>

<?
$board_no = isset($_REQUEST['board_no']) ? $_REQUEST['board_no'] : "";

$sql = "SELECT * from board_list where board_no = '$board_no'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>

<form action="board_update.php" method="post" enctype="multipart/form-data">
  <table border="1">
    <tr>
      <td colspan=2><img src="./board_files/<?= $row['board_img'] ?>" alt=""></td>
    </tr>
    <tr>
      <th>번호</th>
      <td><input type="text" name="board_no" value="<?= $board_no ?>" readonly></td>
    </tr>
    <tr>
      <th>제목</th>
      <td><input type="text" name="board_title" value="<?= $row['board_title'] ?>"></td>
    </tr>
    <tr>
      <th>내용</th>
      <td><input type="text" name="board_content" value="<?= $row['board_content'] ?>"></td>
    </tr>
    <tr>
      <th>사진</th>
      <td><input type="file" name="board_img"></td>
    </tr>
    <tr>
      <th>작성자</th>
      <td><input type="text" name="board_name" value="<?= $row['board_name'] ?>"></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" value="수정하기"></td>
    </tr>
  </table>
</form>
<a href="board_delete.php?board_no=<?=$board_no?>">삭제</a>

<?php include $_SERVER["DOCUMENT_ROOT"] . "/include/bottom.php" ?>