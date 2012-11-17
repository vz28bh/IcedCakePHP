$(document).ready(function(){
  $('.dropdown-toggle').dropdown();

  $(".datefield").each(function(){
    $.addDatePicker($(this));
  })
  $(".datetimefield").each(function(){
    $.addDateTimePicker($(this));
  })
  $(".datetimerangefield").each(function(){
    $.addDateTimeRangePicker($(this));
  })
  // Asset search elements
  $('input[data-search-url]').each(function(){
    var url = $(this).data('search-url');
    var target = $(this).data('search-target');
    var id = $(this).data('search-id');
    if(!id) {
      id = 'id';
    }
    var name = $(this).data('search-name');
    if(!name) {
      name = 'name';
    }
    $(this).autocomplete({
      'source': url,
      'minLength': 2,
      'select': function(event,ui) {
      if ( $(target+' option[value='+ui.item[id]+']').length == 0) {        
      $(target).append(
        $("<option></option>")
        .attr("value",ui.item[id])
        .text(ui.item[id]+' ('+ui.item[name]+')')
        );
      }
      }
      }).data( "autocomplete" )._renderItem = function( ul, item ) {
      return $( "<li>" )
      .data( "item.autocomplete", item )
      .append( "<a>" + item[id] + " (" + item[name] + ")</a>" )
      .appendTo( ul );
    }
  })
  // Select all on submit
  $('form').submit(function(){
    $(this).find('select[data-select-all] option').each(function(){
      $(this).attr('selected','selected');
    })
  })
});
jQuery.addDatePicker = function (datefield){
  var showOn = 'button';
  var img = datefield.attr('img');
  if(!img) {
    showOn = 'focus';
  }
  var datelimit = datefield.data('datelimit');
  datefield.datepicker({
    'showOn':showOn,
    'buttonImage':img,
    'showButtonPanel':true,
    'changeMonth': true,
    'changeYear': true,
    'dateFormat':"yy-mm-dd",
    'showAnim':"slideDown",
    'beforeShow': function() {
      $('#ui-datepicker-div').css('z-index',10000);
    },
    'maxDate':datelimit
  })
}

jQuery.addDateTimePicker = function (datetimefield){
  var showOn = 'button';
  var img = datetimefield.data('img');
  if(!img) {
    showOn = 'focus';
  }
  var datelimit = datetimefield.data('datelimit');
  datetimefield.datetimepicker({
    'showOn':showOn,
    'buttonImage':img,
    'showSecond':true,
    'showTimepicker':true,
    'showButtonPanel':true,
    'changeMonth': true,
    'changeYear': true,
    'dateFormat':"yy-mm-dd",
    'timeFormat':"hh:mm:ss",
    'altFieldTimeOnly':false,
    'showAnim':"slideDown",
    'maxDate':datelimit
  })
}
jQuery.addDateTimeRangePicker = function (datetimefield){
  var showOn = 'button';
  var img = datetimefield.data('img');
  if(!img) {
    showOn = 'focus';
  }
  var datelimit = datetimefield.data('datelimit');
  var datetimelimiter = datetimefield.data('datetimelimiter');
  var datetimeoption = datetimefield.data('datetimeoption');
  datetimefield.datetimepicker({
    'showOn':showOn,
    'buttonImage':img,
    'showSecond':true,
    'showTimepicker':true,
    'showButtonPanel':true,
    'changeMonth': true,
    'changeYear': true,
    'dateFormat':"yy-mm-dd",
    'timeFormat':"hh:mm:ss",
    'altFieldTimeOnly':false,
    'showAnim':"slideDown",
    'maxDate':datelimit,
    'onClose': function(dateText, inst) {
      var limiterDateTextBox = $('#'+datetimelimiter);
      if (limiterDateTextBox.val() != '') {
        var testDate = new Date(dateText);
        var testLimiterDate = new Date(limiterDateTextBox.val());
        if ( (datetimeoption=='minDate' && testDate > testLimiterDate) ||
          (datetimeoption=='maxDate' && testDate < testLimiterDate) ) {
          limiterDateTextBox.val(dateText);
        }
      }
      else {
        limiterDateTextBox.val(dateText);
      }
    },
    'onSelect': function (selectedDateTime){
      var currentdate = $(this).datetimepicker('getDate');
      $('#'+datetimelimiter).datetimepicker('option', datetimeoption, new Date(currentdate.getTime()));
    }
      
  })
}

  
// Simple callback to reload the current window if no data returned
// Used by JqueryDialogHelper
function reload_window(formData,responseData) {
  if(formData.length==0) {
    //alert('reload_window: no form data, not doing anything' );
    return false;
  }
  if(responseData.length==0) {
    //alert('reload_window no responseData, reloading window');
    // Reload the window if there was no data from the controller
    $('body').html('');
    window.location.reload();
    return true;
  } else {
    // Let the dialog helper display the results
    //alert('reload_window responseData returned, not doing anything');
    return false;
  }
}