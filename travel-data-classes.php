<?php

// include('Location.class.php');
include('TravelPhoto.class.v2.php');

$continents = array("Asia","Africa","Europe","North America","South America", "Oceania");

$countries = array();
$countries["US"] = "United States";
$countries["DE"] = "Germany";
$countries["GH"] = "Ghana";
$countries["CA"] = "Canada";
$countries["GB"] = "United Kingdom";


// Parameters = filename, itemName, itemDescription, city, country, itemUser
$images = array();
$images[] = new TravelPhoto(
    "finsngrins.jpg", 
    "Fins n Grins", 
    "Approximately 1 mile from the Beach and 150 yards from the fishing pier.", 
    "Southport NC", 
    "United States", 
    "Cindi and Jeff" 
);

$images[] = new TravelPhoto("studiobytheshore.jpg", "Studio by the Shore", "Cheerful Studio, separate entrance, large privacy fenced yard, half mile to beach.", "Southport NC", "United States", "Liz" );
$images[] = new TravelPhoto("latitudeadjustment.jpg", "Latitude Adjustment", "Walk past the outdoor shower and enter your beach retreat through a private entrance.", "Southport NC", "United States", "Jen" );
$images[] = new TravelPhoto("guestcottage.jpg", "Guest Cottage", "If you love ocean sounds @ high tide & being a short walk to the beach this place is for you! Fireplace full of candles.", "Southport NC", "United States", "Judy and Mike" );
$images[] = new TravelPhoto("sunsetharbor.jpg", "Sunset Harbor", "Sunset Harbor, a little piece of Heaven. Quiet, friendly, southern hospitality at its best! Sit on the porch listen to the ocean, walk to the landing watch a mind blowing sunset. Just relax!", "Southport NC", "United States", "Judy and Mike" );
$images[] = new TravelPhoto("driftwoodcottage.jpg", "Driftwood Cottage", "Just 4 blocks from the beach, an easy walk with amazing views, our street is located in the middle of Oak Island.", "Southport NC", "United States", "MacBeth" );
$images[] = new TravelPhoto("waterfrontparadise.jpg", "Waterfront Paradise", "Our place has a small-cabin-feel on deep water. You can use the fishing pier and floating dock for boaters. Great area for clamming, fishing, shrimping, and oystering. ", "Southport NC", "United States", "Matthew" );
$images[] = new TravelPhoto("islandgetaway.jpg", "Island Getaway", "Located on the quiet end of the island with restaurants, stores and other attractions near-by.", "Southport NC", "United States", "Leesa");
$images[] = new TravelPhoto("suiteretreat.jpg", "Suite Retreat", "Our private suite is located on the first floor of our busy family's three story house. Only 10 minutes from Southport and Oak Island. The suite has its own entrance and is not accessible from the rest of the house. ", "Southport NC", "United States", "Lee Anna" );
$images[] = new TravelPhoto("canvascabin.jpg", "Canvas Cabin", "Camping in style. Glamping in the southern NC live oak woods, near the beach, in our Canvas Cabin. ", "Southport NC", "United States", "Rob n Liz" );
$images[] = new TravelPhoto('Seas the Moment.jpg', 'Seas the Moment', 'Seaside airbnb', 'Southport', 'USA', 'Brian');
