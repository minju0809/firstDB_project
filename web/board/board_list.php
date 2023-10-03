<?php include $_SERVER["DOCUMENT_ROOT"] . "/include/top.php"; ?>
<?php include $_SERVER["DOCUMENT_ROOT"] . "/include/dbconn.php"; ?>

<section>
  <h2>게시판</h2>
  <?
  $ch1 = isset($_GET['ch1']) ? $_GET['ch1'] : "";
  $ch2 = isset($_GET['ch2']) ? $_GET['ch2'] : "";

  $start = isset($_GET['start']) ? $_GET['start'] : 0;
  $page_size = 3;

  if ($ch1 == '' || $ch2 == '') {
    $sql = "SELECT * from board_list limit $start, $page_size";
    $sql_tc = "SELECT count(*) as tc from board_list";
  } else if ($ch1 == 'board_name') {
    $sql = "SELECT * from board_list where board_name like '%$ch2%' limit $start, $page_size";
    $sql_tc = "SELECT count(*) as tc from board_list where board_name like '%$ch2%' limit $start, $page_size";
  } else if ($ch1 == 'board_title') {
    $sql = "SELECT * from board_list where board_title like '%$ch2%' limit $start, $page_size";
    $sql_tc = "SELECT count(*) as tc from board_list where board_title like '%$ch2%' limit $start, $page_size";
  } else if ($ch1 == 'board_content') {
    $sql = "SELECT * from board_list where board_content like '%$ch2%' limit $start, $page_size";
    $sql_tc = "SELECT count(*) as tc from board_list where board_content like '%$ch2%' limit $start, $page_size";
  }

  $result = $conn->query($sql);
  $result_tc = $conn->query($sql_tc);
  $row_tc = $result_tc->fetch_assoc();

  $total_page = ceil(($row_tc['tc'] / $page_size));
  $current_page = ceil($start / $page_size) + 1;
  $end_page = ($total_page - 1) * $page_size;

  if ($result->num_rows > 0) {
    ?>
    전체 레코드 :
    <?= $row_tc['tc'] ?>
    전체 페이지 수 :
    <?= $total_page ?>
    현재 페이지 :
    <?= $current_page ?>

    <table border="1">
      <tr>
        <th>번호</th>
        <th>제목</th>
        <th>내용</th>
        <th>사진</th>
        <th>작성자</th>
        <th>작성일</th>
      </tr>
      <? while ($row = $result->fetch_assoc()) {
        ?>
        <tr>
          <td><a href="board_edit.php?board_no=<?= $row['board_no'] ?>">
              <?= $row['board_no'] ?>
            </a></td>
          <td>
            <?= $row['board_title'] ?>
          </td>
          <td>
            <?= $row['board_content'] ?>
          </td>
          <td><img src="./board_files/<?= $row['board_img'] ?>" alt="img" width=40></td>
          <td>
            <?= $row['board_name'] ?>
          </td>
          <td>
            <?= $row['board_date'] ?>
          </td>
        </tr>
        <?
      } ?>
    </table>
  <? } ?>
  <a href="board_list.php?start=0">처음으로</a>
  <?
  if ($start == 0) {
    ?> 이전
    <?
  } else {
    ?> <a href="board_list.php?start=<?= $start - $page_size ?>">이전</a>
    <?
  }
  if ($current_page != $total_page) {
    ?>
    <a href="board_list.php?start=<?= $start + $page_size ?>">다음</a>
    <?
  } else {
    ?> 다음
    <?
  }
  ?>
  <a href="board_list.php?start=<?= $end_page ?>">마지막으로</a>
  <div>
    <a href="board_form.php">게시글 등록</a>
  </div>
  <form action="board_list.php" method=get>
    <select name="ch1">
      <option value="board_name">작성자</option>
      <option value="board_title">제목</option>
      <option value="board_content">내용</option>
    </select>
    <input type="text" name="ch2">
    <input type="submit" value="검색하기">
  </form>

</section>

<?php include $_SERVER["DOCUMENT_ROOT"] . "/include/bottom.php"; ?>