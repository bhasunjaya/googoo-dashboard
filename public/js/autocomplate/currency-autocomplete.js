$(function(){
  var currencies = [
    { value: '30 Second To Mars', data: 'AFN' },
    { value: 'Avenged Sevenfold', data: 'AFN' },
    { value: 'Aerosmith', data: 'ALL' },
    { value: 'Bon Jovi', data: 'DZD' },
    { value: 'Benjamin Breaking', data: 'EUR' },
    { value: 'Dishwalla', data: 'AOA' },
  ];
  
  // setup autocomplete function pulling from currencies[] array
  $('#autocomplete').autocomplete({
    lookup: currencies,
    onSelect: function (suggestion) {
      var thehtml = '<strong>Currency Name:</strong> ' + suggestion.value + ' <br> <strong>Symbol:</strong> ' + suggestion.data;
      $('#outputcontent').html(thehtml);
    }
  });
  

});