jQuery(document).ready(function () {
    var $ = jQuery;
    var urlvars = getUrlVars();
    var moves = urlvars.moves;
    var move = '';
    $('#board > div').each(function () {
        var $this = $(this);
        $this.on('click', function () {
            var $this = $(this);
            if (move == $this.attr('id')) {
                $this.removeClass('selected');
                move = '';
            } else {
                $this.addClass('selected');
                move += $this.attr('id');
                if (move.length == 4) {
                    if (moves === undefined) {
                        window.location.href = window.location.href += (window.location.href.indexOf('?') == -1 ? '?' : '&') + 'moves=' + move;
                    } else {
                        window.location.href = window.location.href.replace(moves, moves + '|' + move);
                    }
                }
            }
        });
    });
});

function getUrlVars() {
    var vars = [], hash;
    var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
    for (var i = 0; i < hashes.length; i++) {
        hash = hashes[i].split('=');
        vars[hash[0]] = hash[1];
    }
    return vars;
}
