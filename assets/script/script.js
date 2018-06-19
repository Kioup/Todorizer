// Insérer du javascript dans ce fichier

$(".list .form-block a.newPro").on("click", function(e){
    e.preventDefault();
    var input = $("a.newPro").prev()[0];
    var block = $(this).parent();
    console.log(block);
    if (input.value != "" || input.value.length != 0){
        var titre = input.value;

        block.before(" <div class='tache'><input type='text' value='" + titre + "'><span><i class='fas fa-thumbtack'></i><span class='trash'><i class='fas fa-trash'></i></span></div> ");
        $("div.alert").remove();
        input.value = "";
        input.focus();
    }
    else {
        if ($("div.alert").length == 0) {

            block.before( "<div class='alert'><i class='fas fa-exclamation-triangle'></i><p>Vous devez entrez un nom de tache</p></div>");
        }
    }
});