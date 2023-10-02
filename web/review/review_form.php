<?php include $_SERVER["DOCUMENT_ROOT"]."/include/top.php"; ?>

<section>
  <h2>리뷰 등록</h2>
  <form action="review_form_ok.php" method="POST" enctype="multipart/form-data">
    <table border="1">
      <tr>
        <th>사진</th>
        <td><input type="file" name="review_img"></td>
      </tr>
      <tr>
        <th>작성자</th>
        <td><input type="text" name="review_name"></td>
      </tr>
      <tr>
        <th>별점</th>
        <td><input type="number" name="review_rating" min="1" max="5"></td>
      </tr>
      <tr>
        <th>제목</th>
        <td><input type="text" name="review_title"></td>
      </tr>
      <tr>
        <th>내용</th>
        <td><textarea name="review_content"></textarea></td>
      </tr>
      <tr>
        <td colspan="2"><input type="submit" value="리뷰 등록"></td>
      </tr>
    </table>
  </form>
</section>

<?php include $_SERVER["DOCUMENT_ROOT"]."/include/bottom.php"; ?>
