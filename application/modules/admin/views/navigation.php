<style>
    ol.sortable, ul#drag { list-style-type: none; margin: 0; padding: 0; margin-bottom: 10px; }
/*     ol#sortable>li, ol#drag>li { margin: 5px; height: 30px; border-radius: 5px} */
    ol.sortable ol {list-style-type: none;}
    .center {margin: auto; text-align: center; vertical-align: middle;}
    
</style>


<div class="row">
    <h1 class="page-header">
        Navigation
    </h1>
    <div class="col-lg-3">
        
        <div class="well">
            <ul id="drag">
                <li id="draggable">
                    <div class="input-group">
                        <span class="input-group-addon"></span>
                        <input type="text" class="form-control list" value="New Item" readonly>
                    </div>
                </li>
            </ul>
        </div>
        <div class="well options">
            <div class="input-group options">
                <label for="">Title</label>
                <input class='form-control' name='title'>
            </div>
            <div class="input-group options">
                <label for="">Icon</label>
                <input class='form-control' name='icon'>
            </div>
            <div class="input-group options">
                <label for="">Link</label>
                <input class='form-control' name='slug'>
            </div>
        </div>
        <div class="well" id="delete">
            <div class="center"><i class="fa fa-trash fa-4x"></i></div>
        </div>
    </div>
    <div class="col-lg-9 right">
        <div class="well">
            <ol id="sortable" class="sortable">
            </ol>
        </div>
    </div>
</div>

