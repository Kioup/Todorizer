$().ready(function(){
    
    var pn = $("#projectName");
    if (pn.length) {
        pn.focusout(function(){
            console.log($("#projectID").val());
            $.ajax({
                url : 'controls/ajaxController.php',
                type : 'post',
                data : {
                    name: $("#projectName").val(),
                    id_project: $("#projectID").val(),
                    ajax: "nameProjectUpdate"
                },
                dataType : 'html',
                success : function(gna){
                    /*Debug */
                    $('body').before(gna);
                    console.log(this.data);
                }
                
            });
        });
        
    }    
    
    add = function(t) {

        $.ajax({
            url : 'controls/ajaxController.php',
            type : 'post',
            data : {
                id_project: $("#projectID").val(),
                title: t,
                ajax: "addNode",
                id_parent: $("#nodeID").val()
            },
            dataType : 'html',
            success : function(gna){
                /*Debug */
                $('body').before(gna);
                console.log(this.data);
                var pos = gna.indexOf("_*_*_");
                var id = gna.slice(pos + 5).split(":");
                $('.tache').last().append("<input type='hidden' name='taskUpdate' value='"+id[0]+"'>");
                var href = "redirect.php?projectId=" + $("#projectID").val() + "&view=nodeList&nodePath="+id[1];
                $('.newNodeList').last().attr("href",href);
            }
        });
    };
    
    remove = function(id) {
        $.ajax({
            url : 'controls/ajaxController.php',
            type : 'post',
            data : {
                nodeId: id,
                ajax: "deleteNode",
                id_project: $("#projectID").val(),
            },
            dataType : 'html',
            success : function(gna){
                /* Debug */
                $('body').before(gna);
                console.log(this.data);
            }
        });
    };
    
    updateN = function(id,type,value) {
        console.log("ypo");
        console.log($("#projectID").val());
        $.ajax({
            url : 'controls/ajaxController.php',
            type : 'post',
            data : {
                value: value,
                id_project: $("#projectID").val(),
                nodeId: id,
                ajax: type + "NodeUpdate"
            },
            dataType : 'html',
            success : function(gna){
                /*Debug */
                $('body').before(gna);
                console.log(this.data);
            }
        });
    };
    
    progressUpdate = function (id, value) {
        $.ajax({
            url : 'controls/ajaxController.php',
            type : 'post',
            data : {
                setProgress: id,
                id_project: $("#projectID").val(),
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
    
    
});
        
function ajaxProgressNode(elem) {
    elem.click(function(e){
        var e = $(e.target);
        var val = e.prev().is(":checked") ? 0 : 10;
        var child = e.parents('.tache').children('input[type=hidden]')[0];
        var id = child.value;
        progressUpdate(id, val);
    }); 
}


function ajaxAddNode(t) {
    add(t);
}
function ajaxRemoveNode(elem) {
    elem.click(function(e){
        if (window.confirm("Êtes-vous sûr de vouloir supprimer cette tâche ?")) { 
            var e = $(e.target);
            var child = e.parents('.tache').children('.taskUpdate')[0];
            var id = child.value;
            remove(id);
            e.parents('.tache').remove();
        }
    });
}
function ajaxUpdateNode(elem) {
    elem.focusout(function(e){
        var e = $(e.target);
        var value = e[0].value;
        if (value != "") {
            var type = e.data('type');
            var child = e.parents('.tache').children('.taskUpdate')[0];
            var id = child.value;
            updateN(id, type, value);
        }
        
    });
}