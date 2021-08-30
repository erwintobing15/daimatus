/*
  script to pass user id, matpel id, topic id etc to a hidden
  input inside a modal form
*/
function passId(user_id, elmnt_id) {
  document.getElementById(elmnt_id).value = user_id;
}

/*
  script to set initial topic option
*/
$(document).ready(function(){

  const topicToDisplay = "option" +  document.getElementById("matpelOption").value;

  var elems = document.getElementsByClassName(topicToDisplay);
  for (var i=0; i<elems.length; i++){
    elems[i].style.display = 'block';
  }

});

function resetTopicOption(topicLength) {
  for (var i=1; i<=topicLength; i++){
    const topicToDisplay = "option" + i;
    document.getElementById(topicToDisplay).style.display = 'none';
  }
}

/*
  script to set topic option based on matpel option selected
  ref : #26 in materi.html
*/
function setTopicOption(select,topicLength) {
  // reset all topic option to display none
  resetTopicOption(topicLength);

  // display topic option based on matpel selected
  const topicToDisplay = "option" + select.value;

  var elems = document.getElementsByClassName(topicToDisplay);
  for (var i=0; i<elems.length; i++){
    elems[i].style.display = 'block';
  }
}
