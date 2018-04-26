$(document).ready(function(){

    var result =true;

    $('form').submit(function()
    {

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







    $('#nom').keyup(function()
    {
        if($('#nom').val().length<5)
        {
            $('#nom').css('border','2px red solid','!important');
            $('#nom').prev('.error').fadeIn('fast').text('Vous devez entrez entre 5 et 25 caractères');
            result=false;
        }
        else if($('#nom').val().length>=25)
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
            $('#mail').prev('.error').fadeIn('fast').text('Vous devez entrez un format mail');
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

});