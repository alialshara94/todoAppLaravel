// $(function() {

//     $('.list-group-item').on('click', function() {
//       $('.glyphicon', this)
//         .toggleClass('glyphicon-chevron-right')
//         .toggleClass('glyphicon-chevron-down');
//     });

//   });

// $(document).ready(function (e) {


// $('#delete').on('show.bs.modal', function (event) {
//     var button = $(event.relatedTarget) 
//     var taskid = button.data('taskid') 
//     var modal = $(this)
//     modal.find('.modal-body #taskid').val(taskid);
// });

// });

$(document).ready(function () {
	// For A Delete Record Popup
	$('.remove-record').click(function () {
		var id = $(this).attr('data-id');
		var url = $(this).attr('data-url');
		// var token = CSRF_TOKEN;
		$(".remove-record-model").attr("action", url);
		// $('body').find('.remove-record-model').append('<input name="_token" type="hidden" value="'+ token +'">');
		$('body').find('.remove-record-model').append('<input name="_method" type="hidden" value="DELETE">');
		$('body').find('.remove-record-model').append('<input name="id" type="hidden" value="' + id + '">');
	});

	$('.remove-data-from-delete-form').click(function () {
		$('body').find('.remove-record-model').find("input").remove();
	});
	$('.modal').click(function () {
		// $('body').find('.remove-record-model').find( "input" ).remove();
	});




});

$(document).on('click', '.btnshow', function () {

	$('.modal-title').text('SHOW TASK');
	// var path='public/uploads/';
	// var id = $(this).attr('data-id');
	var title = $(this).attr('data-title');
	var content = $(this).attr('data-content');
	var status = $(this).attr('data-status');
	var start_date = $(this).attr('data-start_date');
	var end_date = $(this).attr('data-end_date');
	// var photo_id = $(this).attr('data-photo_id');
	// $('body').find('.modal-body').append('<p>'+id+'</p>');
	$('body').find('.modal-body').append('<p>Title : ' + title + '</p>');
	$('body').find('.modal-body').append('<p>Content : ' + content + '</p>');
	$('body').find('.modal-body').append('<p>Status : ' + status + '</p>');
	$('body').find('.modal-body').append('<p>Start at : ' + start_date + '</p>');
	$('body').find('.modal-body').append('<p>End at : ' + end_date + '</p>');

	$('.modal').on('hidden.bs.modal', function () {
		$('body').find('.modal-body').find("p").remove();
	});


});

// day selection


$(document).ready(function () {
	$('select[name=date]').change(function () {


		var date_id = $(this).val();

		// var date_id = $("#date_id option:selected").val();
		if (date_id) {
			// alert('ok '+date_id);
			$.ajax({
				url: 'date/' + date_id,
				type: 'GET',
				data: { id: date_id },
				success: function (response) {
					// console.log(response);

					// $('body').find('.modal-body').append('<p>Title : ' + title + '</p>');
					response.forEach(function (data) {
						// alert(	data.title);
						$('body').find('.daybody').find("tbody").append('  <tr class="datarow"> <td>' + data.id + '</td> <td>' + data.title + '</td> <td>' + data.content + '</td> <td>' + data.status + '</td> <td>' + data.start_date + '</td> <td>' + data.end_date + '</td> </tr> '
						);
					});

				}
			});
		}
		$('body').find('.daybody').find(".datarow").remove();
	});
});



