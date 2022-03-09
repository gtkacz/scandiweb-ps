$(document).on('change', '.div-toggle', function() {
    var target = $(this).data('target');
    var show = $("option:selected", this).data('show');
    $(target).children().addClass('hide');
    $(target).removeClass('form-item');
    $(show).removeClass('hide');
    $(show).parent().addClass('form-item');
  });
  $(document).ready(function(){
      $('.div-toggle').trigger('change');
  });