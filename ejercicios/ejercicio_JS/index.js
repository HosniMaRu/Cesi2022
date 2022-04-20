function printTitle(text) {
	document.getElementById("title").innerHTML = text;
	displayButton();
}
const titleContent = document.getElementById("title");

function displayButton() {
	// debugger;
	const displayElementText = document.getElementById("displayText");
	const displayElementReset = document.getElementById("displayReset");
	if (titleContent.innerHTML !== "") {
		displayElementText.style.display = "none";
		displayElementReset.style.display = "block";
	} else {
		displayElementText.style.display = "block";
		displayElementReset.style.display = "none";
	}
}
