<!-- board.php (취약한 게시판) -->
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $content = $_POST['content'];

    file_put_contents("posts/" . $title . ".txt", $content);
    echo "게시글이 저장되었습니다.<br>";
}

// 게시글 보기 기능 (취약점 포함)
if (isset($_GET['post'])) {
    $filename = $_GET['post'];  // 사용자 입력을 필터링 없이 사용
    $output = shell_exec("cat posts/" . $filename . ".txt"); // 🔥 취약점 발생 지점
    echo "<h3>게시글 내용</h3><pre>$output</pre>";
}
?>

<!-- 게시글 작성 폼 -->
<h2>게시글 작성</h2>
<form method="post">
    제목: <input type="text" name="title"><br>
    내용:<br>
    <textarea name="content" rows="5" cols="40"></textarea><br>
    <input type="submit" value="작성">
</form>

<!-- 게시글 보기 폼 -->
<h2>게시글 보기</h2>
<form method="get">
    제목: <input type="text" name="post">
    <input type="submit" value="보기">
</form>
