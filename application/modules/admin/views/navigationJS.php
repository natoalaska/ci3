
<script>  
$(document).ready(function() {
    $('.sortable').nestedSortable({
        handle: 'div',
        items: 'li',
        toleranceElement: '> div',
        update: function() {
            console.log('added');
            if($('.sortable li').hasClass('ui-draggable') || $('.sortable li').hasClass('ui-draggable')) {
                console.log('from drop');
                $('.ui-draggable').attr('id', 'item_0');
                $('li').removeClass('ui-draggable');
                $('li').removeClass('ui-draggable-handle');
                $('li').addClass('ui-sortable-handle');
            }
            var serial=$(this).nestedSortable('serialize');
            save_list(serial);
        }
    })
    $('#sortable').sortable({
        connectWith: ".connect",
//         toleranceElement: '> div',
        receive: function() {
          if($('li').hasClass('ui-draggable') || $('li').hasClass('ui-draggable')) {
                $('.ui-draggable').attr('id', 'item_0');
                $('li').removeClass('ui-draggable');
                $('li').removeClass('ui-draggable-handle');
                $('li').addClass('ui-sortable-handle');
            }
            var serial=$(this).sortable('serialize');
            save_new(serial);
        }
//             var serial=$('#sortable').sortable('serialize');
//             save_list(serial);
//         }
    });
    
    
    $('#delete').droppable({
        tolerance: "pointer",
        revert: "invalid",
        accept: ".allowDrop",
        drop: function(event,ui) {
            var id = ui['helper'][0].id;
            id = id.replace('item_','');
            console.log(id);
            $.ajax({
               type: "POST",
               url: '<?php echo site_url("admin/delete/"); ?>' + id,
                success: function() {
                    create_list();
                        $('[name=title]').val('');
                        $('[name=title]').attr('id','');
                        $('[name=icon]').val('');
                        $('[name=icon]').attr('id','');
                        $('[name=link]').val('');
                        $('[name=link]').attr('id','');
                }
            });
        }
    })
    
    create_list();
    
    $('#draggable').draggable({
        connectToSortable: "#sortable",
        helper: "clone",
        revert: "invalid"
    });
    
    $('body').on('keyup', 'input', function() {
        var id = $(this).attr('id');
        id = id.replace('id_','');
        var value = $(this).val();
        var field = $(this).attr('name');
        
        $.ajax({
            type: "POST",
            dataType: "json",
            data: {"id": id, "value": value, "field": field},
            url: '<?php echo site_url('admin/updateOption/'); ?>',
//             url: '<?php echo site_url('admin/updateOption/'); ?>' + id + '/' + field + '/' + value,
            success: function() {
                create_list();
            }
        });
    })
    
    $('body').on('mousedown', '.list', function() {
        parent_id = $(this).attr('id');
        //parent_id = $(this).closest('li').attr('id');
        console.log(parent_id);
        parent_id = parent_id.replace("item_", "");
        $.ajax({
           type: "POST",
           dataType: "json",
           url: '<?php echo site_url('admin/createOptions/'); ?>' + parent_id,
           success: function(data) {
               if(data[0] != null) {
                   $.each(data, function($key, $value) {
                      $('[name="title"]').val($value.title);
                      $('[name="title"]').attr('id', 'id_'+$value.id);
                      $('[name="icon"]').val($value.icon);
                      $('[name="icon"]').attr('id', 'id_'+$value.id);
                      $('[name="slug"]').val($value.slug);
                      $('[name="slug"]').attr('id', 'id_'+$value.id);
                   });
               } else {
                   $('[name="title"]').val("");
                      $('[name="icon"]').val("");
                      $('[name="slug"]').val("");
               }
               
           }
        });
    })    
    
});

function create_list() {
    $.ajax({
        type: "POST",
        dataType: "json",
        url: '<?php echo site_url('admin/createList'); ?>',
        success: function(data) {
            $('#sortable').empty();
            $.each(data, function(key, value) {
                list = '';
                if(value.hasChild == 1) {
                    list += '<li id="item_'+ value.id +'" class="allowDrop">' +
                            '<div class="input-group" id="draggable">' +
                            '<span class="input-group-addon"><i class="fa fa-' + value.icon + ' fa-fw"></i></span>' +
                            '<input type="text" class="form-control list" id="item_'+value.id+'" value="' + value.title + '" readonly>' +
                            '</div>'+
                            "<ol></ol></li>";
                } else {
                    list += '<li id="item_'+value.id+'" class="allowDrop">' +
                            '<div class="input-group" id="draggable">' +
                            '<span class="input-group-addon"><i class="fa fa-' + value.icon + ' fa-fw"></i></span>' +
                            '<input type="text" class="form-control list" id="item_'+value.id+'" value="' + value.title + '" readonly>' +
                            '</div>'+
                            '</li>';
                }
                
                if (value.parent_id > 0) {
                    var parent = '#item_'+value.parent_id;
                    $(parent + " ol").append(list);
                } else {
                    $('#sortable').append(list);
                }
            });
        }
    });
}  

function save_list(serial) {
    $.ajax({
       type: "POST",
       url: '<?php echo site_url('admin/verifySort'); ?>',
       data: serial,
       success: function() {
           create_list();
       }
    });
}
    
function save_new(serial) {
    $.ajax({
       type: "POST",
       url: '<?php echo site_url('admin/saveNew'); ?>',
       data: serial,
       success: function() {
           create_list();
       }
    });
}

function get_parent_id() {
    var id = parent_id;
    return id;
}
</script>