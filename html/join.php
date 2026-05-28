<?php

// 1. 에러를 브라우저에 바로 표시하도록 설정

ini_set('display_errors', 1);

ini_set('display_startup_errors', 1);

error_reporting(E_ALL);



header('Content-Type: text/html; charset=utf-8');



// 2. DB 연결 (★ '실제비밀번호'를 꼭 본인의 DB 비밀번호로 수정하세요 ★)

$conn = mysqli_connect("localhost", "root", "0070", "clubdb");



if (!$conn) {

    die("DB 연결 실패: " . mysqli_connect_error());

}



mysqli_set_charset($conn, "utf8");



// 3. 폼 데이터 받아오기

$userid     = isset($_POST['userid']) ? $_POST['userid'] : '';

$passwd     = isset($_POST['passwd']) ? $_POST['passwd'] : '';

$username   = isset($_POST['username']) ? $_POST['username'] : '';

$email      = isset($_POST['email']) ? $_POST['email'] : '';

$department = isset($_POST['department']) ? $_POST['department'] : '';



// 4. 회원가입 쿼리 실행

$sql = "INSERT INTO members(userid, passwd, username, email, department) VALUES('$userid','$passwd','$username','$email','$department')";

$result = mysqli_query($conn, $sql);



if($result){

    echo "회원가입 성공";

} else {

    echo "회원가입 실패: " . mysqli_error($conn);

}



mysqli_close($conn);

?>
