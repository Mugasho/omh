/* ------------------------------------------------------------------------------
 *
 *  # Task list view
 *
 *  Demo JS code for task_manager_list.html page
 *
 * ---------------------------------------------------------------------------- */


// Setup module
// ------------------------------

var TaskManagerList = function () {


    //
    // Setup components
    //

    // Datatable
    var _componentDatatable = function() {
        if (!$().DataTable) {
            console.warn('Warning - datatables.min.js is not loaded.');
            return;
        }


        // Initialize data table
        $('.tasks-list').DataTable({
            autoWidth: false,
            columnDefs: [
                {
                    type: "natural",
                    width: 20,
                    targets: 0
                },
                {
                    visible: false,
                    targets: 1
                },
                {
                    width: '30%',
                    targets: 2
                },
                {
                    width: '20%',
                    targets: 3
                },
                {
                    orderDataType: 'dom-text',
                    type: 'string',
                    targets: 4
                },
                {
                    orderDataType: 'dom-select',
                    type: 'string',
                    targets: 5
                },
                { 
                    orderable: false,
                    width: 100,
                    targets: 7
                },
                {
                    width: '15%',
                    targets: [4, 5, 6]
                }
            ],
            order: [[ 0, 'desc' ]],
            dom: '<"datatable-header"fl><"datatable-scroll-lg"t><"datatable-footer"ip>',
            language: {
                search: '<span>Filter:</span> _INPUT_',
                searchPlaceholder: 'Type to filter...',
                lengthMenu: '<span>Show:</span> _MENU_',
                paginate: { 'first': 'First', 'last': 'Last', 'next': $('html').attr('dir') == 'rtl' ? '&larr;' : '&rarr;', 'previous': $('html').attr('dir') == 'rtl' ? '&rarr;' : '&larr;' }
            },
            lengthMenu: [ 15, 25, 50, 75, 100 ],
            displayLength: 25,
            drawCallback: function (settings) {
                var api = this.api();
                var rows = api.rows({page:'current'}).nodes();
                var last=null;
     
                // Grouod rows
                api.column(1, {page:'current'}).data().each(function (group, i) {
                    if (last !== group) {
                        $(rows).eq(i).before(
                            '<tr class="table-active table-border-double"><td colspan="8" class="font-weight-semibold">'+group+'</td></tr>'
                        );
     
                        last = group;
                    }
                });

            }
        });
    };
    
    var _componentMediaLibrary=function () {
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
    // Return objects assigned to module
    //

    return {
        init: function() {
            _componentDatatable();
            _componentMediaLibrary();
        }
    }
}();


// Initialize module
// ------------------------------

document.addEventListener('DOMContentLoaded', function() {
    TaskManagerList.init();
});
