<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body align=center>
  <h2>회원가입</h2>
  <?php include $_SERVER["DOCUMENT_ROOT"] . "/include/dbconn.php";
  $sql = "SELECT max(user_no) + 1 as user_no from user_list" ; 
  $result = $conn->query($sql);

  if($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $user_no = $row['user_no'];

    if ($row['user_no'] == null) {
      $user_no = '001';
    } else {
      $user_no = $row['user_no'];
    }
  }

  ?>

  <table border="1" align=center>
    <form action="user_sign_up_ok.php" method="GET" enctype="multipart/form-data">
      <tr>
        <th>번호</th>
        <td><input type="text" name="user_no" value="<?=$user_no?>" readonly></td>
      </tr>
      <tr>
        <th>비밀번호</th>
        <td><input type="text"></td>
      </tr>
      <tr>
        <th>이름</th>
        <td><input type="text"></td>
      </tr>
      <tr>
        <th>사진</th>
        <td><input type="file" name="user_img" arc="image.png"></td>
      </tr>
      <tr>
        <th colspan="2"><input type="submit" value="저장하기"></th>
      </tr>
    </form>
  </table>
  <a href="../index.php">뒤로</a>
</body>

</html>