<?php include $_SERVER["DOCUMENT_ROOT"] . "/include/top.php";
include $_SERVER["DOCUMENT_ROOT"] . "/include/dbconn.php";

$user_no = $_REQUEST['user_no'];
$user_pw = isset($_REQUEST['user_pw']) ? $_REQUEST['user_pw'] : "";
$user_name = isset($_REQUEST['user_name']) ? $_REQUEST['user_name'] : "";

// 파일 업로드 관련 정보 가져오기
$user_img = isset($_FILES['user_img']) ? $_FILES['user_img']['name'] : "";
$user_tmp = isset($_FILES['user_img']) ? $_FILES['user_img']['tmp_name'] : "";

if ($user_img == '') {
    $user_img = 'space.png';
} else {
    if (file_exists("./files/$user_img")) {
        echo "동일 파일 존재";
        $fname = basename($user_img, strrchr($user_img, '.'));
        echo $fname; 
        $time = date("His", time());
        echo $time;
        $ext = strrchr($user_img, '.');
        echo $ext;
        $user_img = $fname . "_" . $time . $ext;
        echo $user_img;
    }
    // 파일 업로드 폴더 경로를 올바르게 설정해야 합니다.
    move_uploaded_file($user_tmp, "./files/$user_img");
}

$sql = "INSERT into user_list (user_no, user_pw, user_name, user_img)
  values ('$user_no', '$user_pw', '$user_name', '$user_img')";

$conn->query($sql);

?>

<div>
    <h2>저장완료</h2>
</div>
</body>

<a href="../index.php">홈으로</a>
<a href="./user_list.php">유저리스트로</a>

<?php include $_SERVER["DOCUMENT_ROOT"] . "/include/bottom.php";
