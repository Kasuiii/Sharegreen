<?php
// set empty value
$pronoun = $fname = $lname = $level = $school_name = $email = $tel = $news = $registerForm = $studentId = $video = '';

// check if user press submit button
if (isset($_POST["submit"])) {
    session_start();

    $pronoun = $_POST["pronoun"];
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $fullName = $pronoun . $fname . " " . $lname;

    $level = $_POST["level"];
    $school_name = $_POST["school_name"];
    $email = $_POST["email"];
    $tel = $_POST["tel"];

    $news = isset($_POST["news"]) ? $_POST["news"] : "-";
    if ($news !== "-") {
        $newsWithComma = implode(",", $news);
    } else {
        $newsWithComma = $news;
    }

    // registerForm
    $registerForm = $_FILES["registerForm"];
    $registerFormName = $registerForm["name"];
    $registerFormTmpName = $registerForm["tmp_name"];
    $registerFormError = $registerForm["error"];

    // Keep in registerForm folder
    if ($registerFormError === 0) {
        $registerFormExs = pathinfo($registerFormName, PATHINFO_EXTENSION);
        $registerFormExsLc = strtolower($registerFormExs);

        $allowExs = array("jpeg", "jpg", "png", "pdf");

        if (in_array($registerFormExsLc, $allowExs)) {
            $newRegisterFormName = "registerForm" . "-" . $pronoun . $fname . "-" . $lname . "-" . $level . "." . $registerFormExsLc;
            $registerFormUploadPath = "uploads/registerForm/" . $newRegisterFormName;
            move_uploaded_file($registerFormTmpName, $registerFormUploadPath);
        } else {
            $_SESSION['error'] = "อัปโหลดได้เฉพาะไฟล์ประเภท jpeg, jpg, png, pdf";
            header("location: form.php");
        }
    }

    // studentId
    $studentId = $_FILES["studentId"];
    $studentIdName = $studentId["name"];
    $studentIdTmpName = $studentId["tmp_name"];
    $studentIdError = $studentId["error"];

    // Keep in studentId folder
    if ($studentIdError === 0) {
        $studentIdExs = pathinfo($studentIdName, PATHINFO_EXTENSION);
        $studentIdExsLc = strtolower($studentIdExs);

        $allowExs = array("jpeg", "jpg", "png", "pdf");

        if (in_array($studentIdExsLc, $allowExs)) {
            $newStudentIdName = "studentId" . "-" . $pronoun . $fname . "-" . $lname . "-" . $level . "." . $studentIdExsLc;
            $studentIdUploadPath = "uploads/studentId/" . $newStudentIdName;
            move_uploaded_file($studentIdTmpName, $studentIdUploadPath);
        } else {
            $_SESSION['error'] = "อัปโหลดได้เฉพาะไฟล์ประเภท jpeg, jpg, png, pdf";
        }
    }

    // video
    $video = $_FILES["video"];
    $videoName = $video["name"];
    $videoTmpName = $video["tmp_name"];
    $videoError = $video["error"];

    // Keep in video folder
    if ($videoError === 0) {
        $videoExs = pathinfo($videoName, PATHINFO_EXTENSION);
        $videoExsLc = strtolower($videoExs);

        $allowExs = array("mp4", "webm", "avi", "flv", "wmv", "mov", "mkv");

        if (in_array($videoExsLc, $allowExs)) {
            $newVideoName = "video" . "-" . $pronoun . $fname . "-" . $lname . "-" . $level . "." . $videoExsLc;
            $videoUploadPath = "uploads/video/" . $newVideoName;
            move_uploaded_file($videoTmpName, $videoUploadPath);
        } else {
            $_SESSION['error'] = "อัปโหลดได้เฉพาะไฟล์ประเภท mp4, webm, avi, flv";
            header("location: form.php");
        }
    }

    // Connect to the database
    require "server.php";

    // Check if got maximum user
    $sql = "SELECT * FROM registerdata";
    $result = $conn->query($sql);
    $row_count = $result->num_rows;
    if ($row_count < 60) {

        // Insert data
        $sql = "INSERT INTO registerdata VALUES (NULL,?,?,?,?,?,?,?,?,?)";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, 'sssssssss', $fullName, $level, $school_name, $email, $tel, $registerFormUploadPath, $studentIdUploadPath, $videoUploadPath, $newsWithComma);
        $result = mysqli_stmt_execute($stmt);

        if ($result) {
            $_SESSION['success'] = 1;
            header("location: form.php");
        } else {
            $_SESSION['error'] = "เกิดข้อผิดพลาด";
            header("location: form.php");
        }
    } else {
        $_SESSION['error'] = "จำนวนคนสมัครเต็มแล้ว";
        header("location: form.php");
    }
} else {
    $_SESSION['error'] = "เกิดข้อผิดพลาด";
    header("location: form.php");
}

// Disconnect from the database
$conn->close();
