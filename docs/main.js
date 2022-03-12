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

    if(target == "priceupdate"){
        update_text += " $"
    }

    if(source == "size"){
        update_text += " MB"
    }
    else if(source == "weight"){
        update_text += " KG"
    }
    else if((source == "height") || (source == "width") || (source == "length")){
        var text1 = document.getElementById("height").value;
        var text2 = document.getElementById("width").value;
        var text3 = document.getElementById("length").value;
        update_text = text1 + "x" + text2 + "x" + text3;
    }

    document.getElementById(target).textContent = update_text;
    document.getElementById(target).style.color = "black";
}