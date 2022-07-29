<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html>
<body id="smig">
</body>
<script>
    sample_string = "Hello Gio"
    encrypted_string = encrypt(sample_string);
    decrypted_string = decrypt(encrypted_string);
    function encrypt(sample_message){
        //sample message (well literally). ascii message, same as sample message, but in ascii form.
        ascii_message = []
        for(let i = 0; i < sample_message.length; i++){
            ascii_message[i] = sample_message.charCodeAt(i);
        }
        //RSA-in TIME!
        encrypt_array = [11, 13, 17, 19, 23, 29, 191, 193, 197, 199]
        prime_array = [2, 3, 5, 7, 11, 13, 17, 19, 23, 29, 31, 37, 41, 43, 47, 53, 59, 61, 67, 71, 73, 79, 83, 89, 97]
        p_var = Math.floor(Math.random() * encrypt_array.length);
        q_var = Math.floor(Math.random() * encrypt_array.length);
        while(q_var == p_var){
            q_var = Math.floor(Math.random() * encrypt_array.length);
        }
        n_var = encrypt_array[p_var] * encrypt_array[q_var];
        l_var = (encrypt_array[p_var] - 1) * (encrypt_array[q_var] - 1);
        e_var = prime_array[Math.floor(Math.random() * prime_array.length)];
        while(parseInt(n_var % e_var) == 0 || parseInt(l_var % e_var) == 0){
            e_var = prime_array[Math.floor(Math.random() * prime_array.length)];
        }
        public_key = 0;
        while(((public_key * e_var) % l_var) != 1){
            public_key += 1;
        }
        alert("P: "+encrypt_array[p_var].toString()+" | Q: "+encrypt_array[q_var].toString()+" | N: "+n_var.toString()+" | L: "+l_var.toString()+" | E: "+e_var.toString()+" | D: "+public_key.toString())
        //ENCRYPTING
        encrypted_message = []
        for(let i = 0; i < ascii_message.length; i++){
            encrypted_message[i] = powerMod(ascii_message[i], e_var, n_var)
        }
        encrypted_message[encrypted_message.length] = public_key;
        encrypted_message[encrypted_message.length] = n_var;
        return encrypted_message
    }
    function decrypt(sample_encrypted_message){
        //DECRYPTING
        raw_decrypted_message = [];
        decrypted_message = "";
        for(let i = 0; i < sample_encrypted_message.length - 2; i++){
            raw_decrypted_message[i] = powerMod(sample_encrypted_message[i], sample_encrypted_message[sample_encrypted_message.length-2], sample_encrypted_message[sample_encrypted_message.length-1])
        }
        for(let i = 0; i < raw_decrypted_message.length; i++){
            decrypted_message = decrypted_message + String.fromCharCode(raw_decrypted_message[i]);
        }
        return decrypted_message
    }
    function powerMod(base, exponent, modulus) {
        if (modulus === 1) return 0;
        var result = 1;
        base = base % modulus;
        while (exponent > 0) {
            if (exponent % 2 === 1)  //odd number
                result = (result * base) % modulus;
            exponent = exponent >> 1; //divide by 2
            base = (base * base) % modulus;
        }
        return result;
    }
    document.getElementById("smig").innerHTML = decrypted_string;
</script>
</html>