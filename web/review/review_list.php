<?php include $_SERVER["DOCUMENT_ROOT"] . "/include/top.php" ?>
<?php include $_SERVER["DOCUMENT_ROOT"] . "/include/dbconn.php" ?>

<section>
  <h2>리뷰</h2>
  <?
  $sql = "SELECT * from review_list";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    ?>
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
            <a href="review_edit.php">
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
  <a href="review_form.php">리뷰등록</a>

</section>


<?php include $_SERVER["DOCUMENT_ROOT"] . "/include/bottom.php" ?>