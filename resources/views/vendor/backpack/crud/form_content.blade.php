<script src="https://code.jquery.com/jquery-2.2.4.min.js"
        integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
        crossorigin="anonymous"></script>

<input type="hidden" name="http_referrer" value={{ session('referrer_url_override') ?? old('http_referrer') ?? \URL::previous() ?? url($crud->route) }}>

{{-- See if we're using tabs --}}
@if ($crud->tabsEnabled() && count($crud->getTabs()))
    @include('crud::inc.show_tabbed_fields')
    <input type="hidden" name="current_tab" value="{{ Str::slug($crud->getTabs()[0]) }}" />
@else
  <div class="card" onload="getLoadedData()">
    <div class="card-body row">
      @include('crud::inc.show_fields', ['fields' => $crud->fields()])

{{--        START PNBP TRANSACTION--}}
      @if($crud->entity_name == 'pnbp')
        <div class="form-group col-sm-8" element="div">
            <label>Biaya</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">$</span>
                </div>
                <input type="text" readonly name="biaya" value="" class="form-control">
            </div>
        </div>
        <div class="form-group col-sm-4" element="div">
            <label>Kode Pnbp</label>
            <input type="text" readonly name="kode_pnbp" value="" class="form-control">
        </div>
        <input type="hidden" name="jenis_pnbp" value="" class="form-control">

            <script>

            $(function () {
                let initJenis = ($("#jenisPnbp").find("option").text());
                $.ajax({
                    url: "{{route('pnbp_ajax')}}",
                    type:"POST",
                    data:{
                        jenis:initJenis,
                        // _token: _token
                    },
                    success:function(response){
                        if(response) {
                            $('input[name=jenis_pnbp]').val(response.jenis);
                            $('input[name=biaya]').val(response.biaya);
                            $('input[name=kode_pnbp]').val(response.kode);

                        }
                    },
                });

                $("#jenisPnbp").change(function () {
                    let kode = $(this).find("option:selected").text();
                    // let _token   = $('meta[name="csrf-token"]').attr('content');
                    // alert("Selected Text: " + kode);
                    $.ajax({
                        url: "{{route('pnbp_ajax')}}",
                        type:"POST",
                        data:{
                            jenis:kode,
                            // _token: _token
                        },
                        success:function(response){
                            // console.log(response);
                            if(response) {
                                // $('.success').text(response.success);
                                $('input[name=jenis_pnbp]').val(response.jenis);
                                $('input[name=biaya]').val(response.biaya);
                                $('input[name=kode_pnbp]').val(response.kode);

                            }
                        },
                    });


                });
            });
          </script>
      @endif
{{--        END PNBP TRANSACTION--}}

{{--        START BIODATA--}}
        @if($crud->entity_name == 'biodata')
            <script>
                $(document).ready(function() {
                    $.ajax({
                        url: `{{route('wilayah.provinsi')}}` ,
                        type: 'get',
                        dataType: 'json',
                        success: function(response) {
                            let res = response.provinsi;
                            let provinsi = "<option disabled selected>-- Pilih Provinsi--</option>"
                            provinsi += res.map(function (data) {
                                return `<option id="${data.KODE_WILAYAH}" value="${data.NAMA}">${data.NAMA}</option>`
                            })

                            $('#prov_indo').append(provinsi)

                        }
                    })

                    $('#prov_indo').on('change', function () {
                        let prov_id = $(this).children("option:selected").attr('id');
                        $('#kota_indo').prop('disabled', false);

                        $.ajax({
                            url: `{{url('wilayah/kota')}}/${prov_id}`,
                            type: 'get',
                            dataType: 'json',
                            success: function(response) {
                                let res = response.kota;
                                let kota = "<option disabled selected>-- Pilih Kota/Kabupaten--</option>"
                                kota += res.map(function (data) {
                                    return `<option id="${data.KODE_WILAYAH}" value="${data.NAMA}">${data.NAMA}</option>`
                                })

                                $('#kota_indo')
                                    .find('option')
                                    .remove()
                                    .end()
                                    .append(kota)

                            }
                        })
                        $('#kec_indo').empty();
                        $('#desa_indo').empty();

                    })

                    $('#kota_indo').on('change', function (){
                        let kota_id = $(this).children("option:selected").attr('id');
                        $('#kec_indo').prop('disabled', false);

                        $.ajax({
                            url: `{{url('wilayah/kecamatan')}}/${kota_id}`,
                            type: 'get',
                            dataType: 'json',
                            success: function(response) {
                                let res = response.kecamatan;
                                let kecamatan = "<option disabled selected>-- Pilih Kecamatan--</option>"
                                kecamatan += res.map(function (data) {
                                    return `<option id="${data.KODE_WILAYAH}" value="${data.NAMA}">${data.NAMA}</option>`
                                })
                                $('#kec_indo')
                                    .find('option')
                                    .remove()
                                    .end()
                                    .append(kecamatan)
                            }
                        });
                        $('#desa_indo').empty();

                    })

                    $('#kec_indo').on('change', function (){
                        let kec_id = $(this).children("option:selected").attr('id');
                        $('#desa_indo').prop('disabled', false);

                        $.ajax({
                            url: `{{url('wilayah/desa')}}/${kec_id}`,
                            type: 'get',
                            dataType: 'json',
                            success: function(response) {
                                let res = response.desa;
                                let desa = "<option disabled selected>-- Pilih Desa --</option>"
                                desa += res.map(function (data) {
                                    return `<option id="${data.KODE_WILAYAH}" value="${data.NAMA}">${data.NAMA}</option>`
                                })

                                $('#desa_indo')
                                    .find('option')
                                    .remove()
                                    .end()
                                    .append(desa)

                            }
                        })
                    })

                    $.ajax({
                        url: `{{route('wilayah.mesir_prov')}}` ,
                        type: 'get',
                        dataType: 'json',
                        success: function(response) {
                            let res = response.prov_mesir;
                            let provinsi = "<option disabled selected>-- Pilih Provinsi--</option>"
                            provinsi += res.map(function (data) {
                                return `<option gov-id="${data.id}" value="${data.name_en}">${data.name_en} - ${data.name_ar}</option>`
                            })

                            $('#prov_mesir').append(provinsi)

                        }
                    })

                    $('#prov_mesir').on('change', function (){
                        let prov_id = $(this).children("option:selected").attr('gov-id');
                        $('#kota_mesir').prop('disabled', false);

                        $.ajax({
                            url: `{{url('wilayah/mesir_city')}}/${prov_id}`,
                            type: 'get',
                            dataType: 'json',
                            success: function(response) {
                                let res = response.kota_mesir;
                                let kota = "<option disabled selected>-- Pilih Kota --</option>"
                                kota += res.map(function (data) {
                                    return `<option value="${data.name_en}">${data.name_en} - ${data.name_ar}</option>`
                                })

                                $('#kota_mesir')
                                    .find('option')
                                    .remove()
                                    .end()
                                    .append(kota)

                            }
                        })
                    })


                });
            </script>
        @endif
        {{--END BIODATA--}}

{{--        START MASUK KULIAH--}}
        @if(
        $crud->entity_name == 'daftar-pendidikan' ||
        $crud->entity_name == 'kuliahiftha' ||
        $crud->entity_name == 'pendidikanmesir')
            <script>
                $(document).ready(function() {
                    $.ajax({
                        url: `{{route('jenjang.all')}}` ,
                        type: 'get',
                        dataType: 'json',
                        success: function(response) {
                            let res = response.jenjang;
                            let jenjang = "<option disabled selected>-- Pilih Jenjang--</option>"
                            jenjang += res.map(function (data) {
                                return `<option id="${data.id}" value="${data.id}">${data.name_en}</option>`
                            })

                            $('#jenjang_attr').append(jenjang)


                        }
                    })

                    $('#jenjang_attr').on('change', function () {
                        let jenjangID = $(this).children("option:selected").attr('id');
                        $('#fakultas_attr').prop('disabled', false)

                        $.ajax({
                            url: `{{route('fakultas.all')}}`,
                            type: 'get',
                            data: {},
                            dataType: 'json',
                            success: function(response) {
                                let res = response.fakultas;
                                let fakultas = "<option disabled selected>-- Pilih Fakultas--</option>"
                                fakultas += res.map(function (data) {
                                    return `<option id="${data.id}" value="${data.id}">${data.name_en}</option>`
                                })
                                $('#fakultas_attr')
                                    .find('option')
                                    .remove()
                                    .end()
                                    .append(fakultas)
                            }

                        });

                        $("#jenjang_attr").attr("jenjangID", jenjangID );

                        $('#jurusan_attr').empty();

                    })

                    $('#fakultas_attr').on('change', function (){
                        let fakID = $(this).children("option:selected").attr('id');
                        $('#jurusan_attr').prop('disabled', false);
                        let jenjangID = $("#jenjang_attr").attr("jenjangID")
                        $.ajax({
                            url: `{{route('jurusan.all')}}`,
                            type: 'post',
                            data: {
                                'fakultas'  : fakID,
                                'jenjang'   : jenjangID
                            },
                            dataType: 'json',
                            success: function(response) {
                                let res = response.jurusan;
                                let jurusan = "<option disabled selected>-- Pilih Jurusan--</option>"
                                jurusan += res.map(function (data) {
                                    return `<option id="${data.id}" value="${data.id}">${data.name_en}</option>`
                                })
                                console.log(jurusan)

                                $('#jurusan_attr')
                                    .find('option')
                                    .remove()
                                    .end()
                                    .append(jurusan)
                            }
                        });
                    })
                });
            </script>
        @endif
{{--       END MASUK KULIAH--}}

        <script>
            if ($("#userID").length != 0) {
                $(function () {
                    let userID = ($("#userID").val());
                    $.ajax({
                        url: "{{route('emailAjax')}}",
                        type:"POST",
                        data:{
                            userID:userID,
                            // _token: _token
                        },
                        success:function(response){
                            if(response) {
                                $('input[id=emailUser]').val(response);
                            }
                        },
                    });

                    $("#userID").change(function () {
                        let userID = $(this).val();

                        $.ajax({
                            url: "{{route('emailAjax')}}",
                            type:"POST",
                            data:{
                                userID:userID,
                                // _token: _token
                            },
                            success:function(response){
                                if(response) {
                                    $('input[id=emailUser]').val(response);
                                }
                            },
                        });

                    });
                });

            }
        </script>

    </div>
  </div>
@endif


{{-- Define blade stacks so css and js can be pushed from the fields to these sections. --}}

@section('after_styles')
    <link rel="stylesheet" href="{{ asset('packages/backpack/crud/css/crud.css').'?v='.config('backpack.base.cachebusting_string') }}">
    <link rel="stylesheet" href="{{ asset('packages/backpack/crud/css/form.css').'?v='.config('backpack.base.cachebusting_string') }}">
    <link rel="stylesheet" href="{{ asset('packages/backpack/crud/css/'.$action.'.css').'?v='.config('backpack.base.cachebusting_string') }}">

    <!-- CRUD FORM CONTENT - crud_fields_styles stack -->
    @stack('crud_fields_styles')
@endsection

@section('after_scripts')
    <script src="{{ asset('packages/backpack/crud/js/crud.js').'?v='.config('backpack.base.cachebusting_string') }}"></script>
    <script src="{{ asset('packages/backpack/crud/js/form.js').'?v='.config('backpack.base.cachebusting_string') }}"></script>
    <script src="{{ asset('packages/backpack/crud/js/'.$action.'.js').'?v='.config('backpack.base.cachebusting_string') }}"></script>

    <!-- CRUD FORM CONTENT - crud_fields_scripts stack -->
    @stack('crud_fields_scripts')

    <script>
    function initializeFieldsWithJavascript(container) {
      var selector;
      if (container instanceof jQuery) {
        selector = container;
      } else {
        selector = $(container);
      }
      selector.find("[data-init-function]").not("[data-initialized=true]").each(function () {
        var element = $(this);
        var functionName = element.data('init-function');

        if (typeof window[functionName] === "function") {
          window[functionName](element);

          // mark the element as initialized, so that its function is never called again
          element.attr('data-initialized', 'true');
        }
      });
    }

    jQuery('document').ready(function($){

      // trigger the javascript for all fields that have their js defined in a separate method
      initializeFieldsWithJavascript('form');


      // Save button has multiple actions: save and exit, save and edit, save and new
      var saveActions = $('#saveActions'),
      crudForm        = saveActions.parents('form'),
      saveActionField = $('[name="save_action"]');

      saveActions.on('click', '.dropdown-menu a', function(){
          var saveAction = $(this).data('value');
          saveActionField.val( saveAction );
          crudForm.submit();
      });

      // Ctrl+S and Cmd+S trigger Save button click
      $(document).keydown(function(e) {
          if ((e.which == '115' || e.which == '83' ) && (e.ctrlKey || e.metaKey))
          {
              e.preventDefault();
              $("button[type=submit]").trigger('click');
              return false;
          }
          return true;
      });

      // prevent duplicate entries on double-clicking the submit form
      crudForm.submit(function (event) {
        $("button[type=submit]").prop('disabled', true);
      });

      // Place the focus on the first element in the form
      @if( $crud->getAutoFocusOnFirstField() )
        @php
          $focusField = Arr::first($fields, function($field) {
              return isset($field['auto_focus']) && $field['auto_focus'] == true;
          });
        @endphp

        @if ($focusField)
          @php
            $focusFieldName = isset($focusField['value']) && is_iterable($focusField['value']) ? $focusField['name'] . '[]' : $focusField['name'];
          @endphp
          window.focusField = $('[name="{{ $focusFieldName }}"]').eq(0),
        @else
          var focusField = $('form').find('input, textarea, select').not('[type="hidden"]').eq(0),
        @endif

        fieldOffset = focusField.offset().top,
        scrollTolerance = $(window).height() / 2;

        focusField.trigger('focus');

        if( fieldOffset > scrollTolerance ){
            $('html, body').animate({scrollTop: (fieldOffset - 30)});
        }
      @endif

      // Add inline errors to the DOM
      @if ($crud->inlineErrorsEnabled() && $errors->any())

        window.errors = {!! json_encode($errors->messages()) !!};
        // console.error(window.errors);

        $.each(errors, function(property, messages){

            var normalizedProperty = property.split('.').map(function(item, index){
                    return index === 0 ? item : '['+item+']';
                }).join('');

            var field = $('[name="' + normalizedProperty + '[]"]').length ?
                        $('[name="' + normalizedProperty + '[]"]') :
                        $('[name="' + normalizedProperty + '"]'),
                        container = field.parents('.form-group');

            container.addClass('text-danger');
            container.children('input, textarea, select').addClass('is-invalid');

            $.each(messages, function(key, msg){
                // highlight the input that errored
                var row = $('<div class="invalid-feedback d-block">' + msg + '</div>');
                row.appendTo(container);

                // highlight its parent tab
                @if ($crud->tabsEnabled())
                var tab_id = $(container).closest('[role="tabpanel"]').attr('id');
                $("#form_tabs [aria-controls="+tab_id+"]").addClass('text-danger');
                @endif
            });
        });

      @endif

      $("a[data-toggle='tab']").click(function(){
          currentTabName = $(this).attr('tab_name');
          $("input[name='current_tab']").val(currentTabName);
      });

      if (window.location.hash) {
          $("input[name='current_tab']").val(window.location.hash.substr(1));
      }

      });
    </script>
@endsection
