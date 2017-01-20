$(document).ready(function() {
  $("#filtro select").change(function() {
    applyFilter();
  });

  function applyFilter() {
    $(".produto").css('display', '');
    $("#filtro select").each(function() {
      var categoria = this.id;
      var pesquisa = $(this).val().toLowerCase();

      $(".produto").find('.' + categoria).each(function() {
        var textoCategoria = $(this).text();
        var corresponde = textoCategoria.toLowerCase().indexOf(pesquisa) >= 0 || pesquisa == '-';
        if (!corresponde) {
          $(this).parent().css('display', 'none');
        }
      });
    });
  }
});