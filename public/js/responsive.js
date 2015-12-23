
window.onload = function () {
    resize();
};

window.onresize = function () {
    resize();
};

var resize = function () {
    var $borad = jQuery('#board');
    var width = $borad.width();
    $borad.height(width);
    var $fields = $borad.children('div');
    $fields.each(function () {
        var $this = jQuery(this);
        var x = width/8;
        $this.width(x);
        $this.height(x);
        $this.css('font-size', x);
        $this.css('line-height', x + 'px');
    });
};
