//console.time();

document.querySelector('#navigation__ajax').addEventListener('click', function(event){



    event.preventDefault()
  
  
    console.log(event.target.pathname);  
    const pathname = event.target.pathname; //   href="/ajax/3"
    //const tokens = pathname.split('/'); 
    //const path = tokens[1];
    //const id = tokens[2];
    //console.log(path);    
    //console.log(id); 
  
    ajax_post();
  
    function ajax_post(){
    
      var http = new XMLHttpRequest();
   
      var url = pathname;
  
      //var vars = path; //  /delete/image/3
      http.open("POST", url, true);
      // Set content type header information for sending url encoded variables in the request
      http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      // Access the onreadystatechange event for the XMLHttpRequest object
      http.onreadystatechange = function() {
  
          if(http.readyState == 4 && http.status == 200) {
  
            var data = http.responseText;
            console.log(data); 
            document.querySelector(".ajax-response").innerHTML = data;
          }
      }
      // Send the data to PHP now... and wait for response to update the status div
      http.send(); // Actually execute the request
      document.querySelector(".ajax-response").innerHTML = "processing...";
  }
  
  
  
  });