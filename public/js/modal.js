let is_hashed = false

$(document).on('click', '.modal-overlay', function (event) {
  is_hashed = true;
  $('iframe').attr('src', $('iframe').attr('src'));
})

$(document).on('click', '.v_s1_th', function (event) {
  is_hashed = true;
})

$(window).on('hashchange', function (event) {
  $('#modal-01').hide();
  $('#modal-02').hide();
  $('#modal-03').hide();
  $('#modal-04').hide();
  $('#modal-05').hide();
  $('#modal-06').hide();
  $('#modal-07').hide();
  $('#modal-08').hide();


  // if hashchange
  if (is_hashed) {
    event.preventDefault()
    // reset
    is_hashed = false
    $('#modal-01').show();
    $('#modal-02').show();
    $('#modal-03').show();
    $('#modal-04').show();
    $('#modal-05').show();
    $('#modal-06').show();
    $('#modal-07').show();
    $('#modal-08').show();
    return false
  }

  window.location = "{{ route('welcome')}}"
})