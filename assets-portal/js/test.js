$(document).ready(function(){
    $('#slbes').on('change', function() {
      if ( this.value == 'Bestill Supportavtale')
      {
        $("#bestillsupport").show();
      }
      else
      {
        $("#bestillsupport").hide();
      }
    });
});

$(document).ready(function(){
    $('#slbes').on('change', function() {
      if ( this.value == 'Avbestill Supportavtale')
      {
        $("#avbestillsupport").show();
      }
      else
      {
        $("#avbestillsupport").hide();
      }
    });
});

$(document).ready(function(){
    $('#slbes').on('change', function() {
      if ( this.value == 'Opprett ny nettside')
      {
        $("#nynettside").show();
      }
      else
      {
        $("#nynettside").hide();
      }
    });
});

$(document).ready(function(){
    $('#slbes').on('change', function() {
      if ( this.value == 'Endring på nettside')
      {
        $("#endringnettside").show();
      }
      else
      {
        $("#endringnettside").hide();
      }
    });
});