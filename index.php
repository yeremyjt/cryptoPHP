
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="stylesheet.css" />
        <link href='http://fonts.googleapis.com/css?family=Armata' rel='stylesheet' type='text/css'/>
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
        <script type="text/javascript" src="script.js"></script>
        <script type="text/javascript" src="crypto.php"></script>
        <script type="text/javascript">
            $(document).ready(function(){
                $("#inputArea").focus();
                $("#encryptButton").click(function(){ 
                    if ($("#privateKeyField").val().length == 0)
                    {
                        alert("Please provide a private key to encrypt this message.")
                        $("#privateKeyField").focus();
                            
                    }
                    else
                    {
                        $inputArea = document.getElementById("inputArea").value;
                        $privateKeyField = document.getElementById("privateKeyField").value;
                        $.post("encrypt.php", {text:$inputArea, key:$privateKeyField},function(data){          
                            $("#outputArea").html(data);
                        });
                    }                              
                });
                $("#decryptButton").click(function(){ 
                    if ($("#privateKeyField").val().length == 0)
                    {
                        alert("Please provide the private key to decrypt this message.");
                        $("#privateKeyField").focus();
                    }
                    else
                    {
                        $inputArea = document.getElementById("inputArea").value;
                        $privateKeyField = document.getElementById("privateKeyField").value;
                        $.post("decrypt.php", {text:$inputArea, key:$privateKeyField},function(data){          
                            $("#outputArea").html(data);
                        });
                    }
                });
            });
        
        </script>
        
        <title>Crypto</title>
    </head>
    <body>                               
        <div id="header">Yeremy's Crypto</div>
        <div id="wrapper">
            <div id="loginArea"><Login>Login</Login></div>
            <h1>Input</h1>
            <form method="post">  
                <textarea id="inputArea" name="inputArea" type="textarea"></textarea>               
                <div><label for="privateKeyField">Private Key</label><input type="password" id="privateKeyField" name="privateKeyField"/></div>
                <div id="buttons">
                    <input id="encryptButton" name="encryptButton" class="actionButton" type="button" value="Encrypt" onclick =" "/> 
                    <input id="decryptButton" name="decryptButton" class="actionButton" type="button" value="Decrypt"/>                    
                </div>
            </form>
            <h1>Output</h1>
            <textarea id="outputArea" name="ouputArea"></textarea>

        </div>
    </body>
</html>  