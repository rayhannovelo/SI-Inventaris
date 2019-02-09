            <div class="footer">
                <div class="pull-right">
                    <strong>{elapsed_time} detik</strong>
                </div>
                <div>
                    <strong>Copyright</strong> Sistem Informasi Inventaris © 2018
                </div>
            </div>

        </div>
    </div>

    <!-- Root element of PhotoSwipe. Must have class pswp. -->
    <div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">

        <!-- Background of PhotoSwipe. 
             It's a separate element as animating opacity is faster than rgba(). -->
        <div class="pswp__bg"></div>

        <!-- Slides wrapper with overflow:hidden. -->
        <div class="pswp__scroll-wrap">

            <!-- Container that holds slides. 
                PhotoSwipe keeps only 3 of them in the DOM to save memory.
                Don't modify these 3 pswp__item elements, data is added later on. -->
            <div class="pswp__container">
                <div class="pswp__item"></div>
                <div class="pswp__item"></div>
                <div class="pswp__item"></div>
            </div>

            <!-- Default (PhotoSwipeUI_Default) interface on top of sliding area. Can be changed. -->
            <div class="pswp__ui pswp__ui--hidden">

                <div class="pswp__top-bar">

                    <!--  Controls are self-explanatory. Order can be changed. -->

                    <div class="pswp__counter"></div>

                    <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>

                    <button class="pswp__button pswp__button--share" title="Share"></button>

                    <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>

                    <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>

                    <!-- Preloader demo http://codepen.io/dimsemenov/pen/yyBWoR -->
                    <!-- element will get class pswp__preloader->active when preloader is running -->
                    <div class="pswp__preloader">
                        <div class="pswp__preloader__icn">
                          <div class="pswp__preloader__cut">
                            <div class="pswp__preloader__donut"></div>
                          </div>
                        </div>
                    </div>
                </div>

                <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                    <div class="pswp__share-tooltip"></div> 
                </div>

                <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)">
                </button>

                <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)">
                </button>

                <div class="pswp__caption">
                    <div class="pswp__caption__center"></div>
                </div>

            </div>

        </div>

    </div>

    <!-- Mainly scripts -->
    <script src="<?php echo base_url('assets/js/jquery-2.1.1.js')?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap.min.js')?>"></script>
    <script src="<?php echo base_url('assets/js/plugins/metisMenu/jquery.metisMenu.js')?>"></script>
    <script src="<?php echo base_url('assets/js/plugins/slimscroll/jquery.slimscroll.min.js')?>"></script>
    <script src="<?php echo base_url('assets/js/plugins/dataTables/datatables.min.js')?>"></script>

    <!-- Custom and plugin javascript -->
    <script src="<?php echo base_url('assets/js/inspinia.js')?>"></script>
    <script src="<?php echo base_url('assets/js/plugins/pace/pace.min.js')?>"></script>
    <script src="<?php echo base_url('assets/js/plugins/jsKnob/jquery.knob.js')?>"></script>
    <script src="<?php echo base_url('assets/js/plugins/datapicker/bootstrap-datepicker.js')?>"></script>
    <script src="<?php echo base_url('assets/js/plugins/jasny/jasny-bootstrap.min.js')?>" rel="stylesheet"></script>

    <!-- Core Photo Swipe JS file -->
    <script src='<?php echo base_url(); ?>assets/js/plugins/photoswipe/photoswipe.min.js'></script>
    <script src='<?php echo base_url(); ?>assets/js/plugins/photoswipe/photoswipe-ui-default.min.js'></script> 
    <script src="<?php echo base_url(); ?>assets/js/plugins/photoswipe/index.js"></script>

    <!-- Flot -->
    <script src="<?php echo base_url('assets/js/plugins/flot/jquery.flot.js')?>"></script>
    <script src="<?php echo base_url('assets/js/plugins/flot/jquery.flot.tooltip.min.js')?>"></script>
    <script src="<?php echo base_url('assets/js/plugins/flot/jquery.flot.resize.js')?>"></script>

    <!-- SUMMERNOTE -->
    <script src="<?php echo base_url('assets/js/plugins/summernote/summernote.min.js')?>"></script>

    <!-- Page-Level Scripts -->
    <script>
        $(document).ready(function() {
            $('#summernote').summernote({
                toolbar: [
                    // [groupName, [list of button]]
                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']]
                ]
            });

            $('table#mytable').DataTable();

            $('#laporan_inventaris').DataTable({
                initComplete: function () {
                    this.api().columns().every( function () {
                        var column = this;
                        var select = $('<select><option value=""></option></select>')
                            .appendTo( $(column.footer()).empty() )
                            .on( 'change', function () {
                                var val = $.fn.dataTable.util.escapeRegex(
                                    $(this).val()
                                );
         
                                column
                                    .search( val ? '^'+val+'$' : '', true, false )
                                    .draw();
                            } );
         
                        column.data().unique().sort().each( function ( d, j ) {
                            select.append( '<option value="'+d+'">'+d+'</option>' )
                        } );
                    } );
                },
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [
                        {
                          extend: 'excel', 
                          title: 'Laporan Inventaris',
                          exportOptions: {
                            columns: [0,1,2,3,4,5,6]
                          }
                        },
                        {
                          extend: 'pdf', 
                          title: 'Laporan Inventaris',
                          exportOptions: {
                            columns: [0,1,2,3,4,5,6]
                          },
                          customize: function (doc) {
                            doc.content[1].table.widths = 
                                Array(doc.content[1].table.body[0].length + 1).join('*').split('');
                            }
                        },
                        {
                          extend: 'print',
                          title: '<center>Laporan Inventaris</center>',
                          exportOptions: {
                            columns: [0,1,2,3,4,5,6]
                          },
                          customize: function (win){
                            $(win.document.body)
                                .css( 'font-size', '10pt' )
                                .css( 'background-color', 'white')
         
                            $(win.document.body).find( 'table' )
                                .addClass( 'compact' )
                                .css( 'font-size', 'inherit' );

                          }
                        }
                    ]

            });

            $('#laporan_opname').DataTable({
                "pageLength": 50,
                "order": [0, "asc"],
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [
                        {
                          extend: 'excel', 
                          title: 'Laporan Stok Opname',
                          exportOptions: {
                            columns: [0,1,2,3,4,5]
                          }
                        },
                        {
                          extend: 'pdf', 
                          title: 'Laporan Stok Opname',
                          exportOptions: {
                            columns: [0,1,2,3,4,5]
                          },
                          customize: function (doc) {
                            doc.content[1].table.widths = 
                                Array(doc.content[1].table.body[0].length + 1).join('*').split('');
                            }
                        },
                        {
                          extend: 'print',
                          title: '<center>Laporan Stok Opname</center>',
                          exportOptions: {
                            columns: [0,1,2,3,4,5]
                          },
                          customize: function (win){
                            $(win.document.body)
                                .css( 'font-size', '10pt' )
                                .css( 'background-color', 'white')
         
                            $(win.document.body).find( 'table' )
                                .addClass( 'compact' )
                                .css( 'font-size', 'inherit' );

                          }
                        }
                    ]

            });

            $('#laporan_perbaikan').DataTable({
                "pageLength": 50,
                "order": [0, "asc"],
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [
                        {
                          extend: 'excel', 
                          title: 'Laporan Perbaikan',
                          exportOptions: {
                            columns: [0,1,2,3]
                          }
                        },
                        {
                          extend: 'pdf', 
                          title: 'Laporan Perbaikan',
                                      alignment:'center',
                          exportOptions: {
                            columns: [0,1,2,3]
                          },
                          customize: function (doc) {
                            doc.content[1].table.widths = 
                                Array(doc.content[1].table.body[0].length + 1).join('*').split('');
                            }
                        },
                        {
                          extend: 'print',
                          title: '<center>Laporan Perbaikan</center>',
                          exportOptions: {
                            columns: [0,1,2,3]
                          },
                          customize: function (win){
                            $(win.document.body)
                                .css( 'font-size', '10pt' )
                                .css( 'background-color', 'white')
         
                            $(win.document.body).find( 'table' )
                                .addClass( 'compact' )
                                .css( 'font-size', 'inherit' );
                            
                          }
                        }
                    ]

            });

            $('#laporan_mutasi').DataTable({
                "pageLength": 50,
                "order": [0, "asc"],
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [
                        {
                          extend: 'excel', 
                          title: 'Laporan Mutasi',
                          exportOptions: {
                            columns: [0,1,2,3,4,5]
                          }
                        },
                        {
                          extend: 'pdf', 
                          title: 'Laporan Mutasi',
                          exportOptions: {
                            columns: [0,1,2,3,4,5]
                          },
                          customize: function (doc) {
                            doc.content[1].table.widths = 
                                Array(doc.content[1].table.body[0].length + 1).join('*').split('');
                            }
                        },
                        {
                          extend: 'print',
                          title: '<center>Laporan Mutasi</center>',
                          exportOptions: {
                            columns: [0,1,2,3,4,5]
                          },
                          customize: function (win){
                            $(win.document.body)
                                .css( 'font-size', '10pt' )
                                .css( 'background-color', 'white')
         
                            $(win.document.body).find( 'table' )
                                .addClass( 'compact' )
                                .css( 'font-size', 'inherit' );

                          }
                        }
                    ]

            });

            $('#laporan_permintaan').DataTable({
                "pageLength": 50,
                "order": [0, "asc"],
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [
                        {
                          extend: 'excel', 
                          title: 'Laporan Permintaan',
                          exportOptions: {
                            columns: [0,1,2,3]
                          }
                        },
                        {
                          extend: 'pdf', 
                          title: 'Laporan Permintaan',
                                      alignment:'center',
                          exportOptions: {
                            columns: [0,1,2,3]
                          },
                          customize: function (doc) {
                            doc.content[1].table.widths = 
                                Array(doc.content[1].table.body[0].length + 1).join('*').split('');
                            }
                        },
                        {
                          extend: 'print',
                          title: '<center>Laporan Permintaan</center>',
                          exportOptions: {
                            columns: [0,1,2,3]
                          },
                          customize: function (win){
                            $(win.document.body)
                                .css( 'font-size', '10pt' )
                                .css( 'background-color', 'white')
         
                            $(win.document.body).find( 'table' )
                                .addClass( 'compact' )
                                .css( 'font-size', 'inherit' );
                            
                          }
                        }
                    ]

            });
        });
    </script>

</body>

</html>