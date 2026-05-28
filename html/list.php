<?php

// 1. 에러를 화면에 바로 표시하도록 설정 (500 에러 방지 및 원인 출력)

ini_set('display_errors', 1);

ini_set('display_startup_errors', 1);

error_reporting(E_ALL);



header('Content-Type: text/html; charset=utf-8');



// 2. DB 연결

$conn = mysqli_connect("localhost", "root", "0070", "clubdb");



if (!$conn) {

    die("DB 연결 실패: " . mysqli_connect_error());

}



mysqli_set_charset($conn, "utf8");



// 3. 쿼리 실행

$sql = "SELECT * FROM members";

$result = mysqli_query($conn, $sql);



if (!$result) {

    die("쿼리 실행 실패: " . mysqli_error($conn));

}



echo "<h2>회원 목록</h2>";



// 4. 데이터 출력

while($row = mysqli_fetch_array($result)){

    // 테이블에 id나 regdate 칼럼이 없다면 에러가 날 수 있으므로 안전하게 처리

    echo "아이디 : " . (isset($row['userid']) ? $row['userid'] : '없음') . "<br>";

    echo "이름 : " . (isset($row['username']) ? $row['username'] : '없음') . "<br>";

    echo "이메일 : " . (isset($row['email']) ? $row['email'] : '없음') . "<br>";

    echo "학과 : " . (isset($row['department']) ? $row['department'] : '없음') . "<br><hr>";

}



mysqli_close($conn);

?>
