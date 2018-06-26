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
                }
                
            });
        });
        
    }
    
    
    
    
    
    add = function(t) {console.log("add")};
    
    remove = function(id) {console.log("remove")};
    
    update = function(id,type,value) {
        $.ajax({
            url : 'controls/ajaxController.php',
            type : 'post',
            data : {
                update: value,
                projectId: $("#projectID").val(),
                nodeId: id,
                ajax: type + "NodeUpdate"
            },
            dataType : 'html',
            success : function(gna){
                /*Debug */
                $('body').before(gna);
            }
        });
    };     
});
        

function ajaxAddNode(t) {
    add(t);
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
    elem.focusout(function(e){
        var e = $(e.target);
        var value = e[0].value;
        var type = e.data('type');
        var child = e.parents('.tache').children('input[type=hidden]')[0];
        var id = child.value;
        update(id, type, value);
    });
}