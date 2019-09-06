$("#tipe").change(function() {
  var tipew = $(this).val();    
  if(tipew) {
    $.ajax({
      type:"GET",
      url:"/ajx?tipe="+tipew,
      success:function(data){               
        if (data.length != 0) {
          $("#jenis").empty();
          $("#jenis").append('<option>Pilih Jenis</option>');
          $.each(data, function(key, value){
            $("#jenis").append('<option value="'+value+'">'+value+'</option>');
          });       
        } else { 
          $("#jenis").empty();
        }
      }
    });
  } else {
    $("#jenis").empty();
  }      
});