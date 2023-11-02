$(window, document, undefined).ready(function() {

    $('input').blur(function () {
        var $this = $(this);
        if ($this.val())
            $this.addClass('used');
        else
            $this.removeClass('used');
    });

    var $ripples = $('.ripples');

    $ripples.on('click.Ripples', function (e) {

        var $this = $(this);
        var $offset = $this.parent().offset();
        var $circle = $this.find('.ripplesCircle');

        var x = e.pageX - $offset.left;
        var y = e.pageY - $offset.top;

        $circle.css({
            top: y + 'px',
            left: x + 'px'
        });

        $this.addClass('is-active');

    });

    $ripples.on('animationend webkitAnimationEnd mozAnimationEnd oanimationend MSAnimationEnd', function (e) {
        $(this).removeClass('is-active');
    });

});

function Used() {

    if (!document.getElementById("pw").value) {
        document.getElementById("used").innerHTML = "パスワードを空文字にすることはできません。";
        document.getElementById("used").style.display = "block";
        return false;
    }
    else if (document.getElementById("pw").value.length > 20) {
        document.getElementById("used").innerHTML = "このパスワードは..重複こそはしていないものの、冗長であるため却下します。<br>もう少し短いパスワードをお試し下さい。";
        document.getElementById("used").style.display = "block";
        return false;
    }

    // let uniqid = "";
    // for (var i = 0; i < 5; i++) {
    //     uniqid += 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789'.charAt(Math.floor(Math.random() * 62));
    // };
    let uniqid = CybozuLabs.MD5.calc(document.getElementById("pw").value).slice(0, 5);
    document.getElementById("used").innerHTML =
        "このパスワードは既に<a href='javascript:void(0);'>@" + uniqid + "</a>が使用しています。<br>" +
        "別のパスワードをお試し下さい。";

    document.getElementById("used").style.display = "block";
    return false;
}
