$(document).ready(function() {



    console.log("JS Loads");
    $('#enlist-form').on('submit', function (e) {

        e.preventDefault();
        console.log("Ajax fired");

        $.ajax({

            type: 'POST',
            dataType: 'html',
            url: 'enlistProduct.php',
            data: {
                productName: $("#enlist-form input[name=productName]").val(),
                productCondition: $( "#condition option:selected" ).text(),
            },
            success: function (response) {

                console.log("Success");

                $.ajax({

                    type: 'GET',
                    dataType: 'html',
                    url: 'getproduct.php',

                    success: function (response) {
                        $('#product-list').html(response);
                         $("#enlist-form").effect( "shake", {times:2}, 700 );



                    }
                });
            }
        });

    });
});