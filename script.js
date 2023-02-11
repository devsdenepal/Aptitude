    const button = document.querySelector("button");

    button.addEventListener("click", ()=>{
        if(navigator.geolocation){ //if browser support geolocation api
            button.innerText = "Allow to detect location";
            // geolocation.getCurrentPosition method is used to get current position of the device
            // it takes three paramaters success, error, options. If everything is right then success 
            // callback function will call else error callback function will call. We don't need third paramater for this project
            navigator.geolocation.getCurrentPosition(onSuccess, onError);
        }else{
            button.innerText = "Your browser not support";
        }
    });

    function onSuccess(position){
        button.innerText = "Detecting your location...";
        let {latitude, longitude} = position.coords; //getting latitude and longitude properties value from coords obj
        //sending get request to the api with passing latitude and longitude coordinates of the user position
        fetch(`https://api.opencagedata.com/geocode/v1/json?q=${latitude}+${longitude}&key=YOUR_API_KEY`)
        //parsing json data into javascript object and returning it and in another then function receiving the object that is sent by the api
        .then(response => response.json()).then(response =>{
            let allDetails = response.results[0].components; //passing components object to allDetails variable
            console.table(allDetails);
            let {county, postcode, country} = allDetails; //getting country, postcode, country properties value from allDetails obj
            button.innerText = `${county} ${postcode}, ${country}`; //passing these value to the button innerText
        }).catch(()=>{ //if error any error occured
            button.innerText = "Something went wrong";
        });
    }

    function onError(error){
        if(error.code == 1){ //if user denied the request
            button.innerText = "You denied the request";
        }else if(error.code == 2){ //if location in not available
            button.innerText = "Location is unavailable";
        }else{ //if other error occured
            button.innerText = "Something went wrong";
        }
        button.setAttribute("disabled", "true"); //disbaled the button if error occured
    }