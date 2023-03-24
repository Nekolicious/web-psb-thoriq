// Call the dataTables jQuery plugin
$(document).ready(function () {

    $('#dataTambah').DataTable({
        initComplete: function () {
            this.api()
                .columns([0])
                .every(function () {
                    var column = this;
                    var select = $('<select><option value="">Semua</option></select>')
                        .appendTo($(column.header()))
                        .on('change', function () {
                            var val = $.fn.dataTable.util.escapeRegex($(this).val());
                            column.search(val ? '^' + val + '$' : '', true, false).draw();
                        });

                    column
                        .data()
                        .unique()
                        .sort()
                        .each(function (d, j) {
                            if(column.search() === '^'+d+'$'){
                                select.append( '<option value="'+d+'" selected="selected">'+d+'</option>' )
                            } else {
                                select.append( '<option value="'+d+'">'+d+'</option>' )
                            }
                        });
                });
        },
    });
});
