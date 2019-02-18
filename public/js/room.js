$(function(){
	$('#btnSearch').click(function(){
		let keyword = $('#txtSearch').val().trim();
		if (keyword.length > 3 && keyword.length< 100) {
			window.location.href = '?c=rooms&keyword='+keyword;
		} else {
			alert('Vui long nhap nhieu hon 3 ky tu va nho hon 100 ky tu');
		}
	});
});

function deleteRooms(idRoom)
{
	if(Number.isInteger(idRoom) && idRoom > 0){
		// dung ajax
		$.ajax({
			url : '?c=rooms&m=delete', // giong thuoc tinh action Form
			type: 'POST', // giong method trong Form
			data: {id : idRoom}, // du lieu gui len server
			beforeSend: function(){
				// truoc khi server thuc thi tra du lieu ve toi lam hanh dong gi do
				$('#btn_'+idRoom).text('Loading...');
			},
			success: function(data){

				$('#btn_'+idRoom).text('Delete');
				data = $.trim(data);
				if(data === 'OK'){
					alert('Successful');
					//window.location.reload(true);
				} else {
					alert('error');
				}

			}
		});
	}
}