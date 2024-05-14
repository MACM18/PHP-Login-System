document.addEventListener("DOMContentLoaded", function () {
  let form1 = document.querySelectorAll("form")[0];
  let form2 = document.querySelectorAll("form")[1];
  document.getElementById("loginBtn").addEventListener("click", (event) => {
    if (form1.classList.contains("hidden")) form1.classList.remove("hidden");
    if (!form2.classList.contains("hidden")) form2.classList.add("hidden");
  });
  document.getElementById("signupBtn").addEventListener("click", (event) => {
    if (form2.classList.contains("hidden")) form2.classList.remove("hidden");
    if (!form1.classList.contains("hidden")) form1.classList.add("hidden");
  });
});
