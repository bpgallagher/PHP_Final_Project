<?php
/*
   Represents a single travel photo
 */
class TravelPhoto {
   static private $photoID = 0;
    
   private $ID;
   private $title;
   private $description;
   private $city;
   private $country;
   private $user;
   private $filePath;
   
    
    
   // constructor is 
   function __construct($filePath, $title, $description, $city, $country, $user) { 
       $this->filePath = $filePath;
       $this->title = $title;
       $this->description = $description;
  	   $this->city = $city;
  	   $this->country = $country;
  	   $this->user = $user;

  	   self::$photoID++;
         $this->ID = self::$photoID;
     }    
    
    public function getfilePath() { return $this->filePath;}
    public function gettitle() { return $this->title;}
    public function getdescription() { return $this->description;}
    public function getcity() { return $this->city;}
    public function getcountry() { return $this->country;}
    public function getuser() { return $this->user;}
	
    public function setfilePath() { $this->filePath = $filePath; }
    public function settitle() { $this->title = $title; }
    public function setdescription() { $this->description = $description; }
    public function setcity() { $this->city = $city; }
    public function setcountry() { $this->country = $country; }
  	public function setuser() { $this->user = $user; }
    
    public function __toString() {
  	  $tag = '<div class="col-md-2" id="' . $this->ID . '">';
  	  $tag .= '<a href="detail.php?id=' . $this->ID . '" class="thumbnail">';
        $tag .= '<img src="images/square/' . $this->filePath . '" title="' . $this->title . '" alt="' . $this->title . '" >';   
        $tag .= '<div class="caption"><div class="blur"></div><div class="caption-text"></div></div>';
        $tag .= '<h5>'. $this->title . '</h5>';
  	  $tag .= '</a></div>';
      return $tag;
    }
   
   //function to get the nearest travel photo from a passed in array.
   function nearest($allPhotos) {
     $smallest=999999;
     foreach ($allPhotos as $onePhoto) {
         if ($onePhoto->path() == $this->path()) {
            continue;//same photo.
         }
         //Now calculate distance.
         //Note - This calculation works roughly. The correct calcualtion uses the haversine formula - beyond the scope of this project and left as an exercise.
         $distance = sqrt(pow(abs($onePhoto->lat()-$this->lat()),2) + pow(abs($onePhoto->lng()-$this->lng()),2)); 
         //echo $distance."<br>";
         if ($distance < $smallest) {
             $smallest = $distance;
             $nearestID = $onePhoto->id();
         }
     }
     return $nearestID;
   }

   public function distanceTo($photo) {
       $distance = sqrt(square(abs($photo->lat()-$this->lat())) + square(abs($photo->lng()-$this->lng()))); 
   }   
    
   public function path() {
     return $this->filePath;
   }
   
   public function lat(){
     return $this->location->lat();
   }

   public function lng(){
     return $this->location->lng();
   }

   public function title(){
     return $this->title;
   }

   public function location(){
     return $this->location;
   }

   public function description(){
     return $this->description;
   }

   public function id(){
     return $this->ID;
   }

   public function city(){
     return $this->city;
   }    

   public function country(){
	   return $this->country;
   }
   
   public function user(){
	   return $this->user;
   }
}

?>