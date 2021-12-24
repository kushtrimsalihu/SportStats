const { bottom } = require("@popperjs/core");

/**
 * Place any jQuery/helper plugins in here.
 */
$(function() {
    /**
     * Checkbox tree for permission selecting
     */
    let permissionTree = $('.permission-tree :checkbox');

    permissionTree.on('click change', function() {
        if ($(this).is(':checked')) {
            $(this).siblings('ul').find('input[type="checkbox"]').attr('checked', true).attr('disabled', true);
        } else {
            $(this).siblings('ul').find('input[type="checkbox"]').removeAttr('checked').removeAttr('disabled');
        }
    });

    permissionTree.each(function() {
        if ($(this).is(':checked')) {
            $(this).siblings('ul').find('input[type="checkbox"]').attr('checked', true).attr('disabled', true);
        }
    });

    /**
     * Disable submit inputs in the given form
     *
     * @param form
     */
    function disableSubmitButtons(form) {
        form.find('input[type="submit"]').attr('disabled', true);
        form.find('button[type="submit"]').attr('disabled', true);
    }

    /**
     * Enable the submit inputs in a given form
     *
     * @param form
     */
    function enableSubmitButtons(form) {
        form.find('input[type="submit"]').removeAttr('disabled');
        form.find('button[type="submit"]').removeAttr('disabled');
    }

    /**
     * Disable all submit buttons once clicked
     */
    $('form').submit(function() {
        disableSubmitButtons($(this));
        return true;
    });

    /**
     * Add a confirmation to a delete button/form
     */
    $('body').on('submit', 'form[name=delete-item]', function(e) {
            e.preventDefault();

            Swal.fire({
                title: 'Are you sure you want to delete this item?',
                showCancelButton: true,
                confirmButtonText: 'Confirm Delete',
                cancelButtonText: 'Cancel',
                icon: 'warning'
            }).then((result) => {
                if (result.value) {
                    this.submit()
                } else {
                    enableSubmitButtons($(this));
                }
            });
        })
        .on('submit', 'form[name=confirm-item]', function(e) {
            e.preventDefault();

            Swal.fire({
                title: 'Are you sure you want to do this?',
                showCancelButton: true,
                confirmButtonText: 'Continue',
                cancelButtonText: 'Cancel',
                icon: 'warning'
            }).then((result) => {
                if (result.value) {
                    this.submit()
                } else {
                    enableSubmitButtons($(this));
                }
            });
        })
        .on('click', 'a[name=confirm-item]', function(e) {
            /**
             * Add an 'are you sure' pop-up to any button/link
             */
            e.preventDefault();

            Swal.fire({
                title: 'Are you sure you want to do this?',
                showCancelButton: true,
                confirmButtonText: 'Continue',
                cancelButtonText: 'Cancel',
                icon: 'info',
            }).then((result) => {
                result.value && window.location.assign($(this).attr('href'));
            });
        });

    // Remember tab on page load
    $('a[data-toggle="tab"], a[data-toggle="pill"]').on('shown.bs.tab', function(e) {
        let hash = $(e.target).attr('href');
        history.pushState ? history.pushState(null, null, hash) : location.hash = hash;
    });

    let hash = window.location.hash;
    if (hash) {
        $('.nav-link[href="' + hash + '"]').tab('show');
    }

    // Enable tooltips everywhere
    $('[data-toggle="tooltip"]').tooltip();
});

// checkbox show filters

$('.switch-button-checkbox').change(function() {
    if (this.checked) {
        $('.link1').trigger('click')
    } else {}
})
$('.switch-button-checkbox-teams').change(function() {
    if (this.checked) {
        $('.link2').trigger('click')

    } else {

    }
})
$('.switch-button-checkbox-back').change(function() {
    if (this.click) {
        $('.back1').trigger('click')
    } else {

    }
})
$('.switch-button-checkbox-back-to-leagues').change(function() {
    if (this.click) {
        $('.back-to-leagues').trigger('click')
    } else {

    }
})

// Faq jQuery
var coll = document.getElementsByClassName("collapsible");
var i;

for (i = 0; i < coll.length; i++) {
    coll[i].addEventListener("click", function() {
        this.classList.toggle("active");
        var content = this.nextElementSibling;
        if (content.style.maxHeight) {
            content.style.maxHeight = null;
            content.style.visibility = "hidden";
            content.style.margin = "0 0";
        } else {
            content.style.maxHeight = content.scrollHeight + "px";
            content.style.visibility = "visible";
            content.style.margin = "-13px 0";
            content.style.marginBottom = "17px";

        }
    });
}

// ----------- filters button---------
var tabs = $('.tabs');
var selector = $('.tabs').find('a').length;
//var selector = $(".tabs").find(".selector");
var activeItem = tabs.find('.active');
var activeWidth = activeItem.innerWidth();
$(".selector").css({
    "left": activeItem.position.left + "px",
    "width": activeWidth + "px"

});

$(".tabs").on("click", "a", function(e) {
    e.preventDefault();
    $('.tabs a').removeClass("active");
    // $(this).addClass('active');
    var activeWidth = $(this).innerWidth();
    var itemPos = $(this).position();
    // $('[data-toggle="tooltip"]').tooltip();

    $(".selector").css({
        "left": itemPos.left + "px",
        "width": activeWidth + "px"
    });
});



var body = $('body');

body.on('click', '.filterable .btn-filter', function() {
    var $panel = $(this).parents('.filterable'),
        $filters = $panel.find('.filters input'),
        $tbody = $panel.find('.table tbody');
    if ($filters.prop('disabled') == true) {
        $filters.prop('disabled', false);
        $filters.first().focus();
    } else {
        $filters.val('').prop('disabled', true);
        $tbody.find('.no-result').remove();
        $tbody.find('tr').show();
    }
});

body.on('input', '.filterable .filters input', function(e) {
    /* Ignore tab key */
    var code = e.keyCode || e.which;
    if (code == '9') return;

    var $input = $(this),
        inputContent = $input.val().toLowerCase(),
        $panel = $input.parents('.filterable'),
        column = $panel.find('.filters th').index($input.parents('th')),
        $table = $panel.find('.table'),
        $rows = $table.find('tbody tr');

    var $filteredRows = $rows.filter(function() {
        var value = $(this).find('td').eq(column).text().toLowerCase();
        return value.indexOf(inputContent) === -1;
    });

    $table.find('tbody .no-result').remove();
    $rows.show();
    $filteredRows.hide();
    if ($filteredRows.length === $rows.length) {
        $table.find('tbody').prepend($('<tr class="no-result text-center"><td colspan="' + $table.find('.filters th').length + '">No Result Found</td></tr>'));
    }
    $panel.find('.filters').show();
});


var $rows = $('#table tr');
$('#search').keyup(function() {

    var val = '^(?=.*\\b' + $.trim($(this).val()).split(/\s+/).join('\\b)(?=.*\\b') + ').*$',
        reg = RegExp(val, 'i'),
        text;

    $rows.show().filter(function() {
        text = $(this).text().replace(/\s+/g, ' ');
        return !reg.test(text);
    }).hide();
});

$(".rotate").click(function() {
    $(this).toggleClass("down");
})

// --------Sidebar Filters----------------------
$('input').click(function() {
    var category = $(this).val();

    var matchedItems = $('.' + category).each(function() {
        var anyChecked = false;
        var classArray = this.className.split(/\s+/);

        for (idx in classArray) {
            if ($('#filter-' + classArray[idx]).is(":checked")) {
                anyChecked = true;
                break;
            }
        }

        if (!anyChecked) $(this).hide();
        else $(this).show();

    });

});

// ------------- SVG Landing Page -----------------
setTimeout(function() {
    $('.svg-preload-parent').fadeOut('slow');
}, 1600);

$(document).ready(function() {
    $('.preload-svg').css("visibility", "visible");
});



// Sidebar for Close and Open

let arrow = document.querySelectorAll(".arrow");
for (var i = 0; i < arrow.length; i++) {
    arrow[i].addEventListener("click", (e) => {
        let arrowParent = e.target.parentElement.parentElement; //selecting main parent of arrow
        arrowParent.classList.toggle("showMenu");
    });
}

let sidebar = document.querySelector(".sidebar");
let sidebarBtn = document.querySelector(".btnnav-icon");
console.log(sidebarBtn);
sidebarBtn.addEventListener("click", () => {
    sidebar.classList.toggle("close")
        // $(".container-dash").addClass("hide-on-small");
});
let sidebar2 = document.querySelector("#close-nav");
let sidebarBtn2 = document.querySelector(".btnnav-icon2");
console.log(sidebarBtn2);
sidebarBtn2.addEventListener("click", () => {
    sidebar2.classList.toggle("sidebar-sm")
        // $(".container-dash").addClass("hide-on-small");
});
// Piechart

'use strict';

var $window = $(window);

function run() {
    var fName = arguments[0],
        aArgs = Array.prototype.slice.call(arguments, 1);
    try {
        fName.apply(window, aArgs);
    } catch (err) {

    }
};

/* chart
================================================== */
function _chart() {
    $('.b-skills').appear(function() {
        setTimeout(function() {
            $('.chart').easyPieChart({
                easing: 'easeOutElastic',
                delay: 3000,
                barColor: '#369670',
                trackColor: '#fff',
                scaleColor: false,
                lineWidth: 21,
                trackWidth: 21,
                size: 250,
                lineCap: 'round',
                onStep: function(from, to, percent) {
                    this.el.children[0].innerHTML = Math.round(percent);
                }
            });
        }, 150);
    });
};


$(document).ready(function() {

    run(_chart);


});

// ----- Sportstats nav text, show and hide

$(document).ready(function() {
    $("#hide-text").click(function() {
        $(".remove-text").toggle();
    });
});


//CKEditor
$(document).ready(function() {
    //EditorCKeditor
    ClassicEditor.create(document.querySelector("#body")).catch((error) => {
        console.error(error);
    });
});

//   Table-ranking
$(function() {
    $(".fold-table td.view").on("click", function() {
        $(this).closest("tr.view").toggleClass("open").next(".fold").toggleClass("open");
    });
});
