
<footer class="text-center" id="footer">&copy; Copyright 2016 Shauntas's Boutique, Created By : Restu Haerul Z.</footer>

<script type="text/javascript">
  function updateSizes(){
      var sizeString = '';
      for (var i=1;i<12;i++) {
        if ($('#size'+i).val() != '') {
          sizeString += $('#size'+i).val()+':'+$('#qty'+i).val()+':'+$('#threshold'+i).val()+',';
        }
      }
      $('#sizes').val(sizeString);
    }

  function get_child_options(selected){
    if(typeof selected === 'undefined'){
      var selected = '';
    }

    var parentID = $('#parent').val();
    $.ajax({
      url: '/tutorial/admin/parsers/child_categories.php',
      type: 'POST',
      data: {parentID : parentID, selected : selected},
      success: function(data){
        $('#child').html(data);
      },
      error: function(){alert("Maaf tunggu sebentar, Terjadi kesalahan.")},
    });
  }

  $('select[name="parent"]').change(function(){
    get_child_options();
  });
</script>

</body>
</html>
