$("#tipe").change(() => {
  let types = $("#tipe").val();

  if(types) {
    let objAjaxTypes = {
      method: "GET",
      url: "/ajx?tipe=" + types,
      data: ""
    }

    ajaxResponse(typesCallback, objAjaxTypes);
  } 
  else
    $("#jenis").empty();   
});

function typesCallback(data) {
  if (data.length != 0) {
    $("#jenis").empty();
    $("#jenis").append('<option>Pilih Jenis</option>');

    for (let key in data)
      $("#jenis").append('<option value="' + data[key] + '">' + data[key] + '</option>');
  } 
  else {
    $("#jenis").empty();
    $("#jenis").append('<option>Tidak ada pilihan</option>');
  }
}

function ajaxResponse(callback, properties, ...arguments) {
  $.ajax({
    type: properties.method,
    url: properties.url,
    data: JSON.stringify(properties.data),
    contentType: "application/json;",
    dataType: "json",
    cache: false,
    success: (response) => {
      return callback(response, ...arguments);
    },
    error: (e) => {
      return console.log("Refresh Halaman \n Error Text: " + e.responseText);
    }
  });
}