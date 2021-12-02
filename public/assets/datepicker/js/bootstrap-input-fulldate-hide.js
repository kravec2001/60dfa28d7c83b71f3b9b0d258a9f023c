$('.datepicker').on('keyup', function(e) {
    let $this = $(e.target);
    if ($this.val().toLowerCase().indexOf('_') === -1) {
        setTimeout(function() {
            $this.datepicker('hide');
        }, 100);
    } else {
        $this.datepicker('show');
    }
});