/* ------------------------------------------------------------------------------
 *
 *  # Custom JS code
 *
 *  Place here all your custom js. Make sure it's loaded after app.js
 *
 * ---------------------------------------------------------------------------- */


// Setup module
// ------------------------------

var AppCustom = function () {

    var _componentUiDatepicker = function () {
        if (!$().pickatime) {
            console.warn('Warning - picker.js and/or picker.time.js is not loaded.');
            return;
        }
        if (!$().datepicker) {
            console.warn('Warning - picker.js and/or picker.date.js is not loaded.');
            return;
        }
        // Dropdown selectors
        $('.date-picker').pickadate({
            format:'dd-mm-yyyy',
            formatSubmit:'yyyy-mm-dd',
            selectYears: true,
            selectMonths: true
        });

        // Default functionality
        $('.pickatime').pickatime({
            format: 'H:i'
        });
    };

    // Lightbox
    var _componentFancybox = function() {
        if (!$().fancybox) {
            console.warn('Warning - fancybox.min.js is not loaded.');
            return;
        }

        // Image lightbox
        $('[data-popup="lightbox"]').fancybox({
            padding: 3
        });
    };

    // Select2
    var _componentSelect2 = function () {
        if (!$().select2) {
            console.warn('Warning - select2.min.js is not loaded.');
            return;
        }

        // Initialize
        $('.form-control-select2').select2({
            minimumInputLength: 2
        });


    };

    var _componentFileRepeater=function () {
        if (!$().repeater) {
            console.warn('Warning - jquery.repeater.js is not loaded.');
            return;
        }
        $('.form-repeater').repeater({
            show: function (){
                $(this).slideDown(function(){
                    var selects = $('body').find('.form-control-select2');
                    $.each(selects, function(i, selectElement){
                        $(selectElement).removeClass('select2-container').remove();
                        $(selectElement).removeAttr('data-select2-id tabindex aria-hidden');
                        initSelect2(selectElement);
                    });

                });
            },
            isFirstItemUndeletable: true
        });

        function initSelect2(selectElement) {
            $(selectElement).select2({
                minimumInputLength: 2
            });
        }


    };

    // Switchery
    var _componentSwitchery = function() {
        if (typeof Switchery == 'undefined') {
            console.warn('Warning - switchery.min.js is not loaded.');
            return;
        }

        // Initialize multiple switches
        var elems = Array.prototype.slice.call(document.querySelectorAll('.form-check-input-switchery'));
        elems.forEach(function(html) {
            var switchery = new Switchery(html);
        });

        // Colored switches
        var primary = document.querySelector('.form-check-input-switchery-primary');
        var switchery = new Switchery(primary, { color: '#2196F3' });

        var danger = document.querySelector('.form-check-input-switchery-danger');
        var switchery = new Switchery(danger, { color: '#EF5350' });

        var warning = document.querySelector('.form-check-input-switchery-warning');
        var switchery = new Switchery(warning, { color: '#FF7043' });

        var info = document.querySelector('.form-check-input-switchery-info');
        var switchery = new Switchery(info, { color: '#00BCD4'});
    };

    var _componentUniform=function () {
        if (!$().uniform) {
            console.warn('Warning - uniform.min.js is not loaded.');
            return;
        }
        // Initialize
        $('.form-input-styled').uniform({
            fileButtonClass: 'action btn bg-warning'
        });

    };

    var _componentMediaLibrary=function () {

        if (!$().DataTable) {
            console.warn('Warning - Datatable.min.js is not loaded.');
            return;
        }
        // Initialize table
        var media_library = $('.media-library').DataTable({
            autoWidth: false,
            columnDefs: [
                {
                    orderable: false,
                    width: 20,
                    targets: 0
                },
                {
                    orderable: false,
                    width: 100,
                    targets: 1
                },
                {
                    orderable: false,
                    width: 90,
                    targets: 6
                }
            ],
            order: [[ 2, 'asc' ]],
            lengthMenu: [ 25, 50, 75, 100 ],
            displayLength: 25,
            dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
            language: {
                search: '<span>Filter:</span> _INPUT_',
                searchPlaceholder: 'Type to filter...',
                lengthMenu: '<span>Show:</span> _MENU_',
                paginate: { 'first': 'First', 'last': 'Last', 'next': $('html').attr('dir') == 'rtl' ? '&larr;' : '&rarr;', 'previous': $('html').attr('dir') == 'rtl' ? '&rarr;' : '&larr;' }
            }
        });


    };

    //
    //
    // Return objects assigned to module
    //

    return {
        init: function () {
            // Initialize components
            _componentUiDatepicker();
            _componentSelect2();
            _componentUniform();
            _componentMediaLibrary();
            _componentFileRepeater();
            _componentFancybox();


        }
    }
}();


// Initialize module
// ------------------------------

document.addEventListener('DOMContentLoaded', function () {
    AppCustom.init();
});
