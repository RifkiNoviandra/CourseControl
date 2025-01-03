var initialValue = 30;
var index = 0;
$(document).ready(function () {
    var counter = localStorage.getItem("counter");
    var canCount = true;
    var id;

    if (counter) {
        $("span#timer").html('00:' + counter);
    } else {
        localStorage.setItem("counter", initialValue);
        counter = initialValue;
        $("span#timer").html('00:' + counter);
    }

    function startTimer() {
        if (localStorage.getItem("counter") && id === undefined) {
            id = setInterval(function () {
                if (canCount) {
                    localStorage.setItem("counter", --counter);
                    span = document.getElementById('timer');
                    span.innerHTML = '00:' + counter;
                    if (counter <= 9) {
                        span = document.getElementById('timer');
                        span.innerHTML = '00:' + '0' + counter;
                    }
                    if (counter <= 0) {
                        clearInterval(counter);
                        localStorage.clear(counter);
                        canCount = !canCount;
                        $("#verify").removeClass("disabled");
                    }
                }
            }, 1000);
        }
    }

    $("#set").click(startTimer());
});
