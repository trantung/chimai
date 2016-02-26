function is_touch_device() {
return !!('ontouchstart' in window);
}
if(is_touch_device()) {
	var ajax = new XMLHttpRequest();
	ajax.open("GET", "/script/menu.html", false);
	ajax.send();
	document.body.innerHTML += ajax.responseText;
}
