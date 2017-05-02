//make slug in create category view
function makeSlug(url) {
    $("[slug='input']").blur(function() {
        var str = $("[slug='input']").val();
        var msg = $(this).parent().children("p.msg-result");
        var labelName = $(this).parent().children("label").text();
        checkSlug(url, str, msg, labelName);
    })

    $("[slug='output']").blur(function() {
        var str = $("[slug='output']").val();
        var msg = $(this).parent().children("p.msg-result");
        var labelName = $(this).parent().children("label").text();
        checkSlug(url, str, msg, labelName);
    })
}

//send ajax with data string to url check slug in category table and return message to view
function checkSlug(url, str, msg, labelName) {
        $.ajax({
            url: url,
            data: {str: str},
            dataType: "JSON",
            type: "GET",
            success: function(rp) {
                if (rp[0]) {
                    console.log(rp['slug']);
                    $("[slug='output']").val(rp['slug']);
                    msg.text("");
                } else {
                    msg.text(labelName + " đã tồn tại hoặc chưa nhập!");
                }
            }
        })
}
