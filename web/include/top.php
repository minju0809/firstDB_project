<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>Insert title here</title>
  <style type="text/css">
    header {
      background-color: #0022ee;
      /* 배경색 */
      height: 90px;
      /* 높이 */
      line-height: 90px;
      /* 라인의 높이  */
      text-align: center;
      color: #ffffff;
    }

    nav {
      background-color: #6699ff;
      height: 40px;
      line-height: 40px;
      text-align: left;
      color: #ffffff;
    }

    section {
      background-color: #CCCCCC;
      min-height: 500px;
      /* 최소 높이 */
      text-align: left;
      font-size: 17px;
    }

    #divsection {
      margin: 20px;
    }

    footer {
      background-color: #2244ff;
      height: 40px;
      line-height: 40px;
      text-align: center;
      color: #ffffff;
      font-size: 17px;
    }
  </style>
</head>

<body>

  <?
  $host = $_SERVER["HTTP_HOST"];
  $path = "http://" . $host;
  // echo $path;
  ?>

  <header>
    <h2> 쇼핑몰 회원관리 ver 1.0 </h2>
  </header>
  <nav>
    <div>
      &emsp; <a href="<?= $path ?>/index.php">HOME</a>
      &emsp; <a href="<?= $path ?>/user/user_sign_up.php">회원가입</a>
      &emsp; <a href="<?= $path ?>/user/user_list.php">유저리스트</a>
      &emsp; <a href="<?= $path ?>/board/board_list.php">게시판</a>
    </div>
  </nav>