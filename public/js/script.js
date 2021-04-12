$('.toggle-class').change(function () {
  let status = $(this).prop('checked') === true ? 1 : 0
  let admin_id = $(this).data('id')
  let url = $(this).data('url')
  $.ajax({
    type: 'GET',
    dataType: 'json',
    url: url,
    data: { status: status, id: admin_id },
    success: function (data) {
    },
  })
})

$('#upload-file').on('click', function () {
  $('#btn-preview-csv').prop('disabled', false)
  $('#table').remove()
})

$('#import').on('click', function () {
  let data_import = $(this).data('import')
  let token = $(this).data('token')
  let url = $(this).data('url')
  $.ajax({
    type: 'POST',
    dataType: 'json',
    url: url,
    data: { _token: token, data: data_import },
    success: function (data) {
      if (data.status) {
        $('table').remove()
        $('.message').
          append(`<div class="offset-3 col-md-12" id="message-success" style="color: green">${ data.message }</div>`)
        setTimeout(function () {
          location.reload()
        }, 2000)
      }
    },
  })
})