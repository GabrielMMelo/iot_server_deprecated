var countDown;
function scheldule() {
	var time = document.getElementById('time');
    cancel();
    countDown = setInterval(function() {
            time.stepDown(1);
            if (time.value == "00:00") {
                clearInterval(countDown);
                document.getElementById("timer").submit(); 
                cancel();
            }            
    }, 1000);
}

function cancel(){
	var x = document.getElementById("cancel");
	var y = document.getElementById("submit");
    if (x.style.display === "none") {
        x.style.display = "block";
        y.style.display = "none";
    } else {
        x.style.display = "none";
        y.style.display = "block";
        clearInterval(countDown);
    }
}