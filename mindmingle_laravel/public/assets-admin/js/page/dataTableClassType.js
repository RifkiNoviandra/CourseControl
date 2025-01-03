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
                "data": 'class_type_name',
                "name": 'class_type_name'
            },
            {
                "data": 'class_type_slug',
                "name": 'class_type_slug'
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
