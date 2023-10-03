<?php include $_SERVER["DOCUMENT_ROOT"] . "/include/top.php"; ?>
<?php include $_SERVER["DOCUMENT_ROOT"] . "/include/dbconn.php"; ?>

<?
$review_no = isset($_REQUEST['review_no']) ? $_REQUEST['review_no'] : "";
$review_img = isset($_FILES['review_img']) ? $_FILES['review_img']['name'] : "";
$review_tmp = isset($_FILES['review_img']) ? $_FILES['review_img']['tmp_name'] : "";
$review_name = isset($_REQUEST['review_name']) ? $_REQUEST['review_name'] : "";
$review_rating = isset($_REQUEST['review_rating']) ? $_REQUEST['review_rating'] : "";
$review_title = isset($_REQUEST['review_title']) ? $_REQUEST['review_title'] : "";
$review_content = isset($_REQUEST['review_content']) ? $_REQUEST['review_content'] : "";

$sql = "SELECT * from review_list where review_no = '$review_no'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

if ($row !== null) {
  $delFile = $row['review_img'];
} else {
  $delFile = 'default_image.png';
}

if ($review_img == '') {
  $update_sql = "UPDATE review_list set review_name = '$review_name', 
  review_rating = '$review_rating', review_title = '$review_title', 
  review_content = '$review_content' where review_no = $review_no";
} else {
  if ($delFile != 'space.png') {
    unlink("./review_files/$delFile");
  }

  if (file_exists("./review_files/$review_img")) {
    $fname = basename($review_img, strrchr($review_img, "."));
    $time = date("His", time());
    $ext = strrchr($review_img, ".");
    $review_img = $fname . "_" . $time . $ext;
  }
  move_uploaded_file($review_tmp, "./review_files/$review_img");
  $update_sql = "UPDATE review_list set review_img = '$review_img', review_name = '$review_name', 
  review_rating = '$review_rating', review_title = '$review_title', 
  review_content = '$review_content' where review_no = $review_no";
}

$conn->query($update_sql);
?>
<div>
  수정완료
</div>
<a href="review_list.php">리뷰로</a>

<?php include $_SERVER["DOCUMENT_ROOT"] . "/include/bottom.php"; ?>