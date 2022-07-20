<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Finder by AMIR</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">    
    <style>
        html { 
  background: url(maps.png) no-repeat center center fixed; 
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
}
body{
  background: none;
}
.container{
  text-align: center;
  margin-top: 180px;
  width: 700px;
}
#message{
    width: 400px;
    margin: 150px auto;
}
div.a{
    font-size: 73px;
    color: white;
    text-shadow: 0 0 2px #000; /* horizontal-offset vertical-offset 'blur' colour */
    -moz-text-shadow: 0 0 2px #000;
    -webkit-text-shadow: 0 0 2px #000;
    font-weight: bold;
}
.a{
    -webkit-text-stroke-width: 2px;
            -webkit-text-stroke-color: black;
}

.main-search-input {
    background: #fff;
    padding: 0 120px 0 0;
    border-radius: 1px;
    width: 100%;
    margin-top: 50px;
    box-shadow: 0px 0px 0px 6px rgba(255,255,255,0.3);
}

.fl-wrap {
    float: left;
    width: 100%;
    position: relative;
}


.main-search-input-item {
    float: left;
    width: 100%;
    box-sizing: border-box;
    border-right: 1px solid #eee;
    height: 50px;
    position: relative;
}

.main-search-input-item input:first-child {
    border-radius: 100%;
}

.main-search-input-item input {
    float: left;
    border: none;
    width: 100%;
    height: 50px;
    padding-left: 20px;
}

.main-search-button{

      background: #4DB7FE;
}

.main-search-button {
    position: absolute;
    height: 50px;
    width: 120px;
    color: #fff;
    border: none;
    border-top-right-radius: 0px;
    border-bottom-right-radius: 0px;
    cursor: pointer;
}

.main-search-input-wrap {
    max-width: 90%;
    margin: 20px auto;
    position: relative;
}

:focus {
    outline: 0;
}

.teal-color{
    color: teal;
    margin-left: 3px;
    font-size: small;
}

    </style>
</head>
<body>
    
    <div class="container">
        <div class="a">Postcode Finder!</div>
        <form>
              <div class="main-search-input-wrap">
       
     
    <div class="main-search-input fl-wrap">
                                        <div class="main-search-input-item">
                                            <input type="text" id="address" placeholder="Enter a corporate or a residential street address...">
                                        </div>
                                        
                                        <button type="submit" id="find" class="main-search-button">Search <span class='bi bi-search teal-color'></span>
</button>
                                    </div>
                                    

                                    </div>
        </form>
    </div>
    <div id="message"></div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script type="text/javascript">
      
          $("#find").click(function(e) {
      
        e.preventDefault();
              
        $.ajax({
            url: "https://maps.googleapis.com/maps/api/geocode/json?address=" + encodeURIComponent($("#address").val()) + "&key=API_KEY",
            type: "GET",
            success: function (data) {
                
                console.log(data);
                
                if (data["status"] != "OK") {
                    
                    $("#message").html('<div class="alert alert-warning" role="alert">Postcode could not be found - please try again.</div>');
                    
                } else {
                
                $.each(data["results"][0]["address_components"], function (key, value) {
                    
                    if (value["types"][0] == "postal_code") {
                        
                    $("#message").html('<div class="alert alert-success" role="alert"><strong>Postcode found!</strong> The postcode is ' + value["long_name"] + '.</div>');
                    
                    }
                    
                })
                
                }
            }
            
        })
      })
      
      </script>
</html>