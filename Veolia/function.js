$("#table").load("traitement_table.php",function(){
    Ajax();
});

function Ajax()
{
    $.ajax(
        {
            url : 'traitement_table.php',
            type : 'POST',
            datatype : 'html',
            success: function(code_html,statut)
            {
                $("#table").replaceWith(code_html);
            },
            error : function(resultat,statut,erreur)
            {
            },
            complete : function(resultat,statut)
            {
            }
        }
    );
}

setInterval("Ajax()",10000);



$("#code_map").load("traitement_map.php",function(){
    Ajax1();
});

function Ajax1()
{
    $.ajax(
        {
            url : 'traitement_map.php',
            type : 'POST',
            datatype : 'html',
            success: function(code_html,statut)
            {
                $("#code_map").replaceWith(code_html);
            },
            error : function(resultat,statut,erreur)
            {
            },
            complete : function(resultat,statut)
            {
            }
        }
    );
}

setInterval("Ajax1()",10000);