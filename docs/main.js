$(document).on('change', '.div-toggle', function() {
    var target = $(this).data('target');
    var show = $("option:selected", this).data('show');
    $(target).children().addClass('hide');
    $(target).children().prop('required', false);
    $(target).removeClass('form-item');
    $(show).removeClass('hide');
    $(show).prop('required', true);
    $(show).parent().addClass('form-item');
  });

  $(document).ready(function(){
      $('.div-toggle').trigger('change');
  });

function update(source, target){
    var update_text = document.getElementById(source).value;
    document.getElementById(target).textContent = update_text;
    document.getElementById(target).style.color = "black";
}