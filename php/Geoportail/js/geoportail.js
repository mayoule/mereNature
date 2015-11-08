/*
 * Copyright (c) 2008-2011 Institut Geographique National France, released under the
 * BSD license.
 */

 /**
 * Property: key
 *
 * The API key to use
 */
var APIkey= "6h7gnc76fmw25k5kug8cz9gg";

/**
 * Property: viewer
 * {<Geoportal.Viewer>} the viewer global instance.
 */
viewer= null;

/**
 * Function: initMap
 * Load the application. Called when all information have been loaded by
 * <loadAPI>().
 */

 
/**
 * Function: loadAPI
 * Load the configuration related with the API keys.
 * Called on "onload" event.
 * Call <initMap>() function to load the interface.
 */
function loadAPI() {
    // wait for all classes to be loaded
    // on attend que les classes soient chargées
    if (checkApiLoading('loadAPI();',['OpenLayers','Geoportal','Geoportal.Viewer','Geoportal.Viewer.Default'])===false) {
        return;
    }
    
    Geoportal.GeoRMHandler.getConfig([APIkey], null,null, {
        onContractsComplete: initMap
    });
}

// assign callback when "onload" event is fired
// assignation de la fonction à appeler lors de la levée de l'évènement "onload"
window.onload= loadAPI;
