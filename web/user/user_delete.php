<?php include $_SERVER["DOCUMENT_ROOT"] . "/include/top.php" ?>

<section>
    <br>
    <div align="center">
        <?php include $_SERVER["DOCUMENT_ROOT"] . "/include/dbconn.php";

        $user_no = $_REQUEST["user_no"];

        $sql = "SELECT user_img FROM user_list where user_no = $user_no";

        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $delFile = $row['user_img'];

        unlink("./files/$delFile"); // 파일 삭제
        
        $sql = "DELETE FROM user_list where user_no = $user_no"; // 레코드 삭제
        // 위에서 같은 이름의 변수여도 이미 끝났기 때문에 상관없음
        $conn->query($sql);

        $conn->close();

        ?>
        <div>
            <h2>삭제완료</h2>
        </div>
        </body>

        <a href="../index.php">홈으로</a>
        <a href="./user_list.php">유저리스트로</a>

    </div>
    <br>
</section>

<?php include $_SERVER["DOCUMENT_ROOT"] . "/include/bottom.php" ?>