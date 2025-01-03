// DataTables with Column Search by Text Inputs
document.addEventListener("DOMContentLoaded", function() {
    // Setup - add a text input to each footer cell
    $('#datatables-column-search-text-inputs tfoot th.filter').each(function() {
        var title = $(this).text();
        $(this).html('<input type="text" class="form-control" placeholder="Search ' + title + '" />');

    });

    // DataTables
    var table = $('#datatables-column-search-text-inputs').DataTable({
        "order": [],
        "responsive": true,
        "scrollX": true,
        "processing": true,
        "serverSide": true,
        "ajax": window.location.href,
        "lengthChange": false,
        "columns": [{
                "data": 'masterclass_name',
                "name": 'masterclass_name'
            },
            {
                "data": 'course_categories',
                "name": 'course_categories.category_name'
            },
            {
                "data": 'course_masterclass_levels',
                "name": 'course_masterclass_levels.masterclass_level_name'
            },
            {
                "data": 'course_class_types',
                "name": 'course_class_types.class_type_name'
            },
            {
                "data": 'course_class_prices',
                "name": 'course_class_prices.price_type_name'
            },
            {
                "data": 'masterclass_price',
                "name": 'masterclass_price'
            },
            {
                "data": 'action',
                "name": 'action',
                "orderable": false,
                "searchable": false
            }
        ]
    });


    // Apply the search
    table.columns().every(function() {
        var that = this;
        $('input', this.footer()).on('keyup change clear', function() {
            if (that.search() !== this.value) {
                that
                    .search(this.value)
                    .draw();
            }
        });
    });
    $('.col-sm-12.col-md-6').first().append($('.button'))
});
