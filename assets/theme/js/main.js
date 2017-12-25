$(document).ready(function () {
    function getRandomInt(min, max) {
        return Math.floor(Math.random() * (max - min)) + min;
    }

    $('.loader').hide();
    $('#input').submit(function (e) {
        e.preventDefault();
        var query = $('#exampleTextarea').val();
        if (query) {
            $('#input').hide();
            $('.loader').show();
            $('#output').hide();

            setTimeout(function () {
                $.post('rest/request', {query: query},
                    function (returnedData) {
                        $('#output').empty();
                        $('#input').show();
                        $('.loader').hide();
                        $('#output').show();
                        console.log(returnedData);
                        console.log(returnedData.object);
                        if (returnedData.object.image) {
                            text = returnedData.object.message.replace(/(\r\n|\n|\r)/gm, "<br>") + "<img class='img-fluid' src='" + returnedData.object.image + "'/><br>";
                        } else {
                            text = returnedData.object.message.replace(/(\r\n|\n|\r)/gm, "<br>");
                        }
                        $('#output').append(text + '\n');

                    }).fail(function () {
                    console.log("error");
                });
            }, Math.random() * (1000));
        }
    });
    $('#example').click(function () {
        $('#exampleTextarea').val('');
        examples = [
            "plot2d(cos(x),[x,-%pi * " + getRandomInt(1, 4) + ",%pi * " + getRandomInt(1, 4) + "])",
            "plot2d(sin(x),[x,-%pi * " + getRandomInt(1, 4) + ",%pi * " + getRandomInt(1, 4) + "])",
            "plot2d(" + getRandomInt(0, 10) + " + " + getRandomInt(1, 5) + "*x^2,[x," + getRandomInt(-10, 0) + "," + getRandomInt(0, 25) + "])",
            "mandelbrot([iterations, 30], [x, -2, 1], [y, -1.2, 1.2],[grid,400,400])",
        ]
        $('#exampleTextarea').val(examples[Math.floor(Math.random() * (examples.length))]);
    });

    $('#welcome').click(function () {
        $('html, body').animate({scrollTop: $('.default').offset().top}, 500, 'linear');
    });
});