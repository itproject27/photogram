<?php 
include_once '../models/ses.php';
if (!isset($_SESSION['id'])) {
    header("location:login.php");
}
require_once '../pages/header.php'; ?>

<head>
<style>
	.green{
	margin-left: 10rem;
	}
	.image-controls{
		justify-content: center;
	}
	.right{
		padding-top: 40px;
		padding-left: 10rem;
	}
	.btn.green{
		height: 100%;
    cursor: pointer;
    margin: 0 10px;
    display: inline-block;
    font-size: 20px;
	}
	.conta {
		width: 100%;
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100%; 
}

.conta img {
  align-self: center;
  max-width: 100%;
  max-height: 100%;
}	
.row {
    margin-bottom: 0;
}
  
.range-field{
    color: rgb(24, 21, 21);
    
}
.btn{
    color: aliceblue;
    border: 2px solid rgb(0, 162, 255) ;
    margin-right: 100px;
    background-color: rgb(0, 162, 255);
    border-radius: 5px;
}
.btn a{
	text-decoration: none;
	color: aliceblue;
	background-color: rgb(0, 162, 255);
}
.control{
    border-style: none;
    background-color: #f8f9fa;
}
.control-btn{
    width: 10%;
    box-shadow: 5px 5px 5px rgb(80, 87, 94);
}
	  </style>
	
</head>



	<nav class="green" >
		<!--<div class="nav-wrapper container">
			<span class="nav-header">
			Simple Image Filters
			</span>-->
			<ul class="right image-save">
				<button class="btn control-btn"
						onclick="saveImage()">
				Save
				</button>
				<button class="btn control-btn"
						onclick="resetImage()">
				Reset
				</button>
				<button class="btn control-btn">
					<a href="photo.php">Back</a>
				
				</button>
			</ul>
		</div>
	</nav>

	<div class="conta">
	<img id="sourceImage" crossorigin="anonymous">
</div>
	<div class="conta">

		<canvas  id="canvas" height="0"></canvas>
	</div>
	<div class="container app">

		<div class="help-text center-align">
			<h5>Please Upload an Image to Start Editing</h5>
		</div>
		<div class="image-controls">
			<h4>Image Controls</h4>
			<div class="row">
				<div class="col s6">
					<span class="range-field">
						<label for="brightnessSlider">
						Brightness
						</label>
						<input id="brightnessSlider"
							type="range" value="100"
							min="0" max="300"
							onchange="applyFilter()">
					</span>
				</div>
				<div class="col s6">
					<span class="range-field">
						<label for="contrastSlider">
						Contrast
						</label>
						<input id="contrastSlider"
							type="range" value="100"
							min="0" max="200"
							onchange="applyFilter()">
					</span>
				</div>
			</div>

			<div class="row">
				<div class="col s6">
					<span class="range-field">
						<label for="grayscaleSlider">
						Grayscale
						</label>
						<input id="grayscaleSlider"
							type="range" value="0"
							min="0" max="100"
							onchange="applyFilter()">
					</span>
				</div>
				<div class="col s6">
					<span class="range-field">
						<label for="saturationSlider">
						Saturation
						</label>
						<input id="saturationSlider"
							type="range" value="100"
							min="0" max="300"
							onchange="applyFilter()">
					</span>
				</div>
			</div>

			<div class="row">
				<div class="col s6">
					<span class="range-field">
						<label for="sepiaSlider">
						Sepia
						</label>
						<input id="sepiaSlider"
							type="range" value="0"
							min="0" max="200"
							onchange="applyFilter()">
					</span>
				</div>
				<div class="col s6">
					<span class="range-field">
						<label for="hueRotateSlider">
						Hue
						</label>
						<input id="hueRotateSlider"
							type="range" value="0"
							min="0" max="360"
							onchange="applyFilter()">
					</span>
				</div>
			</div>
		</div>

		<div class="preset-filters">
			<h4>Preset Filters</h4>
			<button class="btn green"
					onclick="brightenFilter()">
			Brighten
			</button>
			<button class="btn green"
					onclick="bwFilter()">
			Black and White
			</button>
			<button class="btn green"
					onclick="funkyFilter()">
			Funky
			</button>
			<button class="btn green"
					onclick="vintageFilter()">
			Vintage
			</button>
		</div>

	
		<div class="file-controls">
			<h4>File Controls</h4>
			
			<a id="link"></a>
			<div class="file-field input-field">
				<div class="btn control">
					<span style="color: black; font-size: larger;">Upload Image</span><br>
					<input type="file" accept="image/*"
						onchange="uploadImage(event)" style="background-color:  rgb(0, 162, 255); margin-left: 10rem;">
				</div>
				
			</div>
		</div>
	</div>
	
	<script src="app.js"></script>
	<script defer src=
"../assets/js/project1.js">
	</script>
</body>

</html>
