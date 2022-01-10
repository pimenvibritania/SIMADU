<form method="POST" action="{{url($crud->route . '/' . $entry->getKey() . '/approve' )}}">
    @csrf
    <button type="submit" class="btn btn-success">
        <i class="la la-check-double"></i>
        Terima
    </button>
    <a href="javascript:void(0)" onclick="decline(this)"
       data-route="{{ url($crud->route . '/' . $entry->getKey() . '/decline' ) }}"
       class="btn btn-danger" data-button-type="decline">
        <i class="la la-remove"></i>
        Tolak
    </a>
</form>

<script>
    if (typeof decline != 'function') {
        $("[data-button-type=decline]").unbind('click');

        function decline(button) {

            var button = $(button);
            var route = button.attr('data-route');

            $.ajax({
                url: route,
                type: 'POST',
                beforeSend:function(){
                    return confirm("Anda yakin ingin menolak user ini?");
                },
                success: function(result) {
                    // Show an alert with the result
                    console.log(result,route);
                    new Noty({
                        text: "Pengajuan user berhasil ditolak",
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
