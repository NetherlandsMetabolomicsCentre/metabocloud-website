<?php
  require_once('header.php');
?>

<h1>Projects</h1>

<?php

  $projectsDir = './projects/';
  $projectIdx = 0;

  foreach (scandir($projectsDir) as $entry){

    $projectDir = $projectsDir . $entry . '/';

    if ($entry != "." && $entry != ".." && is_dir($projectDir)) {

      // read the project details from the JSON
      $projectDetails = @json_decode( @file_get_contents($projectDir . 'details.json') );

      if (property_exists($projectDetails, 'title') ){

        // start new section
        if ($projectIdx == 0){ echo ' <div class="row-fluid">'; }

        // increase projectIdx
        $projectIdx++;

        // start section
        echo '<div class="span4">';

        // project title
        echo '<h4>' . $projectDetails->title . '</h4>';

        // project introduction
        echo '<p>' . $projectDetails->introduction . '</p>';

        // end section
        echo '</div>';

        // limit to 3 projects per row
        if ($projectIdx == 3){ $projectIdx = 0; }

        // close section
        if ($projectIdx == 0){ echo '</div>'; }
      }
    }
  }
?>

<?php
  require_once('footer.php');
?>
