function move() {
//sin(x)=y
    debugger;
    let element = document.getElementById("circle");
    var y = 225;
    var x = 0;
    let sign = +1;
    let id = setInterval(action1, 20);
    console.log("Here:")

    function action() {
        if (10 * x >= document.getElementById("container").offsetWidth * 0.97) {
            clearInterval(id);
        } else {
            x++;
            y = Math.sin(x);

            element.style.left = 10 * x + "px";
            element.style.top = 225 + 80 * y + "px";
        }
    }
    function action1() {
        if (12 * x >= document.getElementById("container").offsetWidth * 0.97) {
            sign = -1;
            // console.log(sign);
        } else if(x <= 1){
            sign = 1;
            console.log(x);
            // console.log(sign);
        }
        // console.log(sign);
        x = x + sign;
        y = Math.sin(x);
        element.style.left = 12 * x + "px";
        element.style.top = 200 + 80 * y + "px";
    }

};