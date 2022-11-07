<?php


      if (!function_exists('mysqli_fetch_all')){

            function mysqli_fetch_all($res, $type = MYSQLI_NUM){

                  $arr = array();


                    if ($type == MYSQLI_BOTH){
                      $a = mysqli_fetch_array($res, MYSQLI_BOTH);
                    }

                    if ($type == MYSQLI_ASSOC){
                      $a = mysqli_fetch_assoc($res);
                    }

                    if ($type == MYSQLI_NUM){
                      $a = mysqli_fetch_array($res, MYSQLI_NUM);
                    }


                    $b = (mysqli_num_rows($res))-1;
                    //$c = array();

                        for ($i=0; $i <= $b; $i++){
                          
                          mysqli_data_seek($res,$i);
                          $d = mysqli_fetch_array($res, $type);
                          array_push($arr, $d);

                        }

                          return $arr;
                }

        }


?>


