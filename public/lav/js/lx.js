$("#tipe").change(() => {
  let types = $(this).val();

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

    for (let types in data)
      $("#jenis").append('<option value="' + types + '">' + types + '</option>');
  } 
  else
    $("#jenis").empty();
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