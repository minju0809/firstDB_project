<?php include $_SERVER["DOCUMENT_ROOT"] . "/include/top.php"; ?>
<?php include $_SERVER["DOCUMENT_ROOT"] . "/include/dbconn.php";
$review_no = isset($_REQUEST['review_no']) ? $_REQUEST['review_no'] : "";
// echo "review_no : " . $review_no;

$sql = "SELECT * from review_list where review_no = $review_no";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

?>

<section>
  <h2>수정페이지</h2>

  <form action="review_update.php" method="post" enctype="multipart/form-data">
    <table border="1">
      <tr>
        <th>번호</th>
        <td><input type="text" name="review_no" value="<?= $review_no ?>" readonly></td>
      </tr>
      <tr>
        <th>사진</th>
        <td><input type="file" name="review_img" value="<?= $row['review_img'] ?>"></td>
      </tr>
      <tr>
        <th>작성자</th>
        <td><input type="text" name="review_name" value="<?= $row['review_name'] ?>"></td>
      </tr>
      <tr>
        <th>별점</th>
        <td><input type="number" name="review_rating" value="<?= $row['review_rating'] ?>" min="1" max="5"></td>
      </tr>
      <tr>
        <th>제목</th>
        <td><input type="text" name="review_title" value="<?= $row['review_title'] ?>"></td>
      </tr>
      <tr>
        <th>내용</th>
        <td><input name="review_content" value="<?= $row['review_content'] ?>"></td>
      </tr>
      <tr>
        <td colspan="2" align="center"><input type="submit" value="저장하기"></td>
      </tr>
    </table>
  </form>
  <a href="review_delete.php?review_no=<?= $row['review_no'] ?>">삭제</a>
  <a href="review_list.php">리뷰로</a>
</section>


<?php include $_SERVER["DOCUMENT_ROOT"] . "/include/bottom.php"; ?>