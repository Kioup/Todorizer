var drag;

// Insérer du javascript dans ce fichier
$(document).ready(function(){

    $(".list .form-block a.newPro").on("click", createTask);

    //$(".trash").on("click", rmTask);
    
    updateNode($(".tache").children("input[type=text]"));
    progress($(".checkmark"));
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

    $("div.edit div.contenu div span.fill").on("click", showHidePopup);
    $("div.overlay").on("click", showHidePopup);
    $("div.popup .slide-left").on("click", slideLeft);
    $("div.popup .slide-right").on("click", slideRight);

});

var showHidePopup = function() {
    $("div.overlay").toggleClass('in');
    display = $("div.popup").css("display");
    $("div.popup").toggleClass('in');    
    if ( display == "none" ) {
        $( "div.popup" ).show( 200 );
      } 
    else {
        $( "div.popup" ).hide( 200 );
      }
    $("div.icons .mini-slider").css("left", - ($("div.icons span.selected").position().left) + 80);
}

var slideLeft = function(){
    slide(1)

}

var slideRight = function(){
    slide();
}

//right = 0
//left = 1
var slide = function(sens) {
    var slider = $(".mini-slider");
    var el = $(".icons span.selected");
    var newEl = sens ? el.prev() : el.next();
    if (newEl.length) {
        el.removeClass("selected");
        newEl.addClass("selected");
        var pos = el.position().left;
        if (sens) pos -= 160;
        slider.css("left", -(pos));
    
        var elDisplay = $("div.icons span.display");
        var iconDisplay = elDisplay.find($("i"));
        var input = elDisplay.next();
        clas = newEl.find("i").attr("class");
        iconDisplay.attr("class", clas);
    }

}

function addNode(t) {
    ajaxAddNode(t);
}
function updateNode(e) {
    ajaxUpdateNode(e);
}
function removeNode(e) {
    ajaxRemoveNode(e);
}
function progress(e) {
    ajaxProgressNode(e);
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
            progress($(".checkmark").last());
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
    document.getElementById('rect').style.backgroundColor = '#' + jscolor;
    document.getElementById("roct").style.color = '#' + jscolor;
}
