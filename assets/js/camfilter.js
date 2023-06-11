let brightnessSlider = document.getElementById("brightnessSlider");
let contrastSlider = document.getElementById("contrastSlider");
let grayscaleSlider = document.getElementById("grayscaleSlider");
let hueRotateSlider = document.getElementById("hueRotateSlider");
let saturateSlider = document.getElementById("saturationSlider");
let sepiaSlider = document.getElementById("sepiaSlider");
// This function is used to update the image
// along with all the filter values
function resetImage() {
    brightnessSlider.value = 100;
    contrastSlider.value = 100;
    grayscaleSlider.value = 0;
    hueRotateSlider.value = 0;
    saturateSlider.value = 100;
    sepiaSlider.value = 0;
    applyFilter();
}
  


function applyFilter() {

	// Create a string that will contain all the filters
	// to be used for the image
	let filterString =
		"brightness(" + brightnessSlider.value + "%" +
		") contrast(" + contrastSlider.value + "%" +
		") grayscale(" + grayscaleSlider.value + "%" +
		") saturate(" + saturateSlider.value + "%" +
		") sepia(" + sepiaSlider.value + "%" +
		") hue-rotate(" + hueRotateSlider.value + "deg" + ")";

	// Apply the filter to the image
	context.filter = filterString;

	// Draw the edited image to canvas
	context.drawImage(image, 0, 0);
}

// A series of functions that handle the preset filters
// Each of these will first reset the image
// and then apply a certain parameter before
// redrawing the image
function brightenFilter() {
	resetImage();
	brightnessSlider.value = 130;
	contrastSlider.value = 120;
	saturateSlider.value = 120;
	applyFilter();
}

function bwFilter() {
	resetImage();
	grayscaleSlider.value = 100;
	brightnessSlider.value = 120;
	contrastSlider.value = 120;
	applyFilter();
}

function funkyFilter() {
	resetImage();

	// Set a random hue rotation everytime
	hueRotateSlider.value =
		Math.floor(Math.random() * 360) + 1;
	contrastSlider.value = 120;
	applyFilter();
}

function vintageFilter() {
	resetImage();
	brightnessSlider.value = 120;
	saturateSlider.value = 120;
	sepiaSlider.value = 150;
	applyFilter();
}
