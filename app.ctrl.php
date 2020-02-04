<?php


// Auto-discover the photos, thumbnails and description files
$photoData = [];
$numGal = 0;

// open the photos folder
$fp = opendir("photos");
while( false !== ( $DIR = readdir($fp) ) ) {
  // read any directory that isn't . or ..
  if (($DIR !== (".")) && ($DIR !== (".."))) {

  	// get the description.txt file contents
    $photoData[$numGal]["description"] = 
      file_get_contents("photos/" . $DIR . "/description.txt");

	  // gallery directory
    $photoData[$numGal]["directory"] = $DIR;
	  
    // open the gallery folder, get the photo names and sort them
    $fpdir = opendir("photos/" . $DIR);
    while ($file = readdir($fpdir)) {
      if (($file !== (".")) && ($file !== ("..")) && 
      	  ($file !== "thumbs") && ($file !== "description.txt")) {
        $photoData[$numGal]["photos"][] = $file;        
      }
    }
    sort($photoData[$numGal]["photos"]);
  }

  $numGal++;
}

if(isset($_REQUEST['directory']) && !isset($_REQUEST['id'])){
  $requestedDir = $_REQUEST['directory'];
   foreach($photoData as $row ){
     if($row['directory'] === $requestedDir){
       $TPL['requestedGal'] = $row;
       break;
     }
  }
}
else if(isset($_REQUEST['directory']) && isset($_REQUEST['id'])) {
  $requestedPhoto = $_REQUEST['id'];
  $requestedDir = $_REQUEST['directory'];
   foreach($photoData as $row ){
     if($row['directory'] === $requestedDir){
       $TPL['requestedGal'] = $row;
       $TPL['requestedPhoto'] = $row['photos'][$requestedPhoto];
     }
  }
}


$TPL['results'] = $photoData;
include 'app.view.php';
?>






