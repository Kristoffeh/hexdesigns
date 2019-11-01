$('input:checkbox').change(function ()
{
      var timer = 5;
      var timebetaling = 949;
      var timertotalt = 0;
      var total = 0;
      timertotalt = timer * timebetaling;
    
      $('input:checkbox:checked').each(function(){
       total += isNaN(parseInt($(this).val())) ? 0 : parseInt($(this).val());
      });
  
      total += timertotalt;
      $('h6.total').text("= " + total + " kr");
      
});

$(document.getElementById('nyhetch')).change(function (){

      if ($(this).is(":checked"))
      {
          $("#txtNyhet").show();
      }
      else
      {
          $("#txtNyhet").hide();
      }

});

$(document.getElementById('bildech')).change(function (){

      if ($(this).is(":checked"))
      {
          $("#txtBilde").show();
      }
      else
      {
          $("#txtBilde").hide();
      }

});

$(document.getElementById('bloggingsystemch')).change(function (){

      if ($(this).is(":checked"))
      {
          $("#txtBloggingsystem").show();
      }
      else
      {
          $("#txtBloggingsystem").hide();
      }
      
});

$(document.getElementById('nedtellingch')).change(function (){

      if ($(this).is(":checked"))
      {
          $("#txtNedtelling").show();
      }
      else
      {
          $("#txtNedtelling").hide();
      }

});

$(document.getElementById('faqch')).change(function (){

      if ($(this).is(":checked"))
      {
          $("#txtFaq").show();
      }
      else
      {
          $("#txtFaq").hide();
      }

});

$(document.getElementById('tabellerch')).change(function (){

      if ($(this).is(":checked"))
      {
          $("#txtTabeller").show();
      }
      else
      {
          $("#txtTabeller").hide();
      }

});

$(document.getElementById('fremgangsdriftch')).change(function (){

      if ($(this).is(":checked"))
      {
          $("#txtFremgangsdrift").show();
      }
      else
      {
          $("#txtFremgangsdrift").hide();
      }

});

$(document.getElementById('kontaktskjemach')).change(function (){

      if ($(this).is(":checked"))
      {
          $("#txtKontaktskjema").show();
      }
      else
      {
          $("#txtKontaktskjema").hide();
      }
      
});


