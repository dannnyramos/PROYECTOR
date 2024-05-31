function showWelcomeMessage() {
  document.getElementById("welcome-message").style.display = "block";
}

window.onload = function() {
  showWelcomeMessage();
};

function hideWelcomeMessage() {
  document.getElementById("welcome-message").style.display = "none";
}

$(document).ready(function() {
  $('#welcome-message').modal('show');
});
