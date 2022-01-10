@if ($crud->exportButtons())

  <script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js" type="text/javascript"></script>
  <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.bootstrap4.min.js" type="text/javascript"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js" type="text/javascript"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.18/pdfmake.min.js" type="text/javascript"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.18/vfs_fonts.js" type="text/javascript"></script>
  <script src="//cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js" type="text/javascript"></script>
  <script src="//cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js" type="text/javascript"></script>
  <script src="//cdn.datatables.net/buttons/1.5.6/js/buttons.colVis.min.js" type="text/javascript"></script>
  <script>
      // console.log(datex)
      // $(document).ready(function(){
      //     $("#myBtn").click(function(){
      //         var elmId = $("#test").attr("id");
      //         alert(elmId);
      //     });
      // });


      crud.dataTableConfiguration.buttons = [
        {
            extend: 'collection',
            text: '<i class="la la-download"></i> {{ trans('backpack::crud.export.export') }}',
            dropup: true,
            buttons: [
                {
                    name: 'copyHtml5',
                    extend: 'copyHtml5',
                    exportOptions: {
                        columns: function ( idx, data, node ) {
                            var $column = crud.table.column( idx );
                                return  ($column.visible() && $(node).attr('data-visible-in-export') != 'false') || $(node).attr('data-force-export') == 'true';
                        }
                    },
                    action: function(e, dt, button, config) {
                        crud.responsiveToggle(dt);
                        $.fn.DataTable.ext.buttons.copyHtml5.action.call(this, e, dt, button, config);
                        crud.responsiveToggle(dt);
                    }
                },
                {
                    name: 'excelHtml5',
                    extend: 'excelHtml5',
                    title: function (){
                        let datex = document.getElementById("daterangepicker-fromTo").value;
                        return '{{$crud->entity_name}} ' + datex;
                    },
                    exportOptions: {
                        columns: function ( idx, data, node ) {
                            var $column = crud.table.column( idx );
                                return  ($column.visible() && $(node).attr('data-visible-in-export') != 'false') || $(node).attr('data-force-export') == 'true';
                        }
                    },
                    action: function(e, dt, button, config) {
                        crud.responsiveToggle(dt);
                        $.fn.DataTable.ext.buttons.excelHtml5.action.call(this, e, dt, button, config);
                        crud.responsiveToggle(dt);
                    },
                    // customize: function(xlsx) {
                    //     var sheet = xlsx.xl.worksheets['sheet1.xml'];
                    //     var numrows = 5;
                    //     var clR = $('row', sheet);
                    //
                    //     //update Row
                    //     clR.each(function () {
                    //         var attr = $(this).attr('r');
                    //         var ind = parseInt(attr);
                    //         ind = ind + numrows;
                    //         $(this).attr("r", ind);
                    //     });
                    //
                    //     // Create row before data
                    //     $('row c ', sheet).each(function () {
                    //         var attr = $(this).attr('r');
                    //         var pre = attr.substring(0, 1);
                    //         var ind = parseInt(attr.substring(1, attr.length));
                    //         ind = ind + numrows;
                    //         $(this).attr("r", pre + ind);
                    //     });
                    //
                    //     function Addrow(index, data) {
                    //         var msg = '<row r="' + index + '">'
                    //         for (var i = 0; i < data.length; i++) {
                    //             var key = data[i].key;
                    //             var value = data[i].value;
                    //             msg += '<c t="inlineStr" r="' + key + index + '">';
                    //             msg += '<is>';
                    //             msg += '<t>' + value + '</t>';
                    //             msg += '</is>';
                    //             msg += '</c>';
                    //         }
                    //         msg += '</row>';
                    //         return msg;
                    //     }
                    //
                    //
                    //     //insert
                    //     var r1 = Addrow(1, [{ key: 'E', value: "reportType" }]);
                    //     var r2 = Addrow(2, [ { key: 'E', value: "pdfHeaderDateRange" }]);
                    //     var r3 = Addrow(3, [{ key: 'B', value: "pdfMessage" }]);
                    //
                    //     sheet.childNodes[0].childNodes[1].innerHTML = r1 + r2 + r3 + sheet.childNodes[0].childNodes[1].innerHTML;
                    //
                    //
                    //     $('row c[r^="B6"]', sheet).attr('s', '48');
                    //     $('row c[r^="A6"]', sheet).attr('s', '48');
                    //
                    //     $('row c[r^="B3"]', sheet).attr('s', '48');
                    //     $('row c[r^="E1"]', sheet).attr('s', '48');
                    //     $('row c[r^="E2"]', sheet).attr('s', '48');
                    // }
                },
                {
                    name: 'csvHtml5',
                    extend: 'csvHtml5',
                    exportOptions: {
                        columns: function ( idx, data, node ) {
                            var $column = crud.table.column( idx );
                                return  ($column.visible() && $(node).attr('data-visible-in-export') != 'false') || $(node).attr('data-force-export') == 'true';
                        }
                    },
                    action: function(e, dt, button, config) {
                        crud.responsiveToggle(dt);
                        $.fn.DataTable.ext.buttons.csvHtml5.action.call(this, e, dt, button, config);
                        crud.responsiveToggle(dt);
                    }
                },
                {
                    name: 'pdfHtml5',
                    extend: 'pdfHtml5',
                    exportOptions: {
                        columns: function ( idx, data, node ) {
                            var $column = crud.table.column( idx );
                                return  ($column.visible() && $(node).attr('data-visible-in-export') != 'false') || $(node).attr('data-force-export') == 'true';
                        }
                    },
                    orientation: 'landscape',
                    action: function(e, dt, button, config) {
                        crud.responsiveToggle(dt);
                        $.fn.DataTable.ext.buttons.pdfHtml5.action.call(this, e, dt, button, config);
                        crud.responsiveToggle(dt);
                    }
                },
                {
                    name: 'print',
                    extend: 'print',
                    orientation: 'landscape',
                    title: '{{$crud->entity_name}}',
                    {{--title: function (){--}}
                    {{--    let datex = document.getElementById("daterangepicker-fromTo").value;--}}
                    {{--    return `--}}
                    {{--        <div style="font-size: 30px; text-transform: uppercase;">--}}
                    {{--            {{$crud->entity_name}} <br> ${datex}--}}
                    {{--            <br>--}}
                    {{--        </div> <br>--}}
                    {{--    `;--}}
                    {{--},--}}
                    exportOptions: {
                        columns: function ( idx, data, node ) {
                            var $column = crud.table.column( idx );
                                return  ($column.visible() && $(node).attr('data-visible-in-export') != 'false') || $(node).attr('data-force-export') == 'true';
                        }
                    },
                    action: function(e, dt, button, config) {
                        crud.responsiveToggle(dt);
                        $.fn.DataTable.ext.buttons.print.action.call(this, e, dt, button, config);
                        crud.responsiveToggle(dt);
                    },
                    // autoPrint: false,
                    customize: function ( win ) {
                        $(win.document.body)
                            .css({
                                'font-size': '10pt',
                            })
                            .prepend( function (){
                                let datex = document.getElementById("daterangepicker-fromTo").value;
                                return `
                                <div style="margin-top: 50px !important; ">
                                    <h5 style="float: left;
                                               font-size: 20px;
                                               text-transform: uppercase;">
                                                <div style="text-transform: uppercase;">
                                                   REKAP {{$crud->entity_name}} periode:<br> ${datex}
                                                </div><br>
                                    </h5>
                                    <h5 style="float: right;
                                               font-size: 20px;
                                               text-transform: uppercase;">
                                               <div style="text-transform: uppercase;" align="right">
                                                   kedutaan besar republik indonesia cairo <br>
                                                   fungsi konsuler dan protokol
                                               </div>
                                    </h5>
                                </div>
                                `
                                }
                            );

                        $(win.document.body).children("h1:first").remove();

                        $( win.document.body )
                            .addClass( 'kompek' )
                            .css( {
                                // color: '#FF0000',
                                'margin-top': '35px',
                                'margin-left': '50px',
                                'margin-right': '50px',
                                /* Etc CSS Styles..*/
                            } );
                    }
                }
            ]
        },
        {
            extend: 'colvis',
            text: '<i class="la la-eye-slash"></i> {{ trans('backpack::crud.export.column_visibility') }}',
            columns: function ( idx, data, node ) {
                return $(node).attr('data-visible-in-table') == 'false' && $(node).attr('data-can-be-visible-in-table') == 'true';
            },
            dropup: true
        }
    ];

    // move the datatable buttons in the top-right corner and make them smaller
    function moveExportButtonsToTopRight() {
      crud.table.buttons().each(function(button) {
        if (button.node.className.indexOf('buttons-columnVisibility') == -1 && button.node.nodeName=='BUTTON')
        {
          button.node.className = button.node.className + " btn-sm";
        }
      })
      $(".dt-buttons").appendTo($('#datatable_button_stack' ));
      $('.dt-buttons').addClass('d-xs-block')
                      .addClass('d-sm-inline-block')
                      .addClass('d-md-inline-block')
                      .addClass('d-lg-inline-block');
    }

    crud.addFunctionToDataTablesDrawEventQueue('moveExportButtonsToTopRight');
  </script>
@endif
