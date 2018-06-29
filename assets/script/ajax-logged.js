$().ready(function(){
    
    //Name project update
    var pn = $("#projectName");
    if (pn.length) {
        pn.focusout(function(){
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
                    //$('body').before(gna);
                    //console.log(this.data);
                }
                
            });
        });
        
    }    
    
    //New node
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
                //$('body').before(gna);
                //console.log(this.data);
                
                //New nodePath (href to link node)
                var pos = gna.indexOf("_*_*_");
                var id = gna.slice(pos + 5).split(":");
                $('.tache').last().append("<input type='hidden' name='taskUpdate' value='"+id[0]+"'>");
                var href = "redirect.php?projectId=" + $("#projectID").val() + "&view=nodeList&nodePath="+id[1];
                $('.newNodeList').last().attr("href",href);
            }
        });
    };
    
    //Delete node
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
                //$('body').before(gna);
                //console.log(this.data);
            }
        });
    };
    
    //Update node
    updateN = function(id,type,value) {
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
                //$('body').before(gna);
                //console.log(this.data);
            }
        });
    };
    
    //Checker node
    progressUpdate = function (id, value) {
        $.ajax({
            url : 'controls/ajaxController.php',
            type : 'post',
            data : {
                id_node: id,
                id_project: $("#projectID").val(),
                progress: value,
                ajax: 'checkNode'
            },
            dataType : 'html',
            success : function(gna){
                /* Debug */
                //$('body').before(gna);
                //console.log(this.data);
            }
        });
    };

    //Update project description
    projectDesc = function (value) {
        $.ajax({
            url : 'controls/ajaxController.php',
            type : 'post',
            data : {
                id_project: $("#projectID").val(),
                description: value,
                ajax: "descProject"
            },
            dataType : 'html',
            success : function(gna){
                /* Debug */
                //$('body').before(gna);
                //console.log(this.data);
            }
        });      
    };
    
    
});

//Node checker
function ajaxProgressNode(elem) {
    elem.click(function(e){
        var e = $(e.target);
        var val = e.prev().is(":checked") ? 0 : 10;
        var child = e.parents('.tache').children('input[type=hidden]')[0];
        var id = child.value;
        progressUpdate(id, val);
    }); 
}

//New node
function ajaxAddNode(t) {
    add(t);
}

//Delete node
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

//Update project description
function ajaxDescProject(elem) {
    elem.focusout(function(e){
       projectDesc($(e.target).val()); 
    });
}


//Update node title or description
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