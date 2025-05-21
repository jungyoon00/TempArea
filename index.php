<?php

$conn = new mysqli();
if ($conn->connect_error) {
    die("연결 실패: " . $conn->connect_error);
}

$sql = "";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <title>오늘의 날씨</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<h1>🌤 오늘의 날씨 정보</h1>

<?php
if ($result->num_rows > 0) {
    echo "<table><tr><th>도시</th><th>기온 (°C)</th><th>날씨</th><th>날짜</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['city']}</td>
                <td>{$row['temperature']}</td>
                <td>{$row['status']}</td>
                <td>{$row['date']}</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "<p style='text-align: center;'>날씨 정보가 없습니다.</p>";
}
$conn->close();
?>

</body>
</html>
