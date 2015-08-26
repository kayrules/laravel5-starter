$(document).ready(function() {

	$('#datatable').dataTable({
        stateSave: true,
        "lengthMenu": [[50, 100, 200, -1], [50, 100, 200, "All"]]
    });

});