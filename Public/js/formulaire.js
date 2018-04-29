$(document).ready(function(){

    var result =true;

// GESTION DES BORDURES ET MESSAGES AU SUBMIT
    $('#form_visiteur').submit(function()
    {
        // Formulaire de contact
        if($('#nom').val()=="")
        {
            $('#nom').css('border','2px red solid','!important');
            $('#nom').prev('.error').fadeIn('fast').text('champs obligatoire');
            result=false;
        }

        if($('#mail').val()=="")
        {
            $('#mail').css('border','2px red solid','!important');
            $('#mail').prev('.error').fadeIn('fast').text('champs obligatoire');
            result=false;
        }

        if($('#subject').val()=="")
        {
            $('#subject').css('border','2px red solid','!important');
            $('#subject').prev('.error').fadeIn('fast').text('champs obligatoire');
            result=false;
        }

        if($('#message').val()=="")
        {
            $('#message').css('border','2px red solid','!important');
            $('#message').prev('.error').fadeIn('fast').text('champs obligatoire');
            result=false;
        }
        return result;
    });


    $('form').submit(function()
    {

        // AUTRES FORMULAIRES

        if($('#img').val()=="")
        {
            $('#img').css('border','2px red solid','!important');
            $('#img').prev('.error').fadeIn('fast').text('Vous devez sélectionner une image');
            result=false;
        }else{
            result=true;
        }

        if($('#title').val()=="")
        {
            $('#title').css('border','2px red solid','!important');
            $('#title').prev('.error').fadeIn('fast').text('champs obligatoire');
            result=false;
        }

        if($('#content_o').val()=="")
        {
            $('#content_o').css('border','2px red solid','!important');
            $('#content_o').prev('.error').fadeIn('fast').text('champs obligatoire');
            result=false;
        }

        if($('#cat').val()=="")
        {
            $('#cat').css('border','2px red solid','!important');
            $('#cat').prev('.error').fadeIn('fast').text('champs obligatoire');
            result=false;
        }

        if($('#categorie').val()=="")
        {
            $('#categorie').css('border','2px red solid','!important');
            $('#categorie').prev('.error').fadeIn('fast').text('champs obligatoire');
            result=false;
        }

        if($('#link').val()=="")
        {
            $('#link').css('border','2px red solid','!important');
            $('#link').prev('.error').fadeIn('fast').text('champs obligatoire');
            result=false;
        }

        if($('#link_git').val()=="")
        {
            $('#link_git').css('border','2px red solid','!important');
            $('#link_git').prev('.error').fadeIn('fast').text('champs obligatoire');
            result=false;
        }

        if($('#link_view').val()=="")
        {
            $('#link_view').css('border','2px red solid','!important');
            $('#link_view').prev('.error').fadeIn('fast').text('champs obligatoire');
            result=false;
        }

        if($('#pseudo').val()=="")
        {
            $('#pseudo').css('border','2px red solid','!important');
            $('#pseudo').prev('.error').fadeIn('fast').text('champs obligatoire');
            result=false;
        }

        if($('#pass').val()=="")
        {
            $('#pass').css('border','2px red solid','!important');
            $('#pass').prev('.error').fadeIn('fast').text('champs obligatoire');
            result=false;
        }

        if($('#confirmPass').val()=="")
        {
            $('#confirmPass').css('border','2px red solid','!important');
            $('#confirmPass').prev('.error').fadeIn('fast').text('champs obligatoire');
            result=false;
        }

        if($('#role').val()=="")
        {
            $('#role').css('border','2px red solid','!important');
            $('#role').prev('.error').fadeIn('fast').text('champs obligatoire');
            result=false;
        }

        if($('#nom').val()=="")
        {
            $('#nom').css('border','2px red solid','!important');
            $('#nom').prev('.error').fadeIn('fast').text('champs obligatoire');
            result=false;
        }

        return result;

    });




// GESTION  DES BORDURES ET MESSAGES Dès APPUI ET VERIFICATION DE TAILLE

    $('#nom').keyup(function()
    {
        if($('#nom').val().length<5)
        {
            $('#nom').css('border','2px red solid','!important');
            $('#nom').prev('.error').fadeIn('fast').text('Doit contenir entre 5 et 25 caractères');
            result=false;
        }
        else if($('#nom').val().length>=26)
        {
            $('#nom').css('border','2px red solid','!important');
            $('#nom').prev('.error').fadeIn('fast').text('Vous avez dépassé les 25 caractères');
            result=false;
        }
        else
        {
            $('#nom').css('border','2px green solid','!important');
            $('#nom').prev('.error').fadeOut();
            result=true;
        }
        return result;
    });


    $('#mail').keyup(function(){

        if($('#mail').val().length<4)
        {
            $('#mail').css('border','2px red solid','!important');
            $('#mail').prev('.error').fadeIn('fast').text('Vous devez entrer un format mail');
            result=false;
        }
        else {
            $('#mail').css('border','2px green solid','!important');
            $('#mail').prev('.error').fadeOut();
            result= true;
        }
        return result;
    });



    $('#subject').keyup(function(){

        if($('#subject').val().length<5)
        {
            $('#subject').css('border','2px red solid','!important');
            $('#subject').prev('.error').fadeIn('fast').text('Vous devez entrez entre 5 et 25 caractères');
            result=false;
        }

        else if($('#subject').val().length>=25)
        {
            $('#subject').css('border','2px red solid','!important');
            $('#subject').prev('.error').fadeIn('fast').text('Vous avez dépassé les 25 caractères');
            result=false;
        }
        else {
            $('#subject').css('border','2px green solid','!important');
            $('#subject').prev('.error').fadeOut();
            result= true;
        }
        return result;
    });


    $('#message').keyup(function(){

        if($('#message').val().length<10)
        {
            $('#message').css('border','2px red solid','!important');
            $('#message').prev('.error').fadeIn('fast').text('Vous devez entrez entre 10 et 1000 caractères');
            result=false;
        }
        else if($('#message').val().length>=1000)
        {
            $('#message').css('border','2px red solid','!important');
            $('#message').prev('.error').fadeIn('fast').text('Vous avez dépassé les 1000 caractères');
            result=false;
        }
        else
        {
            $('#message').css('border','2px green solid','!important');
            $('#message').prev('.error').fadeOut();
            result= true;
        }
        return result;
    });


    $('#title').keyup(function(){

        if($('#title').val().length<2)
        {
            $('#title').css('border','2px red solid','!important');
            $('#title').prev('.error').fadeIn('fast').text('Doit contenir entre 2 et 100 caractères');
            result=false;
        }
        else if($('#title').val().length>=100)
        {
            $('#title').css('border','2px red solid','!important');
            $('#title').prev('.error').fadeIn('fast').text('Doit contenir 100 caractères au maximum');
            result=false;
        }
        else
        {
            $('#title').css('border','2px green solid','!important');
            $('#title').prev('.error').fadeOut();
            result= true;
        }
        return result;
    });


    $('#img').keyup(function(){

        if($('this').val().length<4)
        {
            result=true;
        }
        return result;
    });


    $('#content_o').keyup(function(){

        if($('#content_o').val().length<10)
        {
            $('#content_o').css('border','2px red solid','!important');
            $('#content_o').prev('.error').fadeIn('fast').text('Doit contenir entre au moins 10 caractères');
            result=false;
        }
        else if($('#content_o').val().length>=500)
        {
            $('#content_o').css('border','2px red solid','!important');
            $('#content_o').prev('.error').fadeIn('fast').text('Doit contenir 500 caractères au maximum');
            result=false;
        }
        else
        {
            $('#content_o').css('border','2px green solid','!important');
            $('#content_o').prev('.error').fadeOut();
            result= true;
        }
        return result;
    });

    $('#link').keyup(function(){

        if($('#link').val().length<4)
        {
            $('#link').css('border','2px red solid','!important');
            $('#link').prev('.error').fadeIn('fast').text('Lien non valide');
            result=false;
        }
        else
        {
            $('#link').css('border','2px green solid','!important');
            $('#link').prev('.error').fadeOut();
            result=true;
        }
        return result;
    });


    $('#link_view').keyup(function(){

        if($('#link_view').val().length<4)
        {
            $('#link_view').css('border','2px red solid','!important');
            $('#link_view').prev('.error').fadeIn('fast').text('Lien non valide');
            result=false;
        }
        else
        {
            $('#link_view').css('border','2px green solid','!important');
            $('#link_view').prev('.error').fadeOut();
            result= true;
        }
        return result;
    });


    $('#link_git').keyup(function(){

        if($('#link_git').val().length<4)
        {
            $('#link_git').css('border','2px red solid','!important');
            $('#link_git').prev('.error').fadeIn('fast').text('Lien non valide');
            result=false;
        }
        else
        {
            $('#link_git').css('border','2px green solid','!important');
            $('#link_git').prev('.error').fadeOut();
            result= true;
        }
        return result;
    });

    $('#pseudo').keyup(function(){

        if($('#pseudo').val().length<4)
        {
            $('#pseudo').css('border','2px red solid','!important');
            $('#pseudo').prev('.error').fadeIn('fast').text('Doit comporter au moins 4 caractères');
            result=false;
        }
        else
        {
            $('#pseudo').css('border','2px green solid','!important');
            $('#pseudo').prev('.error').fadeOut();
            result= true;
        }
        return result;
    });


    $('#pass').keyup(function(){

        if($('#pass').val().length<5)
        {
            $('#pass').css('border','2px red solid','!important');
            $('#pass').prev('.error').fadeIn('fast').text('Doit comporter au moins 5 caractères');
            result=false;
        }
        else
        {
            $('#pass').css('border','2px green solid','!important');
            $('#pass').prev('.error').fadeOut();
            result= true;
        }
        return result;
    });

    $('#confirmPass').keyup(function(){

        if($('#confirmPass').val() != $('#pass').val())
        {
            $('#confirmPass').css('border','2px red solid','!important');
            $('#confirmPass').prev('.error').fadeIn('fast').text('Doit correspondre au mot de passe');
            result=false;
        }
        else
        {
            $('#confirmPass').css('border','2px green solid','!important');
            $('#confirmPass').prev('.error').fadeOut();
            result= true;
        }
        return result;
    });

    $('#role').keyup(function(){

        if($('#role').val().length<4)
        {
            $('#role').css('border','2px red solid','!important');
            $('#role').prev('.error').fadeIn('fast').text('Lien non valide');
            result=false;
        }
        else
        {
            $('#role').css('border','2px green solid','!important');
            $('#role').prev('.error').fadeOut();
            result= true;
        }
        return result;
    });


});