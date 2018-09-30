function selectAll(bool) 
{
	checkboxes = document.getElementsByClassName('CheckClass');
	for(var i=0, n=checkboxes.length;i<n;i++) 
	{
	  checkboxes[i].checked = bool;
	}
}

