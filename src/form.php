<?php
session_start();
?>

<!doctype html>
<html lang="th">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>แบบฟอร์มสมัคร</title>
  <link rel="stylesheet" href="../dist/output.css" />
  <script defer src="check_invalid.js"></script>
</head>

<body class="container mx-auto font-kanit box-border">
  <!-- register form -->
  <section class="mx-4">
    <h1 class="my-8 text-center text-4xl font-bold md:text-6xl">
      แบบฟอร์มสมัคร
    </h1>
    <?php if (isset($_SESSION['error'])) { ?>
      <div class="flex flex-col items-center justify-center rounded-lg border-2 border-red-500 bg-red-300 bg-opacity-70 p-4">
        <?= $_SESSION['error'] ?>
      </div>
    <?php session_destroy();
    } ?>
    <?php if (isset($_SESSION['success'])) { ?>
      <div class="flex flex-col items-center justify-center rounded-lg border-2 border-green-500 bg-green-300 bg-opacity-70 p-4">
        <p class="text-2xl font-bold">สมัครเสร็จสมบูรณ์</p>
        <div class="my-4">
          <img src="../img/success.png" alt="success-symbol" width="75px" />
        </div>
        <p class="">รอประกาศผลผู้ผ่านเข้ารอบ วันที่ 4 ธันวาคม 2566</p>
      </div>
    <?php session_destroy();
    } ?>
    <form action="form_db.php" method="post" enctype="multipart/form-data" id="form">
      <section class="form-section overflow-hidden">
        <h1 class="w-full bg-[#FFA100] px-8 py-5 text-2xl font-bold text-white">
          ข้อมูลผู้สมัคร
        </h1>
        <div class="px-8 py-5">
          <div id="row1" class="gap-x-4 sm:flex">
            <div class="mb-4 grow-0 flex-col">
              <label>คำนำหน้า<span class="text-red-500"> *</span></label><br />
              <select name="pronoun" id="pronoun" class="selecter mb-1 md:mb-0" data-label="คำนำหน้า">
                <option disabled selected value>-</option>
                <option value="นาย">นาย</option>
                <option value="นาง">นาง</option>
                <option value="นางสาว">นางสาว</option>
              </select>
            </div>
            <div class="mb-4 grow flex-col">
              <label>ชื่อ<span class="text-red-500"> *</span></label>
              <input type="text" name="fname" id="fname" placeholder="-" class="text-input" data-label="ชื่อจริง" />
            </div>
            <div class="mb-4 grow flex-col">
              <label>นามสกุล<span class="text-red-500"> *</span></label>
              <input type="text" name="lname" id="lname" placeholder="-" class="text-input" data-label="นามสกุล" />
            </div>
          </div>
          <div id="row2" class="flex gap-x-4">
            <div class="mb-4 grow-0 flex-col">
              <label>ระดับชั้น<span class="text-red-500"> *</span></label><br />
              <select name="level" id="level" class="selecter" data-label="ระดับชั้น">
                <option disabled selected value>-</option>
                <option value="ม1">ม.1</option>
                <option value="ม2">ม.2</option>
                <option value="ม3">ม.3</option>
                <option value="ม4">ม.4</option>
                <option value="ม5">ม.5</option>
                <option value="ม6">ม.6</option>
              </select>
            </div>
            <div class="mb-4 grow flex-col">
              <label>ชื่อโรงเรียน<span class="text-red-500"> *</span></label>
              <input type="text" name="school_name" id="school_name" placeholder="-" class="text-input" data-label="โรงเรียน" />
            </div>
          </div>
          <div id="row3" class="gap-x-4 sm:flex">
            <div class="mb-4 grow flex-col">
              <label>อีเมล<span class="text-red-500"> *</span></label>
              <input type="email" name="email" id="email" placeholder="-" class="text-input" data-label="อีเมล" />
            </div>
            <div class="mb-4 grow flex-col">
              <label>เบอร์โทรศัพท์<span class="text-red-500"> *</span></label>
              <input type="tel" name="tel" id="tel" placeholder="ไม่ต้องมี -" class="text-input" data-label="เบอร์โทรศัพท์" />
            </div>
          </div>
          <div id="row4">
            <div class="grow flex-col">
              <label>อัปโหลดแบบฟอร์มรับสมัคร<span class="text-red-500"> *jpeg, jpg, png, pdf</span><a href="#" class="pl-2 text-blue-700 hover:underline">ดาวน์โหลด</a></label><br />
              <input type="file" name="registerForm" id="register_form" class="mb-4 mt-2 w-full rounded-lg border border-[#6B7280] bg-white p-[.2rem]" data-label="แบบฟอร์มสมัคร" />
            </div>
          </div>
          <div id="row5">
            <div class="grow flex-col">
              <label>อัปโหลดสำเนาบัตรประจำตัวนักเรียน<span class="text-red-500">
                  *jpeg, jpg, png, pdf</span><a href="#" class="pl-2 text-blue-700 hover:underline">ตัวอย่าง</a></label><br />
              <input type="file" name="studentId" id="student_id" class="mb-4 mt-2 w-full rounded-lg border border-[#6B7280] bg-white p-[.2rem]" data-label="สำเนาบัตรประจำตัวนักเรียน" />
            </div>
          </div>
          <div id="row6">
            <div class="grow flex-col">
              <label>อัปโหลดคลิปวิดีโอ (ห้ามขนาดเกิน 100MB)<span class="text-red-500">
                  *mp4, webm, avi, flv, wmv, mov, mkv</span></label><br />
              <input type="file" name="video" id="video" class="mb-4 mt-2 w-full rounded-lg border border-[#6B7280] bg-white p-[.2rem]" data-label="คลิปวิดีโอ" />
            </div>
          </div>
          <div id="row7">
            <p>ได้รับข่าวสารการแข่งขันจากช่องทางไหน</p>
            <div class="checkbox-format ml-4 flex flex-col">
              <label><input type="checkbox" value="ig" name="news[]" class="checkbox-style" />IG : Sharegreen.th</label>
              <label><input type="checkbox" value="facebook" name="news[]" class="checkbox-style" />Facebook : Sharegreen.th</label>
              <label><input type="checkbox" value="camphub,tcaster,hatum.port" name="news[]" class="checkbox-style" />Camphub / TCASter /Hatum.port</label>
            </div>
          </div>
        </div>
      </section>
      <section class="form-section px-8 py-5 text-lg" id="accept-section">
        <div class="checkbox-format ml-4 mt-2 flex flex-col">
          <label><input type="checkbox" value="accept" id="accept" class="checkbox-style" />ยอมรับเงื่อนไข
            <a href="condition.html" target="_blank" class="text-blue-800 underline hover:text-blue-300">
              กฎการแข่งขัน</a></label>
        </div>
      </section>
      <section class="mb-10 flex justify-center gap-x-4">
        <div>
          <a href="index.html" class="btn hover:bg-[#FFA100]">ย้อนกลับ</a>
          <button type="submit" name="submit" class="btn bg-[#FFE500]">ยืนยัน</button>
        </div>
      </section>
    </form>
  </section>
</body>

</html>