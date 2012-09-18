function checkWidth()
{

if(document.getElementsByClassName('sidebar') == null)
{
	d = document.getElementById('content');
	d.style.width = "950px";
	console.debug("I didn't find any widgets so i changed the content width to 950px, you're welcome."); 
}else{
	console.debug("I found some sidebar widgets so i keept the content width intact.");
}
}