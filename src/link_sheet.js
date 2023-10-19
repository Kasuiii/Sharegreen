const scriptURL =
  "https://script.google.com/macros/s/AKfycbwfc1KJHdiuVbb-lzY5513E_Aki3rlt8lT1-Bo0QJjkv4KMQ3-5AEWbTCZJFDt9AMTn/exec";

const form = document.forms["register-form"];

form.addEventListener("submit", (e) => {
  e.preventDefault();
  fetch(scriptURL, { method: "POST", body: new FormData(form) })
    .then((response) => alert("กรอกข้อมูลเสร็จสิ้น"))
    .then(() => {
      window.location.reload();
    })
    .catch((error) => console("เกิดข้อผิดพลาด!", error.message));
});
