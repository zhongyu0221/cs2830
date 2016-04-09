<!DOCTYPE html>
<html>
    
    
     <style>
    
    #index{
        
            width: 400px;
            height :300px;
            text-align: center;
            padding: 70;
            border: 5px black;
            background: #e7e7e7;
         }
         #title{
             font-size: 25px;
         }
         #textarea{
             font-size:15px;
         }
         
    .but{
             background-color: #4CAF50;
             text-align: center;
             font-size:10px;
             color:white;
         }      
            
    </style>
    
    
    
    
    <script>
        
         function Home(homeID) 
	{
        
        var xmlHttp = new XMLHttpRequest();//用于在后台与服务器交换对象
		
		xmlHttp.onload = function() {//相关操作结束后执行
			if (xmlHttp.status == 200) {//200是xmlhttp与后台的交互状态 200是正常交互完成
				var textarea = document.getElementById('textarea');
				textarea.innerHTML = xmlHttp.responseText;//textarea 的innerhtml变成了
			  }
		}
		
       // Append GET data
        var reqURL = "http://abra.centralus.cloudapp.azure.com/a8/webService.php?content="+ homeID;
		xmlHttp.open("GET", reqURL, true);
		xmlHttp.send();

	}
            
        
    function xml(xmlID){
        var xmlHttp = new XMLHttpRequest();
        
       xmlHttp.onload = function() {
			if (xmlHttp.status == 200) {
				var xmltext = xmlHttp.responseXML;
				
				// Variable for our output
				var output = '';
				
				movieTitles = xmltext.getElementsByTagName('name');
				time = xmltext.getElementsByTagName('period');
                
				for (i = 0; i < movieTitles.length; i++) {
					output += "<li>"+ movieTitles[i].childNodes[0].nodeValue + " lived during in " +  time[i].childNodes[0].nodeValue +"</li>";
				}
				
				var textarea = document.getElementById('textarea');

				textarea.innerHTML = output;

			}
		}
		
       
        var reqURL = "http://abra.centralus.cloudapp.azure.com/a8/webService.php?content=" + xmlID;
        
		xmlHttp.open("GET", reqURL, true);
		xmlHttp.send();
	}

        
    
    function json(jsonID){
            var xmlHttp = new XMLHttpRequest();
			 xmlHttp.onload = function() 
			{
	            if (xmlHttp.status == 200) 
				{
					var array = JSON.parse(xmlHttp.responseText);//parses a string as JSON 
					var out = ' ';
                    
				    for(i = 0; i < array.length; i++) 
					{
				        out += "<li>"+array[i].name  + array[i].diet+"</li>";
					}
					document.getElementById('textarea').innerHTML = out ;
				}
			}

			
        var reqURL = "http://abra.centralus.cloudapp.azure.com/a8/webService.php?content=" + jsonID;        
		xmlHttp.open("GET", reqURL, true);
		xmlHttp.send();
    }

	
            
        
    
    </script>
    
    
    
    
    
   <body>
       <div id="index">
           
       <div id="title">
       Dinosaur Web Application
       </div>
      
       <div>
           
    <button  class="but" type="button" onclick="Home('home')">Home</button>
    <button class="but" type="button" onclick="xml('data&format=xml')">XML Dinos</button>
    <button class="but" type="button" onclick="json('data&format=json')">JSON Dinos</button>
    
     </div>
    
       
       <div id="textarea">
           <p><b>This web application provides informations about dinosaurs.</b></p>
       </div>
       
       </div>
    </body> 
    
    
</html>
