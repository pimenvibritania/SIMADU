    <a href="javascript:void(0)" onclick="convert(this)"
       data-route="{{ url($crud->route . '/' . $entry->getKey() . '/approve' ) }}"
       class="btn btn-success" data-button-type="convert">
        <i class="la la-send-o act-ico"></i>
        Approve
    </a>

<script>
    if (typeof convert != 'function') {
        $("[data-button-type=convert]").unbind('click');

        function convert(button) {

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
                        text: "Log was deleted",
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
