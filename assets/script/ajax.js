$().ready(function(){

    var pn = $("#projectName");
    if (pn.length) {
        pn.on('keyup',function(){
            $.ajax({
                url : 'controls/loggoutController.php',
                type : 'post',
                data : {
                    name: $("#projectName").val(),
                    ajax: true
                },
                dataType : 'html',
                success : function(gna){
                    /*Debug */
                    //$('body').before(gna);
                }
            });
        });
    }
    
    add = function(t) {
        $.ajax({
            url : 'controls/loggoutController.php',
            type : 'post',
            data : {
                title: t,
                ajax: true
            },
            dataType : 'html',
            success : function(gna){
                /* Debug */
                //$('body').before(gna);
                var pos = gna.indexOf("_*_*_");
                var id = gna.slice(pos + 5);
                $('.tache').last().append("<input type='hidden' name='taskUpdate' value='"+id+"'>");
            }
        }); 
    }
    
    remove = function(id) {
        $.ajax({
            url : 'controls/loggoutController.php',
            type : 'post',
            data : {
                id_to_remove: id,
                ajax: true
            },
            dataType : 'html',
            success : function(gna){
                /* Debug */
                //$('body').before(gna);
            }
        });
    }
    
    update = function(id,type,value) {
        var data = {
            taskUpdate: id,
            ajax: true
        };
        data[type] = value;        
        
        $.ajax({
            url : 'controls/loggoutController.php',
            type : 'post',
            data : data,
            dataType : 'html',
            success : function(gna){
                /* Debug */
                //$('body').before(gna);
            }
        }); 
    }
    
    
}),(jQuery);



function ajaxAddNode(t) {
    add(t);
}
function ajaxRemoveNode(elem) {
    elem.click(function(e){
        var e = $(e.target);
        var child = e.parents('.tache').children('input[type=hidden]')[0];
        var id = child.value;
        remove(id);
    });
}
function ajaxUpdateNode(elem) {
    elem.on('keyup',function(e){
        var e = $(e.target);
        var value = e[0].value;
        var type = e.data('type');
        var child = e.parents('.tache').children('input[type=hidden]')[0];
        var id = child.value;
        update(id, type, value);
    });
}
