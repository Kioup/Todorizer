// Insérer du javascript dans ce fichier
$(document).ready(function(){

    $(".list .form-block a.newPro").on("click", createTask);

    $(".trash").on("click", rmTask);
    
    updateNode($(".tache").children("input[type=text]"));
    updateNode($(".tache").find("textarea"));
    removeNode($(".tache").find(".trash"));

    $( ".deploi" ).click(function() {
        var icone = $(this).parent().find(".deploi").find("i");
        var deploi = $(this).next(".develop");
        deploi.slideToggle( "fast" );
        if (icone.hasClass("fa-plus-square")){
            icone.removeClass("fa-plus-square");
            icone.addClass("fa-minus-square");
        }
        else {
            icone.removeClass("fa-minus-square");
            icone.addClass("fa-plus-square");
        }
    });

});

function addNode(t) {
    ajaxAddNode(t);
}
function updateNode(e) {
    ajaxUpdateNode(e);
}
function removeNode(e) {
    ajaxRemoveNode(e);
}



function createTask(e){
        e.preventDefault();
        var input = $("a.newPro").prev()[0];
        var block = $(this).parent();
        //console.log(block);
        if (input.value != "" || input.value.length != 0){
            var titre = input.value;
            addNode(titre);
            block.before("<div class='tache'><input type='text' value='" + titre + "' name='title' data-type='title'><span class='deploi'><i class='fas fa-plus-square'></i></span><div class='develop'><fieldset><legend>description</legend><textarea row='4' placeholder='Entrez un texte descriptif' data-type='description'></textarea></fieldset><div><span class='trash'><i class='fas fa-trash'></i></span><span class='pen'><i class='fas fa-pencil-alt'></i></span></div></div></div>");
            $("div.alert").remove();
            input.value = "";
            input.focus();
            updateNode($(".tache").last().children(":first"));
            updateNode($(".tache").last().find("textarea"));
            removeNode($(".tache").last().find(".trash"));
            $(".trash").last().on("click", rmTask);
            $( ".deploi" ).last().click(function() {
                var icone = $(this).parent().find(".deploi").find("i");
                var deploi = $(this).next(".develop");
                deploi.slideToggle( "fast" );
                if (icone.hasClass("fa-plus-square")){
                    icone.removeClass("fa-plus-square");
                    icone.addClass("fa-minus-square");
                }
                else {
                    icone.removeClass("fa-minus-square");
                    icone.addClass("fa-plus-square");
                }
            });
            
            
            
        }
        else {
            if ($("div.alert").length == 0) {

                block.before( "<div class='alert'><i class='fas fa-exclamation-triangle'></i><p>Vous devez entrez un nom de tache</p></div>");
            }
        }

}

//$(".trash").on("click", rmTask);
function rmTask(){
    $(this).parent().parent().parent().remove();
}

function changeColor(jscolor) {
    // 'jscolor' instance can be used as a string
    document.getElementsByClassName('entete')[0].style.backgroundColor = '#' + jscolor;
}
