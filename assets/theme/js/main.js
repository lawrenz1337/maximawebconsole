$(document).ready(function () {
    $('.loader').hide();
    $('#input').submit(function () {
        var query = $('#exampleTextarea').val();
        if (query) {
            $('#input').hide();
            $('.loader').show();
            $('#output').hide();

            setTimeout(function () {
                $.post('rest/request', {query: query},
                    function (returnedData) {
                        console.log(returnedData);
                        console.log(returnedData.object);
                        if (returnedData.object.image) {
                            text = returnedData.object.message.replace(/(\r\n|\n|\r)/gm, "<br>") + "<img src='" + returnedData.object.image + "'/><br>";
                        } else {
                            text = returnedData.object.message.replace(/(\r\n|\n|\r)/gm, "<br>");
                        }
                        $('#output').empty();
                        $('#output').append(text + '\n');
                        $('#input').show();
                        $('.loader').hide();
                        $('#output').show();
                    }).fail(function () {
                    console.log("error");
                });
            }, Math.random() * (2000));
        }
    })
});