<script>
var save_method;
var table;

$(document).ready(function(){
    table = $('#table').DataTable({ 
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('datatables/ajax_list/'.$module.'/'.$model)?>",
            "type": "POST"
        },

        //Set column definition initialisation properties.
        "columnDefs": [
        { 
            "targets": [ -1 ], //last column
            "orderable": false, //set not orderable
        },
        ],
    });

    $('#datetimepicker').datetimepicker({
        format: 'YYYY-MM-DD HH:mm:ss'
    });
    
    
    $('#datepicker').datetimepicker({
        format: 'YYYY-MM-DD'
    });
});

function create_modal(type,id=null) {
    save_method = type;
    editable = true;
    disabled = false;

    if (type == 'view') {
        var editable = false;
        var disabled = true;
    }

    $('#form')[0].reset();
    $('#btnSave').attr('disabled', disabled);
    $('.form-group').removeClass('has-error');
    $('.form-control').attr('disabled', disabled);
    if(tinymce.editors.length > 0) {
        tinymce.activeEditor.getBody().setAttribute('contenteditable', editable);
    }
    $('.help-block').empty();

    if (type == 'view' || type == 'edit') {
        $.ajax({
            url: "<?php echo site_url('datatables/ajax_edit/'.$module.'/'.$model); ?>/" + id,
            type: "GET",
            dataType: "JSON",
            success: function(data) {
                data = data[0];
                $.each(data,function(index,value) {
                    if(index == 'content') {
                        var content = tinyMCE.get('content');
                        if (content != null) {
                            content.setContent(value);
                        }
                    } else if(index == 'blurb') {
                        var blurb = tinyMCE.get('blurb');
                        blurb.setContent(value);
                    } else if(index == 'password') {
                        $('[name="'+index+'"]').val();
                    } else if($('[name="'+index+'"]')[0] != null && $('[name="'+index+'"]')[0].localName == 'select') {
                        $('[name="'+index+'"]').val(value);
                    } else {
//                         console.log(index + ' ' + $('[name="'+index+'"]')[0]);
                        var newValue = $('[name="'+index+'"]').html(value).text();
                        $('[name="'+index+'"]').val(newValue);
                    }
                })
                $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
                $('.modal-title').text(type); // Set title to Bootstrap modal title
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error getting data from ajax');
            }
        });
    } else {
        $('#modal_form').modal('show');
        $('.modal-title').text(type);
    }
    $('.modal-title').css('text-transform','capitalize');
}

function reload_table() {
    table.ajax.reload(null,false);
}

function save() {
    $('#btnSave').text('saving...');
    $('#btnSave').attr('disable',true);
    var url;
    if(save_method == 'add') {
        url = "<?php echo site_url('datatables/ajax_add/'.$module.'/'.$model); ?>";
    } else {
        url = "<?php echo site_url('datatables/ajax_update/'.$module.'/'.$model); ?>";
    }

    var data = $('#form').serialize();
    if(tinymce.editors.length > 0) {
        var editors = tinyMCE.get();
        $.each(editors,function(key,value) {
            data = data.replace(value.id+"=",value.id+"="+value.getContent());
        });
    }

    $.ajax({
        url: url,
        type: "POST",
        data: data,
        dataType: "JSON",
        success: function (data) {
            if(data.status) {
                $('#modal_form').modal('hide');
                reload_table();
            }

            $('#btnSave').text('Save');
            $('#btnSave').attr('disabled',true);
        },
        error: function(jqXHR, textStatus, errorThrown) {
            alert('Error adding / updating data');
            $('#btnSave').text('Save');
            $('#btnSave').attr('disabled',true);
        }
    });
}

function delete_record(id) {
    if(confirm('Are you sure you want to delete?')) {
        $.ajax({
            url: "<?php echo site_url('datatables/ajax_delete/'.$module.'/'.$model);?>/"+id,
            type: "POST",
            dataType: "JSON",
            success: function (data) {
                $('#modal_form').modal('hide');
                reload_table();
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error deleting data');
            }
        });
    }
}
</script>