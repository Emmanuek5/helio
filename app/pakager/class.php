<?php
namespace App\Pakager;

class Pakager
{
    
    static function init (){

        $name = readline('Pakage Name: ');
        $version = readline('Pakage Version: ');
        $indexfile = readline('Index File: ');
        $description = readline('Pakage Description: ');
        $author = readline('Pakage Author: ');
        $license = readline('Pakage License: ');
        $keywords = readline('Pakage Keywords: ');
        $homepage = readline('Pakage Homepage: ');
        $repository = readline('Pakage Repository: ');
      
        $pakagedata = array('name' =>$name,
                                'version' => $version,
                                'description' => $description,
                                'indexfile' => $indexfile,
                                'author' => $author,
                                'license' => $license,
                                'keywords' => $keywords,
                                'homepage' => $homepage,
                                'repository' => $repository,
                                'dependencies' => array());
                              
 
          $confirmation = readline('Are you sure you want to create a new pakage? (y/n)');
          if ($confirmation == "y") {
      $pakagedata = json_encode($pakagedata, JSON_PRETTY_PRINT);
      mkdir("./modules/" . $name);
      $file =  fopen("./modules/" . $name . "/config.json", "w");
      fwrite($file, $pakagedata);
      fclose($file);
    }
              else{
              echo "Pakage not created";
              exit();
              }
      

  }


 static function quickinit(){


    $firstnames = array("John", "Mike", "Will", "Pete", "Lucy", "Barbara");
    $lastnames = array("Johnson", "Jackson", "Williams", "Smith");

    $random_firstname = $firstnames[array_rand($firstnames)];
    $random_lastname = $lastnames[array_rand($lastnames)];

    $fullname = $random_firstname . " " . $random_lastname;

    $pakagedata = array(
      
      'name' => $fullname,
      'version' => '1.0.0',
      'description' => 'Hello World',
      'author' => $fullname,
      'license' => 'MIT',
      'keywords' => 'hello, world',
      'homepage' => "",
      'repository' => ""
    );
$name = $pakagedata['name'];
    $confirmation = readline('Are you sure you want to create a new pakage? (y/n)');
    if ($confirmation == "y") {
      $pakagedata = json_encode($pakagedata, JSON_PRETTY_PRINT);
      mkdir("./modules/" . $name);
     $file =  fopen("./modules/" . $name . "/config.json", "w");
      fwrite($file, $pakagedata);
      fclose($file);
    } else {
      echo "Pakage not created";
      exit();
    }
      

  }


  static function add($pakagename){
     include './vendor/autoload.php';
     
     
     $rootPath = realpath('./modules/'.$pakagename);
if (file_exists("./modules/" . $pakagename)) {
    // Initialize archive object
    $zip = new \ZipArchive();
    $zip->open('./modules/'.$pakagename.".zip", \ZipArchive::CREATE | \ZipArchive::OVERWRITE);

    // Create recursive directory iterator
    /** @var SplFileInfo[] $files */
    $files = new \RecursiveIteratorIterator(
      new \RecursiveDirectoryIterator($rootPath),
      \RecursiveIteratorIterator::LEAVES_ONLY
    );

    foreach ($files as $name => $file) {
      // Skip directories (they would be added automatically)
      if (!$file->isDir()) {
        // Get real and relative path for current file
        $filePath = $file->getRealPath();
        $relativePath = substr($filePath, strlen($rootPath) + 1);

        // Add current file to archive
        $zip->addFile($filePath, $relativePath);
      }
    }

    // Zip archive will be created only after closing object
    $zip->close(); 
      $target_url = "http://localhost/testapi1/";
      if (function_exists('curl_file_create')) { // php 5.5+
        $cFile = curl_file_create("./modules/".$pakagename.'.zip');
      } else { // 
        $cFile = '@' . realpath("./modules/" . $pakagename . '.zip');
      }
      $post = array('extra_info' => '123456', 'pakage' => $cFile);
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, $target_url);
      curl_setopt($ch, CURLOPT_POST, 1);
      curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
      $result = curl_exec($ch);
      curl_close($ch);
if ($result == "success") {
        $result = \IsaEken\Spinner\Spinner::run(function () {
          \IsaEken\Spinner\Spinner::setTitle('Calculating...');
          sleep(1.5);
          \IsaEken\Spinner\Spinner::setTitle('Waiting...');
          sleep(1);
          \IsaEken\Spinner\Spinner::setTitle('Done!');
        });

        echo $result;
}else {
        $result = \IsaEken\Spinner\Spinner::run(function () {
          \IsaEken\Spinner\Spinner::setTitle('Calculating...');

          \IsaEken\Spinner\Spinner::setTitle('Waiting...');
          sleep(1);
          \IsaEken\Spinner\Spinner::setTitle('Done!');
        });
        echo "\e[0;41mYour Module Was not Uploaded Please Check Your Internet And Try Again .\e[0m\n";
      }

// delete zip file after upload
unlink('./modules/'.$pakagename.'.zip');

      
  }else {

      $result = \IsaEken\Spinner\Spinner::run(function () {
        \IsaEken\Spinner\Spinner::setTitle('Calculating...');
       
        \IsaEken\Spinner\Spinner::setTitle('Waiting...');
        sleep(1);
        \IsaEken\Spinner\Spinner::setTitle('Done!');});
      echo "\e[0;41mPakage Does not Exist!\e[0m\n";
  }


  
  
  
}
  static function install($pakagename)
  {
    $result = \IsaEken\Spinner\Spinner::run(function () {
      \IsaEken\Spinner\Spinner::setTitle('Calculating...');
 sleep(3) ;
      \IsaEken\Spinner\Spinner::setTitle('Waiting...');
      sleep(1);
      \IsaEken\Spinner\Spinner::setTitle('Downloading....');
      sleep(5);
      \IsaEken\Spinner\Spinner::setTitle('Done!');
    });

    $url = "http://localhost/pakage/" . $pakagename . ".zip";
    $file = fopen($url, 'r');
    $content = stream_get_contents($file);
    fclose($file);
    $file = fopen($pakagename . ".zip", 'w');
    fwrite($file, $content);
    fclose($file);
    $zip = new \ZipArchive;
    $res = $zip->open("./".$pakagename.'.zip');
    if ($res === TRUE) {
      $zip->extractTo('./modules/'.$pakagename);
      $zip->close();

      unlink('./' . $pakagename . '.zip');
    } else {
      echo "\e[0;41mPakage Was not Uploaded Please Check Your Internet And Try Again .\e[0m\n";
    }
  
  }
   


}
