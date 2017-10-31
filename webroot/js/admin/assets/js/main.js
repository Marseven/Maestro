jQuery(function($) {

	//preview picture
	$('#picture').on('change', function (e) {
		var files = $(this)[0].files;
		if (files.length > 0) {
			// On part du principe qu'il n'y qu'un seul fichier
			// étant donné que l'on a pas renseigné l'attribut "multiple"
			var file = files[0], $image_preview = $('#image_preview');

			// Ici on injecte les informations recoltées sur le fichier pour l'utilisateur
			$image_preview.find('.img-thumbnail').removeClass('hidden');
			$image_preview.find('img').attr('src', window.URL.createObjectURL(file));
			$image_preview.find('h4').html(file.name);
			$image_preview.find('h5').html(file.size +' bytes');
		}

		// Bouton "Annuler" pour vider le champ d'upload
			$image_preview.find('button[type="button"]').on('click', function (e) {
			e.preventDefault();
			$('#picture').val('');
			$image_preview.find('img').attr('src', '/PetitesAnnonces/img/placeholder.jpg');
			$image_preview.find('h4').html(' ');
			$image_preview.find('h5').html(' ');
		});
	});
});