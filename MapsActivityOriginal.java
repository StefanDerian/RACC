
package com.example.mac.map1;


import android.Manifest;
import android.content.Context;
import android.content.pm.PackageManager;
import android.graphics.Color;
import android.location.Location;
import android.location.LocationListener;
import android.location.LocationManager;
import android.os.AsyncTask;
import android.os.Bundle;
import android.support.annotation.NonNull;
import android.support.v4.app.ActivityCompat;
import android.support.v4.content.ContextCompat;
import android.support.v7.app.AppCompatActivity;
import android.util.Log;
import android.view.View;

import com.google.android.gms.common.api.Status;
import com.google.android.gms.location.places.Place;
import com.google.android.gms.location.places.ui.PlaceAutocompleteFragment;
import com.google.android.gms.location.places.ui.PlaceSelectionListener;
import com.google.android.gms.maps.CameraUpdateFactory;
import com.google.android.gms.maps.GoogleMap;
import com.google.android.gms.maps.OnMapReadyCallback;
import com.google.android.gms.maps.SupportMapFragment;
import com.google.android.gms.maps.model.BitmapDescriptorFactory;
import com.google.android.gms.maps.model.LatLng;
import com.google.android.gms.maps.model.Marker;
import com.google.android.gms.maps.model.MarkerOptions;
import com.google.android.gms.maps.model.PolylineOptions;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStream;
import java.io.InputStreamReader;
import java.net.HttpURLConnection;
import java.net.URL;
import java.util.ArrayList;
import java.util.HashMap;
import java.util.List;


public class MapsActivity extends AppCompatActivity implements OnMapReadyCallback {

    private GoogleMap mMap;

    LocationManager locationManager;

    LocationListener locationListener;

    Marker startPerc;


    @Override
    public void onRequestPermissionsResult(int requestCode, @NonNull String[] permissions, @NonNull int[] grantResults) {
        super.onRequestPermissionsResult(requestCode, permissions, grantResults);
        if (requestCode == 1) {
            if (grantResults.length > 0 && grantResults[0] == PackageManager.PERMISSION_GRANTED) {
                if (ContextCompat.checkSelfPermission(this, Manifest.permission.ACCESS_FINE_LOCATION) == PackageManager.PERMISSION_GRANTED) {
                    locationManager.requestLocationUpdates(LocationManager.GPS_PROVIDER, 0, 0, locationListener);
                }
            }
        }
    }



    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_maps);
        // Obtain the SupportMapFragment and get notified when the map is ready to be used.
        SupportMapFragment mapFragment = (SupportMapFragment) getSupportFragmentManager()
                .findFragmentById(R.id.map);
        mapFragment.getMapAsync(this);



        // Set search bar.
        setSearchBarReady();

    }




    @Override
    public void onMapReady(GoogleMap googleMap) {

        mMap = googleMap;
        mMap.getUiSettings().setZoomGesturesEnabled(true);
        
       
        final List<Toilet> toilets = loadJSONFromAsset();

        locationManager = (LocationManager) this.getSystemService(Context.LOCATION_SERVICE);
        locationListener = new LocationListener() {

            @Override
            public void onLocationChanged(Location location) {
                LatLng userLocation = new LatLng(location.getLatitude(), location.getLongitude());
                mMap.clear();
                mMap.moveCamera(CameraUpdateFactory.newLatLng(userLocation));
                // display toilets near user
                Toilet nearestToilet = loadToilets(toilets, userLocation);

                Log.i("Nearest toilet", Double.toString(nearestToilet.getLatitude()) + ", " + Double.toString(nearestToilet.getLongitude()));

                Log.i("Notice", "Location changed");





    /******************** Below is code copied from stack overflow ***********************************/


                // Assign your origin and destination
                // These points are your markers coordinates
                LatLng origin = userLocation;
                LatLng dest = new LatLng(nearestToilet.getLatitude(), nearestToilet.getLongitude());

                // Getting URL to the Google Directions API
                String url = getDirectionsUrl(origin, dest);

                DownloadTask downloadTask = new DownloadTask();

                // Start downloading json data from Google Directions API
                downloadTask.execute(url);
            }


            private String getDirectionsUrl(LatLng origin, LatLng dest){


                // Origin of route
                String str_origin = "origin="+origin.latitude+","+origin.longitude;

                // Destination of route
                String str_dest = "destination="+dest.latitude+","+dest.longitude;

                // Sensor enabled
                String sensor = "sensor=false";

                // Building the parameters to the web service
                String parameters = str_origin+"&"+str_dest+"&"+sensor;

                // Output format
                String output = "json";

                // Building the url to the web service
                String url = "https://maps.googleapis.com/maps/api/directions/"+output+"?"+parameters;

                return url;
            }



            // A method to download json data from url
            private String downloadUrl(String strUrl) throws IOException{
                String data = "";
                InputStream iStream = null;
                HttpURLConnection urlConnection = null;
                try{
                    URL url = new URL(strUrl);

                    // Creating an http connection to communicate with url
                    urlConnection = (HttpURLConnection) url.openConnection();

                    // Connecting to url
                    urlConnection.connect();

                    // Reading data from url
                    iStream = urlConnection.getInputStream();

                    BufferedReader br = new BufferedReader(new InputStreamReader(iStream));

                    StringBuffer sb = new StringBuffer();

                    String line = "";
                    while( ( line = br.readLine()) != null){
                        sb.append(line);
                    }

                    data = sb.toString();

                    br.close();

                }catch(Exception e){
                    Log.i("Exception dl url", e.toString());
                }finally{
                    iStream.close();
                    urlConnection.disconnect();
                }
                return data;
            }

            // Fetches data from url passed
            class DownloadTask extends AsyncTask<String, Void, String> {


                // Downloading data in non-ui thread
                @Override
                protected String doInBackground(String... url) {

                    // For storing data from web service
                    String data = "";

                    try{
                        // Fetching the data from web service
                        data = downloadUrl(url[0]);
                    }catch(Exception e){
                        Log.i("Background Task",e.toString());
                    }
                    return data;
                }

                // Executes in UI thread, after the execution of
                // doInBackground()
                @Override
                protected void onPostExecute(String result) {
                    super.onPostExecute(result);

                    ParserTask parserTask = new ParserTask();

                    // Invokes the thread for parsing the JSON data
                    parserTask.execute(result);
                }
            }

            // A class to parse the Google Places in JSON format
            class ParserTask extends AsyncTask<String, Integer, List<List<HashMap<String,String>>> >{

                // Parsing the data in non-ui thread
                @Override
                protected List<List<HashMap<String, String>>> doInBackground(String... jsonData) {

                    JSONObject jObject;
                    List<List<HashMap<String, String>>> routes = null;

                    try{
                        jObject = new JSONObject(jsonData[0]);
                        DirectionsJSONParser parser = new DirectionsJSONParser();

                        // Starts parsing data
                        routes = parser.parse(jObject);
                    }catch(Exception e){
                        e.printStackTrace();
                    }
                    return routes;
                }

                // Executes in UI thread, after the parsing process
                @Override
                protected void onPostExecute(List<List<HashMap<String, String>>> result) {
                    ArrayList<LatLng> points = null;
                    PolylineOptions lineOptions = null;
                    MarkerOptions markerOptions = new MarkerOptions();

                    // Traversing through all the routes
                    for(int i=0;i<result.size();i++){
                        points = new ArrayList<LatLng>();
                        lineOptions = new PolylineOptions();

                        // Fetching i-th route
                        List<HashMap<String, String>> path = result.get(i);

                        // Fetching all the points in i-th route
                        for(int j=0;j<path.size();j++){
                            HashMap<String,String> point = path.get(j);

                            double lat = Double.parseDouble(point.get("lat"));
                            double lng = Double.parseDouble(point.get("lng"));
                            LatLng position = new LatLng(lat, lng);

                            points.add(position);
                        }

                        // Adding all the points in the route to LineOptions
                        lineOptions.addAll(points);
                        lineOptions.width(2);
                        lineOptions.color(Color.RED);
                    }

                    // Drawing polyline in the Google Map for the i-th route
                    mMap.addPolyline(lineOptions);
                }



            /******************** Above is code copied from stack overflow ***********************************/







            }

            @Override
            public void onStatusChanged(String s, int i, Bundle bundle) {
            }

            @Override
            public void onProviderEnabled(String s) {
            }

            @Override
            public void onProviderDisabled(String s) {
            }
        };

        // Doesn't have permission
        if (ContextCompat.checkSelfPermission(this, Manifest.permission.ACCESS_FINE_LOCATION) != PackageManager.PERMISSION_GRANTED) {
            ActivityCompat.requestPermissions(this, new String[]{Manifest.permission.ACCESS_FINE_LOCATION}, 1);
        }
        else {  // Has permission
            locationManager.requestLocationUpdates(LocationManager.GPS_PROVIDER, 0, 0, locationListener);
            Location lastKnownLocation = locationManager.getLastKnownLocation(LocationManager.GPS_PROVIDER);
            LatLng userLocation = new LatLng(lastKnownLocation.getLatitude(), lastKnownLocation.getLongitude());


            mMap.clear();
            mMap.moveCamera(CameraUpdateFactory.newLatLng(userLocation));
            mMap.setMyLocationEnabled(true);
            Toilet nearestToilet = loadToilets(toilets, userLocation);
            Log.i("NeaArest toilet", Double.toString(nearestToilet.getLatitude()) + ", " + Double.toString(nearestToilet.getLongitude()));

        }
    }



    public List<Toilet> loadJSONFromAsset() {

        List<Toilet> toilets = new ArrayList<Toilet>();
        BufferedReader reader = null;
        String json = "";
        try {
            reader = new BufferedReader(
                    new InputStreamReader(getAssets().open("toilet.json"), "UTF-8"));
            // do reading, usually loop until end of file reading
            json = reader.readLine();

            // Transfer the string into an object
            JSONObject jsonObject = new JSONObject(json);
            JSONArray features = jsonObject.getJSONArray("features");
            JSONObject jsonObj;
            Toilet toilet;

            for (int i=0; i<features.length(); i++) {

                jsonObj = features.optJSONObject(i);

                JSONObject properties = jsonObj.getJSONObject("properties");

                toilet = new Toilet();

                toilet.setAccessibleMale(properties.optString("accessible_male"));
                toilet.setAccessibleFemale(properties.optString("accessible_female"));
                toilet.setAccessibleUnisex(properties.optString("accessible_unisex"));
                toilet.setMale(properties.optString("male"));
                toilet.setFemale(properties.optString("female"));
                toilet.setUnisex(properties.optString("unisex"));
                toilet.setLatitude(properties.optString("latitude"));
                toilet.setLongitude(properties.optString("longitude"));

                toilets.add(toilet);
            }

        }
        catch (IOException e) {
            e.printStackTrace();
        }
        catch (JSONException e) {
            e.printStackTrace();
        }
        finally {
            if (reader != null) {
                try {
                    reader.close();
                } catch (IOException e) {
                    e.printStackTrace();
                }
            }
        }
        return toilets;
    }




    public void setSearchBarReady() {
        PlaceAutocompleteFragment autocompleteFragment = (PlaceAutocompleteFragment)
                getFragmentManager().findFragmentById(R.id.place_autocomplete_fragment);

        autocompleteFragment.setOnPlaceSelectedListener(new PlaceSelectionListener() {
            @Override
            public void onPlaceSelected(Place place) {
                // TODO:Get info about the selected place.
                Log.i("TAG", "Place: " + place.getName());
                mMap.addMarker(new MarkerOptions().position(new LatLng(place.getLatLng().latitude, place.getLatLng().longitude)).title("Id: " + place.getId()).icon(BitmapDescriptorFactory.defaultMarker(BitmapDescriptorFactory.HUE_RED)));
            }

            @Override
            public void onError(Status status) {
                // TODO:Handle the error.
                Log.i("TAG", "An error occurred: " + status);
            }
        });
    }



    public Toilet loadToilets(List<Toilet> toilets, LatLng lastKnownLocation) {

        Toilet nearestToilet = null;
        double shortestDistance = Double.MAX_VALUE;
        double distance;

        for (Toilet toilet : toilets) {

            // Only display toilets within 10km from the user
            distance = distance(lastKnownLocation.latitude, toilet.getLatitude(),
                    lastKnownLocation.longitude, toilet.getLongitude());

            if (distance <= 10) {

                // Decide the colour to display
                // Only male
                if (toilet.getMale()&&!toilet.getFemale()) {
                    mMap.addMarker(new MarkerOptions()
                            .position(new LatLng(toilet.getLatitude(), toilet.getLongitude()))
                            .title("Id: " + toilet.getId()).icon(BitmapDescriptorFactory.defaultMarker(BitmapDescriptorFactory.HUE_BLUE)));
                }
                // Only female
                else if (toilet.getFemale()&&!toilet.getMale()) {
                    mMap.addMarker(new MarkerOptions()
                            .position(new LatLng(toilet.getLatitude(), toilet.getLongitude()))
                            .title("Id: " + toilet.getId()).icon(BitmapDescriptorFactory.defaultMarker(BitmapDescriptorFactory.HUE_ROSE)));
                }
                // Both male and female
                else if (toilet.getMale()&&toilet.getFemale()) {
                    mMap.addMarker(new MarkerOptions()
                            .position(new LatLng(toilet.getLatitude(), toilet.getLongitude()))
                            .title("Id: " + toilet.getId()).icon(BitmapDescriptorFactory.defaultMarker(BitmapDescriptorFactory.HUE_GREEN)));
                }
                else if (toilet.getUnisex()) {
                    mMap.addMarker(new MarkerOptions()
                            .position(new LatLng(toilet.getLatitude(), toilet.getLongitude()))
                            .title("Id: " + toilet.getId()).icon(BitmapDescriptorFactory.defaultMarker(BitmapDescriptorFactory.HUE_YELLOW)));
                }
                else {
                    mMap.addMarker(new MarkerOptions()
                            .position(new LatLng(toilet.getLatitude(), toilet.getLongitude()))
                            .title("Id: " + toilet.getId()).icon(BitmapDescriptorFactory.defaultMarker(BitmapDescriptorFactory.HUE_CYAN)));
                }

                if (distance < shortestDistance) {
                    shortestDistance = distance;
                    nearestToilet = toilet;
                }

            }
        }

        return nearestToilet;
    }



    public double distance(double lat1, double lat2, double lon1,
                                  double lon2) {

        final int R = 6371; // Radius of the earth

        double latDistance = Math.toRadians(lat2 - lat1);
        double lonDistance = Math.toRadians(lon2 - lon1);
        double a = Math.sin(latDistance / 2) * Math.sin(latDistance / 2)
                + Math.cos(Math.toRadians(lat1)) * Math.cos(Math.toRadians(lat2))
                * Math.sin(lonDistance / 2) * Math.sin(lonDistance / 2);
        double c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
        double distance = R * c; // in km

        return Math.sqrt(distance);
    }

    public void findToilet(View view) {

    }











}



