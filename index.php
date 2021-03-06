<html>
<body>
<form>
  <input type="radio" name="maptype" value="bing" onclick="onClick()"> Bing Maps<br>
  <input type="radio" name="maptype" value="google" onclick="onClick()"> Google Maps
</form> 

<script src="https://statics.teams.microsoft.com/sdk/v1.0/js/MicrosoftTeams.min.js"></script>

<script type="text/javascript">  

microsoftTeams.initialize();
function authSuccessHandler(results)
  {
    console.log(results);
  }
  
  var authParams = {
    url: "https://login.microsoftonline.com",
    successCallback: authSuccessHandler
  };
microsoftTeams.authentication.authenticate(authParams);
  
microsoftTeams.settings.registerOnSaveHandler(function(saveEvent){

    var radios = document.getElementsByName("maptype");
    if (radios[0].checked) {
       microsoftTeams.settings.setSettings({
         entityId: "bing",
         contentUrl: "https://www.bing.com/maps/embed",
         suggestedDisplayName: "Bing Map",
         websiteUrl: "https://www.bing.com/maps",
         removeUrl: "https://teams-get-started-sample.azurewebsites.net/tabremove.html",
      });
    } else {
       microsoftTeams.settings.setSettings({
         entityId: "google",
         contentUrl: "https://www.google.com/maps/embed",
         suggestedDisplayName: "Google Map",
         websiteUrl: "https://www.google.com/maps",
         removeUrl: "https://teams-get-started-sample.azurewebsites.net/tabremove.html",
      });
    }

    saveEvent.notifySuccess();
});

function onClick() {
    microsoftTeams.settings.setValidityState(true);
}

</script>
</body>
</html>
