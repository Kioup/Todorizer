var drag;

// Insérer du javascript dans ce fichier
$(document).ready(function(){

    $(".list .form-block a.newPro").on("click", createTask);

    //$(".trash").on("click", rmTask);
    
    updateNode($(".tache").children("input[type=text]"));
    updateNode($(".tache").find("textarea"));
    removeNode($(".tache").find(".trash"));
    drag = dragula([document.getElementById("block-task")]);

    $( ".deploi" ).click(function() {
        var icone = $(this).parent().find(".deploi").find("i");
        var deploi = $(this).next(".develop");
        deploi.slideToggle( "fast" );
        if (icone.hasClass("fa-angle-down")){
            icone.removeClass("fa-angle-down");
            icone.addClass("fa-angle-up");
        }
        else {
            icone.removeClass("fa-angle-up");
            icone.addClass("fa-angle-down");
        }
    });

    $("div.edit div.contenu div span.fill").on("click", showPopup());
    $("div.overlay").on("click", hidePopup());

});

function showPopup(){
    var overlay = $("div.overlay");

    overlay.addClass("in");

    var popup = $("div.popup");

    if (popup.hasClass("out")){

        popup.removeClass("out");
        popup.addClass("in");
    }
}

function hidePopup(){
    var overlay = $("div.overlay");
    if (overlay.hasClass("in")){

        overlay.removeClass("in");
    }
    var popup = $("div.popup");

    if (popup.hasClass("in")){
        
        popup.removeClass("in");
        popup.addClass("out");
    }
}

function addNode(t) {
    ajaxAddNode(t);
}
function updateNode(e) {
    ajaxUpdateNode(e);
}
function removeNode(e) {
    if (ajaxRemoveNode(e)) rmTask();
}

function createTask(e){
        e.preventDefault();
        var input = $("a.newPro").prev()[0];
        var block = $(this).parent();
        //console.log(block);
        if (input.value != "" || input.value.length != 0){
            var titre = input.value;
            addNode(titre);
            $("#block-task").append("<div class='tache'><label class='container'><input type='checkbox'><span class='checkmark'></span></label><input type='text' value='" + titre + "' name='title' data-type='title'><span class='deploi'><i class='fas fa-angle-down'></i></span><div class='develop'><fieldset><legend>description</legend><textarea row='4' placeholder='Entrez un texte descriptif' data-type='description'></textarea></fieldset> <div><span class='trash'><i class='fas fa-trash'></i></span><a href='' class='newNodeList'><span class='pen'><i class='fas fa-pencil-alt'></i></span></a></div>");
            $("#block-task").append($(".form-block.new"));
            $("div.alert").remove();
            input.value = "";
            input.focus();
            drag.containers.push($(".tache").last());
            updateNode($(".tache").last().children("input[type=text]"));
            updateNode($(".tache").last().find("textarea"));
            removeNode($(".tache").last().find(".trash"));
            //drag = dragula([document.getElementById("block-task")]);
            //$(".trash").last().on("click", rmTask);
            $( ".deploi" ).last().click(function() {
                var icone = $(this).parent().find(".deploi").find("i");
                var deploi = $(this).next(".develop");
                deploi.slideToggle( "fast" );
                if (icone.hasClass("fa-angle-down")){
                    icone.removeClass("fa-angle-down");
                    icone.addClass("fa-angle-up");
                }
                else {
                    icone.removeClass("fa-angle-up");
                    icone.addClass("fa-angle-down");
                }
            });
            
            
            
        }
        else {
            if ($("div.alert").length == 0) {

                block.before( "<div class='alert'><i class='fas fa-exclamation-triangle'></i><p>Vous devez entrer un nom de tâche</p></div>");
            }
        }
        


}

function changeColor(jscolor) {
    // 'jscolor' instance can be used as a string
    document.getElementsByClassName('entete')[0].style.backgroundColor = '#' + jscolor;
}
