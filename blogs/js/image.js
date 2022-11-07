//Global variables
const output = document.getElementById('output');
const btnReset = document.getElementById('btn-reset');

// Image file upload script
// This script reads and upload the image url
function loadFile(e) {
	const reader = new FileReader();
	reader.onload = function() {
		const output = document.getElementById('output');
		output.src = reader.result;
	};
	reader.readAsDataURL(event.target.files[0]);

	e.preventDefault();
}

//Image reset script
function resetImage(e) {
	output.src = '';
	e.preventDefault();
}
