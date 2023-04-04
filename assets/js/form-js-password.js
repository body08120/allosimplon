const passwordRetoggle = document.querySelector(".js-password-toggle");

passwordRetoggle.addEventListener("change", function () {
  const password = document.querySelector(".js-password"),
    passwordLabel = document.querySelector(".js-password-label");
  //si mdp type = mdp -> on passe en text et pouvoir cacher
  if (password.type === "password") {
    password.type = "text";
    passwordLabel.innerHTML = "Cacher";
    // sinon on passe en mdp et pouvoir voir
  } else {
    password.type = "password";
    passwordLabel.innerHTML = "Voir";
  }

  password.focus();
});
