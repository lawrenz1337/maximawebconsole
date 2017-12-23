$('#button').click(function () {
    var query = $('#query').val();

    $.post('rest/request', { query: query},
        function(returnedData){
            console.log(returnedData);
            console.log(returnedData.object);
            if (returnedData.object.image) {
                text = returnedData.object.message.replace(/(\r\n|\n|\r)/gm, "<br>") + "<img src='"+ returnedData.object.image +"'/><br>";
            } else {
                text = returnedData.object.message.replace(/(\r\n|\n|\r)/gm, "<br>");
            }
            $('#test').append(text);
        }).fail(function(){
        console.log("error");
    });
});