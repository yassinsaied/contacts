$(document).ready(function () {
	// Charger le popup
	$.get('templates/delete_contact.html', function (data) {
		$('body').append(data);
	});

	// Fonction pour Charger la liste complète des contacts
	function loadContacts(search = '') {
		$.get('src/filter_contacts.php', { search }, function (data) {
			$('#contact-container').html(data);
		});
	}

	// Initialiser la liste
	loadContacts();

	// Filtrer
	$('#search').on('input', function () {
		const searchTerm = $(this).val();
		if (searchTerm) {
			$('.icon-clear').show();
			loadContacts(searchTerm);
		} else {
			$('.icon-clear').hide();
			loadContacts();
		}
	});

	// Gérer le clic sur l'icône d'annulation
	$('.icon-clear').on('click', function () {
		$('#search').val('');
		$(this).hide();
		loadContacts();
	});

	// Afficher détails de contact
	$(document).on('click', '.view-details', function () {
		const id = $(this).closest('li').data('id');
		$.get('src/get_contact_details.php', { id }, function (data) {
			$('#popup-body').html(data);
			$('#popup').show();
		});
	});

	// Fermer popup
	$(document).on('click', '#close-popup', function () {
		$('#popup').hide();
	});

	// Gestion suppression de conatct
	let contactToDelete = null;

	$(document).on('click', '.delete', function () {
		contactToDelete = $(this).closest('li').data('id'); // Récupérer l'ID
		$('#confirmation-popup').fadeIn(); // Afficher le popup
	});

	$(document).on('click', '#confirm-delete', function () {
		if (contactToDelete) {
			$.post('src/delete_contact.php', { id: contactToDelete }, function () {
				loadContacts($('#search').val());
			});
		}
		$('#confirmation-popup').fadeOut();
		contactToDelete = null;
	});

	$(document).on('click', '#cancel-delete', function () {
		$('#confirmation-popup').fadeOut();
		contactToDelete = null;
	});
});
