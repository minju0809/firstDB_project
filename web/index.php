<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>First</title>
</head>

<body>
  <div>
    <a href="./user/user_sign_up.php">
      회원가입
    </a>
    <a href="./user/user_list.php">
      유저리스트
    </a>
  </div>
  <?php
  // 데이터베이스 연결 설정
  $host = 'mariadb'; // Docker Compose YAML 파일에서 정의한 데이터베이스 서비스 이름
  $user = 'root'; // 데이터베이스 사용자 이름
  $password = 'root'; // 데이터베이스 사용자 비밀번호
  $database = 'firstDB'; // 데이터베이스 이름
  
  $conn = new mysqli($host, $user, $password, $database);

  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }


  // 데이터베이스 연결 종료
  $conn->close();
  ?>

</body>

</html>