const repasswordToggle = document.querySelector(".js-repassword-toggle");
repasswordToggle.addEventListener("change", function () {
  const repassword = document.querySelector(".js-repassword"),
    repasswordLabel = document.querySelector(".js-repassword-label");
  //si mdp type = mdp -> on passe en text et pouvoir cacher
  if (repassword.type === "password") {
    repassword.type = "text";
    repasswordLabel.innerHTML = "Cacher";
    // sinon on passe en mdp et pouvoir voir
  } else {
    repassword.type = "password";
    repasswordLabel.innerHTML = "Voir";
  }

  repassword.focus();
});
