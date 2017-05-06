//send ajax with data string to url check slug in category table and return message to view
function makeSlug(url, str, msg, labelName) {
        $.ajax({
            url: url,
            data: {str: str},
            dataType: "JSON",
            type: "GET",
            success: function(rp) {
                if (rp[0]) {
                    $("[slug='output']").val(rp['slug']);
                    msg.text("");
                } else {
                    msg.text(labelName + " đã tồn tại hoặc chưa nhập!");
                }
            }
        })
}
