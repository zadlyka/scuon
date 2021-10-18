$(document).ready(function () {
  $("#btnCariAjuanAdmin").click(function () {
    var value = $(".cariAjuan").val().toLowerCase();
    $(".ajuanTable tbody tr").filter(function () {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
    });
  });
});

$(document).ready(function () {
  $("#btnCariDaftar").click(function () {
    var value = $(".cariPegawai").val().toLowerCase();
    $(".pegawaiTable tbody tr").filter(function () {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
    });
  });
});

$(document).ready(function () {
  $("#btnCariAjuanPegawai").click(function () {
    var value = $(".cariAjuan").val().toLowerCase();
    $(".ajuanTable tbody tr").filter(function () {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
    });
  });
});

$(document).ready(function () {
  $("#btnDetailAjuan").click(function () {
    $("#idPegawai").val($(this).data("id"));
    $("#namaPegawai").val($(this).data("nama"));
    $("#jabatanPegawai").val($(this).data("jabatan"));
    $("#waktuCutiPegawai").val($(this).data("waktu"));
    $("#keteranganPegawai").val($(this).data("keterangan"));
    $("#detailajuanModal").modal("show");
  });
});
