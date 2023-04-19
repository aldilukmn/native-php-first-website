$(function () {
  setTimeout(function () {
    $(".alert").alert("close");
  }, 3000);
});

const showPassword = () => {
  const x = document.getElementById("pass");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
};
