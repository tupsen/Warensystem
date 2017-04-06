$(document).ready(function()
{
	$('#content').load('content/'+page+'.php');
	//handle menue clicks
	$('form#buttonNavigation input').click(function()
	{
		var page = $(this).attr('name');
		$('#content').load('content/'+page+'.php');
		return false;
	});
});
