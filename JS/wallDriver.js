$(document).ready( 
	function()
	{
		//once the page has finished loading set up a single action for simplicity
		//TODO: implement button manager to set up buttons
		$('#postButton').click(function()
		{
			checkPost()
		});

		$('#sortOrder').click(function()
		{
			$('#wallContainer').html('');
			if($('#sortOrder').val() == 'ASC')
			{
				$('#sortOrder').val('DESC');
				fillWall($('#sortOrder').val());
			}
			else
			{
				$('#sortOrder').val('ASC');
				fillWall($('#sortOrder').val());
			}
		});

		//initialize the bootstrap switch
		$("#sortOrder").bootstrapSwitch();

		//ajax call to generate wall content
		fillWall($('#sortOrder').is(':checked'));
	}
);