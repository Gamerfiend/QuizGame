
$.post('models/api-functions.php', {action: 'question'}, function( data ) {

    var index = data.indexOf(']');
    data = data.substring(1,index);
    var obj = JSON.parse(data);
    console.log(obj);
    $('#answer1').val(obj.option1);
    $('#answer2').val(obj.option2);
    $('#answer3').val(obj.option3);
    $('#answer4').val(obj.option4);
    $('#question').html(obj.question);
    $('#category').html(obj.category.name);

    <!-- Route to same page, if answer is correct new question else end game -->
});