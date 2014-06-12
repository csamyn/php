$(document).ready(function(){
    $('.profil-block').hide();

    $('.profil-block').first().show();

    $('.profil-block-link').click(function(){
        $('.profil-block').hide();
        $('.profil-block-link').removeClass('active');
        $(this).addClass('active');
        $('#' + $(this).attr('data-show')).show();
        document.location.hash = $(this).attr('data-show');
    });

    var hash = document.location.hash;

    if(hash != '' && hash != '#' && hash != undefined) {
    	hash = hash.replace('#', '');
    	console.log($('.profil-block-link[data-show="'+hash+'"]').length);
    	$($('.profil-block-link[data-show="'+hash+'"]')).click();
    }


    // Recherche
    if($('#search-column select[name="type"]').length) {
    	var searchTypeVal = $('#search-column select[name="type"]').val();
    	$('.search-verb').empty().append(getVerbForValue(searchTypeVal));

	    $('#search-column select[name="type"]').change(function(){
	    	var value = $(this).val();
	    	$('.search-verb').empty().append(getVerbForValue(value));
	    });
	}

	if($('.like-click').length) {
		$('.like-click').click(function(){
			var exVal = parseInt($(this).find('p').html());

			if($(this).hasClass('like-pics')) {
				exVal--;
				$(this).removeClass('like-pics').addClass('unlike-pics').fadeOut(0).fadeIn(300);
				$(this).find('p').empty().append(exVal);
			} else {
				exVal++;
				$(this).removeClass('unlike-pics').addClass('like-pics').fadeOut(0).fadeIn(300);
				$(this).find('p').empty().append(exVal);
			}
		});
	}

	$('#contact-form').submit(function(){
		var $this = $(this);


		var name = $('input[name=nom]').val();

		if(name == '') {
			alert('Le nom est obligatoire');
			return false;
		}

		var firstname = $('input[name=prenom]').val();

		if(firstname == '') {
			alert('Le prénom est obligatoire');
			return false;
		}

		var email = $('input[name=email]').val();

		if(email == '') {
			alert('L\'email est obligatoire');
			return false;
		}

		var msg = $('textarea[name=message]').val();

		if(msg == '') {
			alert('Un message est obligatoire');
			return false;
		}

		$.ajax({
			url: "inc/submit.php",
			type: 'POST',
			data: $this.serialize(),
			success: function(resp) {
				if(resp == 'ok') {
					$('.contact-submit').replaceWith('<p class="contact-success">Votre message a été envoyé !</p>');
				} else if(resp == 'missing'){
					alert('Tous les champs sont obligatoires');
				} else {
					alert('Une erreur s\'est produite, veuillez réessayer plus tard.');
				}
			}
		});

		return false;
	});

	//CONTACT BOX

	$(".inline").colorbox({inline:true, width:"30%", height:"48%"});
	$(".callbacks").colorbox({
	onOpen:function(){ alert('onOpen: colorbox is about to open'); },
	onLoad:function(){ alert('onLoad: colorbox has started to load the targeted content'); },
	onComplete:function(){ alert('onComplete: colorbox has displayed the loaded content'); },
	onCleanup:function(){ alert('onCleanup: colorbox has begun the close process'); },
	onClosed:function(){ alert('onClosed: colorbox has completely closed'); }

	});

	$('.close').on('click', function(){
	$.colorbox.close();
	return false;
	
	});

	});

function getVerbForValue(val) 
{
	if(val == 2) { // petsitter
		return 'Qui garde';
	} else {
		return 'De type';
	}
}