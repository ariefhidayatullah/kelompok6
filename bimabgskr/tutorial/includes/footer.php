</div>

<footer class="text-center" id="footer">&copy; Copyright 2016 Shauntas's Boutique, Created By : Restu Haerul Z.</footer>

<script type="text/javascript">
  $(window).scroll(function(){

    var vscroll = $(this).scrollTop();
    $("#logotext").css({
      "transform" : "translate(0px, "+vscroll/2+"px)"
    });

    var vscroll = $(this).scrollTop();
    $("#back-flower").css({
      "transform" : "translate("+vscroll/5+"px, -"+vscroll/12+"px)"
    });

    var vscroll = $(this).scrollTop();
    $("#fore-flower").css({
      "transform" : "translate(0px, -"+vscroll/2+"px)"
    });

  });

  function detailsmodal(id){
    var data = {"id" : id};
    $.ajax({
      url : "/tutorial/includes/detailsmodal.php",
      method : "post",
      data : data,
      success : function(data){
        $('body').append(data);
        $('#details-modal').modal('toggle');
      },
      error : function(){
        alert('Terjadi kesalahan saat membuka details!!!');
      }
    });
  }

  function update_cart(mode,edit_id,edit_size){
    var data = {"mode" : mode, "edit_id" : edit_id, "edit_size" : edit_size};
    $.ajax({
      url : '/tutorial/admin/parsers/update_cart.php',
      method : 'POST',
      data : data,
      success : function(){location.reload();},
      error : function(){alert('Sepertinya ada kesalahan');},
    });
  }

  function add_to_cart(){
    $('#modal_errors').html("");
    var size = $('#size').val();
    var quantity = $('#quantity').val();
    var available = $('#available').val();
    var error = '';
    var data = $('#add_product_form').serialize();
    if(size == '' || quantity == '' || quantity == 0){
      error += '<p class="text-danger text-center">Size dan Quantity tidak boleh ada yang kosong!</p>';
      $('#modal_errors').html(error);
      return;
    }else if(quantity > available){
      error += '<p class="text-danger text-center">Ukuran '+size+', Hanya '+available+' yang tersedia</p>';
      $('#modal_errors').html(error);
    }else{
      $.ajax({
        url : "/tutorial/admin/parsers/add_cart.php",
        method : "POST",
        data : data,
        success : function(){
          location.reload();
        },
        error : function(){alert('Sepertinya ada kesalahan!');}
      });
    }
  }
</script>
</body>
</html>
