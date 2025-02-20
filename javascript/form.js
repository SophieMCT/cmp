const passwordInput = document.querySelector("#password");
const passwordVerif = document.querySelector("#confirm_password");
const userMessage = document.querySelector("#userMessage");

//Function to validate the password
passwordInput.addEventListener("keyup", () => {
  const charDecimal = /\d/;
  const charSpecial = /[$&@!*]/;
  const charUppercase = /[A-Z]/;
  let errorMessage = "";

  // Password length validation
  if (passwordInput.value.length < 12) {
    errorMessage += "<li>Doit avoir une taille minimale de 12 caractères</li>";
  } else if (passwordInput.value.length > 20) {
    errorMessage += "<li>Ne doit pas dépasser les 20 caractères</li>";
  }

  // Character requirements validation
  if (!passwordInput.value.match(charDecimal)) {
    errorMessage += "<li>Doit contenir au minimum un chiffre</li>";
  }
  if (!passwordInput.value.match(charSpecial)) {
    errorMessage += "<li>Doit contenir au moins un caractère spécial (@,&,!,$,*)</li>";
  }
  if (!passwordInput.value.match(charUppercase)) {
    errorMessage += "<li>Doit contenir au moins une lettre en majuscule</li>";
  }

  // Password matching validation
  if (passwordInput.value !== passwordVerif.value) {
    errorMessage += "<li>Les mots de passe doivent correspondre</li>";
  }

  // Update the message
  if (errorMessage !== "") {
    userMessage.innerHTML = `Le mot de passe : <ul>${errorMessage}</ul>`;
  } else {
    userMessage.innerHTML = "Le mot de passe est valide.";
  }
});

