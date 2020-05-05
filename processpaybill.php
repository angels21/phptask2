<script>
document.addEventListener("DOMContentLoaded", (event) => {
        // Add an event listener for when the user clicks the submit button to pay
        document.getElementById("submit").addEventListener("click", (e) => {
            e.preventDefault();
            const API_publicKey = "FLWPUBK_TEST-582b2bb44e90f4be4ad323cbe3a12c2a-X";
            const txRef = ''+Math.floor((Math.random() * 1000000000) + 1); //Generate a random id for the transaction reference
            const email = document.getElementById('email').value;
            const phone = document.getElementById('phone').value;
            const amount = document.getElementById('options').value;

    
        

        function payWithRave() {
            var x = getpaidSetup({
                PBFPubKey: API_publicKey,
                customer_email: $email,
                amount: parseInt(<?php echo $amount?>),
                customer_phone: "1234567890",
                currency: "NGN",
                txref: "1234567890",
                meta: [{
                    metaname: "flightID",
                    metavalue: "AP1234"
                }],
                onclose: function() {},
                callback: function(response) {
                    var txref = response.tx.txRef; // collect txRef returned and pass to a                  server page to complete status check.
                    console.log("Your payment was successful", response);
                    if (
                        response.tx.chargeResponseCode == "00" ||
                        response.tx.chargeResponseCode == "0"
                    ) {
                        window.location.href ="paysuccess.php?success=true";
                    } else {
                        window.location.href ="payfailure.php?success=false";
                    }

                    x.close(); // use this to close the modal immediately after payment.
                }
            });
        }
    </script>

    document.addEventListener("DOMContentLoaded", (event) => {
        // Add an event listener for when the user clicks the submit button to pay
        document.getElementById("submit").addEventListener("click", (e) => {
            e.preventDefault();
            const API_publicKey = "FLWPUBK_TEST-582b2bb44e90f4be4ad323cbe3a12c2a-X";
            const txRef = ''+Math.floor((Math.random() * 1000000000) + 1); //Generate a random id for the transaction reference
            const email = document.getElementById('email').value;
            const phone = document.getElementById('phone').value;
            const amount = document.getElementById('options').value;

    
        

         function payWithRave() {
            var x = getpaidSetup({
                PBFPubKey: API_publicKey,
                customer_email: email,
                amount: amount,
                customer_phone: phone,
                currency: "NGN",
                txref: txRef,
                
                onclose: function() {},
                callback: function(response) {
                    var txref = response.tx.txRef; // collect txRef returned and pass to a                  server page to complete status check.
                    console.log("Your payment was successful", response);
                    if (
                        response.tx.chargeResponseCode == "00" ||
                        response.tx.chargeResponseCode == "0"
                    ) {
                       // window.location.href ="paysuccess.php?success=true";
                    } else {
                       // window.location.href ="payfailure.php?success=false";
                    }

                    x.close(); // use this to close the modal immediately after payment.
                }
            });
        }
    });
});
 