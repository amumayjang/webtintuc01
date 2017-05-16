function countView(url, id) {
 	setTimeout(function() {
     	$.ajax({
     		url: url,
     		type: 'GET',
     		dataType: 'json',
     		data: {id: id},
     	})
     }, 6000);
}
