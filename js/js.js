var question = ".question-";
var question_current = 1;
var selected_answer;
var question_id;
var answer_id;
var answer_saved = false;
var correct_answer = 0;
var progress_bar_total = 100;
var progress_result = 0;

// hide next question
  $(document).ready(function(){
    $('.questions').hide();
    $('.question-1').show();
    $('.container-fluid').removeClass('d-none');

//next question button
  $('.next-question-btn').click(function(event){
    // avoid from data submition
    if(total_question != question_current){
      event.preventDefault();
    }
    else {
      $('.input_name').attr('value', name);
      $('.input_topic_id').attr('value', topic_id);
      $('.input_uid').attr('value', unique_id);
    }

    if(name != "" && question_id !== undefined && answer_id !== undefined){

        save_user_answer(unique_id, name, topic_id, question_id, answer_id, function(){
            if(total_question != question_current){
              $(question + question_current).hide();
              question_current++;
              if(total_question == question_current){
                $('.next-question-btn').html('Rezultāts');
              }
              $(question + question_current).show();
              question_id = undefined;
              answer_id = undefined;
            }
            else {
              return true;
            }
        });
    }

    $('.my-progress-bar').css("width", function(){
      if (progress_result = 0) {
        return progress_result + '%';
      }
      else {
        progress_result = progress_bar_total / total_question * question_current
        console.log(progress_result);
        return progress_result + '%';
      }
    })

  });

  $('.questions').click(function(){
    question_id = $(this).attr('data-question-id');
  })

  $('.answers').click(function(){
    answer_id = $(this).find('input').val();
  });

 function save_user_answer(unique_id, name, topic_id, question_id, answer_id, callback){
    $.ajax({
      url: "/tests/func/save_user_answer.php",
      method: "POST",
      // dataType: "json",
      data: {unique_id : unique_id, name : name, topic_id : topic_id, question_id : question_id, answer_id : answer_id},
      success: function(data){
        callback();
      },
      error: function(data){
      return false;
      }
    });
  };

});
