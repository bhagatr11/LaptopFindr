
$(function() {
  $.ajax({
      type: 'POST',
      url: 'https://cors-anywhere.herokuapp.com/https://noteb.com/api/webservice.php',
      async: true,
      dataType : 'json',   //you may use jsonp for cross origin request
      crossDomain: true
  });

  $.post('https://cors-anywhere.herokuapp.com/https://noteb.com/api/webservice.php', 'apikey=JnowHc7dLuCsqIi&method=get_model_info&param[model_id]=1175',
  handleResponse);
});


function handleResponse(jsonReturn) { 
  var response1 = JSON.parse(jsonReturn);
  var response = JSON.stringify(response1["result"]["0"]);
  //response = response.replace("\\\"(\\w+)\\\":", "$1:");
  response = response.split("\\\"").join("");
  response = response.split("\\\\").join("");
  response = response.split(",").join(", ");
  response = JSON.parse(response);
  console.log(response);

 
   Object.keys(response).forEach(function(key) {
     if (typeof response[key] === 'object') {
          console.table("Key: " + key + ", Value: " + JSON.stringify(response[key]));
     }
     else {
       console.table("Key: " + key + ", Value: " + response[key]);
     }
    });
  
}


/*
window.addEventListener('load', init);


function getData(url, objClass)
{
  var httpReq = null;

  if (window.XMLHttpRequest)
    httpReq = new XMLHttpRequest();
  else if (window.ActiveXObject)
    httpReq = new ActiveXObject("Microsoft.XMLHTTP");
  else
    return false;

  httpReq.onreadystatechange = function()
  {
    var obj = document.querySelector(objClass);
    //obj.innerHTML = httpReq.responseText;
    console.log(httpReq.responseText);
    alert(httpReq.responseText);
  }
  
  httpReq.open('POST', url, true);
  httpReq.send("apikey=JnowHc7dLuCsqIi&method=get_model_info&param[model_id]=1175");
  
}
*/

/*
function init() {
  
  getData('https://cors-anywhere.herokuapp.com/https://noteb.com/api/webservice.php', '.data');

}
*/

/*
export class LocationPage extends Component {
    constructor(props) {
        super(props);
        this.state = {
            userLatitude: undefined,
            userLongitude: undefined,
            curbside: undefined,
            description: undefined,
            distance: undefined,
            latitude: undefined,
            location_id: undefined,
            location_type_id: undefined,
            longitude: undefined,
            municipal: undefined,
            address: undefined,
            phone: undefined,
            postal_code: undefined,
            province: undefined,
            region: undefined,
            city: undefined,
            country: undefined,
            hours: undefined
        } 
    }

    getMyLocation() {
      const location = navigator && navigator.geolocation;
      
      if (location) {
        location.getCurrentPosition((position) => {
          this.setState({
            userLatitude: position.coords.latitude,
            userLongitude: position.coords.longitude,
          })
        }, (error) => {
          this.setState({ latitude: 'err-latitude', longitude: 'err-longitude' })
        })
      }
  
    }

    getRecyclingCenter = async (e) => {
        e.preventDefault();

        this.getMyLocation();

        console.log("User's Latitude: " + this.state.userLatitude);
        console.log("User's Longitude: " + this.state.userLongitude);
    
        const API_KEY = '4ecb2867973c953f';

        const api_call = await fetch(`https://cors-anywhere.herokuapp.com/http://api.earth911.com/earth911.searchLocations?api_key=${API_KEY}&latitude=${this.state.userLatitude}&longitude=${this.state.userLongitude}&max_distance=5`);
      
        const response = await api_call.json();
        
        if (response.result) {
            this.setState({
                curbside: response.result[0].curbside,
                description: response.result[0].description,
                distance: response.result[0].distance,
                latitude: response.result[0].latitude,
                location_id: response.result[0].location_id,
                location_type_id: response.result[0].location_type_id,
                longitude: response.result[0].longitude,
                municipal: response.result[0].municipal
            });

            const api_call2 = await fetch(`https://cors-anywhere.herokuapp.com/http://api.earth911.com/earth911.getLocationDetails?api_key=${API_KEY}&location_id=${this.state.location_id}`);

            const response2 = await api_call2.json();
            
            console.log(response);
            console.log(response2.result.Q1RQNVVfWV1DUA.address);
            
            this.setState({
              address: response2.result.Q1RQNVVfWV1DUA.address,
              phone: response2.result.Q1RQNVVfWV1DUA.phone,
              postal_code: response2.result.Q1RQNVVfWV1DUA.postal_code,
              province: response2.result.Q1RQNVVfWV1DUA.province,
              region: response2.result.Q1RQNVVfWV1DUA.region,
              city: response2.result.Q1RQNVVfWV1DUA.city,
              country: response2.result.Q1RQNVVfWV1DUA.country,
              hours: response2.result.Q1RQNVVfWV1DUA.hours
            });
        
        }

        

    }

    render() {
        return (
          <div className="main-component">
            <button type="button" onClick={this.getRecyclingCenter}>Get Nearest Recycling Center</button>
            {this.state.description && <p>Location: {this.state.description}</p>}
            {this.state.phone && <p>Phone: {this.state.phone}</p>}
            {this.state.address && <p>Address: {this.state.address}</p>}
            {this.state.postal_code && <p>Postal Code: {this.state.postal_code}</p>}
            {this.state.province && <p>Province: {this.state.province}</p>}
            {this.state.region && <p>Region: {this.state.region}</p>}
            {this.state.city && <p>Region: {this.state.city}</p>}
            {this.state.country && <p>Region: {this.state.country}</p>}
            {this.state.hours && <p>Region: {this.state.hours}</p>}
            
            {this.state.latitude && this.state.longitude && (<Map
                google={this.props.google}
                zoom={8}
                initialCenter={{ lat: this.state.latitude, lng: this.state.longitude}}
            >
                <Marker position={{ lat: this.state.latitude, lng: this.state.longitude}} />

                <InfoWindow onClose={this.onInfoWindowClose}>
                    <div>
                      <h1>{this.state.description}</h1>
                    </div>
                </InfoWindow>
            </Map>)}
          </div>
        );
    }
}

export default GoogleApiWrapper({
  apiKey: 'AIzaSyCNdwUwa_CZI9dyunvZFeo-Bpx7dLuh3l4'
})(LocationPage);
*/