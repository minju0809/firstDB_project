<section>
  <?php include $_SERVER["DOCUMENT_ROOT"] . "/include/dbconn.php";
  
  $id = $_GET['id'];
  $password = $_GET['password'];
  $name = $_GET['name'];
  $reg_date = $_GET['reg_date'];
  // $reg_date = date("Y-m-d H:i:s");

  $sql = "insert into member (id, password, name, reg_date) 
  values ('$id', '$password', '$name', '$reg_date')";
  $conn->query($sql);

  // 현재 시간 적용
  // $stmt = $conn->prepare($sql);
  
  // if ($stmt === false) {
  //   die("Error preparing statement: " . $conn->error);
  // }

  // // 바인딩한 후 실행합니다.
  // $stmt->bind_param("ssss", $id, $password, $name, $reg_date);

  // if ($stmt->execute()) {
  //   echo "Data inserted successfully!";
  // } else {
  //   echo "Error executing statement: " . $stmt->error;
  // }
  // $stmt->close();

  $conn->close();
  ?>

  <div align="center">
    <br><br><br><br>
    <h1>저장완료!!</h1>
  </div>
</section>