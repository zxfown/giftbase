(function() {
  jQuery(function() {
    $('form.question').on('click', '.remove_fields', function(event) {
      $(this).prev('input[type=hidden]').val('1');
      $(this).closest('fieldset').hide();
      return event.preventDefault();
    });
    return $('form.question').on('click', '.add_fields', function(event) {
      var regexp, time;
      time = new Date().getTime();
      regexp = new RegExp($(this).data('id'), 'g');
      $(this).parents('.control-group').before($(this).data('fields').replace(regexp, time));
      return event.preventDefault();
    });
  });

}).call(this);