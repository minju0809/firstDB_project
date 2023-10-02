<?php include $_SERVER["DOCUMENT_ROOT"] . "/include/top.php"; ?>
<?php include $_SERVER["DOCUMENT_ROOT"] . "/include/dbconn.php"; ?>

<section>
  <?
  $review_img = isset($_FILES["review_img"]) ? $_FILES["review_img"]["name"] : "";
  $review_tmp = isset($_FILES["review_img"]) ? $_FILES["review_img"]["tmp_name"] : "";
  $review_name = isset($_REQUEST["review_name"]) ? $_REQUEST["review_name"] : "";
  $review_rating = isset($_REQUEST["review_rating"]) ? $_REQUEST["review_rating"] : "";
  $review_title = isset($_REQUEST["review_title"]) ? $_REQUEST["review_title"] : "";
  $review_content = isset($_REQUEST["review_content"]) ? $_REQUEST["review_content"] : "";

  if ($review_img == '') {
    $review_img = 'space.png';
  } else {
    if (file_exists("./review_files/$review_img")) {
      echo "동일 파일 존재";
      $fname = basename($review_img, strrchr($review_img, "."));
      $time = date("His", time());
      $ext = strrchr($review_img, ".");
      $review_img = $fname . "_" . $time . $ext;
    }
    move_uploaded_file($review_tmp, "./review_files/$review_img");
  }

  $sql = "INSERT into review_list (review_img, review_name, review_rating, review_title, review_content) 
  values ('$review_img', '$review_name', '$review_rating', '$review_title', '$review_content')";
  $result = $conn->query($sql);
  ?>
  <div>저장완료</div>
</section>


<?php include $_SERVER["DOCUMENT_ROOT"] . "/include/bottom.php"; ?>