function makeSlug() {
    $("[slug='input']").blur(function() {
        var str = $("[slug='input']").val();
        console.log($(this).parent().children("p.msg-result"));
        $.ajax({
            url: url,
            data: {str: str},
            dataType: "JSON",
            type: "GET",
            success: function(rp) {
                if (rp[0]) {
                    console.log(rp['slug']);
                }
            }
        })
    })
    $("[slug='output']").blur(function() {
        var str = $("[slug='output']").val();
        $.ajax({
            url: url,
            data: {str: str},
            dataType: "JSON",
            type: "GET",
            success: function(rp) {
                if (!rp) {
                    $("#msg_slug").text("Đường dẫn này đã tồn tại hoặc chưa nhập!");
                } else {
                    $("[slug='output']").val(rp);
                    $("#msg_slug").text("");
                }
            }
        })

    })
}
