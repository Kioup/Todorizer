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
    
    progressUpdate = function (id, value) {
        console.log(id);
        
        
        $.ajax({
            url : 'controls/loggoutController.php',
            type : 'post',
            data : {
                setProgress: id,
                progress: value,
                ajax: true
            },
            dataType : 'html',
            success : function(gna){
                /* Debug */
                $('body').before(gna);
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
    
    updateN = function(id,type,value) {
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
function ajaxProgressNode(elem) {
    elem.click(function(e){
        var e = $(e.target);
        var val = e.prev().is(":checked") ? 0 : 10;
        var child = e.parents('.tache').children('input[type=hidden]')[0];
        var id = child.value;
        progressUpdate(id, val);
    }); 
}
function ajaxRemoveNode(elem) {
    elem.click(function(e){
        if (window.confirm("Êtes-vous sûr de vouloir supprimer cette tâche ?")) { 
            var e = $(e.target);
            var child = e.parents('.tache').children('input[type=hidden]')[0];
            var id = child.value;
            remove(id);
            e.parents('.tache').remove();
        }
    });
}
function ajaxUpdateNode(elem) {
    elem.on('keyup',function(e){
        var e = $(e.target);
        var value = e[0].value;
        var type = e.data('type');
        var child = e.parents('.tache').children('input[type=hidden]')[0];
        var id = child.value;
        updateN(id, type, value);
    });
}
