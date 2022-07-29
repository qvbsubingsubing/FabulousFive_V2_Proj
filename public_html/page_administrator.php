<?php
    session_start();
    if ($_SESSION["curr_email"] == "none"){
        Header("Location: http://localhost/Software_Engineering_2/public_html/page_login.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Warehouse Administrator</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.js"integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="crossorigin="anonymous"></script>
        <link rel="stylesheet" href="style_warehouse.css">
    </head>
    <body class="row">
        
        <div class = "col-sm-12" style="width:100%">
            <div class="col-sm-8">
                <div id = "sticky_profile">
                    email: <?php echo $_SESSION["curr_email"];?>
                </div>
                <table id = "urgency_container" style = "visibility: collapse;">
                    <thead>
                        <tr>
                            <th>Item Urgency Content</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <div class="table-wrapper-scroll-y my-custom-scrollbar">
                                    <table id = "urgency_subcontainer">
                                        <thead id = "urgent_thead">
                                            <tr>
                                                <th>Item Name</th>
                                                <th>Sender Name</th>
                                                <th>Fragility</th>
                                                <th>quantity</th>
                                                <th>Date Order</th>
                                            </tr>
                                        </thead>
                                        <tbody id = "urgent_items"></tbody>
                                    </table>
                                </div>
                                
                            </td>
                        </tr>
                    </tbody>
                </table>
                <table id = "expiration_container">
                    <thead>
                        <tr>
                            <th>Storage Expiration Content</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <div class="table-wrapper-scroll-y my-custom-scrollbar">
                                    <table id = "expiration_subcontainer">
                                        <thead>
                                            <tr>
                                                <th>Item Name</th>
                                                <th>fragility</th>
                                                <th>expiration</th>
                                                <th>date_in</th>
                                                <th>sender</th>
                                                <th>quantity</th>
                                            </tr>
                                        </thead>
                                        <tbody id = "expiration_items"></tbody>
                                    </table>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <table id = "items_container">
                    <thead>
                        <tr>
                            <th>Storage Content</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <div class="table-wrapper-scroll-y my-custom-scrollbar">
                                    <table id = "items_table">
                                        <thead>
                                            <tr>
                                                <th onclick = "storage_content_item_name_function()">Item Name</th>
                                                <th onclick = "storage_content_sender_name_function()">Sender</th>
                                                <th onclick = "storage_content_fragility_function()">fragility</th>
                                                <th onclick = "storage_content_quantity_function()">quantity</th>
                                                <th onclick = "storage_content_date_in_function()">date_in</th>
                                                <th onclick = "storage_content_expiration_function()">expiration</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody id = "items"></tbody>
                                    </table>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <table id = "send_items_container" style="visibility: collapse;">
                    <thead>
                        <tr>
                            <th>Store Item/s</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <div>
                                    <table id = "send_items_table">
                                        <thead>
                                            
                                        </thead>
                                        <tbody id = "send_items">
                                            <tr>
                                                <td>Item Name: <input id="input_item_name" type="text"> Quantity: <input id="input_quantity" type="number"> Fragile? : <select id="input_fragile">
                                                      <option value="No">No</option>
                                                      <option value="Yes">Yes</option>
                                                    </select>
                                                     Expiration: <input id="input_expiration" type="date"><div id="tooltip" style="font-weight: bold; text-align: right;">?
                                                      <span id="tooltiptext">If it is expirable then input the expiration date</span>
                                                    </div><br>
                                                    <input type="button" value="Send" onclick="in_transact_item()">
                                                    <input type="button" value="Cancel" onclick = "send_item_cancel()">
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <table id = "out_items_container" style="visibility: collapse;">
                    <thead>
                        <tr>
                            <th>Incoming Items</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <input type = "button" value = "Cancel" style = "color: black" onclick="view_incoming_deliveries_cancel()">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div>
                                    <table id = "out_items_table">
                                        <thead>
                                            <tr>
                                                <th>Item Name</th>
                                                <th>Sender Name</th>
                                                <th>Fragility</th>
                                                <th>Quantity</th>
                                                <th>Date In</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id = "out_items">
                                        </tbody>
                                    </table>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <table id = "withdraw_items_container" style="width:100%; visibility: collapse;">
                    <thead>
                        <tr>
                            <th>Withdraw Items</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <input type = "button" value = "Cancel" style = "color: black" onclick="show_withdraw_section_cancel()">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div>
                                    <table id = "withdraw_items_table" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th style="width: 30%">Item Name</th>
                                                <th style="width: 30%">Sender Name</th>
                                                <th style="width: 40%">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id = "withdraw_items">
                                        </tbody>
                                    </table>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-sm-4" id = "sticky_chat_section">
                <table id = "contacts_container">
                    <thead>
                        <tr>
                            <th>CONTACTS</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <div class="table-wrapper-scroll-y my-custom-scrollbar">
                                    <table id = "contacts_subcontainer">
                                        <thead>
                                            <tr>
                                                <th onclick="warehouse_accounts_first_name_function()">Name</th>
                                                <th onclick="warehouse_accounts_email_function()">email</th>
                                                <th onclick="warehouse_accounts_contact_number_function()">contact number</th>
                                            </tr>
                                        </thead>
                                        <tbody id = "contacts"></tbody>
                                    </table>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="col-sm-12">
                    <div id = "chat-area" class="table-wrapper-scroll-y my-custom-scrollbar" style="display: flex;
  flex-direction: column-reverse;">
                        <table id = "curr_chat_subcontainer">
                            <thead id = "curr_chat_th">
                                <tr>
                                    <th>CHATBOX</th>
                                </tr>
                            </thead>
                            <tbody id = "chat"></tbody>
                        </table>
                    </div>      
                    <textarea id = "message_input"  class="col-sm-12" rows="4" cols="50" style="resize: none;"></textarea>
                    <button id = "button_send" class="col-sm-12" onclick = "init_send_message()">Send</button>
                </div>
                <img id = "image_logo" class="col-sm-6" src="images/logo.png" width="100%">
                <div class="col-sm-6">
                    <button class="col-sm-12" id="btn_insert" style = "visibility: collapse;" onclick="insert_item()">Store Items</button>
                    <button class="col-sm-12" id="btn_withdraw" style = "visibility: collapse;" onclick="show_withdraw_section()">Withdraw Items</button>
                    <button class="col-sm-12" onclick="view_incoming_deliveries()">Incoming Deliveries</button>
                    <button class="col-sm-12" onclick="logout()">Log Out</button>
                </div>
            </div>
        </div>
        
    </body>
    <script>
    //PUBLIC VARIABLES
    if(<?php echo $_SESSION["curr_account_id"]?> != "1"){
        document.getElementById("btn_insert").style.visibility = "visible";
        document.getElementById("btn_withdraw").style.visibility = "visible";
    } else {
        alert("Inventory Content UPDATED");
        $.ajax({
            url: "delete_item.php",
            type: "GET",
            success: function(response){}
        });
    }
    message_receiver = 0;
    //URGENCY CONTENT
        $.ajax({
            url: "fetch_item_list_by_urgency.php",
            type: "GET",
            success: function(response){
                alert(response);
                response = JSON.parse(decrypt(response));
                if(<?php echo $_SESSION["curr_account_id"]?> == 1){
                    document.getElementById("urgency_container").style.visibility = "visible";
                    response.forEach(function (item_list) {
                        $('#urgent_items').append('<tr>');
                        if(item_list.date_order != '1111-11-11'){
                            $('#urgent_items').append('<td>' + item_list.item_name + '</td>');
                            $('#urgent_items').append('<td>' + item_list.firstname + " " + item_list.lastname + '</td>');
                            $('#urgent_items').append('<td>' + item_list.fragility + '</td>');
                            $('#urgent_items').append('<td>' + item_list.quantity + '</td>');
                            $('#urgent_items').append('<td>' + item_list.date_order + '</td>');
                        }
                        $('#urgent_items').append('</tr>');
                    });
                }
            }
        });
    //EXPIRATION CONTENT
        $.ajax({
            url: "fetch_item_list.php",
            type: "GET",
            success: function(response){
                //alert(response);
                response = JSON.parse(decrypt(response));
                response.forEach(function (item_list) {
                    if(<?php echo $_SESSION["curr_account_id"]?> == 1){
                        if(item_list.expiration != '1111-11-11'){
                            $('#expiration_items').append('<tr>');
                            $('#expiration_items').append('<td>' + item_list.item_name + '</td>');
                            $('#expiration_items').append('<td>' + item_list.fragility + '</td>');
                            $('#expiration_items').append('<td>' + item_list.expiration + '</td>');
                            $('#expiration_items').append('<td>' + item_list.date_in + '</td>');
                            $('#expiration_items').append('<td>' + item_list.firstname + " " + item_list.lastname + '</td>');
                            $('#expiration_items').append('<td>' + item_list.quantity + '</td>');
                            $('#expiration_items').append('</tr>');
                        }
                    }
                    else if (<?php echo $_SESSION["curr_account_id"]?> == item_list.sender_id){
                        if(item_list.expiration != '1111-11-11'){
                            $('#expiration_items').append('<tr>');
                            $('#expiration_items').append('<td>' + item_list.item_name + '</td>');
                            $('#expiration_items').append('<td>' + item_list.fragility + '</td>');
                            $('#expiration_items').append('<td>' + item_list.expiration + '</td>');
                            $('#expiration_items').append('<td>' + item_list.date_in + '</td>');
                            $('#expiration_items').append('<td>' + item_list.firstname + " " + item_list.lastname + '</td>');
                            $('#expiration_items').append('<td>' + item_list.quantity + '</td>');
                            $('#expiration_items').append('</tr>');
                        }
                    }
                    
                });
            }
        });
    //STORAGE CONTENT
        $.ajax({
            url: "fetch_item_list.php",
            type: "GET",
            success: function(response){
                response = JSON.parse(decrypt(response));
                response.forEach(function (item_list) {
                    if(<?php echo $_SESSION["curr_account_id"]?> == 1 && item_list.admin_confirm == 1 && item_list.client_confirm != 1){
                        $('#items').append('<tr>');
                            $('#items').append('<td>' + item_list.item_name + '</td>');
                            $('#items').append('<td>' + item_list.firstname + " " + item_list.lastname + '</td>');
                            $('#items').append('<td>' + item_list.fragility + '</td>');
                            $('#items').append('<td>' + item_list.quantity + '</td>');
                            $('#items').append('<td>' + item_list.date_in + '</td>');
                            if(item_list.expiration == '1111-11-11'){
                                $('#items').append('<td>' + "N/A" + '</td>');
                            } else {
                                $('#items').append('<td>' + item_list.expiration + '</td>');
                            }
                            
                        $('#items').append('</tr>');
                    }
                    else if (<?php echo $_SESSION["curr_account_id"]?> == item_list.sender_id && item_list.admin_confirm == 1 && item_list.client_confirm != 1){
                        $('#items').append('<tr>');
                            $('#items').append('<td>' + item_list.item_name + '</td>');
                            $('#items').append('<td>' + item_list.firstname + " " + item_list.lastname + '</td>');
                            $('#items').append('<td>' + item_list.fragility + '</td>');
                            $('#items').append('<td>' + item_list.quantity + '</td>');
                            $('#items').append('<td>' + item_list.date_in + '</td>');
                            if(item_list.expiration == '1111-11-11'){
                                $('#items').append('<td>' + "N/A" + '</td>');
                            } else {
                                $('#items').append('<td>' + item_list.expiration + '</td>');
                            }
                        $('#items').append('</tr>');
                    }
                });
            }
        });
    //CONTACTS CONTENT
        $.ajax({
            url: "fetch_contacts_list.php",
            type: "GET",
            success: function(response){
                response.forEach(function (contacts) {
                    $('#contacts').append('<tr>');
                        $('#contacts').append('<td id = "'+contacts.id+'" onclick = "contacts_click_function('+contacts.id+')">' + contacts.firstname + " " + contacts.lastname + '</td>');
                        $('#contacts').append('<td id = "'+contacts.id+'" onclick = "contacts_click_function('+contacts.id+')">' + contacts.email + '</td>');
                        $('#contacts').append('<td id = "'+contacts.id+'" onclick = "contacts_click_function('+contacts.id+')">' + contacts.contactnumber + '</td>');
                    $('#contacts').append('</tr>');
                });
            }
        });
    //CHATS CONTENT
        $.ajax({
            url: "fetch_chatbox_messages.php",
            type: "GET",
            success: function(response){
                response = JSON.parse(decrypt(response));
                response.forEach(function (chats) {
                    //need pre-requisite
                        $('#chat').append('<tr>');
                            if(<?php echo $_SESSION["curr_account_id"]?> == chats.sender_id){
                                $('#chat').append('<td style="text-align: right; font-weight: bold;">' + chats.message_content + '</td>');
                            } else {
                                $('#chat').append('<td>' + chats.message_content + '</td>');
                            }
                        $('#chat').append('</tr>');
                });
            }
        });
    //INCOMING CONTENT
        $.ajax({
            url: "fetch_item_list.php",
            type: "GET",
            success: function(response){
                response = JSON.parse(decrypt(response));
                response.forEach(function (item_list) {
                    if(<?php echo $_SESSION["curr_account_id"]?> == 1 && item_list.admin_confirm != 1){
                        $('#out_items').append('<tr>');
                            $('#out_items').append('<td>' + item_list.item_name + '</td>');
                            $('#out_items').append('<td>' + item_list.firstname + " " + item_list.lastname + '</td>');
                            $('#out_items').append('<td>' + item_list.fragility + '</td>');
                            $('#out_items').append('<td>' + item_list.quantity + '</td>');
                            $('#out_items').append('<td>' + item_list.date_in + '</td>');
                            $('#out_items').append('<td><input id="item_confirmation'+item_list.item_id+'" type="button" value="Confirm Transaction" onclick="item_confirm_transaction('+item_list.item_id+')"></td>');
                        $('#out_items').append('</tr>');
                    }
                    else if (<?php echo $_SESSION["curr_account_id"]?> == item_list.receiver_id && item_list.date_order != "1111-11-11" && item_list.client_confirm != "1" && item_list.admin_confirm == 1){
                        $('#out_items').append('<tr>');
                            $('#out_items').append('<td>' + item_list.item_name + '</td>');
                            $('#out_items').append('<td>' + item_list.firstname + " " + item_list.lastname + '</td>');
                            $('#out_items').append('<td>' + item_list.fragility + '</td>');
                            $('#out_items').append('<td>' + item_list.quantity + '</td>');
                            $('#out_items').append('<td>' + item_list.date_in + '</td>');
                            $('#out_items').append('<td><input id="item_confirmation'+item_list.item_id+'" type="button" value="Confirm Transaction" onclick="item_confirm_transaction('+item_list.item_id+')"></td>');
                        $('#out_items').append('</tr>');
                    }
                });
            }
        });
    //WITHDRAW CONTENT
    $.ajax({
            url: "fetch_item_list.php",
            type: "GET",
            success: function(response){
                response = JSON.parse(decrypt(response));
                response.forEach(function (item_list) {
                    if (<?php echo $_SESSION["curr_account_id"]?> == item_list.sender_id && item_list.date_order == "1111-11-11" && item_list.admin_confirm == 1){
                        $('#withdraw_items').append('<tr>');
                        $('#withdraw_items').append('<td style="width:20%">' + item_list.item_name + '</td>');
                        $('#withdraw_items').append('<td style="width:20%">' + item_list.firstname + " " + item_list.lastname + '</td>');
                        $('#withdraw_items').append('<td style="width:60%">Send to: <input type="text" placeholder="email or number" value="me" id="withdraw_account_target"><input type="button" value="Send" onclick="withdraw_output('+item_list.item_id+')"></td>');
                        $('#withdraw_items').append('</tr>');
                    }
                    
                });
            }
        });
// END INITIAL FETCHES
// START FUNCTION FETCH STORAGE CONTENTS
        function storage_content_item_name_function(){
            $.ajax({
            url: "function_fetch_item_name.php",
            type: "GET",
            success: function(response){
                $("#items").empty();
                response = JSON.parse(decrypt(response));
                response.forEach(function (item_list) {
                    if(<?php echo $_SESSION["curr_account_id"]?> == 1){
                        $('#items').append('<tr>');
                            $('#items').append('<td>' + item_list.item_name + '</td>');
                            $('#items').append('<td>' + item_list.firstname + " " + item_list.lastname + '</td>');
                            $('#items').append('<td>' + item_list.fragility + '</td>');
                            $('#items').append('<td>' + item_list.quantity + '</td>');
                            $('#items').append('<td>' + item_list.date_in + '</td>');
                            if(item_list.expiration == '1111-11-11'){
                                $('#items').append('<td>' + "N/A" + '</td>');
                            } else {
                                $('#items').append('<td>' + item_list.expiration + '</td>');
                            }
                        $('#items').append('</tr>');
                    }
                    else if (<?php echo $_SESSION["curr_account_id"]?> == item_list.sender_id){
                        $('#items').append('<tr>');
                            $('#items').append('<td>' + item_list.item_name + '</td>');
                            $('#items').append('<td>' + item_list.firstname + " " + item_list.lastname + '</td>');
                            $('#items').append('<td>' + item_list.fragility + '</td>');
                            $('#items').append('<td>' + item_list.quantity + '</td>');
                            $('#items').append('<td>' + item_list.date_in + '</td>');
                            if(item_list.expiration == '1111-11-11'){
                                $('#items').append('<td>' + "N/A" + '</td>');
                            } else {
                                $('#items').append('<td>' + item_list.expiration + '</td>');
                            }
                        $('#items').append('</tr>');
                    }
                    
                });
                
            }
        });
        }

        function storage_content_sender_name_function(){
            $.ajax({
            url: "function_fetch_sender_name.php",
            type: "GET",
            success: function(response){
                $("#items").empty();
                response = JSON.parse(decrypt(response));
                response.forEach(function (item_list) {
                    if(<?php echo $_SESSION["curr_account_id"]?> == 1){
                        $('#items').append('<tr>');
                            $('#items').append('<td>' + item_list.item_name + '</td>');
                            $('#items').append('<td>' + item_list.firstname + " " + item_list.lastname + '</td>');
                            $('#items').append('<td>' + item_list.fragility + '</td>');
                            $('#items').append('<td>' + item_list.quantity + '</td>');
                            $('#items').append('<td>' + item_list.date_in + '</td>');
                            if(item_list.expiration == '1111-11-11'){
                                $('#items').append('<td>' + "N/A" + '</td>');
                            } else {
                                $('#items').append('<td>' + item_list.expiration + '</td>');
                            }
                        $('#items').append('</tr>');
                    }
                    else if (<?php echo $_SESSION["curr_account_id"]?> == item_list.sender_id){
                        $('#items').append('<tr>');
                            $('#items').append('<td>' + item_list.item_name + '</td>');
                            $('#items').append('<td>' + item_list.firstname + " " + item_list.lastname + '</td>');
                            $('#items').append('<td>' + item_list.fragility + '</td>');
                            $('#items').append('<td>' + item_list.quantity + '</td>');
                            $('#items').append('<td>' + item_list.date_in + '</td>');
                            if(item_list.expiration == '1111-11-11'){
                                $('#items').append('<td>' + "N/A" + '</td>');
                            } else {
                                $('#items').append('<td>' + item_list.expiration + '</td>');
                            }
                        $('#items').append('</tr>');
                    }
                    
                });
                
            }
        });
        }
        function storage_content_fragility_function(){
            $.ajax({
            url: "function_fetch_fragility.php",
            type: "GET",
            success: function(response){
                $("#items").empty();
                response = JSON.parse(decrypt(response));
                response.forEach(function (item_list) {
                    if(<?php echo $_SESSION["curr_account_id"]?> == 1){
                        $('#items').append('<tr>');
                            $('#items').append('<td>' + item_list.item_name + '</td>');
                            $('#items').append('<td>' + item_list.firstname + " " + item_list.lastname + '</td>');
                            $('#items').append('<td>' + item_list.fragility + '</td>');
                            $('#items').append('<td>' + item_list.quantity + '</td>');
                            $('#items').append('<td>' + item_list.date_in + '</td>');
                            if(item_list.expiration == '1111-11-11'){
                                $('#items').append('<td>' + "N/A" + '</td>');
                            } else {
                                $('#items').append('<td>' + item_list.expiration + '</td>');
                            }
                        $('#items').append('</tr>');
                    }
                    else if (<?php echo $_SESSION["curr_account_id"]?> == item_list.sender_id){
                        $('#items').append('<tr>');
                            $('#items').append('<td>' + item_list.item_name + '</td>');
                            $('#items').append('<td>' + item_list.firstname + " " + item_list.lastname + '</td>');
                            $('#items').append('<td>' + item_list.fragility + '</td>');
                            $('#items').append('<td>' + item_list.quantity + '</td>');
                            $('#items').append('<td>' + item_list.date_in + '</td>');
                            if(item_list.expiration == '1111-11-11'){
                                $('#items').append('<td>' + "N/A" + '</td>');
                            } else {
                                $('#items').append('<td>' + item_list.expiration + '</td>');
                            }
                        $('#items').append('</tr>');
                    }
                    
                });
                
            }
        });
        }
        function storage_content_quantity_function(){
            $.ajax({
            url: "function_fetch_quantity.php",
            type: "GET",
            success: function(response){
                $("#items").empty();
                response = JSON.parse(decrypt(response));
                response.forEach(function (item_list) {
                    if(<?php echo $_SESSION["curr_account_id"]?> == 1){
                        $('#items').append('<tr>');
                            $('#items').append('<td>' + item_list.item_name + '</td>');
                            $('#items').append('<td>' + item_list.firstname + " " + item_list.lastname + '</td>');
                            $('#items').append('<td>' + item_list.fragility + '</td>');
                            $('#items').append('<td>' + item_list.quantity + '</td>');
                            $('#items').append('<td>' + item_list.date_in + '</td>');
                            if(item_list.expiration == '1111-11-11'){
                                $('#items').append('<td>' + "N/A" + '</td>');
                            } else {
                                $('#items').append('<td>' + item_list.expiration + '</td>');
                            }
                        $('#items').append('</tr>');
                    }
                    else if (<?php echo $_SESSION["curr_account_id"]?> == item_list.sender_id){
                        $('#items').append('<tr>');
                            $('#items').append('<td>' + item_list.item_name + '</td>');
                            $('#items').append('<td>' + item_list.firstname + " " + item_list.lastname + '</td>');
                            $('#items').append('<td>' + item_list.fragility + '</td>');
                            $('#items').append('<td>' + item_list.quantity + '</td>');
                            $('#items').append('<td>' + item_list.date_in + '</td>');
                            if(item_list.expiration == '1111-11-11'){
                                $('#items').append('<td>' + "N/A" + '</td>');
                            } else {
                                $('#items').append('<td>' + item_list.expiration + '</td>');
                            }
                        $('#items').append('</tr>');
                    }
                    
                });
                
            }
        });
        }
        function storage_content_date_in_function(){
            $.ajax({
            url: "function_fetch_date_in.php",
            type: "GET",
            success: function(response){
                $("#items").empty();
                response = JSON.parse(decrypt(response));
                response.forEach(function (item_list) {
                    if(<?php echo $_SESSION["curr_account_id"]?> == 1){
                        $('#items').append('<tr>');
                            $('#items').append('<td>' + item_list.item_name + '</td>');
                            $('#items').append('<td>' + item_list.firstname + " " + item_list.lastname + '</td>');
                            $('#items').append('<td>' + item_list.fragility + '</td>');
                            $('#items').append('<td>' + item_list.quantity + '</td>');
                            $('#items').append('<td>' + item_list.date_in + '</td>');
                            if(item_list.expiration == '1111-11-11'){
                                $('#items').append('<td>' + "N/A" + '</td>');
                            } else {
                                $('#items').append('<td>' + item_list.expiration + '</td>');
                            }
                        $('#items').append('</tr>');
                    }
                    else if (<?php echo $_SESSION["curr_account_id"]?> == item_list.sender_id){
                        $('#items').append('<tr>');
                            $('#items').append('<td>' + item_list.item_name + '</td>');
                            $('#items').append('<td>' + item_list.firstname + " " + item_list.lastname + '</td>');
                            $('#items').append('<td>' + item_list.fragility + '</td>');
                            $('#items').append('<td>' + item_list.quantity + '</td>');
                            $('#items').append('<td>' + item_list.date_in + '</td>');
                            if(item_list.expiration == '1111-11-11'){
                                $('#items').append('<td>' + "N/A" + '</td>');
                            } else {
                                $('#items').append('<td>' + item_list.expiration + '</td>');
                            }
                        $('#items').append('</tr>');
                    }
                    
                });
                
            }
        });
        }
        function storage_content_expiration_function(){
            $.ajax({
            url: "function_fetch_expiration.php",
            type: "GET",
            success: function(response){
                $("#items").empty();
                response = JSON.parse(decrypt(response));
                response.forEach(function (item_list) {
                    if(<?php echo $_SESSION["curr_account_id"]?> == 1){
                        $('#items').append('<tr>');
                            $('#items').append('<td>' + item_list.item_name + '</td>');
                            $('#items').append('<td>' + item_list.firstname + " " + item_list.lastname + '</td>');
                            $('#items').append('<td>' + item_list.fragility + '</td>');
                            $('#items').append('<td>' + item_list.quantity + '</td>');
                            $('#items').append('<td>' + item_list.date_in + '</td>');
                            if(item_list.expiration == '1111-11-11'){
                                $('#items').append('<td>' + "N/A" + '</td>');
                            } else {
                                $('#items').append('<td>' + item_list.expiration + '</td>');
                            }
                        $('#items').append('</tr>');
                    }
                    else if (<?php echo $_SESSION["curr_account_id"]?> == item_list.sender_id){
                        $('#items').append('<tr>');
                            $('#items').append('<td>' + item_list.item_name + '</td>');
                            $('#items').append('<td>' + item_list.firstname + " " + item_list.lastname + '</td>');
                            $('#items').append('<td>' + item_list.fragility + '</td>');
                            $('#items').append('<td>' + item_list.quantity + '</td>');
                            $('#items').append('<td>' + item_list.date_in + '</td>');
                            if(item_list.expiration == '1111-11-11'){
                                $('#items').append('<td>' + "N/A" + '</td>');
                            } else {
                                $('#items').append('<td>' + item_list.expiration + '</td>');
                            }
                        $('#items').append('</tr>');
                    }
                    
                });
                
            }
        });
        }
// END FUNCTION FETCH STORAGE CONTENTS
// START FUNCTION CONTACTS CONTENTS

        function contacts_click_function(x){
            $("#chat").empty();
            message_receiver = x;
            $.post("function_fetch_choose_update_chat.php",
              {
                receiver: x
              },
              function(data, status){
                //alert("chosen target: "+x);
                data.forEach(function (chats) {
                    //need pre-requisite
                        $('#chat').append('<tr>');
                            if(<?php echo $_SESSION["curr_account_id"]?> == chats.sender_id){
                                $('#chat').append('<td style="text-align: right; font-weight: bold;">' + chats.message_content + '</td>');
                            } else {
                                $('#chat').append('<td>' + chats.message_content + '</td>');
                            }
                        $('#chat').append('</tr>');
                });
                // location.reload();
                
              });
        }
// END FUNCTION CONTACTS CONTENTS
// START FUNCTION SEND MESSAGE
    function send_message(x, y){
        $.ajaxSetup({async: false});
        //alert("message_receiver = "+message_receiver)
        //alert("send message: " + x);
        $.post("insert_message.php",{message: encrypt(x), message_receiver: y},function(data, status){
            document.getElementById("message_input").value = "";
            alert(data);
            // location.reload();
        });
        $("#chat").empty();
        $.post("function_fetch_choose_update_chat.php",
              {
                receiver: y
              },
              function(data, status){
                //alert("chosen target: "+x);
                data.forEach(function (chats) {
                    //need pre-requisite
                        $('#chat').append('<tr>');
                            if(<?php echo $_SESSION["curr_account_id"]?> == chats.sender_id){
                                $('#chat').append('<td style="text-align: right; font-weight: bold;">' + chats.message_content + '</td>');
                            } else {
                                $('#chat').append('<td>' + chats.message_content + '</td>');
                            }
                        $('#chat').append('</tr>');
                });
                // location.reload();
                
              });
        $.ajaxSetup({async: true});
    }
    function init_send_message(){
        x = document.getElementById("message_input").value;
        send_message(x, message_receiver);
    }
// END FUNCTION SEND MESSAGE
// START FUNCTION INSERT ITEM DISPLAY
    function insert_item(){
        document.getElementById("urgency_container").style.visibility = "collapse";
        document.getElementById("expiration_container").style.visibility = "collapse";
        document.getElementById("items_container").style.visibility = "collapse";
        document.getElementById("send_items_container").style.visibility = "visible";
        document.getElementById("out_items_container").style.visibility = "collapse";
        document.getElementById("withdraw_items_container").style.visibility = "collapse";
    }
// END FUNCTION INSERT ITEM DISPLAY
// START FUNCTION INSERT ITEM
    function in_transact_item(){
        $.post("insert_item.php",
              {
                item_name: encrypt($("#input_item_name").val()),
                quantity: encrypt($("#input_quantity").val()),
                fragility: encrypt($("#input_fragile").val()),
                date_of_input: encrypt($("#input_expiration").val())
              },
              function(data, status){
                //alert("data: ["+data+"]");
                alert("ITEM INSERTION SUCCESSFUL");
                document.getElementById("input_item_name").value = "";
                document.getElementById("input_quantity").value = "";
                document.getElementById("input_fragile").value = "No";
                document.getElementById("input_expiration").value = "";
              });
    }
// END FUNCTION INSERT ITEM
// START FUNCTION INSERT ITEM CANCEL DISPLAY
    function send_item_cancel(){
        if(<?php echo $_SESSION["curr_account_id"]?> == "1"){
            document.getElementById("urgency_container").style.visibility = "visible";
        }
        document.getElementById("expiration_container").style.visibility = "visible";
        document.getElementById("items_container").style.visibility = "visible";
        document.getElementById("send_items_container").style.visibility = "collapse";
        document.getElementById("withdraw_items_container").style.visibility = "collapse";
    }
// END FUNCTION INSERT ITEM CANCEL DISPLAY
// START INCOMING ITEMS
    function view_incoming_deliveries(){
        document.getElementById("urgency_container").style.visibility = "collapse";
        document.getElementById("expiration_container").style.visibility = "collapse";
        document.getElementById("items_container").style.visibility = "collapse";
        document.getElementById("send_items_container").style.visibility = "collapse";
        document.getElementById("out_items_container").style.visibility = "visible";
        document.getElementById("withdraw_items_container").style.visibility = "collapse";
    }
// END INCOMING ITEMS
// START FUNCTION CONFIRM INCOMING ITEM
    function item_confirm_transaction(x){
        $.post("update_item_confirmation.php",
              {
                confirm_target: x,
              },
              function(data, status){
                alert(data)
                location.reload();
              });
    }
// END FUNCTION CONFIRM INCOMING ITEM
// START FUNCTION INCOMING CANCEL
    function view_incoming_deliveries_cancel(){
        if(<?php echo $_SESSION["curr_account_id"]?> == "1"){
            document.getElementById("urgency_container").style.visibility = "visible";
        }
        document.getElementById("expiration_container").style.visibility = "visible";
        document.getElementById("items_container").style.visibility = "visible";
        document.getElementById("out_items_container").style.visibility = "collapse";
        document.getElementById("withdraw_items_container").style.visibility = "collapse";
    }
// END FUNCTION INCOMING CANCEL
//START FUNCTION WITHDRAW OUTPUT
    function withdraw_output(x){
    //alert("withdraw_output detected");
        $.post("function_withdraw_output.php",
              {
                withdraw_item_id: x,
                withdraw_target: $("#withdraw_account_target").val(),
              },
              function(data, status){
                alert(data);
                location.reload();
              });
    }
//END FUNCTION WITHDRAW OUTPUT
//START FUNCTION WITHDRAW DISPLAY
    function show_withdraw_section(){
        document.getElementById("urgency_container").style.visibility = "collapse";
        document.getElementById("expiration_container").style.visibility = "collapse";
        document.getElementById("items_container").style.visibility = "collapse";
        document.getElementById("send_items_container").style.visibility = "collapse";
        document.getElementById("out_items_container").style.visibility = "collapse";
        document.getElementById("withdraw_items_container").style.visibility = "visible";
    }
//END FUNCTION WITHDRAW DISPLAY
//START FUNCTION WITHDRAW DISPLAY CANCEL
    function show_withdraw_section_cancel(){
        if(<?php echo $_SESSION["curr_account_id"]?> == "1"){
            document.getElementById("urgency_container").style.visibility = "visible";
        }
        document.getElementById("expiration_container").style.visibility = "visible";
        document.getElementById("items_container").style.visibility = "visible";
        document.getElementById("send_items_container").style.visibility = "collapse";
        document.getElementById("withdraw_items_container").style.visibility = "collapse";
    }
//END FUNCTION WITHDRAW DISPLAY CANCEL
//START FUNCTION LOGOUT
    function logout(){
        window.location.href = "page_login.php";
    }
//END FUNCTION LOGOUT
//START RSA ALGORITHM
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
        //alert("P: "+encrypt_array[p_var].toString()+" | Q: "+encrypt_array[q_var].toString()+" | N: "+n_var.toString()+" | L: "+l_var.toString()+" | E: "+e_var.toString()+" | D: "+public_key.toString())
        //ENCRYPTING
        encrypted_message = []
        for(let i = 0; i < ascii_message.length; i++){
            encrypted_message[i] = powerMod(ascii_message[i], e_var, n_var)
        }
        encrypted_message[encrypted_message.length] = public_key;
        encrypted_message[encrypted_message.length] = n_var;
        return encrypted_message;
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
        return decrypted_message;
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
//END RSA ALGORITHM
    </script>
</html>