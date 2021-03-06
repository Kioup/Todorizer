var drag;
// Insérer du javascript dans ce fichier
$(document).ready(start);

function start(){
    
    //Change preview project color
    if ($('#projectColor').length){
        document.getElementById('rect').style.backgroundColor = $('#projectColor').val();
        document.getElementById("roct").style.color = $('#projectColor').val();
    }
    
    //Create new node
    $(".list .form-block a.newPro").on("click", createTask);
    
    //Node event listener (Ajax)
    updateNode($(".tache").children("input[type=text]"));
    progress($(".checkmark"));
    updateNode($(".tache").find("textarea"));
    removeNode($(".tache").find(".trash"));
    descProject($("#projectDescription").children('textarea'));
    
    
    //Node opening
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


    //PopUp Event
    $("div.edit div.contenu span.fill").on("click", showHidePopup);
    $("div.overlay").on("click", showHidePopup);
    $("div.popup .close").on("click", showHidePopup);

    //Slider - Changement d'icone
    $("div.popup .slide-left").on("click", slideLeft);
    $("div.popup .slide-right").on("click", slideRight);
    $("div.popup .fa-list-ul").parent().on("click", slideLeft);
    $("div.popup .fa-suitcase").parent().on("click", slideRight);
    
    
    //EasterEggs
    easterEggUno();
    easterEggDos();
}

//EasterEgg 1
var easterEggUno = function() {
    var active = false;
    if ($('input').length) {
        for (input of $('input')) {
            if (!active) {
                if ((input.value == "Rappelisator") || (input.value == "Todorizer")) {
                    $('.header').css('transform','rotateX(-180deg)');
                    $('body').css('transform','rotateX(180deg)');
                    active = true;
                }
            }
        }
    }
    if (!active) {
        $('.header').css('transform','rotateX(0)');
        $('body').css('transform','rotateX(0)');
    }
}

//EasterEgg 2
var easterEggDos = function() {
    $('.contenu.CGU h2').css('cursor','pointer');
    $('.contenu.CGU h2').click(function() {
        var temp = $('.contenu.CGU h2').html();
        for (elem of $('span, a, p')) {
            if (Math.random() > 0.5) {
                $(elem).text('Rappelisator');
            } else {
                $(elem).text('Todorizer');
            }
        }
        $('.contenu.CGU h2').html(temp);
    });
}

//Open popUp
var showHidePopup = function() {

    $("div.overlay").toggleClass('in');
    display = $("div.popup").css("display");
    $("div.popup").toggleClass('in');
    if ( display == "none" ) {
        $( "div.popup" ).show( 200 );
    } else {
        $( "div.popup" ).hide( 200 );
    }
    $("div.popup > div").css("display", "none");

    
    //Wndows popup
    if ($(this).hasClass("colors")) $("div.popup div.colors").css("display", "block");
    if ($(this).hasClass("icons")) $("div.popup div.icons").css("display", "block");
    if ($(this).hasClass("CR")) $("div.popup div.CR").css("display", "block");
    if ($(this).hasClass("drop")) $("div.popup div.drop").css("display", "block");
    if ($(this).hasClass("PJ")) $("div.popup div.PJ").css("display", "block");
    if ($(this).hasClass("date")) $("div.popup div.date").css("display", "block");

    //Selector icon project
    var el = $("div.icons span.selected").position().left;
    $("div.popup div.icons .mini-slider").css("left", -(el - 80));
    


}

//Slider
var slideLeft = function(){
    slide(1)
}
var slideRight = function(){
    slide();
}

var slide = function(sens) {
    //var sens
    //right = 0
    //left = 1
    
    var slider = $(".mini-slider");
    var el = $(".icons span.selected");
    var newEl = sens ? el.prev() : el.next();
    
    if (newEl.length) {
        
        el.removeClass("selected");
        el.prev().unbind('click',slideLeft);
        el.next().unbind('click',slideRight);
        
        newEl.addClass("selected");
        newEl.prev().bind('click',slideLeft);
        newEl.next().bind('click',slideRight);
        
        $('#projectIcon').val(newEl.children('i').attr('class'));
        
        var pos = el.position().left;
        if (sens) pos -= 160;
        slider.css("left", -(pos));
    
        var elDisplay = $("div.icons span.display");
        var iconDisplay = elDisplay.find($("i"));
        var input = elDisplay.next();
        classe = newEl.find("i").attr("class");
        iconDisplay.attr("class", classe);
    }

}

//Event ajax call
function addNode(t) {
    easterEggUno();
    ajaxAddNode(t);
}
function updateNode(e) {
    easterEggUno();
    ajaxUpdateNode(e);
}
function removeNode(e) {
    ajaxRemoveNode(e);
}
function descProject(e) {
    ajaxDescProject(e);
}
function progress(e) {
    ajaxProgressNode(e);
}


//JS creation of new node
function createTask(e){
        e.preventDefault();
    
        var input = $("a.newPro").prev()[0];
        var block = $(this).parent();
    
        if (input.value != "" || input.value.length != 0){
            
            var titre = input.value;
            addNode(titre);
            $("#block-task").append("<div class='tache'><label class='container'><input type='checkbox'><span class='checkmark'></span></label><input type='text' value='" + titre + "' name='title' data-type='title'><span class='deploi'><i class='fas fa-angle-down'></i></span><div class='develop'><fieldset><legend>description</legend><textarea row='4' placeholder='Entrez un texte descriptif' data-type='description'></textarea></fieldset> <div><span class='trash'><i class='fas fa-trash'></i></span><a href='' class='newNodeList'><span class='pen'><i class='fas fa-pencil-alt'></i></span></a></div>");
            
            $("#block-task").append($(".form-block.new"));
            $("div.alert").remove();
            
            input.value = "";
            input.focus();
            
            //Node event listener (Ajax)
            updateNode($(".tache").last().children("input[type=text]"));
            progress($(".checkmark").last());
            updateNode($(".tache").last().find("textarea"));
            removeNode($(".tache").last().find(".trash"));
            

            //Node opening            
            $( ".deploi" ).last().click(function() {
                var icone = $(this).parent().find(".deploi").find("i");
                var deploi = $(this).next(".develop");
                deploi.slideToggle( "fast" );
                if (icone.hasClass("fa-angle-down")){
                    icone.removeClass("fa-angle-down");
                    icone.addClass("fa-angle-up");
                } else {
                    icone.removeClass("fa-angle-up");
                    icone.addClass("fa-angle-down");
                }
            });
            
            
        //Error   
        } else {
            if ($("div.alert").length == 0) {
                block.before( "<div class='alert'><i class='fas fa-exclamation-triangle'></i><p>Vous devez entrer un nom de tâche</p></div>");
            }
        }
        


}

//Color picker
function changeColor(jscolor) {
    // 'jscolor' instance can be used as a string
    document.getElementById('rect').style.backgroundColor = '#' + jscolor;
    document.getElementById("roct").style.color = '#' + jscolor;
    $('#projectColor').val('#' + jscolor);
}
