<?php include $_SERVER["DOCUMENT_ROOT"] . "/include/top.php" ?>

<section>
  <div>유저 목록 보기</div>
  <? include $_SERVER["DOCUMENT_ROOT"] . "/include/dbconn.php";
  $sql = "SELECT * FROM user_list order by user_no asc";
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
            <a href="user_delete.php?user_no=<?= $row["user_no"] ?>">
              <?= $row["user_no"] ?>
            </a>
          </td>
          <td>
            <?= $row['user_pw'] ?>
          </td>
          <td>
            <?= $row['user_name'] ?>
          </td>
          <td>
            <img src="./files/<?= $row["user_img"] ?>" alt="image" width="50">
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
</section>

<?php include $_SERVER["DOCUMENT_ROOT"] . "/include/bottom.php" ?>