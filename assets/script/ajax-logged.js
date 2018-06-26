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
                    projectId: $("#projectID").val(),
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
        console.log($("#projectRoot").val());
        console.log(t);
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
                ajax: "deleteNode"
            },
            dataType : 'html',
            success : function(gna){
                /* Debug */
                $('body').before(gna);
                console.log(this.data);
            }
        });
    };
    
    update = function(id,type,value) {
        $.ajax({
            url : 'controls/ajaxController.php',
            type : 'post',
            data : {
                value: value,
                projectId: $("#projectID").val(),
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
});
        

function ajaxAddNode(t) {
    add(t);
}
function ajaxRemoveNode(elem) {
    elem.click(function(e){
        console.log(e);
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
    elem.focusout(function(e){
        var e = $(e.target);
        console.log(e);
        var value = e[0].value;
        var type = e.data('type');
        console.log(e.parents('.tache'));
        console.log(e.parents('.tache').children('input[type=hidden]'));
        var child = e.parents('.tache').children('input[type=hidden]')[0];
        var id = child.value;
        update(id, type, value);
    });
}