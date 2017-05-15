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

/**
 * [send ajax list Id from checkbox to url target]
 * @param  {[type]} target [url target]
 * @return {[type]}        [json true or false]
 */
function deleteListId (target) {
    $("#checkAll").click(function() {
        if ($(this).is(":checked")) {
            $(".checkOne").prop("checked", true);
        } else {
            $(".checkOne").prop("checked", false);
        }
    });

    $("#submitDelete").click(function () {
        var ok = confirm('Xác nhận xóa các mục đã chọn?');
        if (ok) {
            var listId = [];
            var index = 0;
            $(".checkOne").each(function() {
                if ($(this).is(":checked")) {
                    listId[index] = $(this).val();
                    index++;
                }
            })
            if ((listId[0] != null)&&($("#actionDelete").val() == "delete")) {
                $.ajax({
                    url: target,
                    data: {listId: listId},
                    dataType: "JSON",
                    type: "GET",
                    success: function (rp) {
                        if (rp) {
                            for (var i = 0; i < listId.length; i++) {
                                $("tr#"+listId[i]).remove();
                            };
                        }
                    }
                })
            }
        }
    })
}
