<?php include $_SERVER["DOCUMENT_ROOT"] . "/include/top.php"; ?>

<section>

  <?php include $_SERVER["DOCUMENT_ROOT"] . "/include/dbconn.php";
  $sql = "SELECT max(user_no) + 1 as user_no from user_list";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $user_no = $row['user_no'];

    if ($row['user_no'] == null) {
      $user_no = '1';
    } else {
      $user_no = $row['user_no'];
    }
  }
  ?>
  <h2>회원가입</h2>

  <table border="1" align=center>
    <form action="user_sign_up_ok.php" method="POST" enctype="multipart/form-data">
      <tr>
        <th>번호</th>
        <td><input type="text" name="user_no" value="<?= $user_no ?>" readonly></td>
      </tr>
      <tr>
        <th>비밀번호</th>
        <td><input type="text" name="user_pw"></td>
      </tr>
      <tr>
        <th>이름</th>
        <td><input type="text" name="user_name"></td>
      </tr>
      <tr>
        <th>사진</th>
        <td><input type="file" name="user_img" arc="image1.png"></td>
      </tr>
      <tr>
        <th colspan="2"><input type="submit" value="저장하기"></th>
      </tr>
    </form>
  </table>
  <a href="../index.php">뒤로</a>

</section>

<?php include $_SERVER["DOCUMENT_ROOT"] . "/include/bottom.php";