const btn = document.querySelector(".show");
const password = document.querySelector(".password-user");
const deletebtn = document.querySelector(".delete-btn");
const closebtn = document.querySelector(".close-btn");
const popup = document.querySelector(".popup");

btn.addEventListener("click", () => {
  password.classList.toggle("password-user-showned");

  if (password.classList.contains("password-user-showned")) {
    btn.innerHTML = '<i class="fa-solid fa-eye-slash"></i>';
  } else {
    btn.innerHTML = '<i class="fa-solid fa-eye"></i>';
  }
});

deletebtn.addEventListener("click", () => {
  popup.classList.add("popup-active");
   console.log('asda');
});

closebtn.addEventListener("click", () => {
  popup.classList.remove("popup-active");
});
