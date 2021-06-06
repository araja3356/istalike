	 <?php
    $path = $_SERVER['localhost'][1];

    $sizeInBytes = getFolderSize($path);
    
    echo getFormattedSize($sizeInBytes);

    function getFolderSize($directory){
        $totalSize = 0;
        $directoryArray = scandir($directory);

        foreach($directoryArray as $key => $fileName){
            if($fileName != ".." && $fileName != "."){
                if(is_dir($directory . "/" . $fileName)){
                    $totalSize = $totalSize + getFolderSize($directory . "/" . $fileName);
                } else if(is_file($directory . "/". $fileName)){
                    $totalSize = $totalSize + filesize("img". "/". $fileName);
                }
            }
        }
        return $totalSize;
    }


    function getFormattedSize($sizeInBytes) {

        if($sizeInBytes < 1024) {
            return $sizeInBytes . " bytes";
        } else if($sizeInBytes < 1024*1024) {
            return $sizeInBytes/1024 . " KB";
        } else if($sizeInBytes < 1024*1024*1024) {
            return $sizeInBytes/(1024*1024) . " MB";
        } else if($sizeInBytes < 1024*1024*1024*1024) {
            return $sizeInBytes/(1024*1024*1024) . " GB";
        } else if($sizeInBytes < 1024*1024*1024*1024*1024) {
            return $sizeInBytes/(1024*1024*1024*1024) . " TB";
        } else {
            return "Greater than 1024 TB";
        }

    }
?>