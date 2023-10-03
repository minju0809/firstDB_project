<?php include $_SERVER["DOCUMENT_ROOT"] . "/include/top.php"; ?>
<?php include $_SERVER["DOCUMENT_ROOT"] . "/include/dbconn.php"; ?>

<section>
  <h2>게시판</h2>
  <?
  $sql = "SELECT * from board_list";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    ?>
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
          <td><a href="board_edit.php?board_no=<?= $row['board_no']?>"><?=$row['board_no']?></a></td>
          <td><?=$row['board_title']?></td>
          <td><?=$row['board_content']?></td>
          <td><img src="./board_files/<?=  $row['board_img'] ?>" alt="img" width=40></td>
          <td><?=$row['board_name']?></td>
          <td><?=$row['board_date']?></td>
        </tr>
        <?
      } ?>
    </table>
  <? }
  ?>
  <a href="board_form.php">게시글 등록</a>

</section>

<?php include $_SERVER["DOCUMENT_ROOT"] . "/include/bottom.php"; ?>