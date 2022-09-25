function GetCinemas()
{
    $.ajax
    (
        {
            type:"get",
            url:"../PHP/getAllCines.php",
            success:function(datas)
            {   
                $("#divActeurs").empty();
                $("#divFilms").empty();
                $("#divCines").append(datas);
            },
            error:function()
            {
                alert("Erreur RQT SQL CINEMAS");
            },
        }
    )
}

function GetAllFilmsByCine(codecine)
{
    $.ajax
    (
        {
            type:"get",
            url:"../PHP/getAllFilmsbyCine.php",
            data:"numCine="+codecine,
            success:function(datas)
            {   
                $("#divActeurs").empty();
                $("#divFilms").empty();
                $("#divFilms").append(datas);
            },
            error:function()
            {
                alert("Erreur RQT SQL FILMS");
            },
        }
    )
}
function GetAllActeursByFilm(codefilm)
{
    $.ajax
    (
        {
            type:"get",
            url:"../PHP/getAllActeursbyFilm.php",
            data:"numFilm="+codefilm,
            success:function(datas)
            {
                $("#divActeurs").empty();
                $("#divActeurs").append(datas);
            },
            error:function()
            {
                alert("Erreur RQT SQL ACTEURS");
            },
        }
    )
}

function UpdateVotes(nbrstars,numFilm,numCine)
{
    $.ajax
    (
        {
            type:"get",
            url:"../PHP/updateVotes.php",
            data:"nbrStars="+nbrstars+"&codeFilm="+numFilm,
            success:function(datas)
            {   
                alert("Votre vote a été pris en compte");
                // $("#divFilms").load("../PHP/getAllFilmsbyCine.php/numCine="+numCine);
                GetAllFilmsByCine(numCine);
            },  
            error:function()
            {
                alert("Erreur RQT SQL VOTES");
            },
        }
    )
}
