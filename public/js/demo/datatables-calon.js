// Call the dataTables jQuery plugin
$(document).ready(function () {
    var buttonCommon = {
        exportOptions: {
            columns: [0, 1, 2, 3],
            format: {
                header: function (data) {
                    var n = data.indexOf("<select>");
                    if (n > -1) {
                        return data.substring(0, n);
                    } else {
                        return data;
                    }
                }
            }
        },
    }

    $('#dataTable').DataTable({
        dom: "<'row'<'col-sm-12 col-md-4'l><'col-sm-12 col-md-4'B><'col-sm-12 col-md-4'f>>" +
            "<'row'<'col-sm-12'tr>>" +
            "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
        buttons: [
            $.extend(true, {}, buttonCommon, {
                extend: 'copyHtml5'
            }),
            $.extend(true, {}, buttonCommon, {
                extend: 'excelHtml5'
            }),
            $.extend(true, {}, buttonCommon, {
                extend: 'pdfHtml5'
            }),
            $.extend(true, {}, buttonCommon, {
                extend: 'csvHtml5'
            }),
            $.extend(true, {}, buttonCommon, {
                extend: 'print'
            })
        ],
        initComplete: function () {
            this.api()
                .columns([1])
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
                            if (column.search() === '^' + d + '$') {
                                select.append('<option value="' + d + '" selected="selected">' + d + '</option>')
                            } else {
                                select.append('<option value="' + d + '">' + d + '</option>')
                            }
                        });
                });
        },
        exportOptions: {
            format: {
                header: function (data, column, row) {
                    return data.substring(data.indexOf("value") + 9, data.indexOf("</option"));
                }
            }
        },
    });
});
