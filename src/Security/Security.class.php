<?php 
namespace Run\Security;
class Security{
    private string $patternEmail="[\w-\.]+@([\w-]+\.)+[\w-]{2,4}";

    function filterString(string $data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return  $data;
      }

}