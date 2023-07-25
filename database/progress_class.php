<?php
class progress {

        var $parametro="";
        var $parametros="";
        var $saida="";
        var $dlc="";
        var $progresscfg="progress.cfg";
        var $tmp=".";
        var $pf="";
        var $propath="";
        var $progress="";
        var $fetcharray = array();
        var $simplearray = array();
        var $acao = "default"; // 09082022 helio -  para colocar como -param 

        function progress($dlc="/usr/dlc/",$pf="",$propath="",$progresscfg="",$tmp="/ws/works/"){
                $this->dlc=$dlc;
                $this->progresscfg=$progresscfg;
                $this->pf=$pf;
                $this->propath=$propath;
                $this->tmp=$tmp;
              
                

        }


        function montaacha($nome,$dado,$sep="=")
        {
                if ("$sep" == "=") {
                        return "$nome=" . $dado . "|" ;
                  } else {
                       return "$nome$sep" . $dado . "#" ;
                }
        }

        
        function toprogress ($campo,$tipo="")
        {
            $saida =  $campo;
                    if ("$tipo" == "char") {
                        return "\"".$saida."\""." ";
                    } else {
                        if ("$tipo" == "fim") {
                           return "\n";
                        } else {
                            return $saida." ";
                          }
                     }
        }

        function ambiente() {

                   putenv("DLC=$this->dlc");
              
                   $variavel = "";
                   $variavel .= "$this->dlc"."/";
                   $variavel .= $this->progresscfg;
                   putenv("PROCFG=".$variavel);
                             
                   putenv("PROPATH=$this->propath");
                 

            $xyx = $variavel;
            foreach($_ENV as $k => $v) {
                if ($v=="") {  putenv("$k=!"); } 
                        else { putenv("$k=$v"); }
              }
/*
            while (list($k, $v) = each ($_ENV)) {
                        if ($v=="") {  putenv("$k=!"); } 
                        else { putenv("$k=$v"); }
                }
                while (list($k, $v) = each ($_POST)) {
                        if ($v=="") { putenv("$k=!"); } 
                        else { putenv("$k=$v"); }
                }
                while (list($k, $v) = each ($_GET)) {
                        if ($v=="") { putenv("$k=!"); } 
                        else { putenv("$k=$v"); }
               }
            while (list($k, $v) = each ($_SERVER)) {
                putenv("$k=$v");
            }
*/
              
            $arrayparametro  = explode("!",$this->parametro);
            $arrayparametros = explode("!",$this->parametros);
          
            for ( $i = 0; $i < count ($arrayparametro); $i++) { 
                 $k = trim( $arrayparametro[$i] );  
                 $v = trim( $arrayparametros[$i] );
                        if (!empty($v)) {
                                putenv("$k=$v");
                                                  
                        }
                 if ("$k" == "saida") {
                        $this->saida=$v;
                 }
            } 

        } // ambiente
        
        function executa ($executa) {
        
            $this->ambiente();
            $proexe = "$this->dlc/bin/_progres";
            
            // 09082022 helio $command = $proexe . " " . "  -T " . $this->tmp . " -pf " . $this->pf . " -b -p " . $executa ;
            // 09082022 helio -  para colocar como -param 
            $command = $proexe . " " . "  -T " . $this->tmp . " -pf " . $this->pf . " -param \"" . $this->acao . "\"" . " -b -p " . $executa ;
          //  echo "\nPROGRESS commando=".$command."\n";
            $CMD="$command";

            // Executa Progress...
            

            $handle = popen ("$CMD", "r");
            $this->progress = "";
            do {
                    $data = fread($handle, 8192);
                    if (strlen($data) == 0) {
                        break;
                    }
                 
                    $this->progress .= $data;
            } while(true);
            fclose ($handle);
           
         
        } // executa
}
?>
