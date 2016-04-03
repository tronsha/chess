
window.onload = function () {
    resize();
};

window.onresize = function () {
    resize();
};

var resize = function () {
    var $borad = jQuery('#board');
    $borad.removeAttr('style');
    var v;
    if (window.matchMedia('(orientation: landscape)').matches) {
        v = $borad.height();
    } else {
        v = $borad.width();
    }
    $borad.height(v);
    $borad.width(v);
    var $fields = $borad.children('div');
    $fields.each(function () {
        var $this = jQuery(this);
        var x = v/8;
        $this.width(x);
        $this.height(x);
        $this.css('font-size', x - 25);
        $this.css('line-height', x + 'px');
    });
};
