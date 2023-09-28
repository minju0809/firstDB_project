<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>First</title>
</head>

<body>
  <? include $_SERVER["DOCUMENT_ROOT"] . "/include/dbconn.php";
  $sql = "SELECT * FROM user_list";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    ?>
    <table border=1>
      <tr>
        <td>번호</td>
        <td>비밀번호</td>
        <td>이름</td>
        <td>이미지</td>
      </tr>
      <?
      while ($row = $result->fetch_assoc()) {
        ?>
        <tr>
          <td>
            <?= $row["user_no"] ?>
          </td>
          <td>
            <?= $row['user_pw'] ?>
          </td>
          <td>
            <?= $row['user_name'] ?>
          </td>
          <td>
            <img src="./image/<?= $row['img'] ?>" alt="이미지">
          </td>
        </tr>
        <?
      }
  } else {
    echo "No records found";
  }
  ?>
  </table>
  <?
  // 데이터베이스 연결 종료
  $conn->close();
  ?>
  <a href="../index.php">홈으로</a>

</body>

</html>