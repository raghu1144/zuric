var down = false;



function toggleNotifi(){
    var box  = document.getElementById('box');
   
	if (down) {
		box.style.height  = '0px';
		box.style.display = "none";
		down = false;
	}else {
		box.style.height  = 'auto';
		box.style.display = "block";
		down = true;
	}
}


function sidebarpopup(){
	var popup = document.getElementById("box1")
	if (down) {
		box1.style.height  = '0px';
		box1.style.display = "none";
		down = false;
	}else {
		box1.style.height  = 'auto';
		box1.style.display = "block";
		down = true;
	}

}

// Update profile
// function profile(){
// 	var profile = document.getElementById("profile")
// 	var profileUpdate =  document.getElementById("profileUpdate")
// 	if (down) {
		
// 		profile.style.display = "block";
// 		profileUpdate.style.display="none"
// 		down = false;
// 	}else {
		
// 		profile.style.display = "none";
// 		profileUpdate.style.display="block"
// 		down = true;
// 	}

	
// }
