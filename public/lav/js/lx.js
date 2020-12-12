const tipe = $("#tipe");
const jenis = $("#jenis");

tipe.change(() => {
  let types = tipe.val();

  if(types) {
    const APP_URL = $('meta[name="_base_url"]').attr('content');

    let objAjaxTypes = {
      method: "POST",
      url: APP_URL + "/ajaxtypes",
      data: { type: types }
    }

    ajaxResponse(typesCallback, objAjaxTypes);
  } 
  else
    jenis.empty().append('<option>Pilih Jenis</option>');
});

function typesCallback(data) {
  if (data.length != 0) {
    jenis.empty().append('<option>Pilih Jenis</option>');

    for (let key in data)
      jenis.append('<option value="' + data[key] + '">' + data[key] + '</option>');
  } 
  else
    jenis.empty().append('<option>Tidak ada pilihan</option>');
}

function ajaxResponse(callback, properties, ...arguments) {
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

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