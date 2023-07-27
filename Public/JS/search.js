$(document).ready(function () {
    $("#search").keyup(function () {
        var searchText = $(this).val();
        if (searchText!=''){
            $.ajax({
                url:'search.php',
                method:'post',
                data:{query:searchText},
                success:function (response) {
                    $("#show-list").html(response);
                }
            });
        }
        else {
            $("#show-list").html('');
        }
    });
    $(document).on('click','a',function () {
        $("#search").val($("#asearch").text());
        $("#show-list").html('');
    });
});