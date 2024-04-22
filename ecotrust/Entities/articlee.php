<?PHP
class livraison{
	private $idliv;
	private $idcmd;
    private $etat;
	private $adresse;
	private $date;
	function __construct($idliv,$idcmd,$etat,$adresse,$date){
		$this->idliv=$idliv;
		$this->idcmd=$idcmd;
        $this->etat=$etat;
		$this->adresse=$adresse;
		$this->date=$date;
	}
	
	function getidliv(){
		return $this->idliv;
	}
	function getidcmd(){
		return $this->idcmd;
	}
    function getetat(){
		return $this->etat;
	}
	function getadresse(){
		return $this->adresse;
	}
	function getdate(){
		return $this->date;
	}
	

    function setidliv($idliv){
		return $this->idliv=$idliv;
	}
	function setidcmd($idcmd){
		return $this->idcmd=$idcmd;
	}
    function setetat($etat){
		return $this->etat;
	}
	function setadresse($adresse){
		return $this->adresse;
	}
	function setdate($date){
		return $this->date=$date;
	}
	
	
}

?>