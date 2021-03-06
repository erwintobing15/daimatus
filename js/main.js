/*
  run script for sub-topic toggle after page loader
  topicRows is declared based on topic count in topic.html
*/

$(document).ready(function(){

  if (topicRows !== undefined) {
    for (let i = 1; i <= topicRows; i++) {
      let topic = "#topic" + i;
      let subTopic = "#sub-topic" + i;

      $(topic).click(function(){
        $(subTopic).slideToggle("slow");
      });
    }
  }

});


/*
  script to check score in quiz using sweet alert
*/
var totalScore = 0;
function checkScore(btn,quizTotal,choice,answer) {

  var studentName =document.getElementById("student-name").value;
  var studentId =document.getElementById("student-id").value;
  var studentClass =document.getElementById("student-class").value;


    for (let i = 1; i <= quizTotal; i++) {
      var elName = choice + i;

      var choices = document.getElementsByName(elName);
      var selectedChoice;

      for (let j = 0; j < choices.length; j++) {
        if (choices[j].checked) {
          selectedChoice = choices[j].id;
        }
        choices[j].disabled = "true";
      }

      var correctAnswer = elName + "-" + document.getElementById(answer+i).value;

      if (selectedChoice == correctAnswer)
        totalScore += 1;
    }

    btn.disabled = true;
    btn.style.backgroundColor ='gray';
    btn.style.color ='white';

    // set input hidden grade value
    document.getElementById("student-grade").value = (totalScore/quizTotal)*100;

    // reset total score
    totalScore = 0;
}


function showScore(quizTotal) {

  if ((totalScore/quizTotal) < 0.7) {
    playSound('audio/fail.mp3');
    Swal.fire({
      title: 'Nilai : ' + totalScore*10,
      text: 'Ayo belajar lagi semangat',
      imageUrl: 'images/icon/cry.png',
      imageHeight: 125,
      imageAlt: 'cry'
    })
  } else {
    playSound('audio/success.mp3');
    Swal.fire({
      title: 'Nilai : ' + totalScore*10,
      text: 'Wah berhasil, kamu sudah belajar dengan baik',
      imageUrl: 'images/icon/happy.png',
      imageHeight: 125,
      imageAlt: 'happy'
    })
  }

  // display correct answer to student
  var displayedAnwer = document.getElementsByClassName("correct-answer");
  for (let k = 0; k < displayedAnwer.length; k++) {
    displayedAnwer[k].style.display = "block";
  }
}

function playSound(url) {
  const audio = new Audio(url);
  audio.play();
}
