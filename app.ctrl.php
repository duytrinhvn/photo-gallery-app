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


?>

<!-- Let's look at the contents of $photoData...  -->
<pre><?php print_r($photoData); ?></pre>




