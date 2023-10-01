<?php include $_SERVER["DOCUMENT_ROOT"] . "/include/top.php"; ?>
<?php include $_SERVER["DOCUMENT_ROOT"] . "/include/dbconn.php"; ?>

<section>
  <?
  $board_no = isset($_REQUEST["board_no"]) ? $_REQUEST["board_no"] : "";
  $board_title = isset($_REQUEST["board_title"]) ? $_REQUEST["board_title"] : "";
  $board_content = isset($_REQUEST["board_content"]) ? $_REQUEST["board_content"] : "";
  $board_name = isset($_REQUEST["board_name"]) ? $_REQUEST["board_name"] : "";
  $board_img = isset($_FILES["board_img"]) ? $_FILES["board_img"]["name"] : "";
  $board_tmp = isset($_FILES["board_img"]) ? $_FILES["board_img"]["tmp_name"] : "";
  $board_date = date("Y-m-d H:i:s");

  if ($board_img == '') {
    $board_img = 'space.png';
  } else {
    if (file_exists("./board_files/$board_img")) {
      echo "동일 파일 존재";
      $fname = basename($board_img, strrchr($board_img, '.'));
      $time = date("His", time());
      $ext = strrchr($board_img, '.');
      $board_img = $fname . "_" . $time . $ext;
    }
    move_uploaded_file($board_tmp, "./board_files/$board_img");
  }

  $sql = "INSERT into board_list (board_no, board_title, board_content, board_img, board_name, board_date)
    values ('$board_no','$board_title','$board_content','$board_img','$board_name','$board_date')";
  $result = $conn->query($sql);
  ?>

  <div>저장완료</div>
  
  <a href="../index.php">홈으로</a>
  <a href="./board_list.php">게시판으로</a>

</section>


<?php include $_SERVER["DOCUMENT_ROOT"] . "/include/bottom.php"; ?>