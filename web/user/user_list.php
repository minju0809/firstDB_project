<?php include $_SERVER["DOCUMENT_ROOT"] . "/include/top.php" ?>

<section>
  <div>유저 목록 보기</div>
  <? include $_SERVER["DOCUMENT_ROOT"] . "/include/dbconn.php";

  $ch1 = isset($_GET['ch1']) ? $_GET['ch1'] : "";
  $ch2 = isset($_GET['ch2']) ? $_GET['ch2'] : "";
  echo "ch1 : " . $ch1 . ", ch2 : " . $ch2;

  $start = 0; // 초기값을 0으로 설정
  if (isset($_GET['start'])) {
    $start = $_GET['start']; // URL에서 읽어온 값으로 덮어쓰기.
  }
  $page_size = 4;

  if ($ch1 == '' || $ch2 == '') {
    $sql = "SELECT * FROM user_list order by user_no limit $start, $page_size";
    $sql_tc = "SELECT count(*) as tc FROM user_list order by user_no";
  } else if ($ch1 == 'user_no') {
    $sql = "SELECT * FROM user_list where user_no like '%$ch2%'
    order by user_no";
    $sql_tc = "SELECT count(*) as tc FROM user_list where user_no like '%$ch2% limit $start, $page_size'
    order by user_no";
  } else if ($ch1 == 'user_name') {
    $sql = "SELECT * FROM user_list where user_name like '%$ch2% limit $start, $page_size'
    order by user_no";
    $sql_tc = "SELECT count(*) as tc FROM user_list where user_name like '%$ch2%'
    order by user_no";
  }

  $result_tc = $conn->query($sql_tc);
  $row_tc = $result_tc->fetch_assoc();

  $total_page = ceil($row_tc['tc'] / $page_size);
  $current_page = ($start / $page_size) + 1;
  $end_page = ($total_page - 1) * $page_size;

  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    $count = 0;
    ?>
    <table border=1>
      <tr bgcolor='green'>
        <td>번호</td>
        <td>비밀번호</td>
        <td>이름</td>
        <td>이미지</td>
      </tr>
      <?
      while ($row = $result->fetch_assoc()) {
        $count++;
        if ($count % 2 == 0) {
          $bgcolor = "skyblue";
        } else {
          $bgcolor = "#ccff00";
        }
        ?>
        <tr bgcolor="<?=$bgcolor?>">
          <td>
            <a href="user_edit.php?user_no=<?= $row["user_no"] ?>">
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
            <img src="./files/<?= $row["user_img"] ?>" alt="image" width="40">
          </td>
        </tr>
        <?
      }
  } else {
    echo "No records found";
  }
  ?>
  </table>
  <form action="user_list.php" method=GET>
    <select name="ch1" method>
      <option value="user_no">번호</option>
      <option value="user_name">이름</option>
    </select>
    <input type="text" name="ch2">
    <input type="submit" value='검색하기'>
  </form>
  <div>
    전체레코드 :
    <?= $row_tc['tc'] ?>
    전체 페이지 수 :
    <?= $total_page ?>
    현재 페이지 :
    <?= $current_page ?>
  </div>
  <div>
    <a href="user_list.php?start=0">처음으로</a>
    <? if ($start == 0) { ?>
      이전
    <? } else {
      ?>
      <a href="user_list.php?start=<?= $start - $page_size ?>">이전</a>
      <?
    }
    if ($current_page != $total_page) {
      ?> <a href="user_list.php?start=<?= $start + $page_size ?>">다음</a>
      <?
    } else {
      ?> 다음
      <?
    }
    ?>
    <a href="user_list.php?start=<?= $end_page ?>">마지막으로</a>
  </div>
  <?
  // 데이터베이스 연결 종료
  $conn->close();
  ?>
  <a href="../index.php">홈으로</a>
</section>

<?php include $_SERVER["DOCUMENT_ROOT"] . "/include/bottom.php" ?>