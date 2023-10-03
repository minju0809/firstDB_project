<?php include $_SERVER["DOCUMENT_ROOT"] . "/include/top.php" ?>
<?php include $_SERVER["DOCUMENT_ROOT"] . "/include/dbconn.php" ?>

<?
$user_no = isset($_REQUEST['user_no']) ? $_REQUEST['user_no'] : "";

$sql = "SELECT * from user_list where user_no = $user_no";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>

<section>
  <br>
  <div align="center">
    <div>
      상세보기
    </div>
    <form action="user_update.php" method="POST" enctype="multipart/form-data">
      <table border="1">
        <tr>
          <td>번호</td>
          <td>
            <input type="text" name="user_no" value="<?= $user_no ?>" readonly>
          </td>
        </tr>
        <tr>
          <td>비밀번호</td>
          <td>
            <input type="text" name="user_pw" value="<?= $row['user_pw'] ?>">
          </td>
        </tr>
        <tr>
          <td>이름</td>
          <td>
            <input type="text" name="user_name" value="<?= $row['user_name'] ?>">
          </td>
        </tr>
        <tr>
          <td>사진</td>
          <td>
            <input type="file" name="user_img" arc="image">
          </td>
        </tr>
        <tr>
          <td colspan="2" align=center>
            <input type="submit" value="수정하기">
          </td>
        </tr>
      </table>

    </form>

    <a href="../index.php">홈으로</a>
    <a href="./user_list.php">유저리스트로</a>
    <a href="user_delete.php?user_no=<?= $row['user_no'] ?>">삭제하기</a> &emsp;

  </div>
  <br>
</section>

<?php include $_SERVER["DOCUMENT_ROOT"] . "/include/bottom.php" ?>