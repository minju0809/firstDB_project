<?php include $_SERVER["DOCUMENT_ROOT"] . "/include/top.php";
include $_SERVER["DOCUMENT_ROOT"] . "/include/dbconn.php";

$sql = "SELECT max(board_no) + 1 as board_no from board_list";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  $row = $result->fetch_assoc();
  $board_no = $row['board_no'];

  if ($row['board_no'] == null) {
    $board_no = 1001;
  } else {
    $board_no = $row["board_no"];
  }
}
?>

<section>
  <div>
    게시글 등록
  </div>
  <form action="board_form_ok.php" method=POST enctype="multipart/form-data">
    <table border="1">
      <tr>
        <th>번호</th>
        <td><input type="text" name="board_no" value="<?= $board_no ?>" readonly></td>
      </tr>
      <tr>
        <th>제목</th>
        <td><input type="text" name="board_title"></td>
      </tr>
      <tr>
        <th>내용</th>
        <td><input type="text" name="board_content"></td>
      </tr>
      <tr>
        <th>사진</th>
        <td><input type="file" name="board_img"></td>
      </tr>
      <tr>
        <th>작성자</th>
        <td><input type="text" name="board_name"></td>
      </tr>
      <tr>
        <td colspan="2" align="center"><input type="submit" value="등록하기"></td>
      </tr>
    </table>
  </form>
  <a href="../index.php">홈으로</a>
  <a href="./board_list.php">게시판으로</a>

</section>


<?php include $_SERVER["DOCUMENT_ROOT"] . "/include/bottom.php" ?>