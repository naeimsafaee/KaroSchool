var codes = new Array(3);
var re = /^\d+$/;
var inputs = [].slice.call(document.querySelectorAll('.verify-inputs input'));
inputs.map(function (input, index) {
    input.addEventListener('input', function (e) {
        this.value = this.value.slice(0, this.maxLength);
    });
    input.addEventListener('keyup', function (e) {
        if (re.test(input.value)) {
            codes[index] = input.value;
            var nextInput = inputs[index + 1];
            if (nextInput) {
                nextInput.focus();
                nextInput.select();
            } else {

                $("body").find("#continue").html("\t <div class=\"loading\">\t\n" +
                    "\t\t<span class=\"circles\"></span>\n" +
                    "\t\t<span class=\"circles\"></span>\n" +
                    "\t\t<span class=\"circles\"></span>\n" +
                    "\t</div>");

                const secondtimeout = setTimeout(function() {
                    $("#continue").html("ارسال مجدد پیام");
                }, 1500);
                secondtimeout();

                clearTimeout(secondtimeout);

            }
        }else {
            codes[index] = input.value;
            let previousInput = inputs[index - 1];
            if (previousInput) {
                previousInput.focus();
                previousInput.select();
            }
        }

    });
    input.addEventListener('click', function (e) {
        e.target.select();
    });
});

// ---------------------
let i = 30;
let a = setInterval(function(){
    if( i < 10 )
        document.querySelector('.count').textContent = `0${i}`;
    else {
        document.querySelector('.count').textContent = `${i}`
    }
    i--;
    if(i<0) {
        clearInterval(a);
    }
},1000)
