<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body" >
    <div style="text-align:center" >
        <label for="">nom:</label>
        <input type="text" id="name"><br>
        <label for="">description:</label>
        <input type="text" id="description"><br>
        <label for="">status:</label>
        <input type="text" id="status"><br>
        <label for="">date_limite:</label>
        <input type="date" id="date_limite"><br>
 
        
        <input type="button" value="click" onclick="tp()">
        <h2 id="p" ></h2>
    </div>

    <script>
            function tp(){
                
            var x = new XMLHttpRequest();
            var m = document.getElementById("name").value;
            var description = document.getElementById("description").value;
            var status = document.getElementById("status").value;
            var date_limite = document.getElementById("date_limite").value;
 
            x.onreadystatechange = function(){
                if(x.readyState == 4 && x.status == 200){
                    document.getElementById("p").innerHTML = x.responseText;
                    
                }
            }
            x.open("GET", "welcom.php?name=" + m + "&description=" + description + "&status=" + status +"&date_limite=" + date_limite, true);
            x.send();
        }
    
    
    </script>
</body>
</html>
