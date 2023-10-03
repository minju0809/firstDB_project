<?php include $_SERVER["DOCUMENT_ROOT"] . "/include/top.php" ?>
<?php include $_SERVER["DOCUMENT_ROOT"] . "/include/dbconn.php" ?>

<section>
  <h2>리뷰</h2>
  <?
  $start = isset($_GET['start']) ? $_GET['start'] : 0;
  $page_size = 3;


  $sql = "SELECT * from review_list LIMIT $start, $page_size";
  $sql_tc = "SELECT count(*) as tc from review_list";

  $result_tc = $conn->query($sql_tc);
  $row_tc = $result_tc->fetch_assoc();

  $total_page = ceil($row_tc['tc'] / $page_size);
  $current_page = ceil(($start + 1) / $page_size);
  $end_page = ($total_page - 1) * $page_size;

  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    ?>
    전체 리뷰 수 :
    <?= $row_tc['tc'] ?>
    전체 페이지 수 :
    <?= $total_page ?>
    현재 페이지 :
    <?= $current_page ?>
    마지막 페이지 :
    <?= $end_page ?>

    <table border="1">
      <tr>
        <th>번호</th>
        <th>사진</th>
        <th>작성자</th>
        <th>별점</th>
        <th>제목</th>
        <th>내용</th>
        <th>날짜</th>
      </tr>
      <?
      while ($row = $result->fetch_assoc()) {
        ?>
        <tr>
          <td>
            <a href="review_edit.php?review_no=<?= $row['review_no'] ?>">
              <?= $row['review_no'] ?>
            </a>
          </td>
          <td>
            <img src="./review_files/<?= $row['review_img'] ?>" alt="image" width="40">
          </td>
          <td>
            <?= $row['review_name'] ?>
          </td>
          <td>
            <?= $row['review_rating'] ?>
          </td>
          <td>
            <?= $row['review_title'] ?>
          </td>
          <td>
            <?= $row['review_content'] ?>
          </td>
          <td>
            <?= $row['review_date'] ?>
          </td>
        </tr>

        <?
      }
  }
  ?>
  </table>
  <a href="review_list.php?start=0">처음으로</a>
  <? if ($start == 0) { ?>
    이전
  <? } else {
    ?>
    <a href="review_list.php?start=<?= $start - $page_size ?>">이전</a>
    <?
  }
  if ($current_page != $total_page) {
    ?> <a href="review_list.php?start=<?= $start + $page_size ?>">다음</a>
    <?
  } else {
    ?> 다음
    <?
  }
  ?>
  <a href="review_list.php?start=<?= $end_page ?>">마지막으로</a>

  <div>
    <a href="review_form.php">리뷰등록</a>
  </div>

</section>


<?php include $_SERVER["DOCUMENT_ROOT"] . "/include/bottom.php" ?>