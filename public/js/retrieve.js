$(document).ready(function(){
    $("#studentSearch").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        console.log("test");
        
        $("#lentData tr").filter(function() {
            // This checks the text of the entire row against your search
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });
});