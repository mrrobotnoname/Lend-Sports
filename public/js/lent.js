$(document).ready(function () {
    $('#selectItem').on('change', function () {

        const selectedId = $(this).val();

        if (!selectedId) return;

        $.ajax({
            url: 'http://lent-sports.local/lent/api',
            type: 'POST',
            contentType: 'application/json',
            data: JSON.stringify({ id: selectedId }),
            dataType: 'json',

            success: function (result) {
                if (result && typeof result.quantity !== undefined) {

                    console.log("jfdsalkj")

                    $('#quantity').attr('max', result.quantity);
                    $('#available').html("Quantity (available: " + result.quantity + ")");

                    console.log("Max updated to: " + result.quantity);

                    if (parseInt(result.quantity) === 0) {
                        $('#quantity').val(0).prop('disabled', true);
                        $('#available').css('color', 'red');
                    } else {
                        $('#quantity').prop('disabled', false);
                        $('#available').css('color', 'green');
                    }
                }
            },
            error: function (xhr, status, error) {
                console.error('AJAX Error:', status, error);
                console.log('Response Text:', xhr.responseText);
            }
        });
    });
});