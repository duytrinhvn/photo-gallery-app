<?php
// StAuth10065: I Khac Duy Trinh, 000753390 certify that this material is my original work. No other person's work has been used without due acknowledgement. I have not made my work available to anyone else.

// Auto-discover the photos, thumbnails and description files
$photoData = [];
$numGal = 0;
$TPL['currentPhoto'] = -1;
$TPL['currentDirLen'] = -1;
$TPL['currentDir'] = -1;

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

if(isset($_REQUEST['act'])){
  switch($_REQUEST['act']){
    case 'allphotos':
      $requestedDir = $_REQUEST['directory'];
      foreach($photoData as $row ){
        if($row['directory'] === $requestedDir){
          $TPL['requestedGal'] = $row;
          break;
        }
      }
      break;
    
    case 'onephoto':
      $requestedPhoto = $_REQUEST['id'];
      $requestedDir = $_REQUEST['directory'];
       foreach($photoData as $row ){
         if($row['directory'] === $requestedDir){
            if($requestedPhoto < count($row['photos']) && $requestedPhoto >= 0){
            $TPL['requestedGal'] = $row;
            $TPL['requestedPhoto'] = $row['photos'][$requestedPhoto];
            $TPL['currentPhotoId'] = $_REQUEST['id'] + 1;
            $TPL['currentDirLen'] = count($row['photos']);
            $TPL['currentDir'] = $row['directory'];
           }
           else {
            header("Location: app.ctrl.php?directory=" . $requestedDir . "&id=0&act=onephoto");
           }
         }
      }
      break;
  }
}

$TPL['results'] = $photoData;
include 'app.view.php';
?>






