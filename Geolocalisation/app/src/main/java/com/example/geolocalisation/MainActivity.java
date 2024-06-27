package com.example.geolocalisation;

import androidx.annotation.NonNull;
import androidx.appcompat.app.AppCompatActivity;
import androidx.core.content.ContextCompat;

import android.Manifest;
import android.content.Context;
import android.content.pm.PackageManager;
import android.location.Address;
import android.location.Geocoder;
import android.location.Location;
import android.location.LocationListener;
import android.location.LocationManager;
import android.os.Build;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.TextView;
import android.widget.Toast;

import java.util.List;
import java.util.Locale;

public class MainActivity extends AppCompatActivity implements LocationListener {

    // Propriétés
    private static final int REQUEST_PERMISSION_FINE_LOCATION_RESULT = 0;
    private TextView locationText;
    private Button getLocationBtn;
    private LocationManager locationManager;

    // Méthode appelée à la création de l'activité
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        getSupportActionBar().hide(); // Cache la barre d'action
        setContentView(R.layout.activity_main); // Définit le layout de l'activité

        // Initialisation des composants de l'interface
        locationText = (TextView)findViewById(R.id.locationText);
        getLocationBtn = (Button)findViewById(R.id.getLocationBtn);

        // Définit le comportement du bouton pour obtenir la localisation
        getLocationBtn.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                // Vérifie la version d'Android et les permissions
                if (Build.VERSION.SDK_INT >= Build.VERSION_CODES.M) {
                    if (ContextCompat.checkSelfPermission(getApplicationContext(), Manifest.permission.ACCESS_FINE_LOCATION) == PackageManager.PERMISSION_GRANTED) {
                        getLocation(); // Obtient la localisation si la permission est accordée
                    } else {
                        // Demande la permission si nécessaire
                        if (shouldShowRequestPermissionRationale(Manifest.permission.ACCESS_FINE_LOCATION)) {
                            Toast.makeText(getApplicationContext(), "application requise pour accéder à l'emplacement", Toast.LENGTH_SHORT).show();
                        }
                        requestPermissions(new String[] {Manifest.permission.ACCESS_FINE_LOCATION}, REQUEST_PERMISSION_FINE_LOCATION_RESULT);
                    }
                } else {
                    getLocation(); // Obtient la localisation sur les versions antérieures à Android M
                }
            }
        });
    }

    // Gère les résultats des demandes de permission
    @Override
    public void onRequestPermissionsResult(int requestCode, @NonNull String[] permissions, @NonNull int[] grantResults) {
        super.onRequestPermissionsResult(requestCode, permissions, grantResults);
        if (requestCode == REQUEST_PERMISSION_FINE_LOCATION_RESULT) {
            if (grantResults[0] != getPackageManager().PERMISSION_GRANTED) {
                Toast.makeText(getApplicationContext(), "l'application ne s'exécutera pas sans autorisation de localisation", Toast.LENGTH_SHORT).show();
            }
        }
    }

    // Méthode pour obtenir la localisation
    void getLocation (){
        try {
            locationManager = (LocationManager) getSystemService(Context.LOCATION_SERVICE);
            // Demande des mises à jour de localisation toutes les 5000 millisecondes (5 secondes) ou tous les 5 mètres
            locationManager.requestLocationUpdates(LocationManager.NETWORK_PROVIDER, 5000, 5, this);
        } catch (SecurityException e) {
            e.printStackTrace();
        }
    }

    // Appelée lorsque la localisation change
    @Override
    public void onLocationChanged(Location location) {

        /*  locationText.setText("Latitude :" + location.getLatitude() + "\n Longitude :" + location.getLongitude());
        try {
                 Geocoder geocoder = new Geocoder(this, Locale.getDefault());
                List<Address> addresses = geocoder.getFromLocation(location.getLatitude(), location.getLongitude(), 1);*/

        // récupération de la latitude et longitude
        double latitude = location.getLatitude();
        double longitude = location.getLongitude();
        locationText.setText("Latitude :" + latitude + "\n Longitude :" + longitude);
        try {
            Geocoder geocoder = new Geocoder(this, Locale.getDefault());
            
            List<Address> addresses = geocoder.getFromLocation(latitude, longitude, 1);

           locationText.setText(locationText.getText() + "\n" + addresses.get(0).getAddressLine(0) + ", " +
            addresses.get(0).getAddressLine(10) + ", " +addresses.get(0).getAddressLine(2)); 

            /* récupération des adresses */
          /*  String fullAddress = addresses.get(0).getAddressLine(0) + ", " +
                                 addresses.get(0).getAddressLine(1) + ", " +
                                 addresses.get(0).getAddressLine(2);
            locationText.setText(locationText.getText() + "\n" + fullAddress);*/
        } catch (Exception e){
            e.printStackTrace();
        }
    }
    // Méthodes de l'interface LocationListener non utilisées
    @Override
    public void onStatusChanged(String provider, int status, Bundle extras) {}

    @Override
    public void onProviderEnabled(String provider) {}

    @Override
    public void onProviderDisabled(String provider) {
        Toast.makeText(MainActivity.this, "Veuillez activer le GPS et Internet", Toast.LENGTH_SHORT).show();
    }
}
