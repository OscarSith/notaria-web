var master_of_tables = [];
$(document).ready(function () {

    // Add special class to minimalize page elements when screen is less than 768px
    setBodySmall();

    // Handle minimalize sidebar menu
    $('.hide-menu').click(function(event){
        event.preventDefault();
        if ($(window).width() < 769) {
            $("body").toggleClass("show-sidebar");
        } else {
            $("body").toggleClass("hide-sidebar");
        }
    });

    // Initialize metsiMenu plugin to sidebar menu
    // var sideMenu = $('#side-menu');
    // if (sideMenu.length) {
    //     sideMenu.metisMenu();
    // }

    // Initialize animate panel function
    $('.animate-panel').animatePanel();

    ichecks();

    // Function for collapse hpanel
    var $showHide = $('.showhide');
    if ($showHide.length) {
        $showHide.click(function (event) {
            event.preventDefault();
            var hpanel = $(this).closest('div.hpanel');
            var icon = $(this).find('i:first');
            var body = hpanel.find('div.panel-body');
            var footer = hpanel.find('div.panel-footer');
            body.slideToggle(300);
            footer.slideToggle(200);

            // Toggle icon from up to down
            icon.toggleClass('fa-chevron-up').toggleClass('fa-chevron-down');
            hpanel.toggleClass('').toggleClass('panel-collapse');
            setTimeout(function () {
                hpanel.resize();
                hpanel.find('[id^=map-]').resize();
            }, 50);
        });
    }

    // Function for close hpanel
    var $closeBox = $('.closebox');
    if ($closeBox.length) {
        $closeBox.click(function (event) {
            event.preventDefault();
            var hpanel = $(this).closest('div.hpanel');
            hpanel.remove();
        });
    }

    // Fullscreen for fullscreen hpanel
    var $fullscreen = $('.fullscreen');
    if ($fullscreen.length) {
        $fullscreen.click(function() {
            var hpanel = $(this).closest('div.hpanel');
            var icon = $(this).find('i:first');
            $('body').toggleClass('fullscreen-panel-mode');
            icon.toggleClass('fa-expand').toggleClass('fa-compress');
            hpanel.toggleClass('fullscreen');
            setTimeout(function() {
                $(window).trigger('resize');
            }, 100);
        });
    }

    // Open close right sidebar
    $('.right-sidebar-toggle').click(function () {
        $('#right-sidebar').toggleClass('sidebar-open');
    });

    // Function for small header
    $('.small-header-action').click(function(event){
        event.preventDefault();
        var icon = $(this).find('i:first');
        var breadcrumb  = $(this).parent().find('#hbreadcrumb');
        $(this).parent().parent().parent().toggleClass('small-header');
        breadcrumb.toggleClass('m-t-lg');
        icon.toggleClass('fa-arrow-up').toggleClass('fa-arrow-down');
    });

    // Set minimal height of #wrapper to fit the window
    setTimeout(function () {
        fixWrapperHeight();
    });

    // Sparkline bar chart data and options used under Profile image on left navigation panel
    var $sparkLine = $("#sparkline1");
    if ($sparkLine.length) {
        $sparkLine.sparkline([5, 6, 7, 2, 0, 4, 2, 4, 5, 7, 2, 4, 12, 11, 4], {
            type: 'bar',
            barWidth: 7,
            height: '30px',
            barColor: '#62cb31',
            negBarColor: '#53ac2a'
        });
    }

    // Initialize tooltips
    $('.tooltip-demo').tooltip({
        selector: "[data-toggle=tooltip]"
    });

    // Initialize popover
    $("[data-toggle=popover]").popover();

    // Move modal to body
    // Fix Bootstrap backdrop issu with animation.css
    $('.modal').appendTo("body")
});

if ( ! sessionStorage.hasOwnProperty('master') ) {
    $.ajax({
        url: url_root + 'master-tables',
        type: 'get',
        dataType: 'json'
    }).done(function(rec) {
        sessionStorage.setItem('master', JSON.stringify(rec));
        master_of_tables = rec;
    }).fail(function(e,d) {
        console.log(e);
        console.log(d);
    });
} else {
    master_of_tables = $.parseJSON(sessionStorage.getItem('master'));
}

var tipo_doc = [], sexo = [], tipo_per = [], nacion = [], moneda = [], prot_titulo = [], clase = [], pro_estado = [];
for (var i = 0; i < master_of_tables.length; i++) {
    if (master_of_tables[i].ttb_tipo == '0010') {
        tipo_doc.push(master_of_tables[i]);
    }
    else if (master_of_tables[i].ttb_tipo == '0020'){
        sexo.push(master_of_tables[i]);
    }
    else if (master_of_tables[i].ttb_tipo == '0030') {
        tipo_per.push(master_of_tables[i]);
    }
    else if (master_of_tables[i].ttb_tipo == '0040') {
        nacion.push(master_of_tables[i]);
    }
    else if (master_of_tables[i].ttb_tipo == '0050') {
        moneda.push(master_of_tables[i]);
    }
    else if (master_of_tables[i].ttb_tipo == '0060') {
        prot_titulo.push(master_of_tables[i]);
    }
    else if (master_of_tables[i].ttb_tipo == '0070') {
        clase.push(master_of_tables[i]);
    }
    else if (master_of_tables[i].ttb_tipo == '0080') {
        pro_estado.push(master_of_tables[i]);
    }
}

var selected = '<option>Seleccione</option>';
var $per_dcmto_tipo = $('#per_dcmto_tipo');
if ($per_dcmto_tipo.length) {
    var options = selected;
    for (var i = 0; i < tipo_doc.length; i++) {
        options += '<option value="' + tipo_doc[i].ttb_arg + '">' + tipo_doc[i].ttb_val1 + '</option>';
    }
    $per_dcmto_tipo.html(options);
}

var $per_tipo = $('#per_tipo');
if ($per_tipo.length) {
    var checks = '';
    for (var i = 0; i < tipo_per.length; i++) {
        checks += '<label class="radio-inline"><input type="radio" name="per_tipo" value="' + tipo_per[i].ttb_arg + '" class="i-checks"> ' + tipo_per[i].ttb_val1 + '</label>';
    }
    $per_tipo.html(checks).on('click', 'radio', function() {
        var $this = $(this),
            value = $this.val();
        console.info(value);
    });
}

var $per_nacion = $('#per_nacion');
if ($per_nacion.length) {
    var options = selected;
    for (var i = 0; i < nacion.length; i++) {
        options += '<option value="' + nacion[i].ttb_arg + '">' + nacion[i].ttb_val1 + '</option>';
    }
    $per_nacion.html(options);
}

var $per_sexo = $('#per_sexo');
if ($per_sexo.length) {
    var options = selected;
    for (var i = 0; i < sexo.length; i++) {
        options += '<option value="' + sexo[i].ttb_arg + '">' + sexo[i].ttb_val1 + '</option>';
    }
    $per_sexo.html(options);
}

var $departamento = $('#departamento');
if ($departamento.length) {
    $.merge($departamento, $('#provincia')).on('change', function() {
        var $this = $(this),
            valor = $this.val(),
            $content = $($this.data('destity'))
            options = '<option>-Seleccione-</option>';

        $.getJSON(url_root + 'get-ubigeo-by-parent/' + valor, {}, function(rec) {
            for (var i = 0; i < rec.length; i++) {
                options += '<option value="' + rec[i].master + '">' + rec[i].nombre + '</option>';
            }

            $content.html(options);
        });
    });
}

$(window).bind("load", function () {
    // Remove splash screen after load
    $('.splash').css('display', 'none');
});

$(window).bind("resize click", function () {

    // Add special class to minimalize page elements when screen is less than 768px
    setBodySmall();

    // Waint until metsiMenu, collapse and other effect finish and set wrapper height
    setTimeout(function () {
        fixWrapperHeight();
    }, 300);
});

function fixWrapperHeight() {

    // Get and set current height
    var headerH = 62;
    var navigationH = $("#navigation").height();
    var contentH = $(".content").height();

    // Set new height when contnet height is less then navigation
    if (contentH < navigationH) {
        $("#wrapper").css("min-height", navigationH + 'px');
    }

    // Set new height when contnet height is less then navigation and navigation is less then window
    if (contentH < navigationH && navigationH < $(window).height()) {
        $("#wrapper").css("min-height", $(window).height() - headerH  + 'px');
    }

    // Set new height when contnet is higher then navigation but less then window
    if (contentH > navigationH && contentH < $(window).height()) {
        $("#wrapper").css("min-height", $(window).height() - headerH + 'px');
    }
}


function setBodySmall() {
    if ($(this).width() < 769) {
        $('body').addClass('page-small');
    } else {
        $('body').removeClass('page-small');
        $('body').removeClass('show-sidebar');
    }
}

// Initialize iCheck plugin
function ichecks () {
    var $checks = $('.i-checks');
    if ($checks.length) {
        $checks.iCheck({
            checkboxClass: 'icheckbox_square-green',
            radioClass: 'iradio_square-green'
        });
    }
}
// Animate panel function
$.fn['animatePanel'] = function() {

    var element = $(this);
    var effect = $(this).data('effect');
    var delay = $(this).data('delay');
    var child = $(this).data('child');

    // Set default values for attrs
    if(!effect) { effect = 'zoomIn'}
    if(!delay) { delay = 0.06 } else { delay = delay / 10 }
    if(!child) { child = '.row > div'} else {child = "." + child}

    //Set defaul values for start animation and delay
    var startAnimation = 0;
    var start = Math.abs(delay) + startAnimation;

    // Get all visible element and set opacity to 0
    var panel = element.find(child);
    panel.addClass('opacity-0');

    // Get all elements and add effect class
    panel = element.find(child);
    panel.addClass('stagger').addClass('animated-panel').addClass(effect);

    var panelsCount = panel.length + 10;
    var animateTime = (panelsCount * delay * 10000) / 10;

    // Add delay for each child elements
    panel.each(function (i, elm) {
        start += delay;
        var rounded = Math.round(start * 10) / 10;
        $(elm).css('animation-delay', rounded + 's');
        // Remove opacity 0 after finish
        $(elm).removeClass('opacity-0');
    });

    // Clear animation after finish
    setTimeout(function(){
        $('.stagger').css('animation', '');
        $('.stagger').removeClass(effect).removeClass('animated-panel').removeClass('stagger');
    }, animateTime)
};