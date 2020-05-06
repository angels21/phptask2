
document.addEventListener("DOMContentLoaded", (event) => {
        // Add an event listener for when the user clicks the submit button to pay
        document.getElementById("submit").addEventListener("click", (e) => {
            e.preventDefault();
            const API_publicKey = "FLWPUBK_TEST-582b2bb44e90f4be4ad323cbe3a12c2a-X";
            const txRef = ''+Math.floor((Math.random() * 1000000000) + 1); //Generate a random id for the transaction reference
            const email = document.getElementById('email').value;
            const phone = document.getElementById('phone').value;
            const amt = document.getElementById('amount').value;

    
        

         
            getpaidSetup({
                PBFPubKey: API_publicKey,
                customer_email: email,
                amount: amt,
                customer_phone: phone,
                currency: "NGN",
                txref: txRef,
                
                onclose: function() {},
                callback: function(response) {
                    txref = response.tx.txRef; // collect txRef returned and pass to a                  server page to complete status check.
                    console.log("Your payment was successful", response);
                    if (
                        response.tx.chargeResponseCode == "00" ||
                        response.tx.chargeResponseCode == "0"
                    ) {
                        window.location = "http://localhost/sng-v3/status.php?txref="+txref+"?amount="+amount;
                    } else {
                        window.location = "http://localhost/sng-v3/status.php?txref="+txref+"?amount="+amount;
                    }

                    // use this to close the modal immediately after payment.
                }
            });
            
        });
});
