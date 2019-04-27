var Cover = document.getElementById("DarkCover");
var treewindow = document.getElementById("TreeWindow");

function OpenDirectoryWindow() {  
    Cover.classList.remove("Ready");
	treewindow.classList.remove("Ready");
}
function CloseDirectoryWindow() {  
    Cover.classList.add("Ready");
	treewindow.classList.add("Ready");
}