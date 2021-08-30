/*
  run script for sub-topic toggle after page loader
  topicRows is declared based on topic count in topic.html
*/
$(document).ready(function(){

  for (let i = 1; i <= topicRows; i++) {
    let topic = "#topic" + i;
    let subTopic = "#sub-topic" + i;

    $(topic).click(function(){
      $(subTopic).slideToggle("slow");
    });
  }

});
