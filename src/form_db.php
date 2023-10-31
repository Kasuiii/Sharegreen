<?php
if (isset($_POST["submit"])) {

    $pronoun = $_POST["pronoun"];
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $name = $pronoun . $fname . " " . $lname;

    $level = $_POST["level"];
    $school_name = $_POST["school_name"];
    $email = $_POST["email"];
    $tel = $_POST["tel"];

    $news = array();
    if (!empty($_POST["news"])) {
        foreach ($_POST['news'] as $value) {
            array_push($news, $value);
        }
    }

    // registerForm
    $registerForm = $_FILES["registerForm"];
    $registerFormName = $registerForm["name"];
    $registerFormTmpName = $registerForm["tmp_name"];
    $registerFormError = $registerForm["error"];

    // studentId
    $studentId = $_FILES["studentId"];
    $studentIdName = $studentId["name"];
    $studentIdTmpName = $studentId["tmp_name"];
    $studentIdError = $studentId["error"];

    // video
    $video = $_FILES["video"];
    $videoName = $video["name"];
    $videoTmpName = $video["tmp_name"];
    $videoError = $video["error"];

    echo "$name<br>";
    echo "$level<br>";
    echo "$school_name<br>";
    echo "$email<br>";
    echo "$tel<br>";

    $count = 0;
    foreach ($news as $value) {
        $count++;
        echo "$count" . "." . "$value<br>";
    }

    // collect registerForm
    if ($registerFormError === 0) {
        $registerFormExs = pathinfo($registerFormName, PATHINFO_EXTENSION);
        $registerFormExsLc = strtolower($registerFormExs);

        $allowExs = array("jpeg", "jpg", "png", "pdf");

        if (in_array($registerFormExsLc, $allowExs)) {
            $newRegisterFormName = "registerForm" . "-" . $pronoun . $fname . "-" . $lname . "-" . $level . "." . $registerFormExsLc;
            $registerFormUploadPath = "uploads/registerForm/" . $newRegisterFormName;
            echo "$registerFormUploadPath<br>";
            move_uploaded_file($registerFormTmpName, $registerFormUploadPath);
        } else {
            echo "อัปโหลดได้เฉพาะไฟล์ประเภท jpeg, jpg, png, pdf";
        }
    }

    // collect studentId
    if ($studentIdError === 0) {
        $studentIdExs = pathinfo($studentIdName, PATHINFO_EXTENSION);
        $studentIdExsLc = strtolower($studentIdExs);

        $allowExs = array("jpeg", "jpg", "png", "pdf");

        if (in_array($studentIdExsLc, $allowExs)) {
            $newStudentIdName = "studentId" . "-" . $pronoun . $fname . "-" . $lname . "-" . $level . "." . $studentIdExsLc;
            $studentIdUploadPath = "uploads/studentId/" . $newStudentIdName;
            echo "$studentIdUploadPath<br>";
            move_uploaded_file($studentIdTmpName, $studentIdUploadPath);
        } else {
            echo "อัปโหลดได้เฉพาะไฟล์ประเภท jpeg, jpg, png, pdf";
        }
    }

    // collect video
    if ($videoError === 0) {
        $videoExs = pathinfo($videoName, PATHINFO_EXTENSION);
        $videoExsLc = strtolower($videoExs);

        $allowExs = array("mp4", "webm", "avi", "flv", "wmv", "mov", "mkv");

        if (in_array($videoExsLc, $allowExs)) {
            $newVideoName = "video" . "-" . $pronoun . $fname . "-" . $lname . "-" . $level . "." . $videoExsLc;
            $videoUploadPath = "uploads/video/" . $newVideoName;
            echo "$videoUploadPath<br>";
            move_uploaded_file($videoTmpName, $videoUploadPath);
        } else {
            echo "อัปโหลดได้เฉพาะไฟล์ประเภท mp4, webm, avi, flv";
        }
    }
} else {
    echo "เกิดข้อผิดพลาด";
}
