<?php

  $moduleName = "MyModule";



  if (count(glob("output/*")) !== 0 ) {
    array_map('unlink', glob("output/*"));
  }
    
  recursive();
  function recursive($dir = 'module_template')
  {
    //print_r();
    foreach(scandir($dir) as $val)
    {
      if($val == '.' || $val == '..') continue;
      $fDir = $dir.DIRECTORY_SEPARATOR.$val;
      $outputPath = str_replace('module_template', 'output', $fDir);
      
    //  echo $val;
      
      if(is_dir($fDir))
      {
         mkdir(replacePath($outputPath));
         recursive($fDir);
      }
      else
      {
        global $moduleName;
        $file = file_get_contents($fDir);
        
        $file = preg_replace('/(\{\$module\}|Template)/', $moduleName, $file);
        $file = preg_replace('/(\{\$moduleLower\}|template)/', strtolower($moduleName), $file);
          
        file_put_contents(replacePath($outputPath), $file);
      }

    }
    
  }
  
  function replacePath($outputPath)
  {
        global $moduleName;
                              
        $filename = str_replace('Template', $moduleName, $outputPath);
        $filename = str_replace('template', strtolower($moduleName), $filename);
        
        return $filename;
  }