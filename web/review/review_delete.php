<?php include $_SERVER["DOCUMENT_ROOT"] . "/include/top.php"; ?>
<?php include $_SERVER["DOCUMENT_ROOT"] . "/include/dbconn.php";
$review_no = isset($_REQUEST["review_no"]) ? $_REQUEST["review_no"] : "";
echo "review_no : " . $review_no;
$sql = "SELECT review_img from review_list where review_no = $review_no";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

$delFile = $row['review_img'];

if ($delFile !== 'space.png') {
  unlink("./review_files/$delFile");
}

$sql = "DELETE from review_list where review_no = $review_no";
$conn->query($sql);
$conn->close();
?>

<section>
  <div>삭제</div>

  <?


  ?>

  <a href="review_list.php">리뷰로 돌아가기</a>
</section>

<?php include $_SERVER["DOCUMENT_ROOT"] . "/include/bottom.php"; ?>