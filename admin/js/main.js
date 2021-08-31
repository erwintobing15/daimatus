/*
  script to pass user id, matpel id, topic id etc to a hidden
  input inside a modal form
*/
function passId(user_id, elmnt_id) {
  document.getElementById(elmnt_id).value = user_id;
}
