function calemi(){
    alert("HELLO");
    var car_amount = document.getElementById('lamt').value;
    var down_pay = document.getElementById('dpay').value;
    var loan_term = document.getElementById('term').value;
    var annual_interest= document.getElementById('interest').value;

    if(car_amount != 0){

        car_amount = parseFloat(car_amount);
        down_pay   = parseFloat(down_pay);
        loan_term  = parseFloat(loan_term);
        annual_interest = parseFloat(annual_interest);

        if (down_pay<= car_amount){

            var p = lamt - dpay;
            var r = inte / 1200;
            var part1 = Math.pow((1 + r), term);
            var part2 = p * r * part1;
            var part3 = part1 - 1;
            var emi = Math.round(100 * (part2 / part3)) / 100;
            document.getElementById("emi-cal-res").value = emi;
            var tamt = Math.round(100 * emi * term) / 100;
            document.getElementById("emi-cal-res1").value = tamt;
            var tip = Math.round(100 * (tamt - p)) / 100;
            document.getElementById("emi-cal-res2").value = tip;
        }
    }
}