const repasswordToggle = document.querySelector('.js-repassword-toggle')

repasswordToggle.addEventListener('change', function() {
  const repassword = document.querySelector('.js-repassword'),
    repasswordLabel = document.querySelector('.js-repassword-label')

  if (repassword.type === 'password') {
    repassword.type = 'text'
    repasswordLabel.innerHTML = 'Cacher'
  } else {
    repassword.type = 'password'
    repasswordLabel.innerHTML = 'Voir'
  }

  repassword.focus()
})



