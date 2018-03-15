/**
 * Simple Ajax function that calls to api-functions, in order to retrieve a random question from the api.
 *
 * @author Tyler Bezera <tbezera2@mail.greenriver.edu>
 * @author Brett Yeager <byeager@mail.greenriver.edu>
 */
$.post('models/api-functions.php', {action: 'question'}, function( data ) {

    //clean up json, guzzle seems to add stuff
    var index = data.indexOf(']');
    data = data.substring(1,index);

    //create an object from json
    var obj = JSON.parse(data);

    //append the question to our html view
    $('#answer1').val(obj.option1);
    $('#answer2').val(obj.option2);
    $('#answer3').val(obj.option3);
    $('#answer4').val(obj.option4);
    $('#question').html(obj.question);
    $('#category').html(obj.category.name);

    <!-- Route to same page, if answer is correct new question else end game -->
});