/*
  script to set initial topic option for modal display,
  add, and update materi
*/
$(document).ready(function(){

  const topicToDisplay = "option" +  document.getElementById("matpelOption").value;

  var elems = document.getElementsByClassName(topicToDisplay);
  for (var i=0; i<elems.length; i++){
    elems[i].style.display = 'block';
  }

});

$(document).ready(function(){

  const topicToDisplay = "topic-add" +  document.getElementById("matpel-add").value;

  var elems = document.getElementsByClassName(topicToDisplay);
  for (var i=0; i<elems.length; i++){
    elems[i].style.display = 'block';
  }

});

$(document).ready(function(){

  const topicToDisplay = "topic-update" +  document.getElementById("matpel-update").value;

  var elems = document.getElementsByClassName(topicToDisplay);
  for (var i=0; i<elems.length; i++){
    elems[i].style.display = 'block';
  }

});

/*
  script to reset topic option before set the selected option
*/
function resetTopicOption(topicLength,className) {
  for (var i=1; i<=topicLength; i++){
    var topicToHide = className + i;
    document.getElementById(topicToHide).style.display = 'none';
  }
}

/*
  script to set topic option based on matpel option selected
*/
function setTopicOption(select,topicLength,className) {

  // reset all topic option to display none
  resetTopicOption(topicLength,className);

  // display topic option based on matpel selected
  var topicToDisplay = className + select.value;

  var elems = document.getElementsByClassName(topicToDisplay);
  for (var i=0; i<elems.length; i++){
    elems[i].style.display = 'block';
  }
}
