@if($entry->status == 'new')
    <a href="javascript:void(0)" onclick="decline(this)"
       data-route="{{ url($crud->route . '/' . $entry->getKey() . '/decline' ) }}"
       class="btn btn-danger" data-button-type="decline">
        <i class="la la-remove"></i>
        Decline
    </a>

    <a href="javascript:void(0)" onclick="approve(this)"
       data-route="{{ url($crud->route . '/' . $entry->getKey() . '/approve' ) }}"
       class="btn btn-success" data-button-type="approve">
        <i class="la la-check"></i>
        Approve
    </a>

@endif

@if($entry->status == 'approved')
    <a href="{{url($crud->route . '/' . $entry->getKey() . '/print')}}" class="btn btn-primary" style="width: 200px">
        <i class="la la-print "></i>
        Print
    </a>

@endif



<script>
    if (typeof approve != 'function') {
        $("[data-button-type=approve]").unbind('click');

        function approve(button) {

            var button = $(button);
            var route = button.attr('data-route');

            $.ajax({
                url: route,
                type: 'POST',
                beforeSend:function(){
                    return confirm("Are you sure to approve?");
                },
                success: function(result) {
                    // Show an alert with the result
                    console.log(result,route);
                    new Noty({
                        text: "Izin tinggal disetujui",
                        type: "success"
                    }).show();

                    // Hide the modal, if any
                    $('.modal').modal('hide');

                    crud.table.ajax.reload();
                },
                error: function(result) {
                    // Show an alert with the result
                    new Noty({
                        text: "The new entry could not be created. Please try again.",
                        type: "warning"
                    }).show();

                    console.log(result);
                }
            });
        }
    }

    if (typeof decline != 'function') {
        $("[data-button-type=decline]").unbind('click');

        function decline(button) {

            var button = $(button);
            var route = button.attr('data-route');

            $.ajax({
                url: route,
                type: 'POST',
                beforeSend:function(){
                    return confirm("Are you sure to decline?");
                },
                success: function(result) {
                    // Show an alert with the result
                    console.log(result,route);
                    new Noty({
                        text: "Izin tinggal berhasil di tolak",
                        type: "success"
                    }).show();

                    // Hide the modal, if any
                    $('.modal').modal('hide');

                    crud.table.ajax.reload();
                },
                error: function(result) {
                    // Show an alert with the result
                    new Noty({
                        text: "The new entry could not be created. Please try again.",
                        type: "warning"
                    }).show();

                    console.log(result);
                }
            });
        }
    }

</script>
