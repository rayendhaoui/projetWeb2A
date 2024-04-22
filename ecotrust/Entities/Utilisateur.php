<?PHP
	class utilisateur{
		private $id;
		private $nom;
		private $prenom;
		private $role;
		private $login;
		private $password;
		private $image;


		function __construct( $nom, $prenom, $role, $login, $password, $image){
			
			$this->nom=$nom;
			$this->prenom=$prenom;
			$this->role=$role;
			$this->login=$login;
			$this->password=$password;
			$this->image=$image;

		}

		public function getid (){
            return $this->id ;
        }
		public function getnom (){
            return $this->nom ;
        }
		public function getprenom (){
            return $this->prenom ;
        }
		public function getrole (){
            return $this->role ;
        }
		public function getlogin (){
            return $this->login ;
        }
		public function getpassword (){
            return $this->password ;
        }
		public function getimage (){
            return $this->image ;
        }

	}
?>