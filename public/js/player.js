jQuery(document).ready(function () {
    var $ = jQuery;
    var move = '';
    $('#board > div').each(function() {
        var $this = $(this);
        $this.click(function() {
            var $this = $(this);
            move += $this.attr('id');
            if (move.length == 4) {
                location.href += '|' + move;
            }
        });
    });
});
